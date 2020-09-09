<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/professorDao.php';

if (isset($_POST['inpNomeP']) && isset($_POST['inpEmailP']) && isset($_POST['inpMatP'])) {
    if ($_POST['inpNomeP'] != '' && $_POST['inpEmailP'] != '' && $_POST['inpMatP'] != '') {
        $prof = new ProfessorVO();
        $prof->setId($_POST['inpIdP']);
        $prof->setNome($_POST['inpNomeP']);
        $prof->setEmail($_POST['inpEmailP']);
        $prof->setMatricula($_POST['inpMatP']);
        updateProfessor($prof);
        echo "<SCRIPT> //not showing me this
                alert('Professor alterado com sucesso');
                window.location.replace(document.referrer +'#professoresComponent#alterar');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#professoresComponent#alterar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#professoresComponent#alterar');
                </SCRIPT>";
}
