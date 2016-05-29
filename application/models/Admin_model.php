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

    public function get_genre($id = FALSE)
    {
        if($id === FALSE)
        {
            $this->db->select('id, title');
            $query = $this->db->get('anm_genre');
            return $query->result_array();
        }

        $query = $this->db->get_where('anm_genre', array('id' => $id));
        return $query->row_array();
    }


    public function search_genre($search)
    {
        $this->db->select('id, title');
        $this->db->like('title', $search);
        $query = $this->db->get('anm_genre');
        return $query->result_array();
    }

    public function add($type, $data)
    {
        if($type == 1) 
        {
            return $this->db->insert('anm_main', $data);
        }
        else if($type == 2)
        {
            return $this->db->insert('anm_genre', $data);
        }
    }

    public function update_anime($id, $data)
    {
        $this->db->where('id',$id);
        return $this->db->update('anm_main',$data);
    }

    public function del($id)
    {
        $this->db->delete('anm_main', array('id' => $id));
        if ($this->db->error()) {
            $result = $this->db->error();
        } else if (!$this->db->affected_rows()) {
            $result = 'Error! ID ['.$id.'] not found';
        } else {
            $result = 'Success';
        }

        return $result;

    }
    
}