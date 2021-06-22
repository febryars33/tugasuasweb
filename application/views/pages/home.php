<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<h3>Ulangan Akhir Semester</h3>
<p>Mata Kuliah : Pemrograman 2</p>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <h4>Lorem, ipsum.</h4>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius aliquam nam deserunt dolores, atque adipisci exercitationem. Sit ea quam minus reprehenderit ipsam rerum perspiciatis, et modi nemo quibusdam deleniti repellat!</p>
        <h4>Dummy Data</h4>
        <p class="mb-4">Using PHP Library : <a href="https://fakerphp.github.io/" target="_blank">https://fakerphp.github.io/</a></p>
        <table class="table table-hover table-bordered datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1; $i <= 10; $i++) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $faker->name() ?></td>
                        <td><?= $faker->email() ?></td>
                        <td><?= $faker->phoneNumber() ?></td>
                    </tr>
                <?php endfor ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <h4>Informasi Akun</h4>
        <hr>
        <div class="text-center">
            <img src="<?= get_userdata('photo') ?>" alt="Foto Profil" class="img-fluid rounded-circle" height="180px" width="180px">
        </div>
        <table class="table table-borderless">
            <tr>
                <th>Nama Lengkap :</th>
                <td><?= get_userdata('name') ?></td>
            </tr>
            <tr>
                <th>NIM :</th>
                <td><?= get_userdata('nim') ?></td>
            </tr>
            <tr>
                <th>Tempat, Tanggal Lahir :</th>
                <td><?= get_userdata('place_birth') . ', ' . date('l F Y', strtotime(get_userdata('date_birth'))) ?></td>
            </tr>
            <tr>
                <th>Status Mahasiswa :</th>
                <td>
                    <?php
                    switch (get_userdata('student_status')) {
                        case 'AKTIF':
                            echo '<span class="badge badge-success">Aktif</span>';
                            break;

                        case 'TIDAK_AKTIF':
                            echo '<span class="badge badge-danger">Tidak Aktif</span>';
                            break;

                        default:
                            # code...
                            break;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Status Akun :</th>
                <td>
                    <?php
                    switch (get_userdata('account_status')) {
                        case '1':
                            echo '<span class="badge badge-primary">Aktif</span>';
                            break;

                        case '0':
                            echo '<span class="badge badge-warning">Non-Aktif</span>';
                            break;

                        default:
                            # code...
                            break;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Level :</th>
                <td>
                    <?php
                    switch (get_userdata('role')) {
                        case 'STUDENT':
                            echo '<span class="badge badge-primary">Mahasiswa</span>';
                            break;

                        case 'ADMIN':
                            echo '<span class="badge badge-danger">Administrator</span>';
                            break;

                        default:
                            # code...
                            break;
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>