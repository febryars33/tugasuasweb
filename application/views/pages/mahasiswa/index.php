<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="d-flex justify-content-between">
    <h3 class="mb-0">Mahasiswa</h3>
    <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</a>
</div>
<p>Daftar Semua Mahasiswa</p>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
    </ol>
</nav>
<table class="table table-hover table-bordered table-sm" id="mahasiswa-table">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Tempat, Tanggal Lahir</th>
            <th>Status MHS</th>
            <th>Status Akun</th>
            <th>Level</th>
            <th>Opsi</th>
        </tr>
    </thead>
</table>