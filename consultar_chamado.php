<?php 
// Inclui o script de verificação de acesso
require_once "validador_acesso.php"
?>
<?php 
// Criando o array que irá armazenar os chamados
$chamados = array();

// Abrir o arquivo .hd que contém os registros de chamados
$arquivo = fopen('arquivo.hd','r');

// Criando um laço que percorre o arquivo linha por linha enquanto houver registros
while(!feof($arquivo)){ 
    // fgets() recupera uma linha do arquivo por vez
    $registro = fgets($arquivo); 

    // Armazena cada linha recuperada no array $chamados
    $chamados[] = $registro; 
}

// Fecha o arquivo após leitura
fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <!-- Bootstrap: framework CSS para facilitar a responsividade e o design -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <!-- Barra de navegação superior -->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">
        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <!-- Trabalhando na view do usuário -->
              <!-- Para percorrer o array $chamados, criamos uma variável que recebe os elementos individualmente -->
              <?php foreach($chamados as $chamado){?>
                
              <?php
              // Quebrando as informações do chamado com base no delimitador '#' 
              // Isso separa as informações para serem exibidas nos locais corretos
              $chamado_dados = explode('#', $chamado);
              if($_SESSION['perfil_id'] == 2){
                //só vamos exibir o chamado, se ele foi criado pelo usuário
                if($_SESSION['id'] != $chamado_dados[0]){
                  continue;
                }
              }
              //verificando com if se há pelo menos 3 elementos no array (evita erros ao exibir chamados incompletos)
              if(count($chamado_dados) < 3){
                continue;
                // pula esse chamado se estiver com dados incompletos 
                }
              ?>
               <!-- Exibindo as informações do chamado dentro de um card estilizado com Bootstrap -->
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <!-- Título do chamado (Ex: Categoria do problema) -->
                  <h5 class="card-title"><?=$chamado_dados[1] ?></h5>
                  <!-- Subtítulo (Ex: Tipo ou área relacionada) -->
                  <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2] ?></h6>
                  <!-- Texto principal (Descrição detalhada do problema) -->
                  <p class="card-text"><?=$chamado_dados[3] ?></p>
                </div>
              </div>
                <?php } ?> <!-- Fim do foreach -->
              <!-- Botão para retornar à tela inicial -->
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div><!-- Fim do card-body -->
          </div><!-- Fim do card -->
        </div><!-- Fim do card-consultar-chamado -->
      </div><!-- Fim da row -->
    </div><!-- Fim do container -->
  </body>
</html>