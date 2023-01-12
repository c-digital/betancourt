<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends CI_Controller {

    private $table  = "language";
    private $phrase = "phrase";

    public function __construct(){
        parent::__construct();  
        $this->load->database();
        $this->load->dbforge(); 
        $this->load->helper('language');
        
        if ($this->session->userdata('isLogIn') == false) 
            redirect('login');
        
    } 
 
    public function index(){
        $data['module'] = display("languages");
        $data['title'] = display('add');
        $data['languages']    = $this->languages();
        $data['content']      = $this->load->view('language/main',$data,true); 
        $this->load->view('layout/main_wrapper', $data);
    }

    public function phrase(){
        $data['module'] = display("languages");
        $config = array();
        $config["base_url"] = base_url() . "language/phrase";
        $config["total_rows"] = $this->record_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        //css styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next &raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['title'] = display('phrase');
        $data['languages']    = $this->languages();
        $data['phrases']      = $this->phrases($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['content']      = $this->load->view('language/phrase',$data,true); 
        $this->load->view('layout/main_wrapper', $data);
    }

    public function record_count() {
        return $this->db->select("*")
            ->from($this->table)
            ->count_all_results();
    }
 

    public function languages()
    { 
        if ($this->db->table_exists($this->table)) { 

                $fields = $this->db->field_data($this->table);

                $i = 1;
                foreach ($fields as $field)
                {  
                    if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
                }

                if (!empty($result)) return $result;
 

        } else {
            return false; 
        }
    }


    public function addLanguage()
    { 
        $language = preg_replace('/[^a-zA-Z0-9_]/', '', $this->input->post('language',true));
        $language = strtolower($language);

        if (!empty($language)) {
            if (!$this->db->field_exists($language, $this->table)) {
                $this->dbforge->add_column($this->table, [
                    $language => [
                        'type' => 'TEXT'
                    ]
                ]); 
                $this->session->set_flashdata('message', 'Language added successfully');
                redirect('language');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('language');
    }


    public function editPhrase($language = null){ 
        $data['module'] = display("languages");
        $data['title'] = ucfirst($language);
        $data['language'] = $language;
        $data['phrases']  = $this->phrases();
        $data['content']  = $this->load->view('language/phrase_edit', $data, true); 
        $this->load->view('layout/main_wrapper', $data);

    }

    public function addPhrase() {  

        $lang = $this->input->post('phrase'); 

        if (sizeof($lang) > 0) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($this->phrase, $this->table)) {

                    foreach ($lang as $value) {

                        $value = preg_replace('/[^a-zA-Z0-9_]/', '', $value);
                        $value = strtolower($value);

                        if (!empty($value)) {
                            $num_rows = $this->db->get_where($this->table,[$this->phrase => $value])->num_rows();

                            if ($num_rows == 0) { 
                                $this->db->insert($this->table,[$this->phrase => $value]); 
                                $this->session->set_flashdata('message', 'Phrase added successfully');
                            } else {
                                $this->session->set_flashdata('exception', 'Phrase already exists!');
                            }
                        }   
                    }  

                    redirect('language/phrase');
                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('language/phrase');
    }
 
    public function phrases()
    {
        if ($this->db->table_exists($this->table)) {

            if ($this->db->field_exists($this->phrase, $this->table)) {

                return $this->db->order_by($this->phrase,'asc')
                    ->get($this->table)
                    ->result();

            }  

        } 

        return false;
    }

    public function addLebel() { 
        $language = $this->input->post('language', true);
        $phrase   = $this->input->post('phrase', true);
        $lang     = $this->input->post('lang', true);

        if (!empty($language)) {

            if ($this->db->table_exists($this->table)) {

                if ($this->db->field_exists($language, $this->table)) {

                    if (sizeof($phrase) > 0)
                    for ($i = 0; $i < sizeof($phrase); $i++) {
                        $this->db->where($this->phrase, $phrase[$i])
                            ->set($language,$lang[$i])
                            ->update($this->table); 

                    }  
                    $this->session->set_flashdata('message', 'Label added successfully!');
                    redirect('language/editPhrase/'.$language);

                }  

            }
        } 

        $this->session->set_flashdata('exception', 'Please try again');
        redirect('language/editPhrase/'.$language);
    }

    // delete language
    public function delete($key){ 

        if (!empty($key)) {
            if ($this->db->field_exists($key, $this->table)) {
                $this->dbforge->drop_column($this->table,$key); 
                $this->session->set_flashdata('message', 'Language deleted successfully');
                redirect('language');
            } 
        } else {
            $this->session->set_flashdata('exception', 'Please try again');
        }
        redirect('language');
    }
}



 