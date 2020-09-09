<html>
    <head>
        <meta charset="UTF-8">
        <title>Disciplinas</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Custom styles for this template-->
        <link href="./styles.css" rel="stylesheet" type="text/css"/>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/disciplinaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/cursoDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/turmaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/professorDao.php';
        session_start();
        $alterarD = '';
        if (isset($_SESSION['sesAlterarD'])) {
            $alterarD = $_SESSION['sesAlterarD'];
        }
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
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Listagem dos disciplinas</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="">      
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark">
                                            <thead>
                                                <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Turma</th>
                                                <th scope="col">Curso</th>
                                                <th scope="col">Professor</th>
                                                <th scope="col">CH</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $disciplina = listDiscplinas('', '');
                                                foreach ($disciplina as $disciplina) {
                                                    echo '<tr>
                                                <td>' . $disciplina->getNome() . '</td>                                                
                                                <td>' . $disciplina->getFk_turma()->getAbreviacao() . " - " . $disciplina->getFk_turma()->getNome() . '</td>
                                                <td>' . $disciplina->getFk_curso()->getAbreviacao() . " - " . $disciplina->getFk_curso()->getNome() . '</td>
                                                <td>' . $disciplina->getFk_professor()->getNome() . '</td>
                                                <td>' . $disciplina->getCargaHoraria() . '</td>
                                                </tr>  ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cadastrar" >
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Cadastrar um disciplina</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/cadastrarDisciplina.php" method="post">                                    
                                        <div class="form-group">
                                            <label for="inpNomeD">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeD" placeholder="Nome completo">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpChD">Carga Horaria</label>
                                                <input type="text" class="form-control" name="inpChD">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpTurmaD">Turma</label>
                                                <select name="inpTurmaD" class="form-control">
                                                    <option selected>Escolha uma turma...</option>                                 
                                                    <?php
                                                    $listaTurmas = listTurmas();
                                                    foreach ($listaTurmas as $value) {
                                                        echo '<option value="' . $value->getId() . '.' . $value->getFk_curso()->getId() . '">' . $value->getNome() . ' - ' . $value->getFk_curso()->getNome() . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inpProfD">Professor</label>
                                                <select name="inpProfD" class="form-control">
                                                    <option selected>Escolha um professor...</option>                                 
                                                    <?php
                                                    $listaProf = listProfessores();
                                                    foreach ($listaProf as $value) {
                                                        echo '<option value="' . $value->getId() . '">' . $value->getNome() . '</option>';
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
                    </div>
                    <div class="tab-pane fade" id="alterar">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Pesquisar disciplina</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $disciplinaAlt;
                                $erroMessage = '';
                                $AltTrue = false;
                                if ($alterarD != '') {
                                    $disciplinaAlt = getDisciplina($alterarD);
                                    if ($disciplinaAlt[0] == 'false') {
                                        $AltTrue = false;
                                        $erroMessage = 'disciplina não encontrado';
                                    } else {
                                        $AltTrue = true;
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <div class="form-inline" >
                                        <form class="form-group" action="" method="post">
                                            <label for="inpMatD">Matrícula</label>
                                            <input type="text" name="inpMatAltD" id="inpAlterar" class="form-control mx-sm-3" 
                                                   value="<?php echo $alterarD; ?>">
                                            <button type="submit" class="btn btn-primary">Pesquisar</button>  
                                            <small id="smallinpAlterar" class="text-muted">
                                                <?php echo $erroMessage; ?>
                                            </small>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Dados do disciplina</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/alterarDisciplina.php" method="post">
                                        <input type="text" name="inpIdD" value="<?php if ($AltTrue) echo $alterarD; ?>" style="display: none">
                                        <div class="form-group">
                                            <label for="inpNomeD">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeD"
                                                   value="<?php if ($AltTrue) echo $disciplinaAlt[1]->getNome(); ?>">    
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inpMat">Turma</label>
                                                <input type="text" class="form-control" disabled name="inpMat" placeholder=""
                                                       value="<?php if ($AltTrue) echo $disciplinaAlt[1]->getFk_turma()->getAbreviacao() . " - " . $disciplinaAlt[1]->getFk_turma()->getNome(); ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inpEmail">Curso</label>
                                                <input type="text" class="form-control" disabled name="inpEmail"
                                                       value="<?php if ($AltTrue) echo $disciplinaAlt[1]->getFk_curso()->getAbreviacao() . " - " . $disciplinaAlt[1]->getFk_curso()->getNome(); ?>">
                                            </div>
                                        </div>
                                                
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpProfD">Professor</label>
                                                <select name="inpProfD" class="form-control">
                                                    <option selected value="
                                                            <?php if ($AltTrue) echo $disciplinaAlt[1]->getFk_professor()->getId()?>">
                                                        <?php if ($AltTrue) echo $disciplinaAlt[1]->getFk_professor()->getNome() ?></option>                                 
                                                    <?php
                                                    $listaProf = listProfessores();
                                                    foreach ($listaProf as $value) {
                                                        echo '<option value="' . $value->getId() . '">' . $value->getNome() . '</option>';
                                                    }
                                                    ?>
                                                </select>                                                                                                                                                       
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inpCh">Carga Horária</label>
                                                <input type="text" class="form-control" name="inpCh" placeholder=""
                                                       value="<?php if ($AltTrue) echo $disciplinaAlt[1]->getCargaHoraria() ?>">
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary">Alterar dados</button>
                                    </form> 
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
                        var page = "disciplinasComponent";
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
