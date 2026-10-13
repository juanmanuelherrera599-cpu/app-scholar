<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
try {
    $stmt = $pdo->query("SELECT * FROM coordenadores");
    echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Erro ao consultar registros."], JSON_UNESCAPED_UNICODE);
}
?>