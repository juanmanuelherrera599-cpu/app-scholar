<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d = json_decode(file_get_contents("php://input"), true);
$id = $d["id_professores"] ?? $d["id"] ?? null;
if (!is_array($d) || !is_numeric($id)) {
    http_response_code(400); echo json_encode(["erro"=>"ID inválido ou não informado."], JSON_UNESCAPED_UNICODE); exit;
}
try {
    $stmt = $pdo->prepare("UPDATE professores SET status = 'I' WHERE id_professores = :id AND status = 'A'");
    $stmt->execute([":id"=>$id]);
    echo json_encode(["mensagem"=>$stmt->rowCount() ? "Registro desativado com sucesso!" : "Registro não encontrado ou já inativo."], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    error_log($e->getMessage()); http_response_code(500);
    echo json_encode(["erro"=>"Erro ao desativar o registro."], JSON_UNESCAPED_UNICODE);
}
?>