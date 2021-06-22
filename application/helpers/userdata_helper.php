<?php

if (!function_exists('get_userdata')) {

    /**
     * Get Userdata Function Helper
     *
     * @param string $field
     * @return string
     */
    function get_userdata(string $field): string
    {
        $CI = &get_instance();
        $username_on_session = $CI->session->userdata('username');
        $query = $CI->db->query("SELECT * FROM tb_user INNER JOIN tb_student ON tb_user.student_id = tb_student.student_id WHERE username = '$username_on_session'")->row_array();
        return $query[$field];
    }
}
