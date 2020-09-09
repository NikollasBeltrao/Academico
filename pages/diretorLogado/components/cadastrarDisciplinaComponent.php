<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="control/cadastrarDisciplina.php" method="post">                                    
            <div class="form-group">
                <label for="inpNome">Nome</label>
                <input type="text" class="form-control" name="inpNome" placeholder="Nome completo">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inpProfessor">Professor</label>
                    <select name="inpProfessor" class="form-control">
                        <option selected>Escolha um professor...</option>                                 
                        <?php
                        $listaprofessores = listProfessores();

                        foreach ($listaprofessores as $value) {
                            echo '<option value="' . $value->getId() . '">' . $value->getNome() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inpTurma">Turma</label>
                    <select name="inpTurma" class="form-control">
                        <option selected>Escolha uma turma...</option>                                 
                        <?php
                            $listaTurmas = listTurmas();
                            foreach ($listaTurmas as $value) {
                                echo '<option value="' . $value->getId() . '.' . $value->getFk_curso()->getId() . '">' . $value->getNome() . ' - ' . $value->getFk_curso()->getNome() . '</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </body>
</html>
