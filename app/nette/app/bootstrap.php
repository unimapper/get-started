<?php

require __DIR__ . '/../../vendor/autoload.php';

$configurator = new Nette\Configurator;
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
    ->addDirectory(__DIR__)
    ->addDirectory(__DIR__ . "/../../model/")
    ->register();
$configurator->addConfig(__DIR__ . '/config/config.neon');

return $configurator->createContainer();