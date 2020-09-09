<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/cursoDao.php';
if (isset($_POST['inpNomeC']) && isset($_POST['inpAbrevC'])) {
    if ($_POST['inpNomeC'] != '' && $_POST['inpAbrevC'] != '') {
        $curso = new CursoVO();
        $curso->setNome($_POST['inpNomeC']);
        $curso->setAbreviacao($_POST['inpAbrevC']);
        $createTurma = createCurso($curso);
        echo "<SCRIPT> //not showing me this
                alert('Curso cadastrado com sucesso');
                window.location.replace(document.referrer +'#cursosComponent#cadastrar');
                </SCRIPT>";
    }
    else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#cursosComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro interno, contate o desenvolveldor')
                window.location.replace(document.referrer +'#cursosComponent#cadastrar');
                </SCRIPT>";
}