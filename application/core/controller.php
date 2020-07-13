<?php

class Controller {

    public $model;
    public $view;
    public $pagination;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {

    }

    function goHome(){
        header('Location: http://u1099776.isp.regruhosting.ru/');
    }

    function guest(){
        echo "<script>alert('Для выполнения данного действия необходимо авторизироваться!'); location.href='http://u1099776.isp.regruhosting.ru/';</script>";
    }

    function success(){
        echo "<script>alert('Задача успешно добавлена!'); location.href='http://u1099776.isp.regruhosting.ru/';</script>";
    }

    function err(){
        echo "<script>alert('Произошла ошибка при добавлении записи!'); location.href=http://u1099776.isp.regruhosting.ru/';</script>";
    }
}
?>