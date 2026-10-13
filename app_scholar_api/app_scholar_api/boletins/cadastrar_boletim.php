<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["id_matriculas"]) || $d["id_matriculas"] === "" || !isset($d["id_avaliacoes"]) || $d["id_avaliacoes"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO boletins (id_matriculas, notas, media_final, situacao_final, frequencia, id_avaliacoes) VALUES (:id_matriculas, :notas, :media_final, :situacao_final, :frequencia, :id_avaliacoes)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id_matriculas" => $d["id_matriculas"] ?? null,
        ":notas" => $d["notas"] ?? null,
        ":media_final" => $d["media_final"] ?? null,
        ":situacao_final" => $d["situacao_final"] ?? null,
        ":frequencia" => $d["frequencia"] ?? null,
        ":id_avaliacoes" => $d["id_avaliacoes"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>