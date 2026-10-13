<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["nome"]) || $d["nome"] === "" || !isset($d["cpf"]) || $d["cpf"] === "" || !isset($d["email"]) || $d["email"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO alunos (nome, data_nascimento, cpf, telefone, email, endereco, status) VALUES (:nome, :data_nascimento, :cpf, :telefone, :email, :endereco, 'A')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $d["nome"] ?? null,
        ":data_nascimento" => $d["data_nascimento"] ?? null,
        ":cpf" => $d["cpf"] ?? null,
        ":telefone" => $d["telefone"] ?? null,
        ":email" => $d["email"] ?? null,
        ":endereco" => $d["endereco"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>