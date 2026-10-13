<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["nome"]) || $d["nome"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO cursos (nome, carga_horaria, duracao, descricao, id_coordenadores, status) VALUES (:nome, :carga_horaria, :duracao, :descricao, :id_coordenadores, 'A')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $d["nome"] ?? null,
        ":carga_horaria" => $d["carga_horaria"] ?? null,
        ":duracao" => $d["duracao"] ?? null,
        ":descricao" => $d["descricao"] ?? null,
        ":id_coordenadores" => $d["id_coordenadores"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>