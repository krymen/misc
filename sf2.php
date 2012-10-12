#!/usr/bin/env php
<?php

$phpBin = '/usr/bin/php';
$projectDir = getcwd();
$parentDirs = explode(DIRECTORY_SEPARATOR, ltrim($projectDir, DIRECTORY_SEPARATOR));

while ($parentDirs) {
    $projectDir = DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parentDirs);

    $consoleApp = $projectDir . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'console';
    if (file_exists($consoleApp)) {
        array_shift($argv);
        array_unshift($argv, $consoleApp);
        pcntl_exec($phpBin, $argv);

        return;
    }

    array_pop($parentDirs);
}

echo 'Symfony2 application not found!' . PHP_EOL;
