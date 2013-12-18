<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_users');
        $this->load->library('form_validation');
    }

    public function index(){

        $this->login();
    }

    public function login(){

        $this->load->view('login');
    }

    public function login_verify(){

        $this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|callback_validate_creds');
        $this->form_validation->set_rules('password', 'Password', 'required|md5|sha1|xss_clean|trim');

        if($this->form_validation->run()){

            $username = $this->input->post('username');

            $query = $this->mdl_users->get_logged_in_user_data($username);
            foreach($query->result() as $row){
                $role = $row->role;
                $active = $row->active;
            }

            $data = array(
                'username' => $username,
                'logged_in' => 1,
                'role' => $role
            );

            if($active == 1 && $role > 0){
                $this->session->set_userdata($data);
                redirect('login/verified', $data);
            }else{
                $this->login();
            }
        }else{
            $this->login();
        }
    }

    public function validate_creds(){

        if ($this->mdl_users->validate()){
            return true;
        }else{
            $this->form_validation->set_message('validate_creds', 'The login credentials you entered are incorrect, please try again!');
            return false;
        }
    }

    public function verified(){

        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');
            $query = $this->mdl_users->get_logged_in_user_data($username);

            foreach($query->result() as $row){
                $id = $row->id;
                $username = $row->username;
                $firstname = $row->firstname;
                $lastname = $row->lastname;
                $email = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            if($active == 1){
                if($role > 0 && $role < 100){
                    redirect('members');
                }elseif($role == 100){
                    redirect('admin');
                }else{
                    $this->restricted();
                }
            }else{
                $this->restricted();
            }
        }
    }

    public function restricted(){
        $this->load->view('restricted');
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->login();
    }
	
}