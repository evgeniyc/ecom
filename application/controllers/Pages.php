<?php
class Pages extends CI_Controller {

	public function view($page = 'about')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				show_404();
		}
		$lang = $this->input->cookie('lang');
		if($lang)
			$lang .= '/';
		$this->load->view($lang.'templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('pages/'.$page);
		$this->load->view($lang.'templates/footer');
	}
}