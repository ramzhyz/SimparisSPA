<?php

    defined('BASEPATH') OR exir('No direct script access allowed');

    require_once APPPATH . 'third_party/PHPMailer/src/PHPMailer.php';
    require_once APPPATH . 'third_party/PHPMailer/src/SMTP.php';
    require_once APPPATH . 'third_party/PHPMailer/src/Exception.php';

    Class Model_Main extends CI_Model{

        function validasi(){
            if($this->session->userdata('Id')==''){
                echo "<script>
                alert('Anda tidak memiliki hak akses! Harap login terlebih dahulu');
                location.href='login';
                </script>";
            }
        }

        function proseslogin(){
            session_start();
            $data=$_POST;
            $email=$data['email'];
            $password=$data['password'];
            $sql1="select * from tblogin where email='".$email."' and password='".$password."'";
            $sql2="select * from tbpelanggan where pEmail='".$email."' and pPassword='".$password."'";
			$query1=$this->db->query($sql1);
            $query2=$this->db->query($sql2);
			if ($query1->num_rows()>0){
                if ($query1->row('level')==2){
                    $data=$query2->row();
                    $id=$data->idPelanggan;
    
                    $session=array('Id'=>$id);
                    $this->session->set_userdata($session);
                    
                    redirect('');
                } elseif ($query1->row('level')==1) {
                    $data=$query2->row();
                    $Username=$data->email;

                    $session=array('Id'=>$id);
                    $this->session->set_userdata($session);

                    redirect('../controller_staff/home');
                }
            } else{
                $this->session->set_flashdata('pesan','Email atau Password Salah!');
                redirect('controller_main/login');
            }
        }

        function prosesregistrasi(){
            $data=$_POST;
            $inP['pEmail']=$data['email'];
            $inP['pPassword']=$data['password'];
            $inP['pNama']=$data['nama'];
            $inP['pTelp']=$data['telp'];
            $inL['email']=$data['email'];
            $inL['password']=$data['password'];
            $inL['level']=2;
            $query=$this->db->get_where('tbpelanggan', array('pEmail' => $data['email']));
            if($query->num_rows()>0){
                $this->session->set_flashdata('pesanregistrasi','Akun yang dimasukkan sudah ada!');
            }else{
                $this->db->insert('tbpelanggan',$inP);
                $this->db->insert('tblogin',$inL);
                $this->session->set_flashdata('pesanregistrasi','Berhasil Registrasi');
            }
            redirect('controller_main/login');
        }

        function dataservice(){
            $query=$this->db->get('tblayanan');
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function datareservasi(){
            $idPelanggan=$this->session->userdata('Id');
            $where=array('idPelanggan' => $idPelanggan);
            $this->db->select('idPelanggan, idPesanan, namaLayanan, tglPesanan, wktMulai, wktSelesai, hargaLayanan');
            $this->db->from('tbpesanan');
            $this->db->join('tblayanan', 'tbpesanan.idLayanan=tblayanan.idLayanan');
            $this->db->where($where);
            $query=$this->db->get();
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function packagelist(){
            $query=$this->db->get('tblayanan');
            if($query->num_rows()>0){
                foreach($query->result() as $data){
                    $hasil[]=$data;
                } 
            } else{
                $hasil="";
            }
            return $hasil;
        }

        function get_available_times($date) {
            $this->db->select('wktMulai');
            $this->db->from('tbpesanan');
            $this->db->where('tglLayanan', $date);
            $query = $this->db->get();
            return $query->result_array();
        }

        function simpanreservasi(){
            $data=$_POST;
            $idPelanggan=$this->session->userdata('Id');
            $idLayanan=$data['idLayanan'];
            $query=$this->db->get_where('tblayanan', array('idLayanan' => $idLayanan));
            $durasi=$query->row('durasiLayanan');
            $time1 = $data['wktMulai'];
            $minutes = $durasi;

            list($hour, $minute) = explode(':', $time1);
            $hour += floor(($minute + $minutes) / 60);
            $minute = ($minute + $minutes) % 60;
            $result = sprintf("%02d:%02d", $hour, $minute);
            $data['wktSelesai'] = $result;

            $data['idPelanggan']=$idPelanggan;
            $this->db->insert('tbpesanan',$data);
            $this->session->set_flashdata('pesan','Berhasil Reservasi');
        }
        
    }
?>