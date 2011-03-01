<?php
/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.4.9.3
* Autor Guilherme Desimon - http://www.desimon.net
* @02/2010
* Sob licença GPL.
*/
// Heading
$_['heading_title'] = 'Boleto Banc&aacute;rio Sicredi';

// Text
$_['text_payment'] = 'Pagamento';
$_['text_success'] = 'Sucesso: Voc&ecirc; modificou os detalhes do Boleto Bancario Sicredi';
$_['text_boleto_sicredi'] = '<img src="view/image/payment/boleto-sicredi.png" alt="Boleto Sicredi" title="Boleto Sicredi" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_development'] = '<span style="color: green;">Ready</span>';
$_['text_approved'] = 'Em (Aprovado)';
$_['text_declined'] = 'On (Recusado)';
$_['text_off'] = 'Off';

// Entry
$_['entry_logo'] = 'URL da sua Logomarca (http://....):';
$_['entry_order_status'] = 'Status inicial do pedido:';
$_['entry_aceite'] = 'Aceite (S ou N): <br /> <strong>N</strong> - remeter cobrança sem aceite do sacado  (cobranças não-registradas)<br /> <strong>S</strong> - remeter cobrança apos aceite do sacado (cobranças registradas)';
$_['entry_identificacao']= 'Noma da loja:';
$_['entry_cpf_cnpj'] = 'CPF ou CNPJ:';
$_['entry_endereco'] = 'Endere&ccedil;o da Loja:';
$_['entry_cidade_uf'] = 'Cidade / Estado:';
$_['entry_cedente'] = 'Nome Cedente - Raz&#227;o Social:';

$_['entry_agencia'] = 'Ag&ecirc;ncia (4 d&iacute;gitos, <strong>sem</strong> d&iacute;gito verificador):';
$_['entry_conta'] = 'Conta (5 d&iacute;gitos, <strong>com</strong> d&iacute;gito verificador - ex: 12345-6):';
$_['entry_carteira'] = 'Carteira:';
$_['entry_dia_prazo_pg'] = 'Prazo Pagamento em dias (ex: 5):';
$_['entry_taxa_boleto'] = 'Taxa do Boleto em Reais (ex: 2.60):';
$_['entry_nosso_numero'] = 'Nosso n&uacute;mero (m&aacute;x. 5 d&iacute;gitos):';
$_['entry_posto'] = 'Código do posto da cooperativa de crédito:'; 
$_['entry_byte_idt'] = 'Byte de Identifica&ccedil;o do cedente do bloqueto utilizado para compor o nosso n&uacute;mero:<br><strong>1</strong> - Identifica&ccedil;o emitente: Cooperativa <br> <strong>2 a 9</strong> - Identifica&ccedil;o emitente: Cedente'; 
$_['entry_especie_doc'] = 'Espécie de documento:'; 

$_['entry_demonstrativo1'] = 'Demonstrativo 1:';
$_['entry_demonstrativo2'] = 'Demonstrativo 2:';
$_['entry_demonstrativo3'] = 'Demonstrativo 3:';
$_['entry_instrucoes1'] = 'Instru&ccedil;&otilde;es 1:';
$_['entry_instrucoes2'] = 'Instru&ccedil;&otilde;es 2:';
$_['entry_instrucoes3'] = 'Instru&ccedil;&otilde;es 3:';
$_['entry_instrucoes4'] = 'Instru&ccedil;&otilde;es 4:';



$_['entry_geo_zone'] = 'Zona Geografica:';
$_['entry_status'] = 'Status:';
$_['entry_sort_order'] = 'Ordem de exibi&ccedil;&#227;o:';

// Error
$_['error_permission'] = 'ERRO: Voc&ecirc; n&#227;o tem primis&#227;o para modificar Boleto Bancario Banco do Brasil!';
//$_['error_client'] = 'Client ID Required!';
//$_['error_user'] = 'User ID Required!';
//$_['error_password'] = 'Password Required!';
//$_['error_gateway'] = 'Gateway Path Required!';
//$_['error_pas'] = 'PAS Path Required!';
?>