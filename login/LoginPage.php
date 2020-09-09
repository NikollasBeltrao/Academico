<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="LoginCss.css">
        <title>Hello, world!</title>
    </head>
    <body class="media">
        
        <div id="loginTodo" >
            <h5>Login</h5>
            <ul class="nav nav-tabs bg-secondary" id="myTab" role="tablist" style="border-radius: 4px">
                <li class="nav-item bg-secondary ">
                    <a class="nav-link active bg-secondary" data-toggle="tab" href="#inicio" role="tab" aria-controls="inicio" aria-selected="true">Início</a>
                </li>
                <li class="nav-item bg-secondary">
                    <a class="nav-link bg-secondary" data-toggle="tab" href="#prof" role="tab" aria-controls="prof" aria-selected="false">Professor</a>
                </li>
                <li class="nav-item bg-secondary">
                    <a class="nav-link bg-secondary" data-toggle="tab" href="#aluno" role="tab" aria-controls="aluno" aria-selected="false">Aluno</a>
                </li>
                <li class="nav-item bg-secondary">
                    <a class="nav-link bg-secondary" data-toggle="tab" href="#pais" role="tab" aria-controls="contact" aria-selected="false">Pais</a>
                </li>
                <li class="nav-item bg-secondary">
                    <a class="nav-link bg-secondary" data-toggle="tab" href="#diretor" role="tab" aria-controls="contact" aria-selected="false">Diretor</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="padding: 10px">
                <div class="tab-pane fade " id="inicio" role="tabpanel" aria-labelledby="home-tab" style="height: 212px">
                    <h3 class="text-center">Bem Vindo !!!</h3>
                    <p>Escolha seu metodo de login</p>
                </div>
                <div class="tab-pane fade" id="prof" role="tabpanel" aria-labelledby="profile-tab">
                    <h6 class="">Professor</h6>
                    <form action="loginControl/professor.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputLogin" aria-describedby="emailHelp" name="matricula" placeholder="Digite sua matricula">
<!--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check">
                            <label class="form-check-label" for="exampleCheck1">Manter-se conectado</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Entrar</button>
                    </form>
                </div>


                <div class="tab-pane fade" id="aluno" role="tabpanel" aria-labelledby="contact-tab">
                    <h6 class="">Aluno</h6>
                    <form action="loginControl/aluno.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputLogin" aria-describedby="emailHelp" name="matricula" placeholder="Digite sua matricula">
<!--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check">
                            <label class="form-check-label" for="exampleCheck1">Manter-se conectado</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Entrar</button>
                    </form>
                </div>


                <div class="tab-pane fade" id="pais" role="tabpanel" aria-labelledby="profile-tab">
                    <h6 class="">Pais</h6>
                    <form action="loginControl/pais.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputLogin" aria-describedby="emailHelp" name="matricula" placeholder="Digite sua matricula">
<!--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check">
                            <label class="form-check-label" for="exampleCheck1">Manter-se conectado</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Entrar</button>
                    </form>
                </div>


                <div class="tab-pane fade" id="diretor" role="tabpanel" aria-labelledby="contact-tab">
                    <h6 class="">Diretor</h6>
                    <form action="loginControl/diretor.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputLogin" aria-describedby="emailHelp" name="matricula" placeholder="Digite sua matricula">
<!--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Digite sua senha">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check">
                            <label class="form-check-label" for="exampleCheck1">Manter-se conectado</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script>
            
            if(window.location.href.indexOf("#") != -1){
               var tab = window.location.href.split('#')[1]; 
               if(tab != ''){
                   $('#'+tab).tab('show');
               }
               else {
                   $('#inicio').tab('show');
               }
            }
            else {
                $('#inicio').tab('show');
                
            }
            
        </script>
    </body>
   
</html>
