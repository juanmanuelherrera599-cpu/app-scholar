<?php

require_once "cors.php";
require_once "conexao.php";

$dados = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO alunos
(nome, data_nascimento, cpf, telefone, email, endereco)
VALUES
(:nome, :data_nascimento, :cpf, :telefone, :email, :endereco)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ":nome" => $dados["nome"],
    ":data_nascimento" => $dados["data_nascimento"],
    ":cpf" => $dados["cpf"],
    ":telefone" => $dados["telefone"],
    ":email" => $dados["email"],
    ":endereco" => $dados["endereco"]
]);

echo json_encode([
    "mensagem" => "Aluno cadastrado com sucesso!"
]);

?>