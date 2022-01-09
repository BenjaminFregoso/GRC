<?php

//phpinfo();

class Cconexion{

     function conexionBD(){

          $host='localhost';
          $dbname='grc_001';
          $username='sa';
          $password='admin123';
          $puerto=1433;

          try {
               $conn = new PDO ("sqlsrv:Server=$host,$puerto;Database=$dbname","$username","$password");
               echo "Se ha conectado a la base de datos";
          } catch (PDOException $th) {
               echo "No se ha conectado a la base de datos, error: ".$th;
          }

          return $conn;
     }
}

?>