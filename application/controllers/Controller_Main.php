<?php
    class Controller_Main extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('email');
            $this->load->model('model_main');
        }

        function home(){
            $data['about']=$this->load->view('main/about','',TRUE);
            $data['service']=$this->load->view('main/service','',TRUE);
            $packagelist['hasil']=$this->model_main->packagelist();
            $data['package']=$this->load->view('main/package',$packagelist,TRUE);
            $data['contact']=$this->load->view('main/footer','',TRUE);
            $this->load->view('main/index',$data);
        }

        function login(){
		    $this->load->view('main/login');
        }

        function proseslogin(){
            $this->model_main->proseslogin();
        }

        function prosesregistrasi(){
            $this->model_main->prosesregistrasi();
        }

        function reservation(){
            $this->model_main->validasi();
            $data['hasil']=$this->model_main->dataservice();
            $this->load->view('main/reservation', $data);
        }

        function listreservasi(){
            $this->model_main->validasi();
            $data['hasil']=$this->model_main->datareservasi();
            $this->load->view('main/listreservasi', $data);
        }

        function simpanreservasi(){
            $this->model_main->simpanreservasi();
            redirect('controller_main/reservation');
        }

        function logout(){
            $this->session->sess_destroy();
            redirect('');	
        }
    }
?>