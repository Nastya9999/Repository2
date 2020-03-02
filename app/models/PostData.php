<?php
namespace App\models;
use App\db\components\QueryHelper;

class PostData{
    protected $db;

    public function __construct(QueryHelper $db)
    {
        $this->db=db;
    }

    public function getPostId($id)
    {
        $stmt=$this->pdo->prepare("SELECT * FROM posts where id=:id");
        if($stmt->execute(["id"=>$id])){
            return $stmt->fetch();
        };
        return null;
    }
    public function getAllPosts(){
        $posts=$this->db->getAll("post","datePublication");
        require_once __DIR__."posts/index.view.php";
    }
}