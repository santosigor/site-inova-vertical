<?php

  include 'banco.php';

  $id = null;

  if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM projeto where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  $images = explode(",", $data['images']);
  foreach($images as $img) {
    unlink('images/projetos/'.$img);
  }
  Banco::desconectar();

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM projeto where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  Banco::desconectar();
  header("Location: panel.php?res=3");

?>