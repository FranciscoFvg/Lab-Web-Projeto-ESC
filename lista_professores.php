<?php
require_once 'templates/header.php';


$pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

$list = $pdo->query('
    SELECT * FROM professores
');

$professores = $list->fetchAll(PDO::FETCH_ASSOC);

/* var_dump($professores); */


?>


<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Disciplina</th>
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
    