<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url('assets/img/Nestlé.svg') ?>" alt="Logo" class="img-fluid">
                <h3>Registrasi</h3>
                <p>Silahkan isi semua formulir dibawah untuk registrasi.</p>
            </div>
            <?= $this->session->flashdata('msg_auth') ?>
            <hr>
            <?= form_open_multipart() ?>
            <h5>Data Akun</h5>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('username') ?>">
                <?= form_error('username', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('email') ?>">
                <?= form_error('email', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <label for="phone">Telepon</label>
                <input type="number" name="phone" id="phone" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('phone') ?>">
                <?= form_error('phone', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" id="password" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;">
                <?= form_error('password', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <label for="repeat_password">Konfirmasi Kata Sandi</label>
                <input type="password" name="repeat_password" id="repeat_password" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;">
                <?= form_error('repeat_password', '<span class="small text-danger">', '</span>') ?>
            </div>

            <h5>Biodata</h5>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('name') ?>">
                <?= form_error('name', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;">
                    <option disabled selected>== PILIH JENIS KELAMIN ==</option>
                    <option value="MALE">Laki - Laki</option>
                    <option value="FEMALE">Perempuan</option>
                </select>
                <?= form_error('gender', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="photo" class="btn btn-outline-secondary btn-block"><i class="fa fa-image"></i> Upload Foto</label>
                    <input type="file" id="photo" name="photo" class="d-none" accept="image/*">
                    <label class="small text-danger d-none" id="photo-error-text">Foto yang valid hanya berekstensi .png, .jpg, .jpeg</label>
                </div>
                <div class="form-group col-md-6">
                    <img src="<?= base_url('assets/img/default.png') ?>" id="preview" alt="Foto" class="img-thumbnail" width="200px" height="400px">
                </div>
            </div>

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" name="nim" id="nim" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('nim') ?>">
                <?= form_error('nim', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="row">
                <div class="form-group col-6 col-md-6">
                    <label for="place_birth">Tempat Lahir</label>
                    <input type="text" name="place_birth" id="place_birth" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('place_birth') ?>">
                    <?= form_error('place_birth', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group col-6 col-md-6">
                    <label for="date_birth">Tanggal Lahir</label>
                    <input type="date" name="date_birth" id="date_birth" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('date_birth') ?>">
                    <?= form_error('date_birth', '<span class="small text-danger">', '</span>') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="nim">Program Studi</label>
                <select name="study_program" id="study_program" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;">
                    <option disabled selected>== PILIH PROGRAM STUDI == </option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                </select>
                <?= form_error('study_program', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="row">
                <div class="form-group col-6 col-md-6">
                    <label for="province">Provinsi</label>
                    <input type="text" name="province" id="province" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('province') ?>">
                    <?= form_error('province', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group col-6 col-md-6">
                    <label for="district">Kota / Kabupaten</label>
                    <input type="text" name="district" id="district" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('district') ?>">
                    <?= form_error('district', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group col-6 col-md-6">
                    <label for="sub_district">Kecamatan</label>
                    <input type="text" name="sub_district" id="sub_district" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('sub_district') ?>">
                    <?= form_error('sub_district', '<span class="small text-danger">', '</span>') ?>
                </div>
                <div class="form-group col-6 col-md-6">
                    <label for="urban_village">Kelurahan / Desa</label>
                    <input type="text" name="urban_village" id="urban_village" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;" value="<?= set_value('urban_village') ?>">
                    <?= form_error('urban_village', '<span class="small text-danger">', '</span>') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="address">Detail Alamat</label>
                <textarea name="address" id="address" cols="30" rows="8" class="form-control text-light" style="background-color: rgba(0 0 0 / 25%)!important;"><?= set_value('address') ?></textarea>
                <?= form_error('address', '<span class="small text-danger">', '</span>') ?>
            </div>

            <div class="form-group">
                <button type="submit" id="btn-login-submit" class="btn btn-block btn-outline-info"><i class="fa fa-paper-plane"></i> Registrasi</button>
            </div>

            <div class="form-group">
                <span>Sudah punya akun? <a href="<?= base_url('login') ?>">Masuk</a></span>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>