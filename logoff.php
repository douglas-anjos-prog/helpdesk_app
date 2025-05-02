<?php
session_start();
       

      /*  //remover indices do array de sessão
        //unset()

        unset($_SESSION['x']); //para remover o indice apenas se existir

        echo'<pre>';
        print_r($_SESSION);
        echo'</pre>';

        //destruir a variável de sessão
        //ssesion_destroy()*/

        session_destroy(); //será destruida
        header('Location: index.php?logout');
        //forcar redirecionamento
?>