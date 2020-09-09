<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Custom styles for this template-->
        <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../../css/sb-admin-2.css" rel="stylesheet">
        <link href="./styles.css" rel="stylesheet" type="text/css"/>
        <?php
        ini_set('error_reporting', E_ALL);
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVO.php';
        require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/professorDao.php';

        session_start();
        $alterarP = '';
        $ExcluirP = '';
        if (isset($_SESSION['sesAlterarP'])) {
            $alterarP = $_SESSION['sesAlterarP'];
        }
        if (isset($_SESSION['sesExcluirP'])) {
            $ExcluirP = $_SESSION['sesExcluirP'];
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
                                        Listagem dos alunos</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="">      
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark">
                                            <thead>
                                                <tr>
                                                <th scope="col">Matrícula</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">E-Mail</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $professores = listProfessores();
                                                foreach ($professores as $aluno) {
                                                    echo '<tr>
                                                <td>' . $aluno->getMatricula() . '</td>
                                                <td>' . $aluno->getNome() . '</td>
                                                <td>' . $aluno->getEmail() . '</td>  
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
                                        Cadastrar um Professor</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/cadastrarProfessor.php" method="post">                                    
                                        <div class="form-group">
                                            <label for="inpNomeP">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeP" placeholder="Nome completo">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inpCpfP">CPF</label>
                                                <input type="text" class="form-control" name="inpCpfP" placeholder="000.000.000-00">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inpMatP">Matricula</label>
                                                <input type="text" class="form-control" name="inpMatP" placeholder="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inpDataNasP">DataNascimento</label>
                                                <input type="date" class="form-control" name="inpDataNasP">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpEmailP">E-mail</label>
                                                <input type="email" class="form-control" name="inpEmailP">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inpTelP">Telefone</label>
                                                <input type="text" class="form-control" name="inpTelP">
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
                                        Pesquisar aluno</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $professorAlt;
                                $erroMessage = '';
                                $AltTrue = false;
                                if ($alterarP != '') {
                                    $professorAlt = getProfessor($alterarP);
                                    if ($professorAlt[0] == 'false') {
                                        $AltTrue = false;
                                        $erroMessage = 'Aluno não encontrado';
                                    } else {
                                        $AltTrue = true;
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <div class="form-inline" >
                                        <form class="form-group" action="" method="post">
                                            <label for="inpMatAltP">Matrícula</label>
                                            <input type="text" name="inpMatAltP" id="inpAlterar" class="form-control mx-sm-3" 
                                                   value="<?php echo $alterarP; ?>">
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
                                        Dados do aluno</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="control/alterarProfessor.php" method="post">
                                        <input type="text" name="inpIdP" value="<?php if ($AltTrue) echo $alterarP; ?>" style="display: none">
                                        <div class="form-group">
                                            <label for="inpNomeP">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeP"
                                                   value="<?php if ($AltTrue) echo $professorAlt[1]->getNome(); ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inpMatP">Matricula</label>
                                                <input type="text" class="form-control" name="inpMatP" placeholder=""
                                                       value="<?php if ($AltTrue) echo $professorAlt[1]->getMatricula(); ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpEmailP">E-mail</label>
                                                <input type="email" class="form-control" name="inpEmailP"
                                                       value="<?php if ($AltTrue) echo $professorAlt[1]->getEmail(); ?>">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Alterar dados</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="excluir">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        Pesquisar aluno</h6>
                                </div>
                                <!-- Card Body -->
                                <?php
                                $professorEx;
                                $erroMessage = '';
                                $ExTrue = false;
                                if ($ExcluirP != '') {
                                    $professorEx = getProfessor($ExcluirP);
                                    if ($professorEx[0] == 'false') {
                                        $ExTrue = false;
                                        $erroMessage = 'Esse aluno foi removido ou não existe';
                                    } else {
                                        $ExTrue = true;
                                        $erroMessage = '';
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <div class="form-inline" >
                                        <form class="form-group" action="" method="post">
                                            <label for="inpMatP">Matrícula</label>
                                            <input type="text" name="inpMatExP" id="inpAlterar" class="form-control mx-sm-3" 
                                                   value="<?php echo $ExcluirP; ?>">
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
                                        Dados do aluno</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form id="formEx" method="post" action="control/excluirAluno.php">
                                        <input type="text" name="inpIdE" value="<?php if ($ExTrue) echo $ExcluirP; ?>" style="display: none">
                                        <div class="form-group">
                                            <label for="inpNomeE">Nome</label>
                                            <input type="text" class="form-control" name="inpNomeE"
                                                   value="<?php if ($ExTrue) echo $professorEx[1]->getNome(); ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inpMatE">Matricula</label>
                                                <input type="text" class="form-control" name="inpMatE" placeholder=""
                                                       value="<?php if ($ExTrue) echo $professorEx[1]->getMatricula(); ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inpEmailE">E-mail</label>
                                                <input type="email" class="form-control" name="inpEmailE"
                                                       value="<?php if ($ExTrue) echo $professorEx[1]->getEmail(); ?>">
                                            </div>
                                        </div>
                                        <button  class="btn btn-primary" >Excluir aluno</button>
                                    </form>                                     
                                </div>
                            </div>
                        </div>
                    </div>                                        
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirmarExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Você tem certeza que deseja excluir esse aluno ?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" data-dismiss="modal">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
        <!--        lista-->
        <div class="row">

        </div>

        <!-- Page level custom scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                    var page = "professoresComponent";
                    function caminho(path) {
                        location.href = '#' + page + '#' + path;
                    }
//                    function pesquisar(inp, camp) {
//                        if (camp == 'inpAlterar') {
//                            if (document.getElementById('inpAlterar').value != '') {
//
//                                document.getElementById('smallinpAlterar').innerHTML = "";
//                                $('#teste').val('');
//                                sessionStorage["sesAlterar"] = "asdasd";
//                            } else {
//                                document.getElementById('smallinpAlterar').innerHTML = "erro";
//                            }
//                        }
//                    }
        </script>
    </body>
</html>