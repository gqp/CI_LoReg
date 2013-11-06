<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->register();

    }

    public function register()
    {
        $this->load->view('register');
    }

    public function submit(){



		// Email Settings
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.perfora.net',
            'smtp_user' => 'gp@garrickplaisted.com',
            'smtp_pass' => 'nedyac0920',
            'smtp_port' => 587,
            'charset' => 'utf-8',
            'mailtype' => 'html',
            'validate' => 'FALSE',
            'useragent' => 'none',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );

        $this->load->library('email', $config);
        $this->load->library('form_validation');
		$this->load->model('mdl_users');
		
		
        $this->form_validation->set_rules('firstname','Firstname','required|min_length[3]|xss_clean|trim');
        $this->form_validation->set_rules('lastname','Lastname','required|min_length[3]|xss_clean|trim');
        $this->form_validation->set_rules('email','Email','required|xss_clean}valid_email|trim|is_unique[users.email]');
        $this->form_validation->set_rules('username','Username','required|min_length[3]|xss_clean|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required|min_length[3]|xss_clean|trim');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|min_length[3]|xss_clean|matches[password]');
		
		$this->form_validation->set_message('is_unique', '%s is already registered, please try again.');

        if ($this->form_validation->run()){
            
			//Generate random encrypted key
			$key = random_string('unique');

			$this->email->from('gp@garrickplaisted.com', 'Garrick');
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirm your registration with us!");
			
			$message = "<p>Thank you for registering with us</p>";
			$message .= "<p><a href='".base_url('register/confirm')."/$key'>Click here</a> to confirm your registration.</p>";
			
			$this->email->message($message);
			
			
			if($this->mdl_users->add_user($key)){
				//Send Email and if added to db
				if($this->email->send()){
					$this->load->view('confirmation_thanks');
				}else{
					echo 'Something went wrong.';
				}
			}else{
				echo 'user not added';
			}

        }else{
            $this->load->view('register');
        }
    }
	
	public function confirm($key){
		$this->load->model('mdl_users');
		
		if($this->mdl_users->is_key_valid($key)){
			if($this->mdl_users->confirm_update($key)){
				
				$data['message'] = 'Awesome, you confirmed your registration! Now you can login.';
				$this->load->view('login', $data);
			}
			
		}else{
			echo "Not valid key";
		}
    }

}