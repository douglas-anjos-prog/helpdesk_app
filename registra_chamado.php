<?php 
    session_start();
    //Verifica se todos os campos foram enviados
    if (empty($_POST['titulo']) || empty($_POST['categoria']) || empty($_POST['descricao'])) {
        // Salva o erro na sessão para exibir depois (opcional)
        $_SESSION['erro_chamado'] = 'Preencha todos os campos antes de registrar o chamado.';
        
        // Redireciona de volta com parâmetro de erro
        header('Location: abrir_chamado.php?chamado=erro');
        exit;
    }

    //Tratamento dos dados
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);


    // Monta o texto do chamado
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    //Abre o arquivo para escrita
    $arquivo = fopen('arquivo.hd','a');
    //escrevendo o texto
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);

   //Redireciona para confirmação
   header('Location: abrir_chamado.php?chamado=aberto');
?>