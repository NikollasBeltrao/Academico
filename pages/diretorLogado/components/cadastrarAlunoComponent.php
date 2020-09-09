<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h3 class="text-center">Matricular um novo aluno</h3>
        <p></p>
        <!--                                form cadastrar aluno-->
        <form action="control/cadastrarAluno.php" method="post">                                    
            <div class="form-group">
                <label for="inpNome">Nome</label>
                <input type="text" class="form-control" name="inpNome" placeholder="Nome completo">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inpCpf">CPF</label>
                    <input type="text" class="form-control" name="inpCpf" placeholder="000.000.000-00">
                </div>

                <div class="form-group col-md-4">
                    <label for="inpMat">Matricula</label>
                    <input type="text" class="form-control" name="inpMat" placeholder="">
                </div>
                <div class="form-group col-md-4">
                    <label for="inpDataNas">DataNascimento</label>
                    <input type="date" class="form-control" name="inpDataNas">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inpEmail">E-mail</label>
                    <input type="email" class="form-control" name="inpEmail">
                </div>
                <div class="form-group col-md-6">
                    <label for="inpTel">Telefone</label>
                    <input type="text" class="form-control" name="inpTel">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inpCurso">Curso</label>
                    <select name="inpCurso" class="form-control">
                        <option selected>Escolha um Curso...</option>                                 
                        <?php                      
                            $listaCursos = listCursos();
                            foreach ($listaCursos as $value) {
                                echo '<option value="' . $value->getId().'">' . $value->getNome() . '</option>';
                            }                        
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
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
<!--            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="selectAll" id="selectAll" checked onclick="marcardesmarcar()">
                        <label class="form-check-label" for="selectAll">
                            Matricullar aluno em todas as disciplinas do curso
                        </label>
                    </div>  
                </div>                                        
            </div>-->

            

            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>


    </body>
</html>
<!--<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-dark text-white">
                    <th scope="col">DISCIPLINA</th>
                    <th scope="col">PROFESSOR</th>
                    <th scope="col" >TURMA</th>
                    <th scope="col" >CURSO</th>   
                    <th scope="col">...</th>   
                    </tr>
                </thead>                                        
                <tbody id="tbody">
                    <?php
//                                            $listDisciplinas = listDiscplinas();
//                                            $cont = 0;
//                                            foreach ($listDisciplinas as $value) {
//                                                $cont += 1;
//                                                echo '<tr class="table-secondary">
//                                                <th scope="row">' . $value->getNome() . '</th>
//                                                <td>' . $value->getFk_professor() . '</td>
//                                                <td>' . $value->getFk_turma()->getNome() . '</td>
//                                                <td>' . $value->getFk_curso()->getNome() . '</td>
//                                                <td><input class="inp" type="checkbox" value="' . $value->getId() . '" name="che' . $cont . '" checked></td> 
//                                            </tr> ';
//                                                
//                                            }
//                                            echo '<input type="text" name="cont" value="'.$cont.'" style="display: none">';
//                                            
                    ?>                                                                                      
                </tbody>
            </table>-->