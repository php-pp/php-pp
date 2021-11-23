<?php

declare(strict_types=1);

use Steevanb\ParallelProcess\{
    Console\Application\ParallelProcessesApplication,
    Process\Process,
    Process\ProcessArray
};
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Finder\Finder;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

function createProcesses(string $binary): ProcessArray
{
    $return = new ProcessArray();
    foreach ((new Finder())->directories()->in(dirname(__DIR__, 2) . '/package')->depth(0) as $directory) {
        if (file_exists($directory->getPathName() . '/bin/ci/' . $binary)) {
            $return->offsetSet(null, createProcess($directory->getRelativePathname(), $binary));
        }
    }

    return $return;
}

function createProcess(string $package, string $binary): Process
{
    return (new Process([dirname(__DIR__, 2) . '/package/' . $package . '/bin/ci/' . $binary]))
        ->setName($package);
}

$binary = array_pop($argv);

(new ParallelProcessesApplication())
    ->addProcesses(createProcesses($binary))
    ->run(new ArgvInput($argv));
