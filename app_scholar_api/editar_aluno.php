<?php

require_once "cors.php";
require_once "conexao.php";

$dados = json_decode(file_get_contents("php://input"), true);

$sql = "UPDATE alunos SET
nome = :nome,
data_nascimento = :data_nascimento,
cpf = :cpf,
telefone = :telefone,
email = :email,
endereco = :endereco
WHERE id_alunos = :id_alunos";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":nome" => $dados["nome"],
    ":data_nascimento" => $dados["data_nascimento"],
    ":cpf" => $dados["cpf"],
    ":telefone" => $dados["telefone"],
    ":email" => $dados["email"],
    ":endereco" => $dados["endereco"],
    ":id_alunos" => $dados["id_alunos"]
]);

echo json_encode([
    "mensagem" => "Aluno atualizado com sucesso!"
]);

?>