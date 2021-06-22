<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends CI_Model
{

    /**
     * Change email method function
     *
     * @param array $post_data
     * @return string
     */
    public function change_picture(array $post_data): string
    {
        // new pictures
        $new_image = $post_data['new_image'];

        // update
        $this->db->set('photo', $new_image);
        $this->db->where('student_id', get_userdata('student_id'));
        $this->db->update('tb_student');

        // success response 
        $feedback_data = [
            'success'   =>  true,
            'status'    =>  200,
            'message'   =>  $this->bootstrapcss->alert('success', 'Foto profile berhasil diubah', true),
        ];
        $convert_to_json = json_encode($feedback_data);
        return $convert_to_json;
    }
}
