<?php
/**
 * Created by PhpStorm.
 * User: 16495
 * Date: 11.02.2020
 * Time: 10:23
 */

class QueryHelper
{
    public $pdo;
    function __construct()
    {
        $config = require_once __DIR__ . '/../../../config.php';
        $this->pdo = conection::make($config);
    }
    public function getAll($table){
        $sql="select * from $table";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $nes=$stmt->fetchAll();
        return $nes;
    }
    public function getRow($id,$table,$search="id")
    {
        $sql="select * from $table where $search=:x";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute(["x"=>$id]);
        return $stmt->fetch();
    }

    public function Delete($table,$id,$search="id"){
        $sql="delete from $table where $search=:x)";
        $stmt=$this->pdo->prepare($sql);
    }
    public function Store($table,$data){
        $f=array_keys($data);
        $fields=implode(",:" ,$f);
        $values=":". implode(',:',$f);
        $sql="insert into $table($fields) values($values)";

        $stmt=$this->pdo->prepare($sql);
        $stmt->getCode(data);

    }
    public function Update($table,$data,$search="id")
    {
        $fields="";

        foreach($data as $key=>$value){
            if($key !== "id"){
                $fields.=$key."=:".$key.".";
            }
        }
        $fields=rtrim($fields,',');
        $sql="update $table set ($fields)
        where $search=:id";
            $stmp=$this->pdo->prepare($sql);
                $stmp->execute($data);
    }
}