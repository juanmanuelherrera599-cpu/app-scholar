<?php
$servidor = "localhost";
$banco = "escola";
$usuario = "root";
$senha = ""; // Ajuste se seu MySQL tiver senha.
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8mb4", $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
} catch (PDOException $e) {
    error_log("Erro de conexão APP Scholar: ".$e->getMessage());
    http_response_code(500);
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode(["erro"=>"Não foi possível conectar ao banco de dados."], JSON_UNESCAPED_UNICODE);
    exit;
}
?>