<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
try {
$stmt = $pdo->query("SELECT ar.id_alunos, ar.id_responsaveis, a.nome AS aluno, r.nome AS responsavel FROM alunos_responsaveis ar INNER JOIN alunos a ON a.id_alunos=ar.id_alunos INNER JOIN responsaveis r ON r.id_responsaveis=ar.id_responsaveis");
echo json_encode($stmt->fetchAll(), JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) { error_log($e->getMessage()); http_response_code(500); echo json_encode(["erro"=>"Erro ao consultar vínculos."], JSON_UNESCAPED_UNICODE); }
?>