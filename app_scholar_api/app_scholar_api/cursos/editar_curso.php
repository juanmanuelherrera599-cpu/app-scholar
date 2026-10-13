<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
$id = $d["id_cursos"] ?? $d["id"] ?? null;
if (!is_array($d) || !is_numeric($id)) {
    http_response_code(400); echo json_encode(["erro"=>"ID inválido ou não informado."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $stmt = $pdo->prepare("UPDATE cursos SET nome = :nome,
        carga_horaria = :carga_horaria,
        duracao = :duracao,
        descricao = :descricao,
        id_coordenadores = :id_coordenadores WHERE id_cursos = :id");
    $stmt->execute([
        ":nome" => $d["nome"] ?? null,
        ":carga_horaria" => $d["carga_horaria"] ?? null,
        ":duracao" => $d["duracao"] ?? null,
        ":descricao" => $d["descricao"] ?? null,
        ":id_coordenadores" => $d["id_coordenadores"] ?? null,
        ":id" => $id
    ]);
    $check = $pdo->prepare("SELECT id_cursos FROM cursos WHERE id_cursos = :id");
    $check->execute([":id"=>$id]);
    if (!$check->fetch()) { http_response_code(404); echo json_encode(["erro"=>"Registro não encontrado."], JSON_UNESCAPED_UNICODE); }
    else { echo json_encode(["mensagem"=>"Registro atualizado com sucesso!"], JSON_UNESCAPED_UNICODE); }
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível atualizar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>