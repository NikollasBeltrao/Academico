<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/turmaDao.php';
if (isset($_POST['inpNomeT']) && isset($_POST['inpCursoT'])) {
    if ($_POST['inpNomeT'] != '' && $_POST['inpCursoT'] != '' && $_POST['inpAbrevT'] != '') {
        $turma = new TurmaVO();
        $turma->setNome($_POST['inpNomeT']);
        $turma->setAbreviacao($_POST['inpAbrevT']);
        $turma->setFk_curso($_POST['inpCursoT']);
        $createTurma = createTurma($turma);
        echo "<SCRIPT> //not showing me this
                alert('Turma cadastrada com sucesso');
                window.location.replace(document.referrer +'#turmasComponent#cadastrar');
                </SCRIPT>";
    }
    else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#turmasComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#turmasComponent#cadastrar');
                </SCRIPT>";
}

