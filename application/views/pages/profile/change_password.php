<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= get_userdata('photo') ?>" alt="Foto Profil" width="180px" height="180px" class="img-fluid rounded-circle mb-3">
                    <h5><?= get_userdata('name') ?></h5>
                    <p><?= get_userdata('nim') ?></p>
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
                </div>
                <a href="<?= base_url('change_password') ?>" class="btn btn-warning btn-sm btn-block mt-4"><i class="fa fa-key"></i> Ubah Password</a>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mb-0"><i class="fa fa-key"></i> Ubah Password</h5>
                    <a href="<?= base_url('profile') ?>" class="text-decoration-none"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <hr>
                <?= form_open() ?>
                <div class="form-group">
                    <label for="current_password">Password Lama :</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Password Lama">
                    <?= form_error('current_password', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru :</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password Baru">
                    <?= form_error('new_password', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group">
                    <label for="repeat_new_password">Ulangi Password Baru :</label>
                    <input type="password" name="repeat_new_password" id="repeat_new_password" class="form-control" placeholder="Ulangi Password Baru">
                    <?= form_error('repeat_new_password', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group card-text">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>