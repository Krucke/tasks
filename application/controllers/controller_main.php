<?php

class Controller_Main extends Controller{

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
        $this->model->get_pages();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->render('main_view.php','template_view.php',$data);
    }

    function action_create(){
        $row = $this->model->get_rows();
        if(isset($_POST['but'])){
            $username = $_POST['username'];
            $text = $_POST['text_task'];
            $email = $_POST['email'];
            $this->model->create_task($username,$email,$text,1);
            if($this->model->get_rows()>$row){
                $_SESSION['pages'] = $this->model->get_rows();
                $this->success();
            }
            else{
                $this->err();
            }
        }
    }

    function action_pagination($id){
        $data = $this->model->pagination(($id-1)*$this->model->limit,$this->model->limit);
        $this->view->render('page_view.php','template_view.php',$data);
    }

    function action_login(){
        if( isset($_POST['sign'])){
            $login = trim($_POST['log']);
            $_SESSION['user'] = $login;
            $this->goHome();
        }
        $this->goHome();
    }

    function action_logout(){
        unset($_SESSION['user']);
        $this->goHome();
    }

    function action_confirm_task($id){
        if (isset($_SESSION['user'])){
            $this->model->confirm($id);
            $this->goHome();
        }
        $this->guest();
    }

    function action_edit_task($id){
        if (isset($_SESSION['user'])){
            if(isset($_POST['edit'])){
                $text_from_db = $this->model->get_text($id);
                $text_from_form = $_POST['text_edit'];
                if($text_from_form != $text_from_db){
                    $this->model->edit($text_from_form,1,$id);
                    $this->goHome();
                }
                else{
                    $this->goHome();
                }
            }
        }
        $this->guest();
    }


    public function action_sort(){
        if (isset($_POST['sort'])){
            $by_column = $_POST['by_column'];
            $by_alph = $_POST['by_alph'];
            $_SESSION['order'] = $by_column;
            $_SESSION['dir'] = $by_alph;
            $data = $this->model->get_data();
            $this->view->render('main_view.php','template_view.php',$data);
        }
    }

}