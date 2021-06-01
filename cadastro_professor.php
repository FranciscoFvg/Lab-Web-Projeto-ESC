<?php

require_once 'templates/header.php';

?>

<div class="container mt-5">
    <h1>Cadastro de Professor</h1>
    <div class="row">
        <div class="col-12">
            <form action="" method="post">

                <div class="form-group">
                    <label for="id">Identificador</label>
                    <input type="number" class="form-control" id="id" readonly >
                </div>

                <div class="form-group">
                    <label for="nome">Nome professor</label>
                    <input type="email" class="form-control" id="nome" name="nome">
                </div>

                <div class="form-group">
                    <label for="email">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="disciplina">Disciplina</label>
                    <input type="email" class="form-control" id="disciplina" name="disc">
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
    