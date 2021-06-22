<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="row">
                    <div class="col-4 col-md-4">
                        <div class="text-center">
                            <img src="<?= get_userdata('photo') ?>" alt="Profile Image" class="img-fluid rounded-circle" width="75px" height="75px" id="preview_after_change">
                        </div>
                    </div>
                    <div class="col-8 col-md">
                        <h6><?= get_userdata('name') ?></h6>
                        <p class="small text-muted mb-0"><?= get_userdata('nim') ?></p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between small text-muted">
                    <p class="font-weight-bold">Tipe Akun</p>
                    <?php
                    switch (get_userdata('role')) {
                        case 'ADMIN':
                            echo '<p class="text-danger">Administrator</p>';
                            break;

                        case 'STUDENT':
                            echo '<p class="text-primary">Mahasiswa</p>';
                            break;

                        default:
                            echo 'Not defined';
                            break;
                    }
                    ?>
                </div>
                <div class="d-flex justify-content-between small text-muted">
                    <p class="font-weight-bold mb-0">Program Studi</p>
                    <p class="mb-0"><?= get_userdata('study_program') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md">
        <div class="card">
            <div class="card-header bg-transparent">
                <!-- <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab">Home</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab">Profile</a>
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab">Contact</a>
                    </div>
                </nav> -->
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav-bio-tab" data-toggle="tab" href="#nav-bio" role="tab">Biodata Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-address-tab" data-toggle="tab" href="#nav-address" role="tab">Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab">Keamanan Akun</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-bio" role="tabpanel">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-0 mb-4 shadow-sm">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="<?= get_userdata('photo') ?>" alt="Profile" class="img-fluid shadow-sm rounded" id="preview">
                                        </div>
                                        <label for="photo" class="btn btn-outline-secondary btn-block btn-sm mt-3"><i class="fa fa-image"></i> Ganti Foto</label>
                                        <div class="btn-group btn-group-sm btn-block d-none">
                                            <button class="btn btn-outline-success"><i class="fa fa-check"></i> Ubah</button>
                                            <button class="btn btn-outline-danger"><i class="fa fa-times"></i> Batal</button>
                                        </div>
                                        <?= form_open_multipart('profile/change_picture', 'id="change_picture_form"') ?>
                                        <input type="file" name="photo" class="d-none" id="photo" accept="image/png, image/jpeg, image/jpg">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-block btn-success d-none" id="photo-send-btn">Ganti</button>
                                        </div>
                                        <?= form_close() ?>
                                        <p class="small text-muted card-text">Besar file: maksimum 2000 Kilobytes (2 Megabytes). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-outline-secondary btn-block btn-sm" data-toggle="modal" data-target="#changePasswordModal">Ubah Kata Sandi</button>
                            </div>
                            <div class="col-md text-muted mt-3">
                                <?= validation_errors() ?>
                                <div id="changes_msg_response"></div>
                                <h6>Ubah Biodata</h6>
                                <table class="table table-borderless small text-muted">
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= get_userdata('name') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <td><?= get_userdata('place_birth') . ', ' . date('d F Y', strtotime(get_userdata('date_birth'))) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td><?= get_userdata('gender') ?></td>
                                    </tr>
                                </table>
                                <h6>Ubah Kontak</h6>
                                <table class="table table-borderless small text-muted">
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <span id="current_email"><?= get_userdata('email') ?></span>
                                            <a data-toggle="collapse" href="#collapseExample" role="button">Ubah</a>
                                            <div class="collapse" id="collapseExample">
                                                <?= form_open('profile/change_email', 'id="change_email_form" class="mt-3"') ?>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control form-control-sm" value="<?= get_userdata('email') ?>">
                                                    <span id="email_error" class="small text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                                                </div>
                                                <?= form_close() ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td><?= get_userdata('phone') ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane small text-muted fade" id="nav-address" role="tabpanel">
                        <h6 class="card-title"><sup><i class="fa fa-map-marker-alt"></i></sup> Alamat Lengkap</h6>
                        <table class="table table-borderless text-muted">
                            <tr>
                                <th>Provinsi</th>
                                <td><?= get_userdata('province') ?></td>
                            </tr>
                            <tr>
                                <th>Kota / Kabupaten</th>
                                <td><?= get_userdata('district') ?></td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td><?= get_userdata('sub_district') ?></td>
                            </tr>
                            <tr>
                                <th>Kelurahan / Desa</th>
                                <td><?= get_userdata('urban_village') ?></td>
                            </tr>
                            <tr>
                                <th>Detail Alamat</th>
                                <td><?= get_userdata('address') ?></td>
                            </tr>
                        </table>
                        <a href="#" class="text-decoration-none font-weight-bold" data-toggle="modal" data-target="#addressModal">Ubah Alamat</a>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel">
                        <p class="text-muted font-weight-bold card-text">Belum difungsikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Address -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= form_open() ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addressModalLabel">Ubah Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-md-6 form-group">
                        <label for="province">Provinsi</label>
                        <input type="text" name="province" id="province" class="form-control" value="<?= get_userdata('province') ?>">
                    </div>
                    <div class="col-6 col-md-6 form-group">
                        <label for="district">Kota / Kabupaten</label>
                        <input type="text" name="district" id="district" class="form-control" value="<?= get_userdata('district') ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-6 form-group">
                        <label for="sub_district">Kecamatan</label>
                        <input type="text" name="sub_district" id="sub_district" class="form-control" value="<?= get_userdata('sub_district') ?>">
                    </div>
                    <div class="col-6 col-md-6 form-group">
                        <label for="urban_village">Kelurahan / Desa</label>
                        <input type="text" name="urban_village" id="urban_village" class="form-control" value="<?= get_userdata('urban_village') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Detail Alamat</label>
                    <textarea name="address" id="address" cols="30" rows="6" class="form-control"><?= get_userdata('address') ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Address -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= form_open('profile/change_password', 'id="change_password_form"') ?>
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Ubah Kata Sandi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="change_pass_response_modal"></div>
                <div class="form-group">
                    <label for="current_password">Kata Sandi Lama :</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                    <span class="small text-danger" id="current_password_error"></span>
                </div>
                <div class="form-group">
                    <label for="new_password">Kata Sandi Baru :</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                    <span class="small text-danger" id="new_password_error"></span>
                </div>
                <div class="form-group">
                    <label for="repeat_new_password">Ulangi Kata Sandi Baru :</label>
                    <input type="password" name="repeat_new_password" id="repeat_new_password" class="form-control">
                    <span class="small text-danger" id="repeat_new_password_error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>