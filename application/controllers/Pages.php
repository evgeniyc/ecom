<?php
class Pages extends CI_Controller {

	public function view($page = 'about')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
				// Whoops, we don't have a page for that!
				show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('sidebars/sidebar1');
		$this->load->view('pages/'.$page);
		$this->load->view('templates/footer');
	}
}