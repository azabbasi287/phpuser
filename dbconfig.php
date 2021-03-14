
<?php
  
  define('DB_HOST' , 'localhost');
  define('DB_USER' , 'root');
  define('DB_PASS' , "");
  define("DB_NAME" , "crud");

  try {
  	$connection = new PDO("mysql:host=". DB_HOST . ";dbname=".DB_NAME , DB_USER , DB_PASS);
  	$connection -> exec('SET NAMES utf8');
  	$connection -> setAttribute(PDO::ERRMODE_EXCEPTION , PDO::ATTR_ERRMODE);
  }
  catch(PDOException $e){
      echo $e ->getMessage();
  }