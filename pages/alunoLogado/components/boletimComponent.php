<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaAlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaAlunoDao.php';
session_start();
$idAluno = preg_split("/,|\./", $_SESSION['logado'])[1];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Boletim</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered  table-striped table-dark">
                            <thead>
                                <tr>
                                <th scope="col">Disciplina</th>
                                <th scope="col">Faltas</th>
                                <th scope="col">Nota 1</th>
                                <th scope="col">Nota 2</th>
                                <th scope="col">Nota 3</th>
                                <th scope="col">Nota 4</th>
                                <th scope="col">Média</th>
                                <th scope="col">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $lista = listDiscplinasAluno('', 'WHERE fk_aluno = "' . $idAluno . '"');
                                foreach ($lista as $value) {
                                    echo '<tr> <th scope="row">' . $value->getFk_disciplina()->getNome() . '</th>
                <td>' . $value->getFaltas() . '</td>
                <td>' . $value->getNota1() . '</td>
                <td>' . $value->getNota2() . '</td>
                <td>' . $value->getNota3() . '</td>
                <td>' . $value->getNota4() . '</td> 
                <td>' . $value->getMedia() . '</td>
                <td>' . $value->getStatus() . '</td> </tr>';
                                }
                                ?>

                            </tbody>
                        </table>                       
                    </div>
                </div>
            </div> 
        </div>        

    </body>
</html>
