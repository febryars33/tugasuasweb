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

    <?= form_open_multipart('mahasiswa/create', 'id="mahasiswa-create"') ?>

    <h4>Data Personal</h4>

    <div class="form-group">
        <label for="full_name">Nama Lengkap :</label>
        <input type="text" id="full_name" name="name" class="form-control" value="<?= set_value('name') ?>">
        <?= form_error('name', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="nim">NIM :</label>
        <input type="number" id="nim" name="nim" class="form-control" value="<?= set_value('nim') ?>">
        <?= form_error('nim', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="study_program">Program Studi :</label>
        <select name="study_program" id="study_program" class="form-control">
            <option disabled selected>== SILAHKAN PILIH PROGRAM STUDI ==</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
        </select>
        <?= form_error('study_program', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="place_birth">Tempat Lahir :</label>
            <input type="text" id="place_birth" name="place_birth" class="form-control" value="<?= set_value('place_birth') ?>">
            <?= form_error('place_birth', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="date_birth">Tanggal Lahir :</label>
            <input type="date" id="date_birth" name="date_birth" class="form-control" value="<?= set_value('date_birth') ?>">
            <?= form_error('date_birth', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <label for="gender">Jenis Kelamin :</label>
        <select name="gender" id="gender" class="form-control">
            <option value="MALE">Laki - Laki</option>
            <option value="FEMALE">Perempuan</option>
        </select>
        <?= form_error('gender', '<span class="text-danger small">', '</span>') ?>
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

    <h5>Alamat Saat Ini</h5>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="province">Provinsi :</label>
            <input type="text" name="province" id="province" class="form-control">
            <?= form_error('province', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="district">Kota / Kabupaten :</label>
            <input type="text" name="district" id="district" class="form-control">
            <?= form_error('district', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="sub_district">Kecamatan :</label>
            <input type="text" name="sub_district" id="sub_district" class="form-control">
            <?= form_error('sub_district', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="urban_village">Kelurahan / Desa :</label>
            <input type="text" name="urban_village" id="urban_village" class="form-control">
            <?= form_error('urban_village', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="form-group">
            <label for="address">Detail Alamat :</label>
            <textarea name="address" id="address" class="form-control" rows="8"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label>Status Mahasiswa</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="student_status" id="student_status_true" value="AKTIF" <?= set_radio('student_status', 'AKTIF', TRUE) ?>>
                <label class="form-check-label" for="student_status_true">Aktif</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="student_status" id="student_status_false" value="TIDAK_AKTIF" <?= set_radio('student_status', 'TIDAK_AKTIF') ?>>
                <label class="form-check-label" for="student_status_false">Tidak Aktif</label>
            </div>
            <?= form_error('student_status', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label>Status Akun</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_status" id="account_status_true" value="1" <?= set_radio('student_status', '1', TRUE) ?>>
                <label class="form-check-label" for="account_status_true">Aktif</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="account_status" id="account_status_false" value="0" <?= set_radio('student_status', '0') ?>>
                <label class="form-check-label" for="account_status_false">Tidak Aktif</label>
            </div>
            <?= form_error('account_status', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <h4>Data Akun</h4>

    <div class="form-group">
        <label for="username">Username :</label>
        <input type="text" id="username" name="username" class="form-control" value="<?= set_value('username') ?>">
        <?= form_error('username', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="email">Alamat Email :</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>">
        <?= form_error('email', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="form-group">
        <label for="phone">Telepon :</label>
        <input type="number" id="phone" name="phone" class="form-control" value="<?= set_value('phone') ?>">
        <?= form_error('phone', '<span class="text-danger small">', '</span>') ?>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" class="form-control">
            <?= form_error('password', '<span class="text-danger small">', '</span>') ?>
        </div>
        <div class="form-group col-md-6">
            <label for="repeat_password">Ulangi Password :</label>
            <input type="password" id="repeat_password" name="repeat_password" class="form-control">
            <?= form_error('repeat_password', '<span class="text-danger small">', '</span>') ?>
        </div>
    </div>

    <div class="form-group float-right">
        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" id="submit-btn-mahasiswa" name="send_type" value="back" class="btn btn-primary">Kirim Dan Lihat</button>
        <button type="submit" id="submit-btn-mahasiswa" name="send_type" value="create" class="btn btn-primary">Kirim Dan Buat Lagi</button>
    </div>

    <?= form_close() ?>

</div>