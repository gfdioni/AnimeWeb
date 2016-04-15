<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        //$this->load->model('m_login');
        $this->load->library('session');
    }

    function index(){
        $this->load->view('v_login');
    }

}