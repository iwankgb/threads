#!/usr/bin/env php
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Console\Application;
use Iwan\Scrapping\Command\ScrappingCommand;
use Iwan\Scrapping\Command\ScrappingStackableCommand;
use Iwan\Scrapping\Command\ScrappingPoolCommand;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../config/'));
$loader->load('services.yml');
$container->compile();

$application = new Application('Threading test');

$cmd = new ScrappingCommand();
$cmd->setContainer($container);
$application->add($cmd);

$cmdStack = new ScrappingStackableCommand();
$cmdStack->setContainer($container);
$application->add($cmdStack);

$cmdPool = new ScrappingPoolCommand();
$cmdPool->setContainer($container);
$application->add($cmdPool);

$application->run();
