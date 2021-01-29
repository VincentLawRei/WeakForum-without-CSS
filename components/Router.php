<?php

class Router
{
  // Приватная переменная, в которой будут храниться пути из routes.php
  private $routes;

  // Для отрисовки 404-й ошибки
  private $errorPage = True; // по умолчанию True; если регулярное выражение совпадает, переменная становится False
  private $errorFile; // свойство с файлом для 404-й.

  // В конструкторе сразу подгружаем путь для роутов и подключаем файл с массивом
  public function __construct ()
  {
    $routesPath = ROOT . "/config/routes.php";
    $this->routes = include($routesPath);
    $this->errorFile = VIEWS . "site/404.php";
  }

  // В случае, если запрос не пустой, возвращаем результат URI-запроса
  private function getUri ()
  {
    if(!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], "/");
    }
  }


  public function getError ()
  {
    if ($this->errorPage == True) {
      require_once($this->errorFile);
      return;
    }
  }


  // Метод, выполняющий основную работу (перенаправление в отдельные области сайта)
  public function run ()
  {
    // Получаем результат запроса в переменную $uri (например, http://url.com/[text] - получим выделенное "text")
    $uri = $this->getUri();

    // У нас имеется массив с роутами. Надо его полностью проверить на соответствие запросу
    foreach ($this->routes as $uriPattern => $path) {
      // Используем регулярное выражение, соответсвует ли запрос пользователя, имеющимся в роутах путям
      if(preg_match("~^$uriPattern$~", $uri)) {

        $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);
        $segments = explode("/", $internalRoute); // разделяем массив на строки
        $controllerName = ucfirst(array_shift($segments)) . "Controller"; // получаем название ControllerName
        $actionName = "action" . ucfirst(array_shift($segments)); // получаем actionName

        // Составляем путь до файла из папки "/controllers"
        $controllerFile = ROOT . "/controllers/" . $controllerName . ".php";
        $parameters = $segments; // если в запросе было "url.com/text/1/1", 1/1 являются параметрами

        if(file_exists($controllerFile)) {
          include_once($controllerFile);
        }

        // Контроллеры даны в виде классов. Создание нового объекта позволяет использовать методы контроллера.
        $controllerObject = new $controllerName;

        // Используется для корректной передачи параметров при их наличии
        $result = call_user_func_array(array($controllerObject, $actionName), $parameters);


        $this->errorPage = False;

        if ($result != null) {
          break;
        }
      }
    }
  }

}

 ?>
