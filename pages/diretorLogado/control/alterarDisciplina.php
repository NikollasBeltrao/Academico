<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/disciplinaDao.php';

if (isset($_POST['inpNomeD'])) {
    if ($_POST['inpNomeD'] != '') {
        $disciplina = new DisciplinaVO();
        $disciplina->setId($_POST['inpIdD']);
        $disciplina->setNome($_POST['inpNomeD']);
        $disciplina->setCargaHoraria($_POST['inpCh']);
        $disciplina->setFk_professor($_POST['inpProfD']);
        updateDisciplina($disciplina);
        echo "<SCRIPT> //not showing me this
                alert('Professor alterado com sucesso');
                window.location.replace(document.referrer +'#disciplinasComponent#alterar');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#disciplinasComponent#alterar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#disciplinasComponent#alterar');
                </SCRIPT>";
}
