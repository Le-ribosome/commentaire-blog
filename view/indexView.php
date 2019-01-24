<?php
$title="Home: le ribosome";
ob_start();
 ?>
    <h1>Le ribosome vous traduit la science !</h1>

    <?php
    while ($data = $posts -> fetch())
    {
    ?>
      <div class="articles">
        <h2> <?= htmlspecialchars($data["titre"]); ?> </h2>
        <p>
          <?= htmlspecialchars($data["contenu"]); ?>
        </p>
        <a href="./index.php?action=post&amp;id=<?= $data["id"]; ?>">Voir les commentaires</a>
      </div>
    <?php
    }//Articles loop end
    $posts->closeCursor();
    ?>
    <?php $content = ob_get_clean(); ?>
    <?php require "template.php";
 ?>


  </body>
</html>
