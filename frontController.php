<?php

$page = $_GET['page'];

switch ($page) {
    case 'lista_professores':
        header('Location: lista_professores.php');
        break;
    
    case 'cadastro_professor':
        header('Location: cadastro_professor.php');
        break;
    
    default:
        header('Location: index.php');
        break;
}