<?php

require __DIR__.'/vendor/autoload.php';
require_once(__DIR__ . '/src/helpers/helpers.php');
require __DIR__.'/helpers.php';

use  Models\User;
use  Tinybot\Core\Core;
use MainCommands\MainCommand;


$webhook ='setwebhook?url=https://hosseingholamian.ir/bot/index.php';
$core = new Core;


