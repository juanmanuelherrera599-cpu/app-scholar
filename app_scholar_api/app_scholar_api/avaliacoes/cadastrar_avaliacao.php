<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["descricao"]) || $d["descricao"] === "" || !isset($d["id_disciplinas"]) || $d["id_disciplinas"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO avaliacoes (descricao, data_avaliacao, valor, id_disciplinas, status) VALUES (:descricao, :data_avaliacao, :valor, :id_disciplinas, 'A')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":descricao" => $d["descricao"] ?? null,
        ":data_avaliacao" => $d["data_avaliacao"] ?? null,
        ":valor" => $d["valor"] ?? null,
        ":id_disciplinas" => $d["id_disciplinas"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>