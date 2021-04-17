<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        if ($_POST['email'] && $_POST['password']) {
            $user = $this->db->where('email', $_POST['email'])
                            ->where('password', md5($_POST['password']))
                            ->get('users')->row();
            if ($user) {//If User exists
                //Set Session
                $data = array(
                    'id' => $user->uid,
                    'name' => $user->name
                );
                $this->session->set_userdata($data);
                $this->load_account();
            } else {
                redirect('?status=Incorrect Email or Password');
            }
        } else {
            redirect('?status=Incorrect Email or Password');
        }
    }

    public function load_account() {
        if ($_SESSION['id']) {
            $this->load->view('account_page');
        } else {
            redirect('');
        }
    }

    public function register_user() {
        if (!empty($_POST['name'])) {
            $data = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'mobile' => $_POST['mobile']
            );
            $res = $this->db->insert('users', $data);
            if ($res) {
                redirect('?status=registered');
            } else {
                redirect('?status=not_registered');
            }
        } else {
            $this->load->view('register');
        }
    }

    public function edit_profile($id) {
        $data['user'] = $this->db->where('uid', $id)->get('users')->row();
        $this->load->view('edit_profile', $data);
    }

    public function update_user() {
        $data = array(
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'mobile' => $_POST['mobile']
        );
        $this->db->where('uid', $_SESSION['id']);
        $result = $this->db->update('users', $data);

        if ($result) {
            redirect('User/load_account');
        } else {
            $this->load->view('edit_profile');
        }
    }

    public function logout() {
        session_destroy();
        redirect('');
    }

    public function userform() {
        $this->load->view('demo');
    }

    public function submit_data() {
        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $form_data = array('name' => $name,
            'email' => $email
        );
        $str = http_build_query($form_data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://localhost/myapp1/index.php/User/submit_data1");

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        echo $output;

       
        // $this->load->view('demo1');
    }

}
