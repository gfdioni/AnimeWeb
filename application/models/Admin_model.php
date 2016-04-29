<?php
class Admin_model extends CI_Model{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_anime($id = FALSE)
    {
        if($id === FALSE)
        {
            $query = $this->db->get('anm_main');
            return $query;
        }

        $query = $this->db->get_where('anm_main', array('id' => $id));
        return $query->row_array();
    }

    public function add_anime($data)
    {
        return $this->db->insert('anm_main', $data);
    }

    public function update_anime($id, $data)
    {
        $this->db->where('id',$id);
        return $this->db->update('anm_main',$data);
    }

}