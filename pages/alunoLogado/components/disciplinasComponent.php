<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaAlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaAlunoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/alunoChamadaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/chamadaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/aulaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AulaVO.php';
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
            <?php
            $disciplinasA = listDiscplinasAluno("", " WHERE a.idAluno = '" . $idAluno . "' AND ad.status = 'Cursando'");
            foreach ($disciplinasA as $value) {
                $listaAulas = listChamada("", "WHERE a.fk_disciplina = '" . $value->getFk_disciplina()->getId() . "'");
                $qteAulas = '0';
                $presenca = '0';
                if ($listaAulas != 'false') {
                    $qteAulas = count($listaAulas);
                    $presenca = ((int) $value->getFaltas() * 100) / (int) $qteAulas;
                }
                echo '<div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            ' . $value->getFk_disciplina()->getNome() . '</h6>
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
                                <th scope="col">Total aulas</th>
                                <th scope="col">Faltas</th>
                                <th scope="col">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr> <th scope = "row">' . $value->getFk_disciplina()->getNome() . '</th>
                <td>' . $value->getFaltas() . '</td>
                <td>' . $value->getNota1() . '</td>
                <td>' . $value->getNota2() . '</td>
                <td>' . $value->getNota3() . '</td>
                <td>' . $value->getNota4() . '</td>
                <td>' . $value->getMedia() . '</td>
                <td>' . $qteAulas . '</td>
                <td>' . $presenca . '%</td>
                <td>' . $value->getStatus() . '</td> </tr >
                            </tbody>
                        </table>
                        
                        ';

                if ($listaAulas != 'false') {
                    foreach ($listaAulas as $value2) {
                        $al = listAlunoChamada("", " WHERE ac.fk_chamada = '" . $value2->getId() . "' AND ac.fk_aluno = '" . $idAluno . "'");

                        echo '<div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                              <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">' . $value2->getObs() . '</h5>
                                <small>' . $value2->getData() . '</small>
                              </div>
                              <p class="mb-1">' . $value2->getObs() . '</p>
                              <small>';
                        if ($al[0] != 'false') {
                            echo $al[1][0]->getStatus();
                        }
                        echo '</small>
                            </a>

                          </div>';
                    }
                }

                echo '
                    </div>
                </div>
            </div>';
            }
            ?>

        </div>        

    </body>
</html>
