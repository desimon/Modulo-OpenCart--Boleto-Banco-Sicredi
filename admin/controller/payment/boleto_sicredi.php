<?php 
/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.5.1.3
* Autor Guilherme Desimon - http://www.desimon.net
* @01/2012
* Sob licença GPL.
*/
class ControllerPaymentBoletoSicredi extends Controller {
	private $error = array(); 

	public function index() {
		$this->load->language('payment/boleto_sicredi');

		//$this->document->title = $this->language->get('heading_title');
		
		$this->load->model('setting/setting');
			
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');
			
			$this->model_setting_setting->editSetting('boleto_sicredi', $this->request->post);				
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');		
		
		$this->data['text_approved'] = $this->language->get('text_approved');
		$this->data['text_declined'] = $this->language->get('text_declined');
		$this->data['text_off'] = $this->language->get('text_off');

		$this->data['entry_logo'] = $this->language->get('entry_logo');
		$this->data['entry_identificacao'] = $this->language->get('entry_identificacao');
		$this->data['entry_cpf_cnpj'] = $this->language->get('entry_cpf_cnpj');
		$this->data['entry_endereco'] = $this->language->get('entry_endereco');
		$this->data['entry_cidade_uf'] = $this->language->get('entry_cidade_uf');
		$this->data['entry_cedente'] = $this->language->get('entry_cedente');
		$this->data['entry_agencia'] = $this->language->get('entry_agencia');
		$this->data['entry_conta'] = $this->language->get('entry_conta');
		$this->data['entry_aceite'] = $this->language->get('entry_aceite');
		$this->data['entry_carteira'] = $this->language->get('entry_carteira');
		$this->data['entry_dia_prazo_pg'] = $this->language->get('entry_dia_prazo_pg');
		$this->data['entry_taxa_boleto'] = $this->language->get('entry_taxa_boleto');
		$this->data['entry_nosso_numero'] = $this->language->get('entry_nosso_numero');
		$this->data['entry_posto'] = $this->language->get('entry_posto');
		$this->data['entry_byte_idt'] = $this->language->get('entry_byte_idt');
		$this->data['entry_especie_doc'] = $this->language->get('entry_especie_doc');

		$this->data['entry_demonstrativo1'] = $this->language->get('entry_demonstrativo1');
		$this->data['entry_demonstrativo2'] = $this->language->get('entry_demonstrativo2');
		$this->data['entry_demonstrativo3'] = $this->language->get('entry_demonstrativo3');
		$this->data['entry_instrucoes1'] = $this->language->get('entry_instrucoes1');
		$this->data['entry_instrucoes2'] = $this->language->get('entry_instrucoes2');
		$this->data['entry_instrucoes3'] = $this->language->get('entry_instrucoes3');
		$this->data['entry_instrucoes4'] = $this->language->get('entry_instrucoes4');
		
		//DESCONTO	
		$this->data['boleto_sicredi_desconto'] = $this->language->get('boleto_sicredi_desconto');
				
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');		
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

		//$this->data['error_warning'] = @$this->error['warning'];
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['breadcrumbs'] = array();
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),      		
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/boleto_sicredi', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

				
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/boleto_sicredi&token=' . $this->session->data['token'];
		
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];
		
		if (isset($this->request->post['boleto_sicredi_logo'])) {
			$this->data['boleto_sicredi_logo'] = $this->request->post['boleto_sicredi_logo'];
		} else {
			$this->data['boleto_sicredi_logo'] = $this->config->get('boleto_sicredi_logo');
		}
		
		if (isset($this->request->post['boleto_sicredi_identificacao'])) {
			$this->data['boleto_sicredi_identificacao'] = $this->request->post['boleto_sicredi_identificacao'];
		} else {
			$this->data['boleto_sicredi_identificacao'] = $this->config->get('boleto_sicredi_identificacao');
		}

		if (isset($this->request->post['boleto_sicredi_cpf_cnpj'])) {
			$this->data['boleto_sicredi_cpf_cnpj'] = $this->request->post['boleto_sicredi_cpf_cnpj'];
		} else {
			$this->data['boleto_sicredi_cpf_cnpj'] = $this->config->get('boleto_sicredi_cpf_cnpj');
		}

		if (isset($this->request->post['boleto_sicredi_endereco'])) {
			$this->data['boleto_sicredi_endereco'] = $this->request->post['boleto_sicredi_endereco'];
		} else {
			$this->data['boleto_sicredi_endereco'] = $this->config->get('boleto_sicredi_endereco');
		}

		if (isset($this->request->post['boleto_sicredi_cidade_uf'])) {
			$this->data['boleto_sicredi_cidade_uf'] = $this->request->post['boleto_sicredi_cidade_uf'];
		} else {
			$this->data['boleto_sicredi_cidade_uf'] = $this->config->get('boleto_sicredi_cidade_uf');
		}

		if (isset($this->request->post['boleto_sicredi_cedente'])) {
			$this->data['boleto_sicredi_cedente'] = $this->request->post['boleto_sicredi_cedente'];
		} else {
			$this->data['boleto_sicredi_cedente'] = $this->config->get('boleto_sicredi_cedente');
		}
		
		if (isset($this->request->post['boleto_sicredi_agencia'])) {
			$this->data['boleto_sicredi_agencia'] = $this->request->post['boleto_sicredi_agencia'];
		} else {
			$this->data['boleto_sicredi_agencia'] = $this->config->get('boleto_sicredi_agencia');
		}
		
		if (isset($this->request->post['boleto_sicredi_conta'])) {
			$this->data['boleto_sicredi_conta'] = $this->request->post['boleto_sicredi_conta'];
		} else {
			$this->data['boleto_sicredi_conta'] = $this->config->get('boleto_sicredi_conta');
		}

		if (isset($this->request->post['boleto_sicredi_posto'])) {
			$this->data['boleto_sicredi_posto'] = $this->request->post['boleto_sicredi_posto'];
		} else {
			$this->data['boleto_sicredi_posto'] = $this->config->get('boleto_sicredi_posto');
		}
		
		if (isset($this->request->post['boleto_sicredi_byte_idt'])) {
			$this->data['boleto_sicredi_byte_idt'] = $this->request->post['boleto_sicredi_byte_idt'];
		} else {
			$this->data['boleto_sicredi_byte_idt'] = $this->config->get('boleto_sicredi_byte_idt');
		}
		
		if (isset($this->request->post['boleto_sicredi_especie_doc'])) {
			$this->data['boleto_sicredi_especie_doc'] = $this->request->post['boleto_sicredi_especie_doc'];
		} else {
			$this->data['boleto_sicredi_especie_doc'] = $this->config->get('boleto_sicredi_especie_doc');
		}

		
		if (isset($this->request->post['boleto_sicredi_aceite'])) {
			$this->data['boleto_sicredi_aceite'] = $this->request->post['boleto_sicredi_aceite'];
		} else {
			$this->data['boleto_sicredi_aceite'] = $this->config->get('boleto_sicredi_aceite');
		}
		
		if (isset($this->request->post['boleto_sicredi_carteira'])) {
			$this->data['boleto_sicredi_carteira'] = $this->request->post['boleto_sicredi_carteira'];
		} else {
			$this->data['boleto_sicredi_carteira'] = $this->config->get('boleto_sicredi_carteira');
		}

			if (isset($this->request->post['boleto_sicredi_dia_prazo_pg'])) {
			$this->data['boleto_sicredi_dia_prazo_pg'] = $this->request->post['boleto_sicredi_dia_prazo_pg'];
		} else {
			$this->data['boleto_sicredi_dia_prazo_pg'] = $this->config->get('boleto_sicredi_dia_prazo_pg');
		}
			if (isset($this->request->post['boleto_sicredi_taxa_boleto'])) {
			$this->data['boleto_sicredi_taxa_boleto'] = $this->request->post['boleto_sicredi_taxa_boleto'];
		} else {
			$this->data['boleto_sicredi_taxa_boleto'] = $this->config->get('boleto_sicredi_taxa_boleto');
		}
			if (isset($this->request->post['boleto_sicredi_nosso_numero'])) {
			$this->data['boleto_sicredi_nosso_numero'] = $this->request->post['boleto_sicredi_nosso_numero'];
		} else {
			$this->data['boleto_sicredi_nosso_numero'] = $this->config->get('boleto_sicredi_nosso_numero');
		}

		if (isset($this->request->post['boleto_sicredi_demonstrativo1'])) {
			$this->data['boleto_sicredi_demonstrativo1'] = $this->request->post['boleto_sicredi_demonstrativo1'];
		} else {
			$this->data['boleto_sicredi_demonstrativo1'] = $this->config->get('boleto_sicredi_demonstrativo1');
		}
		if (isset($this->request->post['boleto_sicredi_demonstrativo2'])) {
			$this->data['boleto_sicredi_demonstrativo2'] = $this->request->post['boleto_sicredi_demonstrativo2'];
		} else {
			$this->data['boleto_sicredi_demonstrativo2'] = $this->config->get('boleto_sicredi_demonstrativo2');
		}
		if (isset($this->request->post['boleto_sicredi_demonstrativo3'])) {
			$this->data['boleto_sicredi_demonstrativo3'] = $this->request->post['boleto_sicredi_demonstrativo3'];
		} else {
			$this->data['boleto_sicredi_demonstrativo3'] = $this->config->get('boleto_sicredi_demonstrativo3');
		}
		if (isset($this->request->post['boleto_sicredi_instrucoes1'])) {
			$this->data['boleto_sicredi_instrucoes1'] = $this->request->post['boleto_sicredi_instrucoes1'];
		} else {
			$this->data['boleto_sicredi_instrucoes1'] = $this->config->get('boleto_sicredi_instrucoes1');
		}
		if (isset($this->request->post['boleto_sicredi_instrucoes2'])) {
			$this->data['boleto_sicredi_instrucoes2'] = $this->request->post['boleto_sicredi_instrucoes2'];
		} else {
			$this->data['boleto_sicredi_instrucoes2'] = $this->config->get('boleto_sicredi_instrucoes2');
		}
		if (isset($this->request->post['boleto_sicredi_instrucoes3'])) {
			$this->data['boleto_sicredi_instrucoes3'] = $this->request->post['boleto_sicredi_instrucoes3'];
		} else {
			$this->data['boleto_sicredi_instrucoes3'] = $this->config->get('boleto_sicredi_instrucoes3');
		}
		
		if (isset($this->request->post['boleto_sicredi_instrucoes4'])) {
			$this->data['boleto_sicredi_instrucoes4'] = $this->request->post['boleto_sicredi_instrucoes4'];
		} else {
			$this->data['boleto_sicredi_instrucoes4'] = $this->config->get('boleto_sicredi_instrucoes4');
		}		
		
		if (isset($this->request->post['boleto_sicredi_order_status_id'])) {
			$this->data['boleto_sicredi_order_status_id'] = $this->request->post['boleto_sicredi_order_status_id'];
		} else {
			$this->data['boleto_sicredi_order_status_id'] = $this->config->get('boleto_sicredi_order_status_id'); 
		} 
		
		//DESCONTO
		if (isset($this->request->post['boleto_sicredi_desconto'])) {
			$this->data['boleto_sicredi_desconto'] = $this->request->post['boleto_sicredi_desconto'];
		} else {
			$this->data['boleto_sicredi_desconto'] = $this->config->get('boleto_sicredi_desconto'); 
		} 
		
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['boleto_sicredi_geo_zone_id'])) {
			$this->data['boleto_sicredi_geo_zone_id'] = $this->request->post['boleto_sicredi_geo_zone_id'];
		} else {
			$this->data['boleto_sicredi_geo_zone_id'] = $this->config->get('boleto_sicredi_geo_zone_id'); 
		} 
		
		$this->load->model('localisation/geo_zone');
										
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['boleto_sicredi_status'])) {
			$this->data['boleto_sicredi_status'] = $this->request->post['boleto_sicredi_status'];
		} else {
			$this->data['boleto_sicredi_status'] = $this->config->get('boleto_sicredi_status');
		}
		
		if (isset($this->request->post['boleto_sicredi_sort_order'])) {
			$this->data['boleto_sicredi_sort_order'] = $this->request->post['boleto_sicredi_sort_order'];
		} else {
			$this->data['boleto_sicredi_sort_order'] = $this->config->get('boleto_sicredi_sort_order');
		}

		//$this->id       = 'content';
		$this->template = 'payment/boleto_sicredi.tpl';
		//$this->layout   = 'common/layout';
 		//$this->render();
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/boleto_sicredi')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>