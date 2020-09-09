<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/alunoDao.php';

if (isset($_POST['inpIdE'])) {
    if ($_POST['inpIdE'] != '') {        
        deleteAluno($_POST['inpIdE']);
        echo "<SCRIPT> //not showing me this
                alert('Aluno alterado com sucesso');
                window.location.replace(document.referrer +'#alunosComponent#excluir');
                </SCRIPT>";
    } else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#alunosComponent#excluir');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#alunosComponent#excluir');
                </SCRIPT>";
}