<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Staff extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_staff');
	}

	function home(){
		$schedule['hasil']=$this->model_staff->schedule();
		$data['konten']=$this->load->view('staff/home',$schedule,TRUE);
		$this->load->view('staff/dashboardstaff',$data);
	}

	function layanan(){
		$datalayanan['hasil']=$this->model_staff->tampillayanan();
		$data['konten']=$this->load->view('staff/menulayanan',$datalayanan,TRUE);
		$this->load->view('staff/dashboardstaff',$data);
	}

	function reservasi(){
		$datareservasi['hasil']=$this->model_staff->datareservasi();
		$data['konten']=$this->load->view('staff/listreservasi',$datareservasi,TRUE);
		$this->load->view('staff/dashboardstaff',$data);
	}

	#================ CRUD LAYANAN =====================
	function simpanlayanan(){
		$this->model_staff->simpanlayanan();
		redirect('controller_staff/layanan');
	}

	function hapuslayanan($idLayanan){
		$this->model_staff->hapuslayanan($idLayanan);
		redirect('controller_staff/layanan');
	}
	
	function editlayanan($idLayanan){
		$this->model_staff->editlayanan($idLayanan);
	}
	#=================================================

	#=================== VERIF PESANAN =====================
	function validasipesanan($idPesanan){
		$this->model_staff->validasipesanan($idPesanan);
		redirect('controller_staff/reservasi');
	}
	#=======================================================
}
