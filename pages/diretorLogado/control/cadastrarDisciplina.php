<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/disciplinaDao.php';

if (isset($_POST['inpNomeD'])) {
    if ($_POST['inpNomeD'] != '') {
        $idC = preg_split('/,|\./', $_POST['inpTurmaD'])[1];
        $idT = preg_split('/,|\./', $_POST['inpTurmaD'])[0];
        $disciplina = new DisciplinaVO();
        $disciplina->setNome($_POST['inpNomeD']);
        $disciplina->setFk_curso($idC);
        $disciplina->setFk_turma($idT);
        $disciplina->setCargaHoraria($_POST['inpChD']);
        $disciplina->setFk_professor($_POST['inpProfD']);
        createDisciplina($disciplina);
        echo "<SCRIPT> //not showing me this
                alert('Disciplina cadastrada com sucesso');
                window.location.replace(document.referrer +'#disciplinasComponent#cadastrar');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#disciplinasComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro ao carregar')
                window.location.replace(document.referrer +'#disciplinasComponent#cadastrar');
                </SCRIPT>";
}
echo "<SCRIPT> //not showing me this
                alert('Erro ao carregar')
                window.location.replace(document.referrer +'#disciplinasComponent#cadastrar');";
   