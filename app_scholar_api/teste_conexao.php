<?php

require_once "cors.php";
require_once "conexao.php";

echo json_encode([
    "mensagem" => "Conexao realizada com sucesso!"
]);

?>