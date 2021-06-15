<?php
require_once 'templates/header.php';


$pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

$list = $pdo->query('
    SELECT * FROM professores
');

$professores = $list->fetchAll(PDO::FETCH_ASSOC);




?>


<div class="container mt-4">
    <?php

        if (isset($_GET['msg'])) {
            echo "<div class='row'>
                <div class='col-12'>
                    <div class='alert alert-{$_GET['cor']}' role='alert'>
                        {$_GET['msg']}
                    </div>
                </div>
            </div>";
        }
         
    ?>
    <div class="row">
        <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($professores as $professor) {
                        echo "<tr>
                                <th scope='row'> {$professor['id']} </th>
                                <td>{$professor['nome']}</td>
                                <td>{$professor['email']}</td>
                                <td>{$professor['disciplina']}</td>
                                <td>
                                    <a href='cadastro_professor.php?id={$professor['id']}' class='btn btn-warning btn-small'>Editar</a>
                                    <a href='excluir_professor.php?id={$professor['id']}' class='btn btn-danger btn-small'>Deletar</a>
                                </td>
                            </tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>









<?php
require_once 'templates/footer.php';
?>
    