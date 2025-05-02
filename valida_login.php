<?php 
    session_start();

    //Variavel que verifica se a autenticacao foi realizada
    $usuario_atenticado = false;
    //Relacao de usuarios dos sistemas
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' =>'123456'),
        array('email' => 'user@teste.com.br', 'senha' =>'abcdef'),
    );
foreach($usuarios_app as $user){
    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_atenticado = true;
    }
}
if($usuario_atenticado){
    echo 'Usuário autenticado';
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['x'] = 'um valor';
    $_SESSION['y'] = 'outro valor';
    header('Location: home.php');
} else {
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
    
}

?>