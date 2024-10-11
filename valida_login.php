<?php 
    print_r($_POST);
    echo '<br/>';
    echo htmlspecialchars($_POST['email'] ?? '');
    echo '<br/>';
    echo htmlspecialchars($_POST['senha'] ?? '');
    
    echo "Formulário enviado";
?>