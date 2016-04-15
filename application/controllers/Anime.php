<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anime extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('anime_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->load->view('v_adm_anime');
    }

    public function addNew()
    {
        $this->load->view('v_add_anime');
    }

    public function delete()
    {

    }

    public function update()
    {

    }

}