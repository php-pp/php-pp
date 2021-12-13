<?php

declare(strict_types=1);

use Steevanb\ParallelProcess\{
    Console\Application\ParallelProcessesApplication,
    Process\Process,
    Process\ProcessArray
};
use PhpPp\Core\Component\Collection\StringCollection;
use Symfony\Component\Console\Input\ArgvInput;

require $_SERVER['COMPOSER_HOME'] . '/vendor/autoload.php';
require dirname(__DIR__, 2) . '/vendor/autoload.php';

function createPhpunitProcesses(string $phpVersion = null): ProcessArray
{
    $phpVersions = new StringCollection(is_string($phpVersion) ? [$phpVersion] : ['7.4', '8.0', '8.1']);

    $return = new ProcessArray();
    foreach ($phpVersions as $loopPhpVersion) {
        $return->offsetSet(null, createPhpunitProcess($loopPhpVersion));
    }

    return $return;
}

function createPhpunitProcess(string $phpVersion): Process
{
    return (new Process([__DIR__ . '/phpunit', '--php=' . $phpVersion]))
        ->setName('phpunit --php=' . $phpVersion);
}

$phpVersion = null;
$applicationArgv = new StringCollection();
foreach ($argv as $arg) {
    if (substr($arg, 0, 6) === '--php=') {
        $phpVersion = substr($arg, 6);
    } else {
        $applicationArgv->add($arg);
    }
}

(new ParallelProcessesApplication())
    ->addProcesses(createPhpunitProcesses($phpVersion))
    ->run(new ArgvInput($applicationArgv->toArray()));
