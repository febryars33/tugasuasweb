<div class="col-md-8 m-auto">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="<?= $faker->imageUrl(180, 180, 'animals', true, 'cats') ?>" alt="Foto Profil" class="img-fluid rounded-circle" height="170px" width="170px">
                <h5 class="mt-4"><?= $query['name'] ?></h5>
                <p><?= $query['nim'] ?> &bullet; <?= $query['study_program'] ?></p>
                <?php
                switch ($query['role']) {
                    case 'ADMIN':
                        echo '<span class="badge badge-danger">Administrator</span>';
                        break;

                    case 'STUDENT':
                        echo '<span class="badge badge-primary">Mahasiswa</span>';
                        break;

                    default:
                        echo 'Error: please contact webmaster for this bug';
                        break;
                }
                ?>
                <p class="mt-4">
                    <a class="text-decoration-none" data-toggle="collapse" href="#collapseExample" role="button"><i class="fa fa-eye"></i> Lihat Data Selengkapnya</a>
                </p>
                <div class="collapse show" id="collapseExample">
                    <div class="card border-0 shadow text-left">
                        <div class="card-body">
                            <h5>Data Diri</h5>
                            <table class="table table-bordered table-hover mb-3">
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?= $query['name'] ?></td>
                                </tr>
                                <tr>
                                    <th>NIM (Nomor Induk Mahasiswa)</th>
                                    <td><?= $query['nim'] ?></td>
                                </tr>
                                <tr>
                                    <th>Program Studi</th>
                                    <td><?= $query['study_program'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <td><?= date('l, d F Y', strtotime($query['date_birth'])) ?></td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td><?= $query['province'] ?></td>
                                </tr>
                                <tr>
                                    <th>Kota / Kabupaten</th>
                                    <td><?= $query['district'] ?></td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td><?= $query['sub_district'] ?></td>
                                </tr>
                                <tr>
                                    <th>Desa / Kelurahan</th>
                                    <td><?= $query['urban_village'] ?></td>
                                </tr>
                                <tr>
                                    <th>Detail Alamat</th>
                                    <td><?= $query['address'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status Mahasiswa</th>
                                    <?php
                                    switch ($query['student_status']) {
                                        case 'AKTIF':
                                            echo '<td><span class="badge badge-success">Aktif</span></td>';
                                            break;
                                        case 'TIDAK_AKTIF':
                                            echo '<td><span class="badge badge-danger">Tidak Aktif</span></td>';
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                    ?>
                                </tr>
                            </table>
                            <h5>Informasi Akun</h5>
                            <table class="table table-bordered table-hover card-text">
                                <tr>
                                    <th>Username</th>
                                    <td><?= $query['username'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Email</th>
                                    <td><?= $query['email'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status Akun</th>
                                    <?php
                                    switch ($query['account_status']) {
                                        case '1':
                                            echo '<td><span class="badge badge-success">Aktif</span></td>';
                                            break;
                                        case '0':
                                            echo '<td><span class="badge badge-danger">Tidak Aktif</span></td>';
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <th>Password</th>
                                    <td>
                                        <a href="<?= $this->uri->segment(2) . '/change_password'; ?>" class="text-decoration-none text-warning"><i class="fa fa-key"></i> Ubah Password</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<code>
    <!-- <pre><?php print_r($query) ?></pre> -->
</code>