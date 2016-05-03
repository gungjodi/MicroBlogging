<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
            parent::__construct();
	}

	public function index()
	{
            $this->load->view('content/home');
	}
        
        public function view()
	{
            $data_posting=array();
            $res=$this->home_model->view();
            $html='';
            foreach($res as $row)
            {
                $html.='<div class="col-md-8 col-md-offset-2">
                    <div class="jumbotron" style="background:none;border-bottom:1px solid #ccc">
                        <div class="row" id="posting" id_r="'.$row->id_posting.'">
                            <div class="col-md-12">
                                <div class="col-md-10">
                                <p>'.nl2br($row->text_content).'</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <div class="col-md-4">Date: '.$row->date.'</div>
                                <div class="col-md-4">Total Views: '.$row->view.'</div>
                                <div class="col-md-4">          
                                    <button class="btn btn-sm btn-primary" id="update" id_r="'.$row->id_posting.'">Update</button>
                                    <button class="btn btn-sm btn-danger" id="delete" id_r="'.$row->id_posting.'">Delete</button>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            echo $html;
	}
        
	public function add()
	{
            $id_posting = NULL;
            $data = $this->input->post();			
            $id_posting = $this->input->post("id_posting");		
            $test = $this->home_model->add($data, $id_posting);
            
            if ($test) {
                echo "1";		
            }
            
            
	}
        
        public function count_view()
	{
            $id_posting = $this->input->post("id_posting");
            $success = $this->home_model->count_view($id_posting);
            if ($success) {
                echo "1";
            }
	}
        
        public function get_content()
        {
            $id_posting = $this->input->post("id_posting");
            $row = $this->home_model->get_content($id_posting);
            echo json_encode($row);
        }
        
	public function delete()
	{
            $id_posting = $this->input->post("id_posting");
            $success = $this->home_model->delete($id_posting);
            if ($success) {
                echo "1";
            }
	}
}
