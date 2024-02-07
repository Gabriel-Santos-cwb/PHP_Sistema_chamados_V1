<?php

$chaveAcesso = 'SUA_CHAVE_DE_ACESSO'; // Substitua pela sua chave de acesso
$url = 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: ' . $chaveAcesso
]);
$response = curl_exec($ch);
curl_close($ch);
$cidades = json_decode($response, true);
foreach ($cidades as $cidade) {
    echo $cidade['nome'] . ', ' . $cidade['microrregiao']['mesorregiao']['UF']['sigla'] . '<br>';
}
?>