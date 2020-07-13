<?php

class Model
{
    public function get_data()
    {

    }

    public function connect(){
        $con = new PDO('mysql:host=localhost;dbname=workplace', 'root', '');
        return $con;
    }

    public function close_connect($con = null,$query = null){
        $con = null;
        $query = null;
    }
}
?>
