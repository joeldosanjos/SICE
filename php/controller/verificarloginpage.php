<?php
// Inicia sessões 
session_start();

// Verifica se existe os dados da sessão de login 
if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
} else {
    header("Location: ../conta_index.php");
}
