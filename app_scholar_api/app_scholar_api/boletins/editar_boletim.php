<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
$id = $d["id_boletins"] ?? $d["id"] ?? null;
if (!is_array($d) || !is_numeric($id)) {
    http_response_code(400); echo json_encode(["erro"=>"ID inválido ou não informado."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $stmt = $pdo->prepare("UPDATE boletins SET id_matriculas = :id_matriculas,
        notas = :notas,
        media_final = :media_final,
        situacao_final = :situacao_final,
        frequencia = :frequencia,
        id_avaliacoes = :id_avaliacoes WHERE id_boletins = :id");
    $stmt->execute([
        ":id_matriculas" => $d["id_matriculas"] ?? null,
        ":notas" => $d["notas"] ?? null,
        ":media_final" => $d["media_final"] ?? null,
        ":situacao_final" => $d["situacao_final"] ?? null,
        ":frequencia" => $d["frequencia"] ?? null,
        ":id_avaliacoes" => $d["id_avaliacoes"] ?? null,
        ":id" => $id
    ]);
    $check = $pdo->prepare("SELECT id_boletins FROM boletins WHERE id_boletins = :id");
    $check->execute([":id"=>$id]);
    if (!$check->fetch()) { http_response_code(404); echo json_encode(["erro"=>"Registro não encontrado."], JSON_UNESCAPED_UNICODE); }
    else { echo json_encode(["mensagem"=>"Registro atualizado com sucesso!"], JSON_UNESCAPED_UNICODE); }
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Não foi possível atualizar. Confira os dados e os vínculos relacionados."], JSON_UNESCAPED_UNICODE);
}
?>