<?php

class Model_Main extends Model{

    public $limit = 3;


    public function get_data()
    {
          if (empty($_SESSION['order']) || empty($_SESSION['dir'])){
              $_SESSION['order'] = 2;
              $_SESSION['dir'] = "ASC";
          }
          $order = $_SESSION['order'];
          $dir = $_SESSION['dir'];
          $con = $this->connect();
          $query = $con->prepare("SELECT * from tests inner join status_task on status_task.id_stat = tests.stat_id ORDER BY :order {$dir} limit :lim");
          $query->bindParam(':order', $order, PDO::PARAM_INT);
          $query->bindParam(':lim', $this->limit, PDO::PARAM_INT);
          $query->execute();
          $data1 = $query->fetchAll();
          $data = [];
          $data['data'] = $data1;
          $this->close_connect($con,$query);
          return $data;

    }

    public function create_task($username,$email,$text){
        $con = $this->connect();
        $query = $con->prepare("INSERT INTO tests(username,email_user,text_task,stat_id) VALUES(?,?,?,?)");
        $query->execute([$username,$email,$text,1]);
        $this->close_connect($con,$query);
    }

    public function get_rows(){
        $con = $this->connect();
        $query = $con->query("SELECT * FROM tests");
        $this->close_connect($con,$query);
        return $query->rowCount();
    }

    public function pagination($from,$to){
        $con = $this->connect();
        $query = $con->prepare("SELECT * FROM tests inner join status_task on tests.stat_id = status_task.id_stat ORDER BY :order {$_SESSION['dir']}
limit {$from},{$to}");
        $query->bindParam(':order', $_SESSION['order'], PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll();
        $this->close_connect($con,$query);
        return $data;
    }

    public function get_pages(){
        $con = $this->connect();
        session_start();
        $query = $con->query("select count(*) from tests")->fetchColumn();
        $pages = $query;
        $pages = ceil($pages/$this->limit);
        $_SESSION['pages'] = $pages;
        $this->close_connect($con,$query);
    }

    public function confirm($id){
        $con = $this->connect();
        $query = $con->prepare("update tests set stat_id = 2 where id_task = ?");
        $query->execute([$id]);
        $this->close_connect($con,$query);
    }

    public function edit($text, $update, $id){
        $con = $this->connect();
        $query = $con->prepare("update tests set text_task = ?,update_task = ? where id_task = ?");
        $query->execute([$text,$update,$id]);
        $this->close_connect($con,$query);
    }

    public function get_text($id){
        $con = $this->connect();
        $query = $con->query("select text_task from tests where id_task = {$id}")->fetchColumn();
        $this->close_connect($con,$query);
        return $query;
    }

}
