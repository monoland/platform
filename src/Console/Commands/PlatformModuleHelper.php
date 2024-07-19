<?php

namespace Monoland\Platform\Console\Commands;

use DirectoryIterator;
use ErrorException;
use Exception;
use FilesystemIterator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use stdClass;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PlatformModuleHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:helper
        {repository}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Help other module to handling git files';

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
        // incoming
    }

    /**
     * baseModuleDir function
     *
     * @return string
     */
    protected function baseModuleDir(): string
    {
        return base_path() . DIRECTORY_SEPARATOR . 'modules';
    }

    /**
     * isDirInBaseModule function
     *
     * @return bool
     */
    protected function isDirInBaseModule($directory): bool
    {
        $base_dir   = explode(DIRECTORY_SEPARATOR, $this->baseModuleDir());
        $target_dir = explode(DIRECTORY_SEPARATOR, $directory);

        // prevent error cause index not found
        if (count($target_dir) < count($base_dir)) {
            return false;
        }

        // start to check each dir path
        foreach ($base_dir as $idx => $dir) {
            if ($base_dir[$idx] != $target_dir[$idx]) {
                return false;
            }
        }

        return true;
    }


    /**
     * buildModuleDir function
     *
     * @return string
     */
    protected function buildModuleDir($module_name): string
    {
        return $this->baseModuleDir() . DIRECTORY_SEPARATOR . $module_name;
    }


    /**
     * buildModuleName function
     *
     * @return string
     */
    protected function buildModuleName($repo_url): string
    {
        // $repo_url = git@github.com:repoUser/repo.git | https://github.com/repoUser/repo.git
        // regex (?<=\/) [a-zA-Z]+ (?=.git)
        // (?<=\/)   : find after /  
        // [a-zA-Z]+ : find alphabets
        // (?=.git)  : find before .git
        preg_match('/(?<=\/)[a-zA-Z]+(?=.git)/', $repo_url, $module_name);
        if (count($module_name) <= 0) return "";
        return $module_name[0];
    }

    /**
     * isModuleExist function
     *
     * @return bool
     */
    protected function isModuleExist($module_name): bool
    {
        // prevent return true because '' should be invalid
        if ($module_name == '' || $module_name == '.' || $module_name == '..') return false;
        return is_dir($this->buildModuleDir($module_name));
    }

    /**
     * isModuleExist function
     *
     * @return bool
     */
    protected function isModuleExistByRepo($repo_url): bool
    {
        return $this->isModuleExist($this->buildModuleName($repo_url));
    }

    /**
     * runProcess function
     *
     * @return string | ProcessFailedException | null
     */
    protected function runProccess($command, $pwd = null): string | ProcessFailedException | null
    {
        $process = new Process($command);
        if (!is_null($pwd)) {
            $process->setWorkingDirectory($pwd);
        }
        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            return $exception;
        }
        return $process->getOutput();
    }

    /**
     * cloneModule function
     *
     * @return string | ProcessFailedException | null
     */
    protected function cloneModule($repo_url): string | ProcessFailedException | null
    {
        $command = ['git', 'clone', $repo_url];
        $pwd     = $this->buildModuleDir('');
        $output  = $this->runProccess($command, $pwd);
        return $output;
    }

    /**
     * fetchModule function
     *
     * @return string | ProcessFailedException | null
     */
    protected function fetchModule($module_name): string | ProcessFailedException | null
    {
        $command = ['git', 'fetch'];
        $pwd     = $this->buildModuleDir($module_name);
        $output  = $this->runProccess($command, $pwd);
        return $output;
    }

    /**
     * fetchModuleByRepo function
     *
     * @return string | ProcessFailedException | null
     */
    protected function fetchModuleByRepo($repo_url): string | ProcessFailedException | null
    {
        return $this->fetchModule($this->buildModuleName($repo_url));
    }

    /**
     * 
     * getModuleTags function
     *
     * @return array | ProcessFailedException | null
     */
    protected function getModuleTags($module_name): array | ProcessFailedException | null
    {
        $command = ['git', 'tag'];
        $pwd     = $this->buildModuleDir($module_name);
        $output  = $this->runProccess($command, $pwd);
        return $this->formatModuleTags($output);
    }

    /**
     * 
     * getModuleTagsByRepo function
     *
     * @return array | ProcessFailedException | null
     */
    protected function getModuleTagsByRepo($repo_url): array | ProcessFailedException | null
    {
        return $this->getModuleTags($this->buildModuleName($repo_url));
    }

    /**
     * 
     * formatModuleTags function
     *
     * @return array | null
     */
    protected function formatModuleTags($raw_tags): array | null
    {
        preg_match_all('/.+/', $raw_tags, $tags);
        return count($tags) > 0 ? $tags[0] : [];
    }

    /**
     * 
     * checkoutModule function
     *
     * @return bool | ProcessFailedException | null
     */
    protected function checkoutModule($ref, $module_name): bool | ProcessFailedException | null
    {
        $command = ['git', 'checkout', $ref];
        $pwd     = $this->buildModuleDir($module_name);
        $output  = $this->runProccess($command, $pwd);
        return $output == '';
    }

    /**
     * 
     * checkoutModuleRefByRepo function
     *
     * @return bool | ProcessFailedException | null
     */
    protected function checkoutModuleByRepo($ref, $repo_url): bool | ProcessFailedException | null
    {
        return $this->checkoutModule($ref, $this->buildModuleName($repo_url));
    }

    /**
     * 
     * getModuleCurrentTag function
     *
     * @return string | ProcessFailedException | null
     */
    protected function getModuleCurrentTag($module_name, $remote = null, $head = null): string | ProcessFailedException | null
    {
        $log = $this->getModuleCurrentLog($module_name, $remote, $head);
        if (!is_object($log))        return $log;
        if (!is_array($log->refs))   return $log;
        if (count($log->refs) <= 0)  return null;
        foreach ($log->refs as $tag) {
            // HARDCODED | NEED TO BE RECODED RELATIVE TO THE REPO REMOTE AND HEAD OR BRANCHES
            $isNotBranches = $tag != 'origin/main' && $tag != 'main';
            $isNotHead     = $tag != 'HEAD' && $tag != 'origin/head' && $tag != 'head';
            if ($isNotBranches && $isNotHead) return $tag;
        }
        return '';
    }

    /**
     * 
     * getModuleCommits function
     *
     * @return array | ProcessFailedException | null
     */
    protected function getModuleCommits($module_name, $remote = null, $head = null): array | ProcessFailedException | null
    {
        $logs = $this->getModuleGitLog($module_name, $remote, $head);
        if (!is_array($logs)) return $logs;
        // capek
        $commits = [];
        foreach ($logs as $log) array_push($commits, $log->commit);
        // pegel
        return $commits;
    }

    /**
     * 
     * getModuleCurrentCommit function
     *
     * @return string | ProcessFailedException | null
     */
    protected function getModuleCurrentCommit($module_name, $remote = null, $head = null): string | ProcessFailedException | null
    {
        $commits = $this->getModuleCommits($module_name, $remote, $head);
        if (!is_array($commits)) return $commits;
        return $commits[0];
    }

    /**
     * handle function
     *
     * @return string | null
     */
    protected function handleModuleNotFound($module): string | null
    {
        while (is_null($module) || !$this->isModuleExist($module)) {
            if (!is_null($module))
                $this->info('Module ' . $module . ' seems not found..');

            $modules = [];
            foreach (Cache::get('modules') as $cached)
                array_push($modules, $cached->name);

            if (count($modules) <= 0)
                return $this->info("Apparently there's no module found..");

            $module = $this->choice('Select Module', $modules);
            if (!$this->isModuleExist($module))
                return $this->info('Module ' . $module . ' seems not found.');
        }
        return $module;
    }

    /**
     * deleteModule function
     *
     * @return bool | null
     */
    protected function deleteModule($module_name): bool | null
    {
        // guard clause
        $pwd = $this->buildModuleDir($module_name);

        // if already non exist
        if (!file_exists($pwd)) return true;

        // guard clause to prevent any input error that 
        // can remove unwanted directories
        $isModuleNameDots            = $module_name == '' || $module_name == '*' || $module_name == '.' || $module_name == '..';
        $isModuleDirPartOfBaseModule = $this->isDirInBaseModule($pwd);
        if ($isModuleNameDots || !$isModuleDirPartOfBaseModule) {
            throw new InvalidArgumentException(
                "There's some security issue with your targeted directory.. \n" .
                    "Module Name        : $module_name \n" .
                    "Targeted Directory : $pwd \n"
            );
        }

        // confirm for the last time, with the provided information 
        // which folder that want to be deleted
        if ($this->confirm(
            "Confirm to delete the targeted module.. \n" .
                "Module Name        : $module_name \n" .
                "Targeted Directory : $pwd \n"
        )) {
            $this->removeDirectories($pwd);
            return !file_exists($pwd);
        } else {
            return false;
        }
    }

    /**
     * deleteModuleByRepo function
     *
     * @return bool | null
     */
    protected function deleteModuleByRepo($repo_url): bool | null
    {
        return $this->deleteModule($this->buildModuleName(($repo_url)));
    }

    /**
     * removeDirectories function
     *
     * @return string | ProcessFailedException | null
     */
    protected function removeDirectories(string $dir_path): void
    {
        if (file_exists($dir_path)) {
            $di = new RecursiveDirectoryIterator($dir_path, FilesystemIterator::SKIP_DOTS);
            $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

            // run recursive for each file
            foreach ($ri as $file) {
                // git config somehow can't be deleted due to permission denied    
                $isDir = $file->isDir();
                $path = $file->getRealPath();

                // prevent permission error from deleting
                chmod($path, 0777);

                // delete folder if empty and delete file if not folder                    
                if ($isDir && $this->isEmptyDirectories($file->getPathname())) rmdir($file);
                if (!$isDir) unlink($file);
            }

            // prevent permission error from deleting            
            chmod($dir_path, 0777);
            if ($this->isEmptyDirectories($dir_path)) rmdir($dir_path);
        }
    }

    /**
     * isEmptyDirectories function
     *
     * @return bool
     */
    function isEmptyDirectories($dir)
    {
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                closedir($handle);
                return false;
            }
        }
        closedir($handle);
        return true;
    }

    /**
     * 
     * formatModuleLogsToJson function
     *
     * @return array 
     */
    protected function formatModuleLogsToJson($logs_string): array
    {
        // filter logs
        $logs = [];
        preg_match_all('/\{(.*?)\}/', $logs_string, $logs);
        // handling if there're no regex match
        if (count($logs) <= 0) return [];
        // getting all the { commit .. };
        $result = [];
        $logs = $logs[0];
        foreach ($logs as $log) {
            $json   = json_decode($log, true);
            $object = json_decode(json_encode($json), false);
            $object->refs = explode("|", $object->refs);
            array_push($result, $object);
        }
        return $result;
    }

    /**
     * 
     * getModuleGitLog function
     *
     * @return array | ProcessFailedException | null
     */
    protected function getModuleGitLog($module_name, $remote = null, $head = null): array | ProcessFailedException | null
    {
        // git log commit with pretty format
        // git log --pretty=format:'{ commit:%H, refs:%(decorate:prefix=\",suffix=\",separator=|,tag=), unix_time:%ct }'
        $remote_head_exist = !is_null($remote) && !is_null($head);
        if ($remote_head_exist) $command = ['git', 'log', $remote, $head, "--pretty=format:'{ \"commit\":\"%H\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct },'"];
        else                    $command = ['git', 'log', "--pretty=format:'{ \"commit\":\"%H\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct },'"];

        // proceed to get the output
        $pwd     = $this->buildModuleDir($module_name);
        $output  = $this->runProccess($command, $pwd);

        // return logs
        return $this->formatModuleLogsToJson($output);
    }

    /**
     * 
     * getModuleCurrentLog function
     *
     * @return bool | ProcessFailedException | null
     */
    protected function getModuleCurrentLog($module_name, $remote = null, $head = null): stdClass
    {
        $logs = $this->getModuleGitLog($module_name, $remote, $head);
        return count($logs) > 0 ? $logs[0] : null;
    }
}
