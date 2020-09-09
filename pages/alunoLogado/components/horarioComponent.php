<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="./styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaAlunoVO.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaAlunoDao.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/aulaDao.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AulaVO.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/salaDao.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/SalaVO.php';
    session_start();
    $idAluno = preg_split("/,|\./", $_SESSION['logado'])[1];
    ?>
    <body>
        <div id="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Horário individual</h6>
                    </div>
                    <!-- Card Body -->
                    <table class="table table-bordered  table-striped table-dark">
                        <thead>
                            <tr>
                            <th scope="col">Horário</th>
                            <th scope="col">Segunda</th>
                            <th scope="col">Terça</th>
                            <th scope="col">Quarta</th>
                            <th scope="col">Quinta</th>
                            <th scope="col">Sexta</th>

                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                            $where = "WHERE ";
                            $disciplinasA = listDiscplinasAluno("", " WHERE a.idAluno = '".$idAluno."' and ad.status = 'Cursando'");
                            foreach ($disciplinasA as $value) {
                                $where = $where . " d.idDisciplina = '{$value->getFk_disciplina()->getId()}' OR";
                            }
                            $where = substr($where, 0, strlen($where) - 2);
                            $lista = listAulas("", $where . " ORDER BY a.horarioAula ASC");
                            $horario = $lista[0]->getHorario();
                            $dias = [' - ', ' - ', ' - ', ' - ', ' - '];
                            $tamanho = count($lista);
                            $cont = 0;
                            $novo = false;
                            $matriz = [];
                            foreach ($lista as $value) {
                                if ($value->getDia() == 'Segunda-Feira') {
                                    $dias[0] = $value;
                                } else if ($value->getDia() == 'Terça-Feira') {
                                    $dias[1] = $value;
                                } else if ($value->getDia() == 'Quarta-Feira') {
                                    $dias[2] = $value;
                                } else if ($value->getDia() == 'Quinta-Feira') {
                                    $dias[3] = $value;
                                } else {
                                    $dias[4] = $value;
                                }
                                if (isset($lista[$cont + 1])) {
                                    if ($lista[$cont + 1]->getHorario() != $value->getHorario()) {
                                        $horario = $value->getHorario();
                                        $novo = true;
                                    }
                                }
                                $cont = $cont + 1;
                                if ($cont == $tamanho || $novo || ($dias[0] != ' - ' && $dias[1] != ' - ' && $dias[2] != ' - ' && $dias[3] != ' - ' && $dias[4] != ' - ')) {
                                    echo '<tr><th scope="row">' . $value->getHorario() . '</th>';
                                    foreach ($dias as $value2) {
                                        if ($value2 != ' - ') {
                                            echo '<td>' . $value2->getFk_disciplina()->getNome() . "<br>" . $value2->getFk_sala()->getDescricao() . '</td>';
                                        } else {
                                            echo '<td> ' . $value2 . '</td>';
                                        }
                                    }
                                    $novo = false;
                                    echo '</tr>';

                                    $dias = [' - ', ' - ', ' - ', ' - ', ' - '];
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
