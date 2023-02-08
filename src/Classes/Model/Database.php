<?php
/**
 * Created by PhpStorm.
 * User: sAlek Chowdhury
 * Date: 22-Mar-20
 * Time: 4:34 AM
 */

namespace App\Model;

use PDO;
use PDOException;
class Database
{
  public $Dbconnect;

  public function __construct()
  {
      try {
          $this->Dbconnect = new PDO("mysql:host=localhost;dbname=e-nursery", "root", "");
          // set the PDO error mode to exception
          $this->Dbconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         /* echo "Connected successfully";*/
      }
      catch(PDOException $e)
      {
          echo "Connection failed: " . $e->getMessage();
      }
  }
}