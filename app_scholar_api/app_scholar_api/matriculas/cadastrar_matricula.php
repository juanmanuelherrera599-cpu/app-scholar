<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
if (!is_array($d) || !isset($d["data_matricula"]) || $d["data_matricula"] === "" || !isset($d["id_aluno"]) || $d["id_aluno"] === "" || !isset($d["id_turma"]) || $d["id_turma"] === "") {
    http_response_code(400); echo json_encode(["erro"=>"Preencha os campos obrigatórios."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $sql = "INSERT INTO matriculas (data_matricula, situacao, id_aluno, id_turma, status) VALUES (:data_matricula, :situacao, :id_aluno, :id_turma, 'A')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":data_matricula" => $d["data_matricula"] ?? null,
        ":situacao" => $d["situacao"] ?? null,
        ":id_aluno" => $d["id_aluno"] ?? null,
        ":id_turma" => $d["id_turma"] ?? null
    ]);
    http_response_code(201);
    echo json_encode(["mensagem"=>"Registro cadastrado com sucesso!","id"=>$pdo->lastInsertId()], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível cadastrar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>