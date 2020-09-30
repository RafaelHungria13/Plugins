<?php
/**

* Plugin name: Clima
* Description: Busca o clima pelo nome da cidade
* Version: 1.0
* Author: Rafael Hungria
* Author URI: -

**/

add_shortcode('clima','hg_request');

$chave = '7a4cb65e' ; // Obtenha sua chave de API gratuitamente em http://hgbrasil.com/weather

// Resgata o IP do usuario
$ip = $_SERVER["REMOTE_ADDR"];


function hg_request($parametros, $chave = null, $endpoint = 'weather'){
  $url = 'http://api.hgbrasil.com/'.$endpoint.'/?format=json&';
  
  if(is_array($parametros)){
    // Insere a chave nos parametros
    if(!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));
    
    // Transforma os parametros em URL
    foreach($parametros as $key => $value){
      if(empty($value)) continue;
      $url .= $key.'='.urlencode($value).'&';
    }
    
    // Obtem os dados da API
    $resposta = file_get_contents(substr($url, 0, -1));
    
    return json_decode($resposta, true);
  } else {
    return false;
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Previsão do Tempo - HG Weather</title>
  </head>
  <body>
      <form method="POST">

    <center>
      <div>
      <input type="text" name="Cidade"></input>
      <br>
      <input type="submit"></input>
      </div>
    </center>

  </form>
  <?php
  if (isset($_POST['Cidade'])) {
 $dados = hg_request(array(
   'city_name' => $_POST['Cidade']
 ), $chave);   
  
 ?>

    <?php echo $dados['results']['city']; ?> <?php echo $dados['results']['temp']; ?> ºC<br>
    <?php echo $dados['results']['description']; ?><br>
    Nascer do Sol: <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol: <?php echo $dados['results']['sunset']; ?><br>
    Velocidade do vento: <?php echo $dados['results']['wind_speedy']; ?><br>
    <img src="imagens/<?php echo $dados['results']['img_id']; ?>.png" class="imagem-do-tempo"><br>
    <?php
    }
    ?>
  </body>
</html>