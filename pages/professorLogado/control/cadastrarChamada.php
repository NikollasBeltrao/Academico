<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/chamadaDao.php';
session_start();
if (isset($_POST['inpAula'])) {
    if ($_POST['inpAula'] != '') {
        $idAula = preg_split("/,|\./", $_POST['inpAula'])[0];
        $idDisciplina = preg_split("/,|\./", $_POST['inpAula'])[1];

        $chamada = new ChamadaVO();
        $chamada->setFk_aula($idAula);
        $chamada->setFk_professor($_POST['inpProf']);
        $chamada->setObs($_POST['inpObs']);
        $_SESSION['seschamada'] = $idDisciplina . "," . createChamada($chamada);
        echo "<SCRIPT> //not showing me this
                alert('Chamada criada com sucesso');
                window.location.replace(document.referrer +'#aulasComponent#cadastrar');
                </SCRIPT>";
    } else {
        if (isset($_SESSION['seschamada'])) {
            unset($_SESSION['seschamada']);
        }
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#aulasComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    if (isset($_SESSION['seschamada'])) {
        unset($_SESSION['seschamada']);
    }
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#aulasComponent#cadastrar');
                </SCRIPT>";
}