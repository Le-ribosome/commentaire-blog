<?php
require_once("Manager.php");

class PostManager extends Manager{

  //Mvc index
    public function getPosts(){
      $db=$this->dbConnect();
      $req = $db -> query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y
        à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
      //Read it and display the 5 last articles
      return $req;
    }

  //Mvc post (1 post):
    public function getPost($postId){
      $db=$this->dbConnect();
      //Open the articles tables with a prepared request to use variables
      $req = $db -> prepare("SELECT * FROM billets WHERE id=?");
      //Execute the request giving him the id of the post wanted:
      $req -> execute(array($postId));
      $post=$req->fetch();
      //We have now in data_post the right post, resulting of the link clicked
      return $post;
    }


}
