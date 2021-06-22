<div class="d-flex justify-content-between">
    <h3 class="mb-0">Mahasiswa</h3>
    <!-- <button type="button" class="btn btn-danger btn-sm mb-2" id="clear-form-mahasiswa">Bersihkan Form</button> -->
</div>

<p><?= $title ?></p>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Beranda</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
    </ol>
</nav>

<div class="container">

    <?= validation_errors() ?>

    <?= form_open_multipart('mahasiswa/edit/' . $this->uri->segment(3), 'id="mahasiswa-create"') ?>

    <h4>Data Personal</h4>

    <div class="form-group">
        <label for="full_name">Nama Lengkap :</label>
        <input type="text" id="full_name" name="name" class="form-control" value="<?= $query['name'] ?>">
        <?= form_error('name', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="nim">NIM :</label>
        <input type="number" id="nim" name="nim" class="form-control" value="<?= $query['nim'] ?>" readonly>
        <?= form_error('nim', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="study_program">Program Studi :</label>
        <select name="study_program" id="study_program" class="form-control">
            <option disabled>== SILAHKAN PILIH PROGRAM STUDI ==</option>
            <option value="Sistem Informasi" <?= $query['study_program'] == 'SISTEM INFORMASI' ? 'selected' : '' ?>>Sistem Informasi</option>
            <option value="Teknik Informatika" <?= $query['study_program'] == 'TEKNIK INFORMATIKA' ? 'selected' : '' ?>>Teknik Informatika</option>
        </select>
        <?= form_error('study_program', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="place_birth">Tempat Lahir :</label>
            <input type="text" id="place_birth" name="place_birth" class="form-control" value="<?= $query['place_birth'] ?>">
            <?= form_error('place_birth', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth">Tanggal Lahir :</label>
            <input type="date" id="date_birth" name="date_birth" class="form-control" value="<?= $query['date_birth'] ?>">
            <?= form_error('date_birth', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="photo" class="btn btn-outline-secondary btn-block"><i class="fa fa-image"></i> Upload Foto</label>
            <input type="file" id="photo" name="photo" class="d-none" accept="image/*">
            <label class="small text-danger d-none" id="photo-error-text">Foto yang valid hanya berekstensi .png, .jpg, .jpeg</label>
        </div>
        <div class="form-group col-md-6">
            <img src="<?= $query['photo'] ?>" id="preview" alt="Foto" class="img-thumbnail" width="200px" height="400px">
        </div>
    </div>

    <h5>Alamat Saat Ini</h5>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="province">Provinsi :</label>
            <input type="text" name="province" id="province" class="form-control" value="<?= $query['province'] ?>">
            <?= form_error('province', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="district">Kota / Kabupaten :</label>
            <input type="text" name="district" id="district" class="form-control" value="<?= $query['district'] ?>">
            <?= form_error('district', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="sub_district">Kecamatan :</label>
            <input type="text" name="sub_district" id="sub_district" class="form-control" value="<?= $query['sub_district'] ?>">
            <?= form_error('sub_district', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="urban_village">Kelurahan / Desa :</label>
            <input type="text" name="urban_village" id="urban_village" class="form-control" value="<?= $query['urban_village'] ?>">
            <?= form_error('urban_village', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group">
            <label for="address">Detail Alamat :</label>
            <textarea name="address" id="address" class="form-control" rows="8"><?= $query['address'] ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">

            <label>Status Mahasiswa</label>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="student_status" id="student_status_true" value="AKTIF" <?= $query['student_status'] == 'AKTIF' ? 'checked' : '' ?>>
                <label class="form-check-label" for="student_status_true">Aktif</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="student_status" id="student_status_false" value="TIDAK_AKTIF" <?= $query['student_status'] == 'TIDAK_AKTIF' ? 'checked' : '' ?>>
                <label class="form-check-label" for="student_status_false">Tidak Aktif</label>
            </div>

            <?= form_error('student_status', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label>Status Akun</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_status" id="account_status_true" value="1" <?= $query['account_status'] == '1' ? 'checked' : '' ?>>
                <label class="form-check-label" for="account_status_true">Aktif</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_status" id="account_status_false" value="0" <?= $query['account_status'] == '0' ? 'checked' : '' ?>>
                <label class="form-check-label" for="account_status_false">Tidak Aktif</label>
            </div>
            <?= form_error('account_status', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <h4>Data Akun</h4>

    <div class="form-group">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" class="form-control" value="<?= $query['username'] ?>">
        <?= form_error('username', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="email">Alamat Email :</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= $query['email']  ?>">
        <?= form_error('email', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group float-right">
        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" id="submit-btn-mahasiswa" name="send_type" value="back" class="btn btn-primary">Ubah Dan Lihat</button>
        <button type="submit" id="submit-btn-mahasiswa" name="send_type" value="create" class="btn btn-primary">Ubah Dan Kembali</button>
    </div>

    <?= form_close() ?>

</div>