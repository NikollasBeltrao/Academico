<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/turmaDao.php';

if (isset($_POST['inpNomeT']) && isset($_POST['inpAbrevT'])) {
    if ($_POST['inpNomeT'] != '' && $_POST['inpAbrevT'] != '') {
        $turma = new TurmaVO();
        $turma->setId($_POST['inpIdT']);
        $turma->setNome($_POST['inpNomeT']);
        $turma->setAbreviacao($_POST['inpAbrevT']);
        updateTurma($turma);
        echo "<SCRIPT> //not showing me this
                alert('Turma alterada com sucesso');
                window.location.replace(document.referrer +'#turmasComponent#alterar');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#turmasComponent#alterar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#turmasComponent#alterar');
                </SCRIPT>";
}