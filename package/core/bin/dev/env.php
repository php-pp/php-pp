<?php

declare(strict_types=1);

use Steevanb\ParallelProcess\{
    Console\Application\ParallelProcessesApplication,
    Process\Process
};
use Symfony\Component\Console\Input\ArgvInput;

require $_SERVER['COMPOSER_HOME'] . '/vendor/autoload.php';
$rootDir = dirname(__DIR__, 2);

$composerProcess = (new Process([$rootDir . '/bin/composer', 'update', '--ansi']))
    ->setName('composer update');

$symlinksProcess = new Process([$rootDir . '/bin/dev/symlinks']);
$symlinksProcess->getStartCondition()->addProcessSuccessful($composerProcess);

(new ParallelProcessesApplication())
    ->addProcess($composerProcess)
    ->addProcess($symlinksProcess)
    ->run(new ArgvInput($argv));
