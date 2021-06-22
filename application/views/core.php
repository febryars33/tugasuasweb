<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php render('includes/meta') ?>
    <?php render('includes/css') ?>
    <title>UASWEB &bullet; <?= $title ?></title>
</head>

<body>
    <?php
    if (!empty($this->session->userdata('username'))) {
        render('includes/navbar');
    }
    ?>

    <div class="container pt-5">
        <?= $this->session->flashdata('msg_dashboard') ?>
        <?php render('pages/' . $page); ?>
    </div>

    <div class="bg-dark py-3 text-muted small" style="margin-top: 10%;">
        <div class="container">
            <div class="d-flex justify-content-between">
                <span>&copy; Copyright <a href="" class="text-decoration-none">Codefeb</a>. All Right Reserved</span>
                <span>Page Rendered : <b>{elapsed_time}</b></span>
            </div>
        </div>
    </div>
    <?php render('includes/js') ?>
    <script>
        $(document).ready(function() {

            let base_url = $('meta[name=base_url]').attr('content');

            $('.datatables').DataTable({
                responsive: true,
            });

            var t = $('#mahasiswa-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: base_url + 'mahasiswa/json'
                },
                responsive: true,
                autoWidth: true,
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        data: 'nim',
                        name: 'id',
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },

                    {
                        "data": 'name'
                    },
                    {
                        "data": 'nim'
                    },
                    {
                        "data": 'date_birth'
                    },
                    {
                        "data": 'student_status'
                    },
                    {
                        "data": 'account_status'
                    },
                    {
                        "data": 'role'
                    },
                    {
                        "data": 'options'
                    },
                ]
            });

            // change password form
            $("#change_password_form").on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: base_url + 'profile/change_password',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $("#change_password_submit").attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        if (data.error) {
                            if (data.current_password_error != '') {
                                $('#current_password_error').html(data.current_password_error);
                            } else {
                                $('#current_password_error').html('');
                            }
                            if (data.new_password_error != '') {
                                $('#new_password_error').html(data.new_password_error);
                            } else {
                                $('#new_password_error').html('');
                            }
                            if (data.repeat_new_password_error != '') {
                                $('#repeat_new_password_error').html(data.repeat_new_password_error);
                            } else {
                                $('#repeat_new_password_error').html('');
                            }
                        }
                        if (data.status == 200) {
                            $('#changes_msg_response').html(data.message);
                            $("#change_password_form").trigger("reset");
                            $("#changePasswordModal").modal('hide');
                            $('#change_pass_response_modal').html('');
                        } else {
                            $('#change_pass_response_modal').html(data.message);
                        }
                        $('#contact').attr('disabled', false);
                    }
                });
            });

            // change email form
            $("#change_email_form").on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: base_url + 'profile/change_email',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    beforeSend: function() {
                        $("#change_password_submit").attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        if (data.error) {
                            if (data.email_error != '') {
                                $('#email_error').html(data.email_error);
                            } else {
                                $('#email_error').html('');
                            }
                        }
                        if (data.status == 200) {
                            $('#changes_msg_response').html(data.message);
                            $('#current_email').html(data.new_email);
                        } else {
                            $('#change_pass_response_modal').html(data.message);
                        }
                        $('#contact').attr('disabled', false);
                    }
                });
            });

        });
    </script>
    <script>
        $(document).on('click', '.browse', function() {
            var file = $(this).parents().find('.file');
            file.trigger('click');
        });

        $("#photo").on('change', function(event) {
            var file_name = event.target.files[0].name;
            var ext = file_name.split('.').pop();

            if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
                var reader = new FileReader();
                reader.onload = function(event) {
                    // document.src = event.target.result;
                    document.getElementById("preview").src = event.target.result;
                };
                reader.readAsDataURL(this.files[0]);
                // $("#photo-error-text").addClass('d-none');
                $("#photo-send-btn").removeClass('d-none');
                $("#change_picture_form").on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: '<?= base_url() ?>' + 'profile/change_picture',
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                        success: function(data) {
                            $('#changes_msg_response').html(data.message);
                        }
                    });
                })
            } else {
                $("#photo-error-text").removeClass('d-none');
            }
        })
    </script>
</body>

</html>