<?php
class Model
{
    public $string;

    public function __construct() {
        $this -> string = "Clique-moi, grand fou !";
    }

    /*public function clicked() {
        $this -> string = "Clique-moi, grand fou !";
    }


    public function clickedAgain() {
        $this -> string = "Ich bin clicked again !";
    }

    public function clickedAgainAndAgain() {
        $this -> string = "Ich bin clicked again and again!";
    }*/
}

class View
{
    private $model;
    private $controller;

    public function __construct($controller, $model) {
        $this -> controller = $controller;
        $this -> model = $model;
    }

    public function output() {
        //$url = "<p><a href=\"index.php\">Back to the home</a></p>";
        $url = "<p><a href=\"index3.php?action=clicked\">" . $this -> model -> string . "</a></p>";
        return $url;
    }
}

class Controller
{
    private $model;

    public function __construct($model) {
        $this -> model = $model;
    }
    public function clicked() {
        $this -> model -> string = "Méthode clicked appelee";
    }/*

    public function clickedAgain($model) {
        $this -> model = $model;
    }

    public function clickedAgainAndAgain($model) {
        $this -> model = $model;
    }
*/
}

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller -> {$_GET['action']}();
}

echo $view -> output();
