<?php

class Manager{
    //DB connection-pas besoin de try/catch les erreurs sont gérées
    //dans le routeur qui gère les erreurs:
      protected function dbConnect(){
          $db = new PDO
          ('mysql:host=localhost;dbname=testBD;charset=utf8', 'root', 'root');
          return $db;
      }
}
