<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["ano_letivo"]) || $d["ano_letivo"] === "" || !isset($d["id_curso"]) || $d["id_curso"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO turmas (ano_letivo, turnos, salas, id_curso, status) VALUES (:ano_letivo, :turnos, :salas, :id_curso, 'A')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":ano_letivo" => $d["ano_letivo"] ?? null,
        ":turnos" => $d["turnos"] ?? null,
        ":salas" => $d["salas"] ?? null,
        ":id_curso" => $d["id_curso"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>