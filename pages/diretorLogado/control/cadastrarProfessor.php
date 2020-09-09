<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/professorDao.php';
if (isset($_POST['inpNomeP'])) {
    if ($_POST['inpNomeP'] != '') {
        $professor = new ProfessorVO();
        $professor->setNome($_POST['inpNomeP']);
        $professor->setEmail($_POST['inpEmailP']);
        $createProfessor = createProfessor($professor);
        echo "<SCRIPT> //not showing me this
                alert('Professor cadastrado com sucesso');
                window.location.replace(document.referrer +'#professoresComponent#cadastrar');
                </SCRIPT>";
    }
    else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#professoresComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#professoresComponent#cadastrar');
                </SCRIPT>";
}
