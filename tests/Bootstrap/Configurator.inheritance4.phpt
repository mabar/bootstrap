<?php

/**
 * Test: Nette\Configurator and services inheritance and overwriting.
 */

declare(strict_types=1);

use Nette\Configurator;
use Tester\Assert;


require __DIR__ . '/../bootstrap.php';


$configurator = new Configurator(__DIR__);
$configurator->setDebugMode(false);
$configurator->setTempDirectory(getTempDir());
$configurator->addConfig(Tester\FileMock::create('
services:
	application:
', 'neon'));
$container = $configurator->createContainer();


Assert::type(Nette\Application\Application::class, $container->getService('application'));
