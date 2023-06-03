<?php

class connection{
    private $name="localhost";
    private $uname="root";
    private $password="";
    private $database="pinventory";
    private $conn=false;
    public $mysqli="";
    private $result="";

    public function __construct(){
        if(!$this->conn){
            $this->mysqli=new mysqli($this->name,$this->uname,$this->password,$this->database);
            if($this->mysqli){
                $this->conn=true;
                 echo "connected";
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


    public function insert($category,$val=array()){
        $col=implode(',',array_keys($val));
        $data=implode("','",$val);
        $sql="INSERT INTO $category ($col) VALUES ('$data')";
        // echo $sql;
        if($this->mysqli->query($sql)){
            return "inserted";
        }else{
            return "not inserted";
        }
    }

    public function select($table,$rows="*",$where=null,$order=null,$limit=null){
        $sql="SELECT $rows FROM $table";
        if($where!=null){
            $sql=$sql." WHERE $where";
        }
        if($order!=null){
            $sql=$sql." ORDER BY $order";
        }
        if($limit!=null){
            $sql=$sql." LIMIT 0,$limit";
        }
        $query=$this->mysqli->query($sql);
        if($query){
            $this->result=$query->fetch_all(MYSQLI_ASSOC); 
            return  $this->result;
        }else{
            echo "data not selected";
        }
    }

    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
            $this->conn=false;
            // echo stop;
            return false;
        }else{
            return false;
        }
        }
    }
}





?>