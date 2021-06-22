<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MahasiswaModel extends CI_Model
{

    /**
     * Create model
     *
     * @return void
     */
    public function create(): void
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
        $student_status = $this->input->post('student_status');
        $address = $this->input->post('address');
        $account_status = $this->input->post('account_status');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $send_type = $this->input->post('send_type');

        $config['upload_path'] = './assets/img/photo';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] =   true;

        // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('photo')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('danger', '<strong><i class="fa fa-check-circle"></i> Upload Gagal</strong><br>' . $error, true));
            redirect('mahasiswa/create', 'auto', 301);
            die;
        } else {
            $upload_data = $this->upload->data();
            echo '<pre>';
            print_r($upload_data);
            echo '</pre>';
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
            'student_status'  =>  strtoupper($student_status),
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
            'account_status'    =>  $account_status,
        ];
        $this->db->insert('tb_user', $account_data);

        if ($send_type == 'create') {
            $segment = 'mahasiswa/create';
        } else {
            $segment = 'mahasiswa/' . $nim;
        }

        $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('success', '<strong><i class="fa fa-check-circle"></i> BERHASIL</strong><br>Anda telah berhasil menambahkan data baru atas nama <b>' . $student_data['name'] . '</b>', true));
        redirect($segment, 'auto', 301);
    }

    /**
     * Update model
     *
     * @return void
     */
    public function update(): void
    {
        echo '<pre>';
        print_r($this->input->post());
        echo '</pre>';
    }
}
