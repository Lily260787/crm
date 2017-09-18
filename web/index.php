<?php
require_once '../core/config.inc.php';
require_once '../src/services/Dispatcher.php';

$dispatcher = new Dispatcher;
$dispatcher->dispatch();