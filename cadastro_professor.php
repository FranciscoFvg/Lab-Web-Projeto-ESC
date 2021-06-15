<?php

require_once 'templates/header.php';

define('URLS', array('cadastro'=> 'action_cadastro.php', 'atualizar' => 'editar_professor.php'));

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $pdo = new PDO('mysql:dbname=lab_web;host=localhost', 'root','');

    $cmd = $pdo->prepare('
        SELECT * FROM professores 
        WHERE id = :id
    ');

    $cmd->bindValue(':id', $id);

    $cmd->execute();

    $professor = $cmd->fetch(PDO::FETCH_OBJ);
    
    /* var_dump($professor);

    die; */
}

?>

<div class="container mt-5">
    <h1>Cadastro de Professor</h1>
    <?php

        if (isset($_GET['msg'])) {
            echo "<div class='row'>
                <div class='col-12'>
                    <div class='alert alert-success' role='alert'>
                        {$_GET['msg']}
                    </div>
                </div>
            </div>";
        }
         
    ?>
    <div class="row">
        <div class="col-12">
            <form action="<?php if (isset($id)) {echo URLS['atualizar'];}else{ echo URLS['cadastro'];} ?>" method="post">

                <div class="form-group">
                    <label for="id">Identificador</label>
                    <input type="number" class="form-control" id="id" name="id" readonly value="<?php if (isset($id)) {echo $professor->id;}?>">
                </div>

                <div class="form-group">
                    <label for="nome">Nome professor</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php if (isset($id)) {echo $professor->nome;}?>">
                </div>

                <div class="form-group">
                    <label for="email">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php if (isset($id)) {echo $professor->email;}?>">
                </div>

                <div class="form-group">
                    <label for="disciplina">Disciplina</label>
                    <input type="text" class="form-control" id="disciplina" name="disc" value="<?php if (isset($id)) {echo $professor->disciplina;}?>">
                </div>

                <button type="submit" class="btn btn-primary">
                    Salvar 
                </button>

            </form>
        </div>
    </div>
</div>



<?php

require_once 'templates/footer.php';

?>
    