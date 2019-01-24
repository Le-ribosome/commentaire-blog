<?php

require_once "./model/PostManager.php";
require_once "./model/CommentManager.php";

//liste de fonctions qui appellent les views - liste des controllers en fait:

function listPosts(){
  $postManager = new PostManager; //Création de l'objet $postManager
  $posts = $postManager -> getPosts(); // Appel d'une fonction de cet objet.
  require "./view/indexView.php";
}

function post(){
  $postManager = new PostManager;
  $post = $postManager -> getPost($_GET["id"]);

  $commentManager = new CommentManager;
  $comments = $commentManager -> getComments($_GET["id"]);

  require "./view/postView.php";
}

function addComment($postId, $author, $comment){

    $commentManager = new CommentManager;
    $affectedlines = $commentManager -> postComment($postId, $author, $comment);

    if($affectedlines === false){
      throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else{
      header("Location: index.php?action=post&id=" .$postId);
    }
}
