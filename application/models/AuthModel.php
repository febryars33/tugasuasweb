<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * AuthModel Model
 * 
 * @see https://codeigniter.com/userguide3/general/models.html
 */
class AuthModel extends CI_Model
{

    /**
     * Login Method Function Model
     *
     * @return void
     */
    public function login(): void
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // memanggil database
        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

        // cek jika username ada
        if ($user) {

            // cek jika password benar atau salah
            if (password_verify($password, $user['password'])) {

                // cek jika user status nya true / false
                if ($user['account_status'] == 1) {
                    $get_student_data = $this->db->get_where('tb_student', ['student_id' => $user['student_id']])->row_array();
                    $data_session = [
                        'username'   =>  $user['username']
                    ];
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('success', '<strong>Selamat Datang !</strong> ' . strtoupper($get_student_data['name']), true));
                    redirect('');
                } else {
                    $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('danger', '<strong>Gagal !</strong> Akun anda telah di non-aktifkan oleh admin.'));
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('danger', '<strong>Gagal !</strong> Password yang anda masukan salah.'));
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('danger', '<strong>Gagal !</strong> Username tidak ditemukan.'));
            redirect('login');
        }
    }

    /**
     * Register method model
     *
     * @return void
     */
    public function register(): void
    {
        $name = $this->input->post('name');
        $nim = $this->input->post('nim');
        $study_program = $this->input->post('study_program');
        $place_birth = $this->input->post('place_birth');
        $date_birth = $this->input->post('date_birth');
        $gender = $this->input->post('gender');
        $province = $this->input->post('province');
        $district = $this->input->post('district');
        $sub_district = $this->input->post('sub_district');
        $urban_village = $this->input->post('urban_village');
        $address = $this->input->post('address');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');

        $config['upload_path'] = './assets/img/photo';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] =   true;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('danger', '<strong><i class="fa fa-check-circle"></i> Upload Gagal</strong><br>' . $error, true));
            redirect('register', 'auto', 301);
            die;
        } else {
            $upload_data = $this->upload->data();
            $upload_path_url = base_url('assets/img/photo/' . $upload_data['file_name']);
        }


        $student_data = [
            'name'  =>  strtoupper($name),
            'nim'   =>  $nim,
            'place_birth'   =>  strtoupper($place_birth),
            'date_birth'    =>  $date_birth,
            'gender'    =>  strtoupper($gender),
            'province'  =>  strtoupper($province),
            'district'  =>  strtoupper($district),
            'sub_district'  =>  strtoupper($sub_district),
            'urban_village'  =>  strtoupper($urban_village),
            'student_status'  =>  strtoupper('TIDAK_AKTIF'),
            'address'  =>  $address,
            'photo'  =>  $upload_path_url,
            'study_program' =>  strtoupper($study_program),
        ];
        $this->db->insert('tb_student', $student_data);
        $student_data_id = $this->db->insert_id();
        $account_data = [
            'student_id'    =>  $student_data_id,
            'username'  =>  $username,
            'email' =>  $email,
            'phone' =>  $phone,
            'password'  =>  password_hash($password, PASSWORD_BCRYPT),
            'account_status'    =>  0,
        ];
        $this->db->insert('tb_user', $account_data);

        $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('success', '<strong><i class="fa fa-check-circle"></i> BERHASIL</strong><br>Anda telah berhasil registrasi dan tunggu administrator akan mengaktifkan akun anda', true));
        redirect('register', 'auto', 301);
    }

    /**
     * Logout Method Function Model
     *
     * @return void
     */
    public function logout(): void
    {
        if (!empty($this->session->userdata('username'))) {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('success', 'Anda berhasil logout.'));
            redirect('login');
        } else {
            $this->session->set_flashdata('msg_auth', $this->bootstrapcss->alert('danger', 'Anda tidak melakukan login sebelumnya !'));
            redirect('login');
        }
    }

    /**
     * Change password method model
     *
     * @param array $post_data
     * @return string
     */
    public function change_password(array $post_data): string
    {
        // check password
        if (password_verify($post_data['current_password'], get_userdata('password'))) {

            // new password hashed
            $new_password_hash = password_hash($post_data['new_password'], PASSWORD_BCRYPT);

            // update
            $this->db->set('password', $new_password_hash);
            $this->db->where('user_id', get_userdata('user_id'));
            $this->db->update('tb_user');

            // success response 
            $feedback_data = [
                'success'   =>  true,
                'status'    =>  200,
                'message'   =>  $this->bootstrapcss->alert('success', 'Password telah berhasil diubah.', true),
            ];
        } else {

            // failed response
            $feedback_data = [
                'success'   =>  true,
                'status'    =>  401,
                'message'   =>  $this->bootstrapcss->alert('danger', 'Password lama yang anda masukan tidak benar'),
            ];
        }

        // convert to json
        $convert_to_json = json_encode($feedback_data);
        return $convert_to_json;
    }

    /**
     * Change email method model
     *
     * @param array $post_data
     * @return string
     */
    public function change_email(array $post_data): string
    {
        // new password hashed
        $new_email = $post_data['email'];

        // update
        $this->db->set('email', $new_email);
        $this->db->where('user_id', get_userdata('user_id'));
        $this->db->update('tb_user');

        // success response 
        $feedback_data = [
            'success'   =>  true,
            'status'    =>  200,
            'message'   =>  $this->bootstrapcss->alert('success', 'Email telah berhasil diubah.', true),
            'new_email' =>  $new_email,
        ];

        // convert to json
        $convert_to_json = json_encode($feedback_data);
        return $convert_to_json;
    }

    // public function change_password(): void
    // {
    //     $username = get_userdata('username');
    //     $current_password = $this->input->post('current_password');
    //     $new_password = $this->input->post('new_password');
    //     $query = $this->db->get_where('tb_user', ['username' => $username])->row_array();
    //     if ($query) {
    //         if (password_verify($current_password, $query['password'])) {
    //             $data_new_password = [
    //                 'password'  =>  password_hash($new_password, PASSWORD_BCRYPT)
    //             ];
    //             $this->db->set($data_new_password);
    //             $this->db->where('username', $username);
    //             $this->db->update('tb_user');
    //             $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('success', '<strong>Berhasil !</strong> Password berhasil diubah.'));
    //             redirect('change_password');
    //         } else {
    //             $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('danger', '<strong>Gagal !</strong> Password lama yang anda masukan salah.'));
    //             redirect('change_password');
    //         }
    //     }
    // }
}
