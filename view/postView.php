<?php $title = "Post" ;?>

<?php ob_start(); ?>
    <a href="index.php">Retour à la page d'accueil</a>

    <h2><?php echo $post["titre"]; ?></h2>

    <div class="article">
      <p>
        <?php echo $post["contenu"] ?>
      </p>
    </div>

    <div class="zone_commentaires">
      <?php
      //We browse the comment table corresponding to the right ID, and we display
      //it in the right place.
      while($comment=$comments -> fetch()){
      ?>

      <p class="each_commentaire">
        <?= "<strong>" .htmlspecialchars($comment["auteur"]). "</strong>:"
        .htmlspecialchars($comment["commentaire"]); ?>
      </p>


    <?php
      }

    ?>
    <?php $content = ob_get_clean(); ?>
    <?php require "template.php" ;?>
    </div>

    <form class="" action="index.php?action=addComment&amp;id=<?= $post['id']; ?>" method="post">
      <label>Auteur: </label>
      <input type="text" name="author">
      <label for="comment">Commentaire: </label>
      <input type="text" name="comment">
      <button type="submit" name="button">Envoyer</button>
    </form>
