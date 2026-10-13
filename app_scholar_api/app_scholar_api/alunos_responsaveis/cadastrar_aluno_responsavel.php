<?php
require_once __DIR__ . "/../config/cors.php";
require_once __DIR__ . "/../config/conexao.php";
$d=json_decode(file_get_contents("php://input"),true);
if (!is_array($d)||!is_numeric($d["id_alunos"]??null)||!is_numeric($d["id_responsaveis"]??null)) { http_response_code(400); echo json_encode(["erro"=>"Informe IDs válidos de aluno e responsável."]); exit; }
try { $s=$pdo->prepare("INSERT INTO alunos_responsaveis (id_alunos,id_responsaveis) VALUES (:a,:r)"); $s->execute([":a"=>$d["id_alunos"],":r"=>$d["id_responsaveis"]]); http_response_code(201); echo json_encode(["mensagem"=>"Vínculo cadastrado com sucesso!"]); }
catch(PDOException $e){ error_log($e->getMessage()); http_response_code(500); echo json_encode(["erro"=>"Confira se os IDs existem e se o vínculo já foi cadastrado."]); }
?>