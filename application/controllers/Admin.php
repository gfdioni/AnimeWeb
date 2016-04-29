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
        $this->load->helper('Datatables');
        $this->load->helper('form');
    }

    function table_gen(){
        $tmpl = array('table_open' => '<table id="anime_full" class="table table-hover table-responsive table-bordered display" style="width: 100%">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('ID', 'Judul', 'Deskripsi singkat', '1080p', '720p', '480p');
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
         $this->table_gen();
        $this->load->view('admin/index');
    }

    public function loadtable()
    {
        $this->datatables
            ->select('id, title, desc_pendek, r_1080, r_720, r_480')
            ->unset_column('r_1080')
            ->unset_column('r_720')
            ->unset_column('r_480')
            ->add_column('r_1080', cek('$1'),'r_1080')
            ->add_column('r_720', cek('$1'),'r_720')
            ->add_column('r_480', cek('$1'),'r_480')
            ->from('anm_main');
        echo $this->datatables->generate();
    }

    public function anime()
    {
        $this->table_gen();
        $this->load->view('admin/pages/anime/index');
    }

    public function addanime()
    {
        $title = $this->input->post('InputTitle');
        $eps = $this->input->post('InputEpisode');
        $deskripsi = $this->input->post('InputDescription');
        if(substr_count($deskripsi,".") >= 2 && strlen($deskripsi) > 10){

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

           $result = $this->admin_model->add_anime($data);

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

    public function getData()
    {
        $anime_id = $this->input->post('id');
        $data[] = $this->admin_model->get_anime($anime_id);
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }

    public function delete()
    {

    }

}