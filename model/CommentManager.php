<?php
require_once("Manager.php");

class CommentManager extends Manager{

  //Mvc comments
    public function getComments($postId){
      $db = $this -> dbConnect();
      $comments = $db -> prepare("SELECT * FROM commentaires WHERE id_billet=?");
      $comments -> execute(array($postId));
      return $comments;
    }

    //AddComments :

    public function postComment($postId, $author, $comment){
      $db = $this -> dbConnect();
      $newComment = $db -> prepare("INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire)
      VALUES(?, ?, ?, NOW())");
      $affectedlines = $newComment -> execute(array($postId, $author, $comment));
      return $affectedlines;
    }

}
