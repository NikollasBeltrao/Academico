<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/SalaVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/salaDao.php';
if (isset($_POST['inpId'])) {
    if ($_POST['inpId'] != '') {
        $sala = new SalaVO();
        $sala->setIdentificador($_POST['inpId']);
        $sala->setDescricao($_POST['inpDesc']);
        $sala->setLocalizacao($_POST['inpLoc']);
        $createSala = createSala($sala);
        echo "<SCRIPT> //not showing me this
                alert('Sala cadastrada com sucesso');
                window.location.replace(document.referrer +'#cadSala');
                </SCRIPT>";
    }
    else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#cadSala');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#cadSala');
                </SCRIPT>";
}