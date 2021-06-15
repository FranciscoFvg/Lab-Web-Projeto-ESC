<?php

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$disciplina = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_STRING);


$pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

$cmd = $pdo->prepare('
    UPDATE professores SET nome = :n, email = :e, disciplina = :d
    WHERE id = :id
');

$cmd->bindValue(':id', $id);
$cmd->bindValue(':n', $nome);
$cmd->bindValue(':e', $email);
$cmd->bindValue(':d', $disciplina);

if ($cmd->execute()) {
    header('Location: lista_professores.php?msg=Atualização realizada com sucesso!&cor=success');
}else{
    header("Location: cadastro_professor.php?id={$id}&msg=Erro ao realizar atualização, tente novamente!");
}
