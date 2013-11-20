<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_users');
    }

    public function index(){

        if($this->session->userdata('logged_in')){

            $username = $this->session->userdata('username');
            $query = $this->mdl_users->get_logged_in_user_data($username);

            foreach($query->result() as $row){
                $id = $row->id;
                $data['username'] = $row->username;
                $firstname = $row->firstname;
                $lastname = $row->lastname;
                $email = $row->email;
                $role = $row->role;
                $active = $row->active;
            }

            // If logged in user is a Member role
            if($active == 1 && $role == 1){
                redirect('members');
                // If logged in user is an Admin role
            }elseif($active == 1 && $role == 100){
                $this->admin();
            }else{
                redirect('login/restricted');
            }
        }else{
            redirect('login/restricted');
        }
    }

    public function admin(){

        $this->load->view('admin_area');
    }

    public function users(){
        $data['query'] = $this->mdl_users->get_all_users();
        $this->load->view('users', $data);
    }

    public function user($username){

        if($this->session->userdata('logged_in')){

            $admin = $this->session->userdata('username');
            $query = $this->mdl_users->get_logged_in_user_data($admin);

            foreach($query->result() as $row){
                $role = $row->role;
            }

            if($role == 100){

                $this->load->model('mdl_users');
                $query = $this->mdl_users->get_user_details($username);

                foreach($query->result() as $row){
                    $data['username'] = $row->username;
                    $data['firstname'] = $row->firstname;
                    $data['lastname'] = $row->lastname;
                    $data['email'] = $row->email;
                    $data['role'] = $row->role;
                    $data['active'] = $row->active;
                }

                $this->load->view('user_details', $data);
            }else{ echo "You are not an admin"; }
        }else{ echo "You are not logged in";}
    }
}