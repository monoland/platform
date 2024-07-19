<?php

namespace Monoland\Platform\Console\Commands;

use ErrorException;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Monoland\Platform\Console\Commands\PlatformModuleHelper;

class PlatformModuleCheckout extends PlatformModuleHelper
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:checkout
        {module?} {--by=} {--nofetch=false} {ref?}    
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checkout git repository to modules folder';

    /**
     * handle function
     *
     * @return void
     */
    public function handle()
    {
        try {
            // mode
            $mode    = env('PLATFORM_MODE', 'prod');
            $is_prod = $mode == 'prod';

            // try to getting needed argument
            $module = $this->argument('module');
            $by     = $this->option('by');
            $ref    = $this->argument('ref');
            $nofetch = $this->option('nofetch') == 'true';

            // try to getting the correct modules if not found..
            $module = $this->handleModuleNotFound($module);
            if (!$this->isModuleExist($module)) return $module;

            // Handling fetch
            if (!$nofetch)
                $this->call('module:fetch', ['module' => $module]);


            // Hadnlign Checkout
            if (is_null($by) && $is_prod || $by == 'tag')
                $success = $this->handleByTag($module, $ref);

            // For refs by tags or production mode
            if (is_null($by) && !$is_prod || $by == 'commit')
                $success = $this->handleByCommit($module, $ref);

            if ($success)               return $this->info('Success checkout');
            else if (is_null($success)) return;
            else if (!$success)         return $this->info('Failed checkout');
        } catch (ErrorException $error) {
            return $this->error($error->getMessage());
        }
    }

    /**
     * handle function
     *
     * @return bool | null
     */
    protected function handleByTag($module, $tag): bool | null
    {
        // -> For refs by tags or production mode
        $this->info('Trying to checkout by tag..');

        // -> procced to fetch
        $output = $this->fetchModule($module);
        if ($output instanceof ProcessFailedException) throw $output;

        // -> get list of tags
        $output = $this->getModuleTags($module);
        if ($output instanceof ProcessFailedException) throw $output;
        if (!is_array($output))                        throw $output;
        if (count($output) <= 0)                       return $this->info("There are no tags found");

        // -> current tag / head
        $current_tag = $this->getModuleCurrentTag($module);
        if (!is_null($current_tag)) $this->info('Current Tag : ' . $current_tag);

        // -> check if tags found
        while (!in_array($tag, $output)) {
            if (is_null($tag)) $tag = $this->choice('Tag Not Found, Select Tag', $output);
            else               $tag = $this->choice('Tag Not Found, Select Tag', $output);
        }

        // return
        return $this->checkoutModule($tag, $module);;
    }

    /**
     * handle function
     *
     * @return bool | null
     */
    protected function handleByCommit($module, $ref): bool | null
    {
        // -> For refs by tags or production mode
        $this->info('Trying to checkout by commit..');

        // -> procced to fetch
        $output = $this->fetchModule($module);
        if ($output instanceof ProcessFailedException) throw $output;

        // -> get list of refs
        $output = $this->getModuleCommits($module, 'origin', 'main');
        if ($output instanceof ProcessFailedException) throw $output;
        if (!is_array($output))                        throw $output;
        if (count($output) <= 0)                       return $this->info("There are no commit found");

        // -> current tag / head
        $current_commit = $this->getModuleCurrentCommit($module);
        if (!is_null($current_commit)) $this->info('Current Refs : ' . $current_commit);
        // -> latest tag
        $latest_commit = $this->getModuleCurrentCommit($module, 'origin', 'main');
        if (!is_null($latest_commit)) $this->info('Latest Refs : ' . $latest_commit);

        // -> check if tags found
        while (!in_array($ref, $output)) {
            if (is_null($ref)) $ref = $this->choice('Ref Not Found, Select Ref', $output);
            else               $ref = $this->choice('Ref Not Found, Select Ref', $output);
        }

        // return
        return $this->checkoutModule($ref, $module);;
    }
}
