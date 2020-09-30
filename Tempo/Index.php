<?php
include('completo.php');

/*
 * Obtendo os dados HG Weather utilizando a funcao hg_request()
 *
 * Consulte nossa documentacao em http://hgbrasil.com/weather
 * Contato: hugodemiglio@hgbrasil.com
 * Copyright 2015 - Hugo Demiglio - @hugodemiglio
 *
*/

// !!! Descomente um dos exemplos abaixo para visualizar !!!

/* 1 - Somente por CID */
// $dados = hg_request(array(
//   'cid' => 'BRXX0198', // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather
// ), $chave);

/* 2 - Por Geo IP (requer chave) */
// $dados = hg_request(array(
//   'user_ip' => $ip
// ), $chave);

/* 3 - Coordenadas GPS (requer chave) */
// $dados = hg_request(array(
//   'user_ip' => $ip,
//   'lat' => '-22.9035',
//   'lon' => '-43.2096'
// ), $chave);

/* 4 - Nome da Cidade (requer chave) */






/* ================================================
 * Função para resgatar os dados da API HG Brasil
 *
 * Parametros:
 *
 * parametros: array, informe os dados que quer enviar para a API
 * chave: string, informe sua chave de acesso
 * endpoint: string, informe qual API deseja acessar, padrao weather (previsao do tempo)
 */