<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$disciplina = filter_input(INPUT_POST, 'disc', FILTER_SANITIZE_STRING);


$pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

$cmd = $pdo->prepare('
    INSERT INTO professores (nome, email, disciplina) 
    VALUES (:n, :e, :d)
');

$cmd->bindValue(':n', $nome);
$cmd->bindValue(':e', $email);
$cmd->bindValue(':d', $disciplina);

if ($cmd->execute()) {
    header('Location: lista_professores.php?msg=Cadastro realizado com sucesso!&cor=success');
}else{
    header('Location: cadastro_professor.php?msg=Erro ao realizar cadastro, tente novamente!');
}
