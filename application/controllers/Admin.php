<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*

Urutan berdasarkan ID
1 = Main Anime
2 = Genre
3 = Episode
4 = File Hosting
5 = Resolution

*/

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
			//Main Table Anime
			$tmpl = array('table_open' => '<table id="anime_full" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
			$this->table->set_template($tmpl);

			$this->table->set_heading('ID', 'Judul', 'Episode', 'Deskripsi singkat');
        }

        else if($id == 2){
			//Table genre
            $tmpl = array('table_open' => '<table id="genre_table" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('ID', 'Genre', 'Deskripsi');
        }

        else if($id == 3){
			//Table Episode
            $tmpl = array('table_open' => '<table id="eps_table" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('ID', 'Anime Title', 'Episode', 'Resolution', 'File Hosting', 'Link');
        }

        else if($id == 4){
			//Table File Hosting
            $tmpl = array('table_open' => '<table id="filehost_table" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('ID', 'File Hosting Name', 'Amount');
        }

        else if($id == 5){
			//Table Resolusi
            $tmpl = array('table_open' => '<table id="res_table" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
            $this->table->set_template($tmpl);

            $this->table->set_heading('ID', 'Resolution');
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
        $config['allowed_types'] = 'jpg|png|jpeg|bmp';
        $new_name = time() . "_" . $_FILES[$id_form]['name'];
        $config['file_name'] = $new_name;
        $config['max_size'] = '25600';
        $config['max_width']  = '5000'; //lebar maksimum 5000 px
        $config['max_height']  = '5000'; //tinggi maksimum 5000 px
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
       redirect('admin/anime/');
    }

    public function delanime()
    {
            $id = $this->input->post('id');
            echo $id;
            $this->admin_model->del($id);
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