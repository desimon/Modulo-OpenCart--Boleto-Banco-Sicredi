<!--/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.5.1.3
* Autor Guilherme Desimon - http://www.desimon.net
* @01/2012
* Sob licença GPL.
*/-->
<div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;"><?php echo $text_instruction; ?><br />
<br />
<?php
/*$valorBoleto = $valorpedido;
if((!empty($desconto)) AND ($desconto>0)){
	$valorBoleto = $valorBoleto-(($valorBoleto/100)*$desconto);
	 echo '<p>Valor total de '.number_format($valorBoleto, 2, ',', '').' com desconto de '.$desconto.'%</p><br />';
}*/
?>
  <p style="text-align: center;"><a href="index.php?route=payment/boleto_sicredi/callback&order_id=<?php echo $idboleto; ?>" target="_blank"><img src="<?php echo HTTPS_SERVER ?>/boleto/imagens/gerar_boleto_sicredi.png" alt="Gerar Boleto Sicredi" title="Gerar Boleto Sicredi" /></a></p>
  <br />
  <?php echo $text_payment; ?></div>
<div class="buttons">
	<div align="right"><a id="button-confirm" class="button"><span><?php echo $button_continue; ?></span></a></div>
</div>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
  $.ajax({ 
    type: 'GET',
    url: 'index.php?route=payment/boleto_sicredi/confirm',
    success: function() {
      location = '<?php echo $continue; ?>';
    }   
  });
});
--></script>
