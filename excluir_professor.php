<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

$cmd = $pdo->prepare('
    DELETE FROM professores 
    WHERE id = :id
');

$cmd->bindValue(':id', $id);

if ($cmd->execute()) {
    header('Location: lista_professores.php?msg=Exclusão realizada com sucesso!&cor=success');
}else{
    header('Location: lista_professores.php?msg=Erro ao realizar exclusão, tente novamente!&cor=danger');
}