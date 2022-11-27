<?php
include_once('conexao.php');
$nome_idoso = $_POST['nome_idoso'];
$nascimento = $_POST['nascimento'];
$genero = $_POST['genero'];
$alergia = $_POST['alergia'];
$comorbidade = $_POST['comorbidade'];
$obs_idoso = $_POST['obs_idoso'];
$cpf_idoso = $_POST['cpf_idoso'];
$nomeresp = $_POST['nomeresp'];
$telefoneresp = $_POST['telefoneresp'];
$cpf_resp = $_POST['cpf_resp'];
$parentesco = $_POST['parentesco'];
$enderecoresp = $_POST['enderecoresp'];
$data_entrada = $_POST['data_entrada'];
$limitacoes = $_POST['limitacoes'];
$cartao_sus = $_POST['cartao_sus'];

$sql = "INSERT INTO idosos (nome_idoso, nascimento, genero, alergia, comorbidade, obs_idoso, cpf_idoso, nome_resp, telefone_resp, cpf_resp, parentesco, endereco_resp, data_entrada, limitacoes, cartao_sus) 
VALUES ('$nome_idoso', '$nascimento', '$genero', '$alergia', '$comorbidade',  '$obs_idoso', '$cpf_idoso', '$nomeresp', '$telefoneresp', '$cpf_resp', '$parentesco', '$enderecoresp', '$data_entrada', '$limitacoes', '$cartao_sus')";
mysqli_query($con, $sql);
//echo $sql;
header('Location: listaidosos.php');
