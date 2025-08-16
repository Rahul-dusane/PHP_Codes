<?php

  phpinfo();
  $host = "localhost";
  $port = "1521"; 
  $sid = "XE";
  $username = "SYSTEM";
  $password = "Rahul_14056";

  try{
    $dsn = "oci:dbname=//$host:$port/$sid;charset=AL32UTF8";
    $pdo = new PDO($dsn,$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    echo "Connection successfully...";
  }catch(PDOException $e){
    echo "Connection Failed...".$e->getMessage();
  }

?>