<?php 
session_start();

function SalvaNome(){
    if(isset($_SESSION['nome'])) {
        $nome = $_SESSION['nome'];
    } 

    echo $nome;
}

function SalvaEmail(){
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } 
    echo $email;
}
?>