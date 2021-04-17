<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admin/admin_login');
    }

    public function admin_login() {
        if ($_POST['username'] && $_POST['password']) {
            $user = $this->db->where('username', $_POST['username'])
                            ->where('password', md5($_POST['password']))
                            ->get('admin_users')->row();
            if ($user) {//If User exists
                //Set Session
                $data = array(
                    'id' => $user->admin_id,
                    'name' => $user->username
                );
                $this->session->set_userdata($data);
                $this->load_admin_account();
            } else {
                redirect('?status=Incorrect Username or Password');
            }
        } else {
            redirect('?status=Incorrect Username or Password');
        }
    }

    public function load_admin_account() {
        if ($_SESSION['id']) {
            $this->load->view('admin/admin_account_page');
        } else {
            redirect('Admin/');
        }
    }

    public function view_users() {
        $this->load->view('admin/all_users');
    }

    public function delete_user($uid) {
        $this->db->where('uid', $uid)->delete('users');
        redirect('Admin/view_users');
    }

    public function edit_user($uid) {
        $data['user'] = $this->db->where('uid', $uid)->get('users')->row();
        $this->load->view('admin/edit_user', $data);
    }

    public function update_user() {
        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile']
        );
        $this->db->where('uid', $_POST['uid']);
        $result = $this->db->update('users', $data);

        if ($result) {
            redirect('Admin/view_users');
        } else {
            redirect('Admin/edit_user' . $_POST['uid']);
        }
    }
    
    public function logout(){
        session_destroy();
        redirect('Admin/');
    }

}
