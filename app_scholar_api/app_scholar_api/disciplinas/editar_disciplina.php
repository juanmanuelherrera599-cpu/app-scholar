<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
$id = $d["id_disciplinas"] ?? $d["id"] ?? null;
if (!is_array($d) || !is_numeric($id)) {
    http_response_code(400); echo json_encode(["erro"=>"ID inválido ou não informado."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $stmt = $pdo->prepare("UPDATE disciplinas SET nome = :nome,
        carga_horaria = :carga_horaria,
        id_cursos = :id_cursos,
        id_professores = :id_professores WHERE id_disciplinas = :id");
    $stmt->execute([
        ":nome" => $d["nome"] ?? null,
        ":carga_horaria" => $d["carga_horaria"] ?? null,
        ":id_cursos" => $d["id_cursos"] ?? null,
        ":id_professores" => $d["id_professores"] ?? null,
        ":id" => $id
    ]);
    $check = $pdo->prepare("SELECT id_disciplinas FROM disciplinas WHERE id_disciplinas = :id");
    $check->execute([":id"=>$id]);
    if (!$check->fetch()) { http_response_code(404); echo json_encode(["erro"=>"Registro não encontrado."], JSON_UNESCAPED_UNICODE); }
    else { echo json_encode(["mensagem"=>"Registro atualizado com sucesso!"], JSON_UNESCAPED_UNICODE); }
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível atualizar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>