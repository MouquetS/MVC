<?php
//essai 1 (marche mais sale)

class Model
{
  public $string;
  public $string2;

  public function __construct()
  {
      $this -> string = "Page 1";
      $this -> string2 = "Page 2";
  }
}

class Controller
{
  private $model;

  public function __construct($model) {
    $this -> model = $model;
  }

  public function checked($page) {
    if($page==0)
    {
    $this -> model -> string = "?action=checked&&page=1\">Page 1";
    $this -> model -> string2 = "?action=checked&&page=2\">Page 2";
    } else if($page==1) {
    $this -> model -> string = "\">Index";
    $this -> model -> string2 = "?action=checked&&page=2\">Page 2";
    } elseif ($page==2) {
    $this -> model -> string = "\">Index";
    $this -> model -> string2 = "?action=checked&&page=1\">Page 1";
    }
  }
}

class View
{
  private $model;
  private $controller;

  public function __construct($controller, $model)
  {
    $this -> controller = $controller;
    $this -> model = $model;
  }

  public function output() {
    $mesPages = "<p><a href=\"index.php" . $this -> model -> string . "</a></p>";
    $mesPages .= "<p><a href=\"index.php" . $this -> model -> string2 . "</a></p>";
    return $mesPages;
  }
}

$model = new Model();
$controller = new Controller($model);
$controller->checked(0);
$view = new View($controller,$model);

if(isset($_GET['action']) && !empty($_GET['action'])) {
  $controller -> {$_GET['action']}($_GET['page']);
}

echo $view -> output();
