<?php

// Назначаем константы для дальнейшего использования
define('ROOT', __DIR__);
define('VIEWS', ROOT . "/views/");

// Отображаем ошибки
ini_set('Display errors', 1);
error_reporting(E_ALL);

// Подключаем сессии
session_start();

// Подключаем автозагрузчик для классов
require_once ROOT."\components\Autoload.php";

// Инициализируем новый объект роутера и выполняем его метод
$router = new Router();
$router->run();
$router->getError();


 ?>
