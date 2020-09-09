<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="control/cadastrarSala.php" method="post">
            <div class="form-group">
                <label for="inpId">Identificador</label>
                <input type="text" class="form-control" name="inpId" placeholder="Identificador">
            </div>  
            <div class="form-group">
                <label for="inpDesc">Descrição</label>
                <input type="text" class="form-control" name="inpDesc" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="inpLoc">Localização</label>
                <input type="text" class="form-control" name="inpLoc" placeholder="Localização">
            </div> 
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>
    </body>
</html>
