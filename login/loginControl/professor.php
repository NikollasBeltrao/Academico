<?php

require_once '../../DAO/professorDao.php';
require_once '../../VO/ProfessorVO.php';
if (isset($_POST['matricula']) && isset($_POST['senha'])) {

    $professor = authProfessor($_POST['matricula']);
    if ($professor[0]) {
        if ($professor[1][0]->getSenha() == $_POST['senha']) {
            session_start();
            $_SESSION['logado'] = "professor,".$professor[1][0]->getId();
            echo "<SCRIPT> //not showing me this
                window.location.replace('../../pages/professorLogado/ProfessorLogadoPage.php?id=".$professor[1][0]->getId()."');
                </SCRIPT>";
        } else {
            echo "<SCRIPT> //not showing me this
                alert('Senha incorreta')
                window.location.replace(document.referrer + '#professor');
                </SCRIPT>";
        }
    } else {
        echo "<SCRIPT> //not showing me this
        alert('Professor não cadastrado')
        window.location.replace(document.referrer +'#professor');
    </SCRIPT>";
    }
}

