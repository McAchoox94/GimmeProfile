<?php

  const DBHOST = 'etsbelbarakacom.ipagemysql.com';        // Database Hostname
  const DBUSER = 'etsbelbarakacom';             // MySQL Username
  const DBPASS = '@@AchrafBj94!!';                 // MySQL Password
  const DBNAME = 'profile_doctors_usa';  // MySQL Database name

  // Data Source Network
  $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME . '';

  // Connection Variable
  $conn = null;

  // Connect Using PDO (PHP Data Output)
  try {
    $conn = new PDO($dsn, DBUSER, DBPASS);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
  }

  

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT DISTINCT name FROM profile WHERE name LIKE :name_doc LIMIT 10';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name_doc' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1" id="a2">' . $row['name'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
  if (isset($_POST['query2'])) {
    $inpText = $_POST['query2'];
    $sql = 'SELECT DISTINCT  title FROM profile WHERE title LIKE :speciality Limit 3';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['speciality' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1" id="a3">' . $row['title'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
  if (isset($_POST['query3'])) {
    $inpText = $_POST['query3'];
    $sql = 'SELECT DISTINCT  loca FROM localisation WHERE loca LIKE :speciality';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['speciality' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1" id="a4">' . $row['loca'] . '</a>';
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
 
?>