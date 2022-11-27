<?php
include_once('conexao.php');
$ididoso = $_POST['ididoso'];
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

$sql = "UPDATE idosos SET 
         nome_idoso='$nome_idoso', 
         nascimento='$nascimento', 
         genero='$genero',
         alergia='$alergia' ,
         comorbidade='$comorbidade' ,
         obs_idoso='$obs_idoso' ,
         cpf_idoso='$cpf_idoso',
         nome_resp='$nomeresp' ,
         telefone_resp='$telefoneresp' ,
         cpf_resp='$cpf_resp' ,
         parentesco='$parentesco' ,
         endereco_resp='$enderecoresp' ,
         cartao_sus='$cartao_sus',
         limitacoes='$limitacoes',
         data_entrada='$data_entrada'
     WHERE ididoso='$ididoso'";

mysqli_query($con, $sql);
header('Location: dadoidoso.php?ididoso=' . $ididoso);
echo $sql;
