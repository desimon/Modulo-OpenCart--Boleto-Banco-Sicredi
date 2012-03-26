<?php
/*
* Módulo de Pagamento Boleto Bancário Sicredi
* Feito sobre OpenCart 1.5.1.3
* Autor Guilherme Desimon - http://www.desimon.net
* @01/2012
* Sob licença GPL.
*/
class ModelPaymentBoletoSicredi extends Model {
  	public function getMethod($address) {
		$this->load->language('payment/boleto_sicredi');
		
		if ($this->config->get('boleto_sicredi_status')) {
			//$address = $this->customer->getAddress($this->session->data['payment_address_id']);
			
      		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('boleto_sicredi_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
			
			if (!$this->config->get('boleto_sicredi_geo_zone_id')) {
        		$status = TRUE;
      		} elseif ($query->num_rows) {
      		  	$status = TRUE;
      		} else {
     	  		$status = FALSE;
			}	
      	} else {
			$status = FALSE;
		}
		
		$method_data = array();
	
		if ($status) {  
      		$method_data = array( 
        		'id'         => 'boleto_sicredi',
        		'code'		 => 'boleto_sicredi',
        		'title'      => $this->language->get('text_title'),
				'sort_order' => $this->config->get('boleto_sicredi_sort_order')
      		);
    	}
   
    	return $method_data;
  	}
}
?>