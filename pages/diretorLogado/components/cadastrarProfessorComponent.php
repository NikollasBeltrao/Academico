<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <body>
        <h1 class="h3 mb-2 text-gray-800">Cadastrar Professor</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
        <form method="post" action="control/cadastrarProfessor.php">
            <div class="form-group">
                <label for="inpNome">Nome</label>
                <input type="text" class="form-control" name="inpNome" placeholder="Nome completo">
            </div>
            <div class="form-group">
                <label for="inpMatricula">Matricula</label>
                <input type="text" class="form-control" name="inpMatricula" placeholder="Matricula">
            </div>
             <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </body>
</html>
