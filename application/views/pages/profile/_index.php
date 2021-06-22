<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<style>
    .foto-profile {
        opacity: 1;
        transition: .2s ease;
        backface-visibility: hidden;
        cursor: pointer;
    }

    .profile-hover:hover .foto-profile {
        opacity: 0.3;
    }

    .profile-hover:hover .middle {
        opacity: 1;
    }

    .middle {
        transition: .2s ease;
        opacity: 0;
        position: absolute;
        text-align: center;
        top: 24%;
        left: 46%;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="profile-hover">
                        <label for="photo">
                            <img src="<?= get_userdata('photo') ?>" alt="Foto Profil" width="180px" height="180px" class="img-thumbnail rounded-circle mb-3 foto-profile" id="preview">
                        </label>
                        <div class="middle">
                            <label for="photo" style="cursor: pointer;"><i class="fa fa-image fa-2x text-muted"></i></label>
                        </div>
                        <?= form_open() ?>
                        <input type="file" id="photo" name="photo" class="d-none" accept="image/*">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm d-none" id="photo-send-btn"><i class="fa fa-check"></i> Ganti</button>
                        <label class="small text-danger d-none" id="photo-error-text">Foto yang valid hanya berekstensi .png, .jpg, .jpeg</label>
                    </div>
                    <?= form_close() ?>
                    <div>
                        <h5><?= get_userdata('name') ?></h5>
                        <p><?= get_userdata('nim') ?></p>
                    </div>
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-body"></div>
        </div>
    </div>
</div>