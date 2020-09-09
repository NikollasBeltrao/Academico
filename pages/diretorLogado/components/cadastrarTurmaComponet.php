<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="control/cadastrarTurma.php" method="post">
            <div class="form-group">
                <label for="inpMatricula">Nome</label>
                <input type="text" class="form-control" name="inpNome" placeholder="Nome">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inpCurso">Curso</label>
                    <select name="inpCurso" class="form-control">
                        <option selected>Escolha um curso...</option>                                 
                        <?php
                        $listacursos = listCursos();

                        foreach ($listacursos as $value) {
                            echo '<option value="' . $value->getId() . '">' . $value->getNome() . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </body>
</html>
