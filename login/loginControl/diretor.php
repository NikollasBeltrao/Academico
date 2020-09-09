<?php
require_once '../../DAO/diretorDao.php';
require_once '../../VO/DiretorVO.php';
if (isset($_POST['matricula']) && isset($_POST['senha'])) {
    
    $diretor = authDiretor($_POST['matricula']);
    if ($diretor[0]) {
        if($diretor[1][0]->getSenha() == $_POST['senha']) {
            echo "<SCRIPT> //not showing me this
                window.location.replace('../../pages/diretorLogado/DiretorLogadoPage.php?id=".$diretor[1][0]->getId()."');
                </SCRIPT>";
        } else {
            echo "<SCRIPT> //not showing me this
                alert('Senha incorreta')
                window.location.replace(document.referrer+ '#diretor');
                </SCRIPT>";
        }
    } else {
        echo "<SCRIPT> //not showing me this
        alert('Diretor não cadastrado')
        window.location.replace(document.referrer +'#diretor');
    </SCRIPT>";
    }
}
