<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('') ?>">UAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('') ?>">Beranda</a>
                </li>
                <li class="nav-item <?= $this->uri->segment(1) == 'mahasiswa' ? 'active' : ''; ?>">
                    <a class="nav-link" href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"><strong><?= get_userdata('name') ?></strong> </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">NIM : <?= get_userdata('nim') ?></a>
                        <a class="dropdown-item" href="#">Prodi : <?= get_userdata('study_program') ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item <?= $this->uri->segment(1) == 'profile' ? 'active' : ''; ?>" href="<?= base_url('profile') ?>"><i class="fa fa-user-circle text-muted mr-2"></i> Profil Akun</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out-alt text-danger mr-2"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Perhatian</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span class="text-danger">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin logout ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <a href="<?= base_url('logout') ?>" class="btn btn-primary">Keluar</a>
            </div>
        </div>
    </div>
</div>