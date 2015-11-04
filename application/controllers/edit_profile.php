<?php if ( ! defined ('BASEPATH')) exit('No direct script access allowed');

class edit_profile extends CI_Controller
 {

<<<<<<< HEAD
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

=======
>>>>>>> Williams-branch
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_check_unique');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_unique');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('DOB', 'DOB', 'required');

		$email = $this->session->userdata('email');
		$this->load->model('edit_profile_model');
		$data = $this->edit_profile_model->get_user_info($email);

		if($this->form_validation->run())
		{
			$this->edit_profile_model->edit_info();
			redirect('feed');
		}

		$this->load->view('template/header');
		$this->load->view('user/edit_profile_view', $data);
		$this->load->view('template/footer');

	}

	function check_unique()
	{
		$result = $this->edit_profile_model->is_unique();
		if($result == 'email')
		{
			$this->form_validation->set_message('check_unique', 'That email is associated with a different account.');
			return false;
		}
		if($result == 'username')
		{
			$this->form_validation->set_message('check_unique', 'That username is associated with a different account.');
			return false;
		}
		return true;
	}
}