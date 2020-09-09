<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/chamadaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/alunoChamadaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/disciplinaAluno.php';
session_start();
if (isset($_POST['inpAl']) && isset($_POST['selAl'])) {
    $cont = 0;
    foreach ($_POST['inpAl'] as $value) {

        $chamadaAluno = new AlunoChamadaVO();
        $chamadaAluno->setFk_aluno($value);
        $chamadaAluno->setFk_chamada($_POST['inpCh']);
        $chamadaAluno->setStatus($_POST['selAl'][$cont]);

        createAlunoChamada($chamadaAluno);
        $cont = $cont + 1;
    }
    if (isset($_SESSION['seschamada'])) {
        unset($_SESSION['seschamada']);
    }
    echo "<SCRIPT> //not showing me this
                alert('Chamada criada com sucesso');
                window.location.replace(document.referrer +'#aulasComponent#cadastrar');
                </SCRIPT>";
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro, não existem alunos nessa chamada');
                window.location.replace(document.referrer +'#aulasComponent#cadastrar');
                </SCRIPT>";
}