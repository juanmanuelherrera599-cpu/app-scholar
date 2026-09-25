<?php

require_once "cors.php";
require_once "conexao.php";

$dados = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE alunos
SET status = 'I'
WHERE id_alunos = :id_alunos";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id_alunos" => $dados["id_alunos"]
]);

echo json_encode([
    "mensagem" => "Aluno desativado com sucesso!"
]);

?>