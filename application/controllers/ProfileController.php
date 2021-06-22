<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        need_login('username');
        $this->load->model('AuthModel');
        $this->load->model('ProfileModel');
    }

    /**
     * Index function
     *
     * @return void
     */
    public function index(): void
    {
        $data = [
            'title' =>  'Profile',
            'page'  =>  'profile/index',
        ];
        render('core', $data);
    }

    /**
     * Change Password method controller
     *
     * @return void
     */
    public function change_password(): void
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('repeat_new_password', 'Ulangi Password Baru', 'required|matches[new_password]');
        if ($this->form_validation->run() == true) {
            $post_data = [
                'current_password'  =>  $this->input->post('current_password'),
                'new_password'  =>  $this->input->post('new_password'),
                'repeat_new_password'  =>  $this->input->post('repeat_new_password'),
            ];
            echo $this->AuthModel->change_password($post_data);
        } else {
            $feedback_data = [
                'error' =>  true,
                'current_password_error'  =>  form_error('current_password'),
                'new_password_error'  =>  form_error('new_password'),
                'repeat_new_password_error'  =>  form_error('repeat_new_password'),
            ];
            echo json_encode($feedback_data);
        }
    }

    /**
     * Change address method controller
     *
     * @return void
     */
    public function change_address(): void
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('repeat_new_password', 'Ulangi Password Baru', 'required|matches[new_password]');
        if ($this->form_validation->run() == false) {
            // $data = [
            //     'title' =>  'Ubah Password',
            //     'page'  =>  'profile/change_password',
            // ];
            // render('core', $data);
            redirect('profile');
        } else {
            $this->AuthModel->change_password();
        }
    }

    /**
     * Change email method controller
     *
     * @return void
     */
    public function change_email(): void
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email]');
        if ($this->form_validation->run() == true) {
            $post_data = [
                'email'  =>  $this->input->post('email'),
            ];
            echo $this->AuthModel->change_email($post_data);
        } else {
            $feedback_data = [
                'error' =>  true,
                'email_error'  =>  form_error('email'),
            ];
            echo json_encode($feedback_data);
        }
    }

    public function change_picture(): void
    {
        $config['upload_path']          =   './assets/img/photo/';
        $config['allowed_types']        =   'gif|jpg|png';
        $config['max_size']             =   2048;
        $config['encrypt_name']         =   true;
        $config['file_ext_tolower']         =   true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('photo')) {
            $new_image = base_url('assets/img/photo/' . $this->upload->data('file_name'));
            $post_data = [
                'new_image' =>  $new_image,
            ];
            header('Content-Type: application/json');
            echo $this->ProfileModel->change_picture($post_data);
        } else {

            $feedback_data = [
                'success'   =>  true,
                'status'    =>  401,
                'message'   =>  $this->bootstrapcss->alert('warning', strip_tags($this->upload->display_errors()), true),
            ];
            header('Content-Type: application/json');
            echo json_encode($feedback_data);
        }
    }
}
