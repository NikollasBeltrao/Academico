<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Custom styles for this template-->
        <link href="./styles.css" rel="stylesheet" type="text/css"/>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/alunoDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/aulaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AulaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/cursoDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/turmaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/chamadaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaAlunoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaAlunoDao.php';
        session_start();
        $chamada = '';
        $disciplina = '';
        if (isset($_SESSION['seschamada'])) {
            $chamada = preg_split("/,|\./", $_SESSION['seschamada'])[1];
            $disciplina = preg_split("/,|\./", $_SESSION['seschamada'])[0];
            print_r($chamada);
        }
        $idProfessor = preg_split("/,|\./", $_SESSION['logado'])[1];
        session_abort();
        ?>

    </head>
    <body>      
        <div class="row">
            <ul class="nav col-xl-12 col-lg-12" role="tablist" id="topo">
                <li class="shadow" id="tabpesquisar" data-toggle="tab" href="#pesquisar" onclick="caminho('pesquisar')" role="tab" aria-controls="pesquisar" aria-selected="false">
                    <i class="fas fa-clipboard-list" ></i>
                    <a>Listar</a>
                    <i class="fas fa-angle-down"></i>
                </li> 

                <li class="shadow" id="tabcadastrar" data-toggle="tab" href="#cadastrar" onclick="caminho('cadastrar')" role="tab" aria-controls="cadastrar" aria-selected="false">
                    <i class="fas fa-user-plus" ></i>
                    <a>Cadastrar</a>
                    <i class="fas fa-angle-down"></i>
                </li>    

                <li class="shadow" data-toggle="tab" id="tabalterar" href="#alterar" onclick="caminho('alterar')" role="tab" aria-controls="cadastrar" aria-selected="false">
                    <i class="fas fa-user-edit"></i>
                    <a>Alterar</a>
                    <i class="fas fa-angle-down"></i>
                </li>    

                <li class="shadow" data-toggle="tab" href="#excluir" id="tabexcluir" onclick="caminho('excluir')" role="tab" aria-controls="cadastrar" aria-selected="false">
                    <i class="fas fa-user-slash"></i>
                    <a>Excluir</a>
                    <i class="fas fa-angle-down"></i>
                </li>    

            </ul>            
        </div>
        <!--        pesquisar-->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="tab-content" id="topoContent">
                    <div class="tab-pane fade" id="pesquisar">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Aulas ministradas</h6>
                            </div>
                            <!-- Card Body -->
                            <table class="table table-bordered  table-striped table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Disciplina</th>
                                    <th scope="col">Dia referente</th>
                                    <th scope="col">Horário referente</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Conteúdo</th>

                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    $listaChamada = listChamada("", " WHERE c.fk_professor = '" . $idProfessor . "'");
                                    if ($listaChamada != "false") {
                                        foreach ($listaChamada as $value) {
                                            $getDisc = listDiscplinas("", " WHERE d.idDisciplina = '" . $value->getFk_aula()->getFk_disciplina() . "'")[0];
                                            echo '<tr>
                                                    <th>' . $getDisc->getNome() . '</th>
                                                    <td>' . $value->getFk_aula()->getDia() . '</td>
                                                    <td>' . $value->getFk_aula()->getHorario() . '</td>
                                                    <td>' . $value->getData() . '</td>
                                                    <td>' . $value->getObs() . '</td>
                                                </tr>';
                                        }
                                    } else {
                                        echo '<td colspan="5" >Não tem aulas ministradas</td>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cadastrar" >
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Cadastrar aula</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/cadastrarChamada.php" method="post">  
                                        <div class="form-group col-md-5">
                                            <div class="form-group">
                                                <label for="inpObs">Conteúdo da aula</label>
                                                <textarea class="form-control" name="inpObs"  rows="5" ></textarea>
                                            </div>                
                                        </div>
                                        <input type="text" name="inpProf" value="<?php echo $idProfessor; ?>" style="display: none">
                                        <div class="form-row">
                                            <div class="form-group col-md-5">
                                                <label for="inpAula">Aula</label>
                                                <select name="inpAula" class="form-control">
                                                    <option selected> Escolha uma aula...</option>                                 
                                                    <?php
                                                    $lista = listAulas('', ' WHERE d.fk_professor = "' . $idProfessor . '"');
                                                    foreach ($lista as $value) {
                                                        echo '<option value="' . $value->getId() . ',' . $value->getFk_disciplina()->getId() . '">' . $value->getDia() . ' - ' . $value->getHorario() . ' - ' . $value->getFk_disciplina()->getNome() . ' - Sala:' . $value->getFk_sala()->getIdentificador() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>               
                                        <button type="submit" class="btn btn-primary">Finalizar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?php
                        if($chamada != '' && $disciplina != ''){
                            echo '<form action="control/cadastrarAlunoChamada.php" method="post" >                                
                            <table class="table table-bordered  table-striped table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Matrícula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Presença</th>

                                    </tr>
                                </thead>
                                <tbody>';
                        $listaAlunos = listDiscplinasAluno("", " WHERE d.idDisciplina = '" . $disciplina . "' AND ad.status = 'Cursando'");
                        if ($listaAlunos != "false") {
                            echo '<input type="text" name="inpCh" value="' . $chamada . '" style="display: none">';
                            foreach ($listaAlunos as $value) {                                
                                echo '<tr>                                    
                                    <input type="text" name="inpAl[]" value="' . $value->getFk_aluno()->getId() . '" style="display: none">
                                                    <th>' . $value->getFk_aluno()->getMatricula() . '</th>
                                                    <th>' . $value->getFk_aluno()->getNome() . '</th>
                                                    <th><select name="selAl[]" style="border: none; background-color: transparent; color: white " >
                                                        <option value="Presente" selected style="color: black">Presente</option>
                                                        <option value="Ausente" style="color: black ">Ausente</option>
                                                    ?>
                                                </select></th>
                                                </tr>';
                            }
                        } else {
                            echo '<td colspan="5" >Não tem aulas ministradas</td>';
                        }
                        echo '
                                </tbody> 
                            </table>
                            <button type="submit" class="btn btn-primary">Finalizar</button>
                        </form>';
                        }
                        ?>

                    </div>  
                </div>
            </div>
        </div>

        <!--        lista-->
        <div class="row">

        </div>
        <script>

            if (window.location.href.match(/#/gi).length == 2) {
                var tab2 = window.location.href.split('#')[2];
                if (tab2 != '') {
                    $('#tab' + tab2).addClass('active');
                    $('#' + tab2).addClass('active');
                    $('#' + tab2).addClass('show');
                } else {
                    $('#tabpesquisar').addClass('active');
                    $('#pesquisar').addClass('active');
                    $('#pesquisar').addClass('show');
                }
            } else {
                $('#tabpesquisar').addClass('active');
                $('#pesquisar').addClass('active');
                $('#pesquisar').addClass('show');
            }
            var page = "aulasComponent";
            function caminho(path) {
                location.href = '#' + page + '#' + path;
            }
            function pesquisar(inp, camp) {
                if (camp == 'inpAlterar') {
                    if (document.getElementById('inpAlterar').value != '') {

                        document.getElementById('smallinpAlterar').innerHTML = "";
                        $('#teste').val('');
                        sessionStorage["sesAlterar"] = "asdasd";
                    } else {
                        document.getElementById('smallinpAlterar').innerHTML = "erro";
                    }
                }
            }
        </script>
    </body>
</html>
