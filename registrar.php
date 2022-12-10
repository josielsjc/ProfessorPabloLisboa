<?php



    //INICIANDO SESSAO
    session_start();

    //CHAMANDO ARQUIVO CONEXAO
    include 'conexao.php';

    //CADA ../ SIGNIFICA VOLTAR UMA PASTA PARA TRAS   

    //BUSCANDO DADOS DO CADASTRO DE CONVENIO via _POST
    $var_nm1 = $_POST['var_nm1'];    
    $var_nm2= $_POST['var_nm2'];
    $var_email = $_POST['var_email'];


    echo $var_nm1; 
    echo $var_nm2; 
    echo $var_email; 

    //PRIMEIRO PASSO PARA INSERIR DADOS
    //FAZER A CONSULTA DO INSERT
    $insere_alunos = "INSERT INTO professorpablolisboa.registrar_aluno 
                            (primeiro_nome,segundo_nome, email)
                         VALUES 
                            ('$var_nm1', '$var_nm2','$var_email')";

    //SEGUNDO PASSO
    //JUNTAR AS INFORMACOES DA CONEXAO + A CONSULTA
    $valida_cadastro_aluno = mysqli_query($conexao, $insere_alunos);
    //OBS a variavel $conexao é a mesma do conexao.php

    //VALIDANDO SE OS DADOS FORAM CORRETAMENTE INSERIDOS
    if(!$valida_cadastro_aluno){
        //CRIANDO SESSAO MENSAGEM
        $_SESSION['msg_execucao'] = 'Erro no cadastro do convênio.';        
        header('Location: index.php');
    }else{
        //CRIANDO SESSAO MENSAGEM
        $_SESSION['msg_execucao'] = 'Convênio cadastrado com sucesso!';   
        header('Location: index.php');
    }




?>