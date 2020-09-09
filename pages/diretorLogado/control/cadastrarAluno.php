<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/alunoDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/disciplinaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/Dao/disciplinaAlunoDao.php';

if (isset($_POST['inpNome'])) {
    if ($_POST['inpNome'] != '') {
        $idC = preg_split('/,|\./', $_POST['inpTurma'])[1];
        $idT = preg_split('/,|\./', $_POST['inpTurma'])[0];
        $aluno = new AlunoVO();
        $aluno->setNome($_POST['inpNome']);
        $aluno->setFk_curso($idC);
        $aluno->setFk_turma($idT);
        $aluno->setMatricula($_POST['inpMat']);
        $aluno->setEmail($_POST['inpEmail']);
        $aluno->setSenha('123');        
        $novoIdAluno = createAluno($aluno);
        $listaDisciplinas = listDiscplinas('', "WHERE fk_turma = '".$idT."'");
        foreach ($listaDisciplinas as $value) {
            createDisciplinaAluno($value->getId(), $novoIdAluno);
        }
        echo "<SCRIPT> //not showing me this
                alert('Disciplina cadastrada com sucesso');
                window.location.replace(document.referrer +'#alunosComponent#cadastrar');
                </SCRIPT>";
    }
    else {
        echo "<SCRIPT> //not showing me this
                alert('Preencha todos os campos')
                window.location.replace(document.referrer +'#alunosComponent#cadastrar');
                </SCRIPT>";
    }
} else {
    echo "<SCRIPT> //not showing me this
                alert('Erro ao carregar')
                window.location.replace(document.referrer +'#alunosComponent#cadastrar');
                </SCRIPT>";
}
echo "<SCRIPT> //not showing me this
                alert('Erro ao carregar')
                window.location.replace(document.referrer +'#alunosComponent#cadastrar');
                </SCRIPT>";