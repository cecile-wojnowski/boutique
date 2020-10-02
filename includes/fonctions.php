<?php
    function deconnexion(){
        session_destroy();
        header('Location:index.php');
    }
?>