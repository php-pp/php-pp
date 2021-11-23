<?php

declare(strict_types=1);

use Steevanb\ParallelProcess\{
    Console\Application\ParallelProcessesApplication,
    Process\Process,
    Process\ProcessArray
};
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Finder\Finder;

require $_SERVER['COMPOSER_HOME'] . '/vendor/autoload.php';
require dirname(__DIR__, 2) . '/vendor/autoload.php';

function createValidateProcesses(string $phpVersion = null): ProcessArray
{
    $return = new ProcessArray();
    foreach ((new Finder())->directories()->in(dirname(__DIR__, 2) . '/package')->depth(0) as $directory) {
        if (file_exists($directory->getPathName() . '/bin/ci/validate')) {
            $return->offsetSet(null, createValidateProcess($directory->getRelativePathname()));
        }
    }

    return $return;
}

function createValidateProcess(string $package): Process
{
    return (new Process([dirname(__DIR__, 2) . '/package/' . $package . '/bin/ci/validate']))
        ->setName($package);
}

(new ParallelProcessesApplication())
    ->addProcesses(createValidateProcesses())
    ->run(new ArgvInput($argv));
