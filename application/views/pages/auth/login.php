<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="col-md-6 m-auto">
    <div class="card mt-2">
        <div class="card-body">
            <div class="text-center">
                <img src="<?= base_url('assets/img/Nestlé.svg') ?>" alt="Logo" class="img-fluid">
                <h3>Login</h3>
                <p>Silahkan login untuk melanjutkan.</p>
            </div>
            <?= $this->session->flashdata('msg_auth') ?>
            <?= form_open('login', 'id="login-form"') ?>
            <div class="form-group">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" class="form-control">
                <?= form_error('username', '<span class="small text-danger">', '</span>') ?>
            </div>
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" class="form-control">
                <?= form_error('password', '<span class="small text-danger">', '</span>') ?>
            </div>
            <div class="form-group">
                <button type="submit" id="submit-btn" class="btn btn-outline-info btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
            </div>
            <div class="form-group">
                <span>Belum punya akun? <a href="<?= base_url('register') ?>">Buat Akun</a></span>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>