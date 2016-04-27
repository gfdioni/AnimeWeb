<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_upload
{
    public function upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $new_name = time() . "_" . $_FILES["userfiles"]['name'];
        $config['file_name'] = $new_name;
        $config['max_size'] = '10000';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->upload()) {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());

            return $data;
        }

    }
}