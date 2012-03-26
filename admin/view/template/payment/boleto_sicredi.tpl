<!--/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.5.1.3
* Autor Guilherme Desimon - http://www.desimon.net
* @01/2012
* Sob licença GPL.
*/-->
<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
  <div class="heading">
    <h1><img src="view/image/payment.png" alt="" /><?php echo $heading_title; ?></h1>
    <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location='<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
</div>
  <div class="content">
	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
    <table class="form">
      <tr>
        <td width="25%"><?php echo $entry_status; ?></td>
        <td><select name="boleto_sicredi_status">
          <?php if ($boleto_sicredi_status) { ?>
          <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
          <option value="0"><?php echo $text_disabled; ?></option>
          <?php } else { ?>
          <option value="1"><?php echo $text_enabled; ?></option>
          <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
          <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td><?php echo $entry_geo_zone; ?></td>
        <td><select name="boleto_sicredi_geo_zone_id">
          <option value="0"><?php echo $text_all_zones; ?></option>
          <?php foreach ($geo_zones as $geo_zone) { ?>
          <?php if ($geo_zone['geo_zone_id'] == $boleto_sicredi_geo_zone_id) { ?>
          <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
          <?php } else { ?>
          <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
          <?php } ?>
          <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td><?php echo $entry_order_status; ?></td>
        <td><select name="boleto_sicredi_order_status_id">
          <?php foreach ($order_statuses as $order_status) { ?>
          <?php if ($order_status['order_status_id'] == $boleto_sicredi_order_status_id) { ?>
          <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
          <?php } else { ?>
          <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
          <?php } ?>
          <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td><?php echo $entry_logo; ?></td>
        <td><input type="text" name="boleto_sicredi_logo" value="<?php echo $boleto_sicredi_logo; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_identificacao; ?></td>
        <td><input type="text" name="boleto_sicredi_identificacao" value="<?php echo $boleto_sicredi_identificacao; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_cpf_cnpj; ?></td>
        <td><input name="boleto_sicredi_cpf_cnpj" type="text" id="boleto_sicredi_cpf_cnpj" value="<?php echo $boleto_sicredi_cpf_cnpj; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_endereco; ?></td>
        <td><input name="boleto_sicredi_endereco" type="text" id="boleto_sicredi_endereco" value="<?php echo $boleto_sicredi_endereco; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_cidade_uf; ?></td>
        <td><input name="boleto_sicredi_cidade_uf" type="text" id="boleto_sicredi_cidade_uf" value="<?php echo $boleto_sicredi_cidade_uf; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_cedente; ?></td>
        <td><input name="boleto_sicredi_cedente" type="text" id="boleto_sicredi_cedente" value="<?php echo $boleto_sicredi_cedente; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_agencia; ?></td>
        <td><input name="boleto_sicredi_agencia" type="text" id="boleto_sicredi_agencia" value="<?php echo $boleto_sicredi_agencia; ?>" maxlength="4" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_conta; ?></td>
        <td><input name="boleto_sicredi_conta" type="text" id="boleto_sicredi_conta" value="<?php echo $boleto_sicredi_conta; ?>" maxlength="7" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_posto; ?></td>
        <td><input name="boleto_sicredi_posto" type="text" id="boleto_sicredi_posto" value="<?php echo $boleto_sicredi_posto; ?>" maxlength="5" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_byte_idt; ?></td>
        <td><input name="boleto_sicredi_byte_idt" type="text" id="boleto_sicredi_byte_idt" value="<?php echo $boleto_sicredi_byte_idt; ?>" maxlength="5" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_carteira; ?></td>
        <td><input name="boleto_sicredi_carteira" type="text" id="boleto_sicredi_carteira" value="<?php echo $boleto_sicredi_carteira; ?>" maxlength="3" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_aceite; ?></td>
        <td><input name="boleto_sicredi_aceite" type="text" id="boleto_sicredi_aceite" value="<?php echo $boleto_sicredi_aceite; ?>" maxlength="1" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_especie_doc; ?></td>
        <td>
          <select name="boleto_sicredi_especie_doc">
            <option value="A" <?php if($boleto_sicredi_especie_doc == "A" || $boleto_sicredi_especie_doc == "") echo "selected=\"selected\"";?>>Duplicata Mercantil por Indicação (DMI)</option>
            <option value="B" <?php if($boleto_sicredi_especie_doc == "B") echo "selected=\"selected\"";?>>Duplicata Rural (DR)</option>
            <option value="C" <?php if($boleto_sicredi_especie_doc == "C") echo "selected=\"selected\"";?>>Nota Promissória (NP)</option>
            <option value="D" <?php if($boleto_sicredi_especie_doc == "D") echo "selected=\"selected\"";?>>Nota Promissória Rural (NR)</option>
            <option value="E" <?php if($boleto_sicredi_especie_doc == "E") echo "selected=\"selected\"";?>>Nota de Seguros (NS)</option>
            <option value="F" <?php if($boleto_sicredi_especie_doc == "F") echo "selected=\"selected\"";?>>Cobrança Seriada – CARNÊ (CS)</option>
            <option value="G" <?php if($boleto_sicredi_especie_doc == "G") echo "selected=\"selected\"";?>>Recibo (RC)</option>
            <option value="H" <?php if($boleto_sicredi_especie_doc == "H") echo "selected=\"selected\"";?>>Letra de Câmbio (LC)</option>
            <option value="I" <?php if($boleto_sicredi_especie_doc == "I") echo "selected=\"selected\"";?>>Nota de Débito (ND)</option>
            <option value="J" <?php if($boleto_sicredi_especie_doc == "J") echo "selected=\"selected\"";?>>Duplicata de Serviço por Indicação (DSI)</option>
            <option value="K" <?php if($boleto_sicredi_especie_doc == "K") echo "selected=\"selected\"";?>>Outros (OS)</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><?php echo $entry_dia_prazo_pg; ?></td>
        <td><input name="boleto_sicredi_dia_prazo_pg" type="text" id="boleto_sicredi_dia_prazo_pg" value="<?php echo $boleto_sicredi_dia_prazo_pg; ?>" maxlength="2" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_taxa_boleto; ?></td>
        <td><input name="boleto_sicredi_taxa_boleto" type="text" id="boleto_sicredi_taxa_boleto" value="<?php echo $boleto_sicredi_taxa_boleto; ?>" maxlength="4" /></td>
      </tr>
      <!--DESCONTO-->
      <!--<tr>
        <td><?php echo $entry_desconto; ?></td>
        <td><input name="boleto_sicredi_desconto" type="text" id="boleto_sicredi_desconto" value="<?php echo $boleto_sicredi_desconto; ?>" maxlength="3" /></td>
      </tr>-->
      <!-- NOSSO NÚMERO -->
      <!--<tr>
        <td><?php echo $entry_nosso_numero; ?></td>
        <td><input name="boleto_sicredi_nosso_numero" type="text" id="boleto_sicredi_nosso_numero" value="<?php echo $boleto_sicredi_nosso_numero; ?>" maxlength="10" /></td>
      </tr>-->
      <tr>
        <td><?php echo $entry_demonstrativo1; ?></td>
        <td><input name="boleto_sicredi_demonstrativo1" type="text" id="boleto_sicredi_demonstrativo1" value="<?php echo $boleto_sicredi_demonstrativo1; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_demonstrativo2; ?></td>
        <td><input name="boleto_sicredi_demonstrativo2" type="text" id="boleto_sicredi_demonstrativo2" value="<?php echo $boleto_sicredi_demonstrativo2; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_demonstrativo3; ?></td>
        <td><input name="boleto_sicredi_demonstrativo3" type="text" id="boleto_sicredi_demonstrativo3" value="<?php echo $boleto_sicredi_demonstrativo3; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_instrucoes1; ?></td>
        <td><input name="boleto_sicredi_instrucoes1" type="text" id="boleto_sicredi_instrucoes1" value="<?php echo $boleto_sicredi_instrucoes1; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_instrucoes2; ?></td>
        <td><input name="boleto_sicredi_instrucoes2" type="text" id="boleto_sicredi_instrucoes2" value="<?php echo $boleto_sicredi_instrucoes2; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_instrucoes3; ?></td>
        <td><input name="boleto_sicredi_instrucoes3" type="text" id="boleto_sicredi_instrucoes3" value="<?php echo $boleto_sicredi_instrucoes3; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_instrucoes4; ?></td>
        <td><input name="boleto_sicredi_instrucoes4" type="text" id="boleto_sicredi_instrucoes4" value="<?php echo $boleto_sicredi_instrucoes4; ?>" /></td>
      </tr>
      <tr>
        <td><?php echo $entry_sort_order; ?></td>
        <td><input type="text" name="boleto_sicredi_sort_order" value="<?php echo $boleto_sicredi_sort_order; ?>" size="1" /></td>
      </tr>
    </table>
 
</form>
</div>
</div>
<script type="text/javascript"><!--
//$.tabs('.tabs a'); 
//--></script>
<?php echo $footer; ?>
