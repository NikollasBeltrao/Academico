<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/alunoDao.php';

if (isset($_POST['inpNome']) && isset($_POST['inpEmail']) && isset($_POST['inpMat'])) {
    if ($_POST['inpNome'] != '' && $_POST['inpEmail'] != '' && $_POST['inpMat'] != '') {
        $al = new AlunoVO();
        $al->setId($_POST['inpId']);
        $al->setNome($_POST['inpNome']);
        $al->setEmail($_POST['inpEmail']);
        $al->setMatricula($_POST['inpMat']);
        updateAluno($al);
        echo "<SCRIPT> //not showing me this
                alert('Aluno alterado com sucesso');
                window.location.replace(document.referrer +'#alunosComponent#alterar');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#alunosComponent#alterar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#alunosComponent#alterar');
                </SCRIPT>";
}