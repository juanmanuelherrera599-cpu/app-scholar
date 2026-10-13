<?php
require_once __DIR__ . "/config/cors.php";
require_once __DIR__ . "/config/conexao.php";
echo json_encode(["mensagem"=>"Conexão com o banco de dados realizada com sucesso!"], JSON_UNESCAPED_UNICODE);
?>