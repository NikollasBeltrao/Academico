<html>
    <head>
        <meta charset="UTF-8">
        <title>Turmas Component</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Custom styles for this template-->
        <link href="./styles.css" rel="stylesheet" type="text/css"/>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/alunoDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/cursoDao.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/turmaDao.php';
        session_start();
        $alterarT = '';
        if (isset($_SESSION['sesAlterarT'])) {
            $alterarT = $_SESSION['sesAlterarT'];
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
                                        Listagem dos alunos</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="">      
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark">
                                            <thead>
                                                <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Abreveiação</th>
                                                <th scope="col">Curso</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $turmas = listTurmas();
                                                foreach ($turmas as $turma) {
                                                    echo '<tr>
                                                <td>' . $turma->getId() . '</td>
                                                <td>' . $turma->getNome() . '</td>
                                                <td>' . $turma->getAbreviacao() . '</td>
                                                <td>' .$turma->getFk_curso()->getAbreviacao(). " - " . $turma->getFk_curso()->getNome() . '</td>
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
                                        Cadastrar um aluno</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/cadastrarTurma.php" method="post">                                    
                                        <div class="form-row">
                                            <div class="form-group">
                                                <label for="inpNomeT">Nome</label>
                                                <input type="text" class="form-control" name="inpNomeT" placeholder="Nome completo">
                                            </div>
                                            <div class="form-group">
                                                <label for="inpAbrevT">Abreviação</label>
                                                <input type="text" class="form-control" name="inpAbrevT" placeholder="Abreviação">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpCursoT">Curso</label>
                                                <select name="inpCursoT" class="form-control">
                                                    <option selected>Escolha umo curso...</option>                                 
                                                    <?php
                                                    $listaCursos = listCursos();
                                                    foreach ($listaCursos as $value) {
                                                        echo '<option value="' . $value->getId().'">' . $value->getNome() . '</option>';
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
                                        Pesquisar turma</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $turmaAlt;
                                $erroMessage = '';
                                $AltTrue = false;
                                if ($alterarT != '') {
                                    $turmaAlt = getTurma($alterarT);
                                    if ($turmaAlt[0] == 'false') {
                                        $AltTrue = false;
                                        $erroMessage = 'Turma não encontrado';
                                    } else {
                                        $AltTrue = true;
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <div class="form-inline" >
                                        <form class="form-group" action="" method="post">
                                            <label for="inpMatAltT">Matrícula</label>
                                            <input type="text" name="inpMatAltT" id="inpAlterar" class="form-control mx-sm-3" 
                                                   value="<?php echo $alterarT; ?>">
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
                                        Dados da turma</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/alterarTurma.php" method="post">
                                        <input type="text" name="inpIdT" value="<?php if ($AltTrue) echo $alterarT; ?>" style="display: none">
                                        <div class="form-group">
                                            <label for="inpNomeT">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeT"
                                                   value="<?php if ($AltTrue) echo $turmaAlt[1]->getNome(); ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpAbrevT">Abreviação</label>
                                                <input type="text" class="form-control" name="inpAbrevT"
                                                       value="<?php if ($AltTrue) echo $turmaAlt[1]->getAbreviacao(); ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inpCursoT">Curso</label>
                                                <input type="text" class="form-control" disabled name="inpCursoT" placeholder=""
                                                       value="<?php if ($AltTrue) echo $turmaAlt[1]->getFk_curso()->getNome(); ?>">
                                            </div>
                                        </div>                                        
                                        <button type="submit" class="btn btn-primary">Alterar dados</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
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
            var page = "turmasComponent";
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
