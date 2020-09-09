<?php

require_once '../../DAO/alunoDao.php';
require_once '../../VO/AlunoVO.php';
if (isset($_POST['matricula']) && isset($_POST['senha'])) {

    $aluno = authAluno($_POST['matricula']);
    if ($aluno[0]) {
        if ($aluno[1][0]->getSenha() == $_POST['senha']) {
            session_start();
            $_SESSION['logado'] = "aluno,".$aluno[1][0]->getId();
            echo "<SCRIPT> //not showing me this
                window.location.replace('../../pages/alunoLogado/AlunoLogadoPage.php?id=".$aluno[1][0]->getId()."');
                </SCRIPT>";
        } else {
            echo "<SCRIPT> //not showing me this
                alert('Senha incorreta')
                window.location.replace(document.referrer + '#aluno');
                </SCRIPT>";
        }
    } else {
        echo "<SCRIPT> //not showing me this
        alert('Aluno não cadastrado')
        window.location.replace(document.referrer +'#aluno');
    </SCRIPT>";
    }
}

