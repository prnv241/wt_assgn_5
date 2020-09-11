<?php

class Registrations {

  public function __construct($conn) {
    $this->conn = $conn;
    $this->table_name = 'registrations';
  }


  public function getRegList() {
    $sql = "SELECT * FROM `{$this->table_name}`;";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $regArr = array(
          "records" => array()
      );
      while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
          $regArr['records'][] = $row;
      }
      return json_encode($regArr);
    } else {
      return json_encode(["No Entries in db"]);
    }
  }

  public function addReg($name, $email, $seats, $reason) {
    $sql = "INSERT INTO {$this->table_name} (name, email, seats, reason) VALUES ('{$name}', '{$email}', '${seats}', '${reason}')";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute();
    return json_encode($stmt);
  }
}