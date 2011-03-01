<!--/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.4.9.3
* Autor Guilherme Desimon - http://www.desimon.net
* @02/2010
* Sob licença GPL.
*/-->
<div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 10px;"><?php echo $text_instruction; ?><br />
  <br />
  <a href="index.php?route=payment/boleto_sicredi/callback&order_id=<?php echo $idboleto; ?>" target="_blank">Gerar Boleto Sicredi</a><br />
  <br />
  <?php echo $text_payment; ?></div>
<div class="buttons">
  <table>
    <tr>
      <td align="left"><a onclick="location='<?php echo $back; ?>'" class="button"><span><?php echo $button_back; ?></span></a></td>
      <td align="right"><a id="checkout" class="button"><span><?php echo $button_continue; ?></span></a></td>
    </tr>
  </table>
</div>
<script type="text/javascript"><!--
$('#checkout').click(function() {
	$.ajax({ 
		type: 'GET',
		url: 'index.php?route=payment/boleto_sicredi/confirm',
		success: function() {
			location = '<?php echo $continue; ?>';
		}		
	});
});
//--></script>
