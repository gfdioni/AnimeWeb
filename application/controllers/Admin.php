<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
        $this->load->database();
        $this->load->library('Datatables');
        $this->load->library('table');
        //$this->load->helper('Datatables');
        $this->load->helper('form');
    }

    function table_gen($id){

        if($id == 1){
        $tmpl = array('table_open' => '<table id="anime_full" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('ID', 'Judul', 'Episode', 'Deskripsi singkat');
        }

        else if($id == 2){
            $tmpl = array('table_open' => '<table id="genre_table" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('ID', 'Genre', 'Deskripsi');
        }
    }

    public function loadtable()
    {   $id=$this->input->get("id");
        if($id == 1) {
            $this->datatables
                ->select('id, title, eps, desc_pendek')
                ->from('main');
        }
        else if($id == 2){
            $this->datatables
                ->select('id, title, deskripsi')
                ->from('genre');
        } else if($id == 3){

        }
        echo $this->datatables->generate();
    }

    public function do_upload($id_form, $upload_path)
    {
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $new_name = time() . "_" . $_FILES["InputImage"]['name'];
        $config['file_name'] = $new_name;
        $config['max_size'] = '10000';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($id_form)) {

            $data = array('upload_data' => $this->upload->data());
            return $data;

        } else {

            $error = array('error' => $this->upload->display_errors());
            return $error;
        }

    }

    public function index()
    {
        //$data['anime'] = $this->admin_model->get_anime();
         $this->table_gen('1');
        $this->load->view('admin/index');
    }

    public function anime()
    {
        $this->table_gen(1);
        $this->load->view('admin/pages/anime_manage/anime');
    }

    public function genre()
    {
        $this->table_gen(2);
        $this->load->view('admin/pages/options/genre');
    }

    public function addanime()
    {
        $title = $this->input->post('InputTitle');
        $eps = $this->input->post('InputEpisode');
        $deskripsi = $this->input->post('InputDescription');
        if(substr_count($deskripsi,".") >= 2 && strlen($deskripsi) > 20){

        $pecah = explode(".", $deskripsi, 3);
        $deskripsi_singkat = $pecah[0] . '.' . $pecah[1] . '.';

        } else {

            $deskripsi_singkat = $this->input->post('InputDescription');

        }
        $genre = json_encode($this->input->post('InputGenre'));
        $linkmal= $this->input->post('InputMalLink');

        if(isset($_FILES['InputImage']['name']) && !empty($_FILES['InputImage']['name']))
        {
        $fileimage = $this->do_upload('InputImage',"./uploads/anime/");
            $data = array(
                'title' => $title,
                'eps' => $eps,
                'desc_panjang' => $deskripsi,
                'desc_pendek' => $deskripsi_singkat,
                'genre' => $genre,
                'linkmal' => $linkmal,
                'image_name' => $fileimage['upload_data']["file_name"]

             );
        } else {
            $data = array(
                'title' => $title,
                'eps' => $eps,
                'desc_panjang' => $deskripsi,
                'desc_pendek' => $deskripsi_singkat,
                'genre' => $genre,
                'linkmal' => $linkmal

            );
        }
        if ($this->input->post('IdAnime') == '') {

           $result = $this->admin_model->add(1, $data);

           //echo "id anime:".$this->input->post('IdAnime');


        } else {

            $id = $this->input->post('IdAnime');

            $result = $this->admin_model->update_anime($id, $data);

            //echo "id anime:".$this->input->post('IdAnime');

        }

        //print_r($data);
        //print_r($result);
       redirect('admin/genre/');
    }

    public function addgenre()
    {
        $title = $this->input->post('InputTitle');
        $deskripsi = $this->input->post('InputDescription');
        $data = array(
            'title' => $title,
            'deskripsi' => $deskripsi,
        );
        $this->admin_model->add(2, $data);
        redirect("admin/genre/");
    }

    public function getgenre()
    {
        if(($this->input->post('id') == "") && ($this->input->get('q') == "")){
            $data = $this->admin_model->get_genre();
        } else if($this->input->get('q') !== ""){
            $search = strip_tags(trim($this->input->get('q')));
            $hasil= $this->admin_model->search_genre($search);
            if(count($hasil) > 0){
                foreach ($hasil as $key => $value) {
                    $data[] = array('id' => $value['id'], 'text' => $value['title']);
                }
            } else {
                $data[] = array('id' => '0', 'text' => 'No Products Found');
            }
        } else {
            $id = $this->input->post('id');
            $data = $this->admin_model->get_genre($id);
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $data[] = $this->admin_model->get_anime($id);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }

    public function delete()
    {

    }

}