<?php

namespace Monoland\Platform\Services;

use Exception;
use FilesystemIterator;
use InvalidArgumentException;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use stdClass;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PlatformModulesGit
{

    /**
     * baseModuleDir function
     *
     * @return string
     */
    public function baseModuleDir(): string
    {
        return base_path() . DIRECTORY_SEPARATOR . 'modules';
    }

    /**
     * isDirInBaseModule function
     *
     * @return bool
     */
    public function isDirInBaseModule($directory): bool
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
    public function buildModuleDir($module_slug): string
    {
        return $this->baseModuleDir() . DIRECTORY_SEPARATOR . $module_slug;
    }


    /**
     * buildModuleSlug function
     *
     * @return string | null
     */
    public function buildModuleSlug($repo_url): string | null
    {
        // $repo_url = git@github.com:repoUser/repo.git | https://github.com/repoUser/repo.git
        $repo_url = str_replace('.git', '', $repo_url);
        $split    = explode('/', $repo_url);
        if (count($split) <= 0) return null;
        return $split[count($split) - 1];
    }

    /**
     * isModuleExist function
     *
     * @return bool
     */
    public function isModuleExist($module_slug): bool
    {
        // prevent return true because '' should be invalid
        if ($module_slug == '' || $module_slug == '.' || $module_slug == '..') return false;
        return is_dir($this->buildModuleDir($module_slug));
    }

    /**
     * isModuleExistByRepo function
     *
     * @return bool
     */
    public function isModuleExistByRepo($repo_url): bool
    {
        return $this->isModuleExist($this->buildModuleSlug($repo_url));
    }

    /**
     * runProcess function
     *
     * @return string | ProcessFailedException | null
     */
    public function runProccess($command, $pwd = null): string | ProcessFailedException | null
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
    public function cloneModule($repo_url): string | ProcessFailedException | null
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
    public function fetchModule($module_slug): string | ProcessFailedException | null
    {
        // git fetch --prune remove
        $command = ['git', 'fetch', '--prune'];
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);
        return $output;
    }

    /**
     * fetchModuleByRepo function
     *
     * @return string | ProcessFailedException | null
     */
    public function fetchModuleByRepo($repo_url): string | ProcessFailedException | null
    {
        return $this->fetchModule($this->buildModuleSlug($repo_url));
    }

    /**
     * 
     * getModuleTags function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleTags($module_slug): array | ProcessFailedException | null
    {
        $command = ['git', 'tag', '--sort=-v:refname'];
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);
        return $this->formatModuleTags($output);
    }

    /**
     * 
     * getModuleGitLogByRef function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleGitLogByRef($module_slug, $ref): stdClass | ProcessFailedException | null
    {
        // this one doesn use remotes and branch because ref automatically sync with previous fetch
        $command = ['git', 'log', $ref, "--pretty=format:{ \"commit\":\"%H\", \"body\":\"%B\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct }[EXPLODE]"];
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);
        $logs = $this->formatModuleLogsToJson($output, $module_slug);
        if (is_array($logs)) {
            if (count($logs) > 0) return $logs[0];
            else                  return null;
        } else {
            return $output;
        }
    }

    /**
     * 
     * getModuleTagsByRepo function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleTagsByRepo($repo_url): array | ProcessFailedException | null
    {
        return $this->getModuleTags($this->buildModuleSlug($repo_url));
    }

    /**
     * getModuleRemote function
     *
     * @return string
     */
    public function getModuleSymbolicRef($module_slug): string
    {
        $command = ['git', 'symbolic-ref', 'refs/remotes/origin/HEAD', '--short'];
        $pwd     = $this->buildModuleDir($module_slug);
        // expected return origin/[branch-name]
        $output  = $this->runProccess($command, $pwd);
        return $output;
    }

    /**
     * getModuleRemote function
     *
     * @return array
     */
    public function getModuleRemoteAndBranch($module_slug): array
    {
        // expected return origin/[branch-name]
        $refs  = trim($this->getModuleSymbolicRef($module_slug));
        $split = explode('/', $refs);
        if (count($split) > 0) return $split;
        else                   throw new Exception("expected return origin/[branch-name]");
        // expected [origin,[branch_name]]
    }

    /**
     * readGitConfig function
     *
     * @return array
     */
    public function readGitConfig($module_slug): array
    {
        return $this->readGitConfigByPath($this->buildModuleDir($module_slug));
    }

    /**
     * readGitConfig function
     *
     * @return array
     */
    public function readGitConfigByPath($module_path): array
    {
        $git_file = fopen($module_path . DIRECTORY_SEPARATOR . '.git' . DIRECTORY_SEPARATOR . 'config', 'r');
        $configs = [];

        // proceed to read git config line_by_line.
        while (($line = fgets($git_file)) !== false) {
            $line = trim($line);

            // check if its parent config
            preg_match('/(?<=\[).+(?=])/', $line, $is_parent_config);

            if (count($is_parent_config) > 0) {
                $is_parent_config[0] = str_replace('"', '', $is_parent_config[0]);
                $parent_config = explode(' ', $is_parent_config[0]);

                array_push($configs, [
                    'name'  => count($parent_config) > 1 ? trim($parent_config[0]) : trim($parent_config[0]),
                    'value' => count($parent_config) > 1 ? trim($parent_config[1]) : null,
                    'properties' => [],
                ]);
            } else {
                $properties = explode('=', $line);
                array_push($configs[count($configs) - 1]['properties'], [
                    'name'  => count($properties) > 1 ? trim($properties[0]) : trim($properties[0]),
                    'value' => count($properties) > 1 ? trim($properties[1]) : null,
                ]);
            }
        }

        fclose($git_file);
        return $configs;
    }

    /**
     * 
     * formatModuleTags function
     *
     * @return array | null
     */
    public function formatModuleTags($raw_tags): array | null
    {
        preg_match_all('/.+/', $raw_tags, $tags);
        return count($tags) > 0 ? $tags[0] : [];
    }

    /**
     * 
     * getModuleLatestTag function
     *
     * @return string | null
     */
    public function getModuleLatestTag($module_slug): string | null
    {
        // automatically sorted by the git command
        $tags = $this->getModuleTags($module_slug);
        return count($tags) > 0 ? $tags[0] : null;
    }


    /**
     * 
     * checkoutModule function
     *
     * @return bool | ProcessFailedException | null
     */
    public function checkoutModule($ref, $module_slug): bool | ProcessFailedException | null
    {
        $command = ['git', 'checkout', $ref];
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);
        return $output == '';
    }

    /**
     * 
     * checkoutModuleRefByRepo function
     *
     * @return bool | ProcessFailedException | null
     */
    public function checkoutModuleByRepo($ref, $repo_url): bool | ProcessFailedException | null
    {
        return $this->checkoutModule($ref, $this->buildModuleSlug($repo_url));
    }

    /**
     * 
     * getModuleCommits function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleCommits($module_slug, $remote = null, $head = null): array | ProcessFailedException | null
    {
        $logs = $this->getModuleGitLog($module_slug, $remote, $head);
        if (!is_array($logs)) {
            return $logs;
        }
        // capek
        $commits = [];
        foreach ($logs as $log) {
            array_push($commits, $log->commit);
        }
        // pegel
        return $commits;
    }

    /**
     * 
     * getModuleCurrentCommit function
     *
     * @return string | ProcessFailedException | null
     */
    public function getModuleCurrentCommit($module_slug, $remote = null, $head = null): string | ProcessFailedException | null
    {
        $commits = $this->getModuleCommits($module_slug, $remote, $head);
        return !is_array($commits) ? $commits : $commits[0];
    }

    /**
     * deleteModule function
     *
     * @return bool | null
     */
    public function deleteModule($module_slug): bool | null
    {
        // guard clause
        $pwd = $this->buildModuleDir($module_slug);

        // if already non exist
        if (!file_exists($pwd)) return true;

        // guard clause to prevent any input error that 
        // can remove unwanted directories
        $isModuleNameDots            = $module_slug == '' || $module_slug == '*' || $module_slug == '.' || $module_slug == '..';
        $isModuleDirPartOfBaseModule = $this->isDirInBaseModule($pwd);
        if ($isModuleNameDots || !$isModuleDirPartOfBaseModule) {
            throw new InvalidArgumentException(
                "There's some security issue with your targeted directory.. \n" .
                    "Module Name        : $module_slug \n" .
                    "Targeted Directory : $pwd \n"
            );
        }

        // confirm for the last time, with the provided information 
        // which folder that want to be deleted
        $this->removeDirectories($pwd);
        return !file_exists($pwd);
    }

    /**
     * deleteModuleByRepo function
     *
     * @return bool | null
     */
    public function deleteModuleByRepo($repo_url): bool | null
    {
        return $this->deleteModule($this->buildModuleSlug(($repo_url)));
    }

    /**
     * removeDirectories function
     *
     * @return string | ProcessFailedException | null
     */
    public function removeDirectories(string $dir_path): void
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
    public function formatModuleLogsToJson($logs_string, $module_slug): array
    {
        // get all the logs
        $logs = explode('[EXPLODE]', $logs_string);
        $result = [];

        // filter remotes refs
        $refs = $this->getModuleRemoteAndBranch($module_slug);
        $remote = $refs[0];
        $branch = $refs[1];

        // formatting all the log as a json object
        foreach ($logs as $log) {
            // don't know why but \n cause json_decode
            // return null don't know if it works in unix
            $log = trim($log);
            $log = preg_replace('/\n+/', '\r\n', $log);

            // convert it to json object
            $json   = json_decode($log, true);
            $object = json_decode(json_encode($json), false);

            // if successfully converted into object then 
            // append to the array
            if (!is_null($object)) {
                $object->refs = explode("|", $object->refs);
                $object->tags = $this->filterModuleRefsAsTag($object->refs, $remote, $branch);
                array_push($result, $object);
            }
        }
        return $result;
    }

    /**
     * 
     * filterModuleRefsAsTag function
     *
     * @return array 
     */
    public function filterModuleRefsAsTag($refs, $remote, $branch): array
    {
        $result = [];
        foreach ($refs as $ref) {
            // boolean
            $isNotRemote = !str_contains($ref, $remote) && !str_contains($ref, $branch);
            $isNotHead = !str_contains($ref, 'HEAD') && !str_contains($ref, 'head');
            // determine if used remote and branch
            $isUsedRemote = !is_null($remote) && !is_null($branch);
            $isValidTags = $isNotHead && $isNotRemote && $isUsedRemote || $isNotHead && !$isUsedRemote;
            // determine condition
            if ($isValidTags) array_push($result, $ref);
        }
        return $result;
    }

    /**
     * 
     * getModuleGitLog function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleGitLog($module_slug, $remote = null, $head = null): array | ProcessFailedException | null
    {
        // git log commit with pretty format
        // git log --pretty=format:'{ commit:%H, refs:%(decorate:prefix=\",suffix=\",separator=|,tag=), unix_time:%ct }'
        $remote_head_exist = !is_null($remote) && !is_null($head);
        if ($remote_head_exist) $command = ['git', 'log', $remote, $head, "--pretty=format:{ \"commit\":\"%H\", \"body\":\"%B\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct }[EXPLODE]"];
        else                    $command = ['git', 'log', "--pretty=format:{ \"commit\":\"%H\", \"body\":\"%B\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct }[EXPLODE]"];

        // proceed to get the output
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);

        // return logs
        return $this->formatModuleLogsToJson($output, $module_slug);
    }

    /**
     * 
     * getModuleGitLogByTag function
     *
     * @return array | ProcessFailedException | null
     */
    public function getModuleGitLogByTag($module_slug, $remote = null, $head = null): array | ProcessFailedException | null
    {
        // git log commit with pretty format
        // git log --pretty=format:'{ commit:%H, refs:%(decorate:prefix=\",suffix=\",separator=|,tag=), unix_time:%ct }'
        $remote_head_exist = !is_null($remote) && !is_null($head);
        if ($remote_head_exist) $command = ['git', 'log', '--no-walk', '--tags', $remote, $head, "--pretty=format:{ \"commit\":\"%H\", \"body\":\"%B\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct }[EXPLODE]"];
        else                    $command = ['git', 'log', '--no-walk', '--tags', "--pretty=format:{ \"commit\":\"%H\", \"body\":\"%B\", \"refs\":\"%(decorate:prefix=,suffix=,separator=|,tag=)\", \"unix_time\":%ct }[EXPLODE]"];

        // proceed to get the output
        $pwd     = $this->buildModuleDir($module_slug);
        $output  = $this->runProccess($command, $pwd);

        // return logs
        return $this->formatModuleLogsToJson($output, $module_slug);
    }

    /**
     * getModuleCurrentLog function
     *
     * @param [type] $module_slug
     * @param [type] $remote
     * @param [type] $head
     * @return object
     */
    public function getModuleCurrentLog($module_slug, $remote = null, $head = null): object
    {
        $logs = $this->getModuleGitLog($module_slug, $remote, $head);
        return count($logs) > 0 ? $logs[0] : null;
    }

    /**
     * getModuleCurrentLogTag function
     *
     * @param [type] $module_slug
     * @param [type] $remote
     * @param [type] $head
     * @return object
     */
    public function getModuleCurrentLogByTag($module_slug, $remote = null, $head = null): object
    {
        $logs = $this->getModuleGitLogByTag($module_slug, $remote, $head);
        return count($logs) > 0 ? $logs[0] : null;
    }
}
