<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\CodeigniterAdapter;

class MahasiswaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // validation auth
        need_login('username');

        // validation role
        if (get_userdata('role') != 'ADMIN') {

            // set flashdata on dashboard
            $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('danger', '<strong><i class="fa fa-exclamation-triangle"></i> AKSES DITOLAK</strong><br>Anda tidak memiliki akses untuk halaman ini. ', true));

            // redirect with status code 301 (Move Permanently)
            redirect('', 'auto', 301);
        }

        // load model
        $this->load->model('MahasiswaModel');
    }

    /**
     * Mahasiswa Index Method
     *
     * @return void
     */
    public function index(): void
    {

        /**
         * @var object
         */
        $faker = Faker\Factory::create('id_ID');

        /**
         * @var array
         */
        $data = [
            'title' =>  'Daftar Semua Mahasiswa',
            'page'  =>  'mahasiswa/index',
            'faker' =>  $faker
        ];
        render('core', $data);
    }

    /**
     * Mahasiswa Create Method
     *
     * @return void
     */
    public function create(): void
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

        // validasi form Status Mahasiswa
        $this->form_validation->set_rules('student_status', 'Status Mahasiswa', 'required|in_list[AKTIF,TIDAK_AKTIF]');

        // validasi form Status Akun
        $this->form_validation->set_rules('account_status', 'Status Mahasiswa', 'required|in_list[1,0]');

        // validasi form Username
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|is_unique[tb_user.username]');

        // validasi form email
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tb_user.email]');

        // validasi form Telepon
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|max_length[15]|is_unique[tb_user.phone]');

        // validasi form password
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // validasi form Ulangi Password
        $this->form_validation->set_rules('repeat_password', 'Ulangi Password', 'trim|required|matches[password]');

        // validasi button submit
        $this->form_validation->set_rules('send_type', 'Send Type', 'required|in_list[create,back]');
        if ($this->form_validation->run() == false) {
            $data = [
                'title' =>  'Buat Data Mahasiswa',
                'page'  =>  'mahasiswa/create',
            ];
            render('core', $data);
        } else {
            $this->MahasiswaModel->create();
        }
    }

    public function delete()
    {
        /**
         * @var string
         */
        $nim = $this->input->post('delete');

        /**
         * @var object
         */
        $query = $this->db->query("SELECT * FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id WHERE nim = '$nim'")->row_array();

        $this->db->query("DELETE tb_user, tb_student FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id WHERE nim = '$nim'");

        // set flashdata on dashboard
        $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('success', '<strong><i class="fa fa-trash"></i> BERHASIL</strong><br> Anda telah berhasil menghapus data atas nama <b>' . $query['name'] . '</b> dengan NIM <b>' . $query['nim'] . '</b>', true));

        // redirect with status code 301 (Move Permanently)
        redirect('mahasiswa', 'auto', 301);
    }

    public function create_seed(int $value): void
    {
        /**
         * @var object
         */
        $faker = Faker\Factory::create('id_ID');

        for ($i = 1; $i <= $value; $i++) {
            // status mahasiswa
            $status = ['AKTIF', 'TIDAK_AKTIF'];
            shuffle($status);
            $result = array_shift($status);

            // status mahasiswa
            $account_status = [1, 0];
            shuffle($account_status);
            $result_account_status = array_shift($account_status);

            // prodi
            $prodi = ["SISTEM INFORMASI", "TEKNIK INFORMATIKA"];
            shuffle($prodi);
            $result_prodi = array_shift($prodi);

            // seed_data_student
            $seed_data = [
                'name'  =>  strtoupper($faker->name()),
                'nim'   =>  $faker->randomNumber(7, true),
                'date_birth'    =>  $faker->date(),
                'place_birth'   =>  ucwords($faker->city()),
                'photo' =>  $faker->imageUrl(240, 240, 'Gambar', true, 'Dummy Mahasiswa'),
                'student_status'   =>  $result,
                'study_program'   =>  $result_prodi,
                'province'  =>  strtoupper($faker->city()),
                'district'  =>  strtoupper($faker->city()),
                'sub_district'  =>  strtoupper($faker->city()),
                'urban_village' =>  strtoupper($faker->city()),
                'address'   =>  $faker->address(),
            ];
            $this->db->insert('tb_student', $seed_data);
            $last_id = $this->db->insert_id();

            // seed_data_user
            $seed_data_user = [
                'student_id'    =>  $last_id,
                'username'  =>  $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'password'  =>  password_hash('12345', PASSWORD_BCRYPT),
                'email' =>  $faker->email(),
                'account_status'    =>  $result_account_status,
                'role'  =>  'STUDENT',
            ];
            $this->db->insert('tb_user', $seed_data_user);
        }

        // set flashdata on dashboard
        $this->session->set_flashdata('msg_dashboard', $this->bootstrapcss->alert('success', '<strong><i class="fa fa-check"></i> SEEDING BERHASIL</strong><br>Total Seed : <b>' . $value . '</b>. ', true));

        // redirect with status code 301 (Move Permanently)
        redirect('mahasiswa', 'auto', 301);
    }

    /**
     * Mahasiswa Read Method
     *
     * @param string $nim
     * @return void
     */
    public function read(string $nim): void
    {
        /**
         * @var object
         */
        $faker = Faker\Factory::create('id_ID');

        /**
         * @var array
         */
        $query = $this->db->query("SELECT * FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id WHERE nim = '$nim'")->row_array();

        if (!empty($query)) {

            /**
             * @var array
             */
            $data = [
                'title' =>  'Lihat Mahasiswa &bullet; ' . $nim,
                'page'  =>  'mahasiswa/read',
                'faker' =>  $faker,
                'query' =>  $query,
            ];
        } else {

            /**
             * @var array
             */
            $data = [
                'title' =>  'Data Tidak Ditemukan Dengan NIM : ' . $nim,
                'page'  =>  'mahasiswa/read_404',
                'faker' =>  $faker,
                'nim'   =>  $nim,
            ];
        }
        render('core', $data);
    }

    public function update(string $nim): void
    {
        /**
         * @var array
         */
        $query = $this->db->query("SELECT * FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id WHERE nim = '$nim'")->row_array();

        if (!empty($query)) {

            // validasi form Nama
            $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');

            // validasi form NIM
            $this->form_validation->set_rules('nim', 'NIM (Nomor Induk Mahasiswa)', 'trim|required|numeric|in_list[' . $query['nim'] . ']');

            // validasi form Program Studi
            $this->form_validation->set_rules('study_program', 'Program Studi', 'required|in_list[Sistem Informasi,Teknik Informatika]');

            /** validasi form Tempat Lahir */
            $this->form_validation->set_rules('place_birth', 'Tempat Lahir', 'required');

            // validasi form Tanggal Lahir
            $this->form_validation->set_rules('date_birth', 'Tanggal Lahir', 'required');

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

            // validasi form Status Mahasiswa
            $this->form_validation->set_rules('student_status', 'Status Mahasiswa', 'required|in_list[AKTIF,TIDAK_AKTIF]');

            // validasi form Status Akun
            $this->form_validation->set_rules('account_status', 'Status Mahasiswa', 'required|in_list[1,0]');

            // username unique validation
            if ($this->input->post('username') != $query['username']) {
                $username_is_unique = '|is_unique[tb_user.username]';
            } else {
                $username_is_unique = '';
            }

            // validasi form Username
            $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]' . $username_is_unique);

            // email form validation
            if ($this->input->post('email') != $query['email']) {
                $email_is_unique = '|is_unique[tb_user.email]';
            } else {
                $email_is_unique = '';
            }

            // validasi form email
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email' . $email_is_unique);

            // validasi button submit
            $this->form_validation->set_rules('send_type', 'Send Type', 'required|in_list[create,back]');
            if ($this->form_validation->run() == false) {
                /**
                 * @var array
                 */
                $data = [
                    'title' =>  'Lihat Mahasiswa &bullet; ' . $nim,
                    'page'  =>  'mahasiswa/edit',
                    'query' =>  $query,
                ];
                render('core', $data);
            } else {
                $this->MahasiswaModel->update();
            }
        } else {

            /**
             * @var array
             */
            $data = [
                'title' =>  'Data Tidak Ditemukan Dengan NIM : ' . $nim,
                'page'  =>  'mahasiswa/read_404',
                'nim'   =>  $nim,
            ];
            render('core', $data);
        }
    }

    public function all_json(): void
    {
        if ($this->input->is_ajax_request()) {
            $datatables = new Datatables(new CodeigniterAdapter);
            $datatables->query("SELECT name, nim, place_birth, date_birth, student_status, account_status, role FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id");

            $datatables->hide('place_birth');

            $datatables->edit('date_birth', function ($data) {
                return $data['place_birth'] . ', ' . date('d F Y', strtotime($data['date_birth']));
            });

            $datatables->edit('student_status', function ($data) {
                switch ($data['student_status']) {
                    case 'AKTIF':
                        return '<span class="badge badge-success">Aktif</span>';
                        break;

                    case 'TIDAK_AKTIF':
                        return '<span class="badge badge-danger">Tidak Aktif</span>';
                        break;

                    default:
                        return 'Error: Terjadi kesalahan data';
                        break;
                }
            });

            $datatables->edit('account_status', function ($data) {
                switch ($data['account_status']) {
                    case '1':
                        return '<span class="badge badge-success">Aktif</span>';
                        break;

                    case '0':
                        return '<span class="badge badge-warning">Non - Aktif</span>';
                        break;

                    default:
                        return 'Error: Terjadi kesalahan data';
                        break;
                }
            });

            $datatables->edit('role', function ($data) {
                switch ($data['role']) {
                    case 'STUDENT':
                        return '<span class="badge badge-primary">Mahasiswa</span>';
                        break;

                    case 'ADMIN':
                        return '<span class="badge badge-danger">Administrator</span>';
                        break;

                    default:
                        return 'Error: Terjadi kesalahan data';
                        break;
                }
            });

            $datatables->add('options', function ($data) {
                $first_html_tag =   '<div class="btn-group btn-group-sm" role="group">';

                $mid1_html_tag  =   '<a href="' . base_url('mahasiswa/' . $data['nim']) . '" class="badge badge-primary"><i class="fa fa-eye"></i></a>';

                $mid2_html_tag  =   '<a href="' . base_url('mahasiswa/edit/' . $data['nim']) . '" class="badge badge-warning"><i class="fa fa-edit"></i></a>';

                $mid3_html_tag  =   form_open('mahasiswa/delete') . '<button button="submit" name="delete" value="' . $data['nim'] . '" class="badge badge-danger border-0" onclick="return confirm(' . "'Apakah anda yakin ingin menghapus data atas nama : " . $data['name'] . " ?'" . ')"><i class="fa fa-trash"></i></button>' . form_close();

                $last_html_tag  =   '</div>';
                return $mid1_html_tag . $mid2_html_tag . $mid3_html_tag;
            });

            echo $datatables->generate();
        } else {
            echo '403 Forbidden';
        }
    }
}
