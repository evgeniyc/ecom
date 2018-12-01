<?php
class Langs extends CI_Controller {

	public function setLang($lang)
	{
		if($lang == 1):
			$this->input->set_cookie('lang', 'ukrainian', '8500');
		elseif($lang == 2):
			$this->input->set_cookie('lang', 'russian', '8500');
		endif;
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}