<?php

require_once "cors.php";
require_once "conexao.php";

$sql = "SELECT * FROM alunos";

$stmt = $pdo->query($sql);

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($alunos);

?>