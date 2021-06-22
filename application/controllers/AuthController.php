<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * AuthController
 * 
 * @see https://codeigniter.com/userguide3/general/controllers.html
 */
class AuthController extends CI_Controller
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    /**
     * Login Method Function
     *
     * @return void
     */
    public function login(): void
    {
        // validasi ketika user sudah login, tidak bisa kembali mengakses halaman login lagi.
        if (!empty($this->session->userdata('username'))) {
            redirect('', 'auto', 301);
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // jika form validation tidak berjalan
        if ($this->form_validation->run() == false) {
            $data = [
                'title' =>  'Login',
                'page'  =>  'auth/login',
            ];
            $this->load->view('core', $data);
        } else {
            $this->_loginProcess();
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function register(): void
    {
        // validasi form Nama
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');

        // validasi form NIM
        $this->form_validation->set_rules('nim', 'NIM (Nomor Induk Mahasiswa)', 'trim|required|numeric|is_unique[tb_student.nim]|max_length[10]|min_length[7]');

        // validasi form Program Studi
        $this->form_validation->set_rules('study_program', 'Program Studi', 'required|in_list[Sistem Informasi,Teknik Informatika]');

        /** validasi form Tempat Lahir */
        $this->form_validation->set_rules('place_birth', 'Tempat Lahir', 'required');

        // validasi form Tanggal Lahir
        $this->form_validation->set_rules('date_birth', 'Tanggal Lahir', 'required');

        // validasi form Jenis Kelamin
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|in_list[MALE,FEMALE]');

        // validasi form Provinsi
        $this->form_validation->set_rules('province', 'Provinsi', 'required');

        // validasi form Kota / Kabupaten
        $this->form_validation->set_rules('district', 'Kota / Kabupaten', 'required');

        // validasi form Kecamatan
        $this->form_validation->set_rules('sub_district', 'Kecamatan', 'required');

        // validasi form Kelurahan
        $this->form_validation->set_rules('urban_village', 'Kelurahan / Desa', 'required');

        // validasi form Detail Alamat
        $this->form_validation->set_rules('address', 'Detail Alamat', 'required');

        // validasi form Username
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|is_unique[tb_user.username]');

        // validasi form email
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]');

        // validasi form Telepon
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|max_length[15]|is_unique[tb_user.phone]');

        // validasi form password
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // validasi form Ulangi Password
        $this->form_validation->set_rules(
            'repeat_password',
            'Ulangi Password',
            'trim|required|matches[password]'
        );

        // validasi ketika user sudah login, tidak bisa kembali mengakses halaman login lagi.
        if (!empty($this->session->userdata('username'))) {
            redirect('', 'auto', 301);
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // jika form validation tidak berjalan
        if ($this->form_validation->run() == false) {
            $data = [
                'title' =>  'Buat Akun',
                'page'  =>  'auth/register',
            ];
            $this->load->view('core', $data);
        } else {
            $this->_registerProcess();
        }
    }

    /**
     * Logout Method Function
     *
     * @return void
     */
    public function logout(): void
    {
        $this->AuthModel->logout();
    }

    /**
     * Login Method Function
     *
     * @return void
     */
    private function _loginProcess(): void
    {
        $this->AuthModel->login();
    }

    private function _registerProcess(): void
    {
        $this->AuthModel->register();
    }
}
