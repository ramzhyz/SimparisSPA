<?php
    Class Model_Staff extends CI_Model{
        function tampillayanan(){
            $query=$this->db->get('tblayanan');
            if($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $hasil[]=$data;
                }
            } else {
                $hasil="";
            }
            return $hasil;
        }
        
        function tampilterapis(){
            $query=$this->db->get('tbterapis');
            if($query->num_rows()>0){
                foreach ($query->result() as $data) {
                    $hasil[]=$data;
                }
            } else {
                $hasil="";
            }
            return $hasil;
        }

        function simpanlayanan(){
            $data=$_POST;
            $idLayanan=$data['idLayanan'];
            
            $query=$this->db->get_where('tblayanan', array('idLayanan' => $idLayanan));

			if($query->num_rows()==0){
                $this->db->insert('tblayanan',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $kode=array('idLayanan'=>$idLayanan);
                $this->db->where($kode);
                $this->db->update('tblayanan',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
        }

        function hapuslayanan($idLayanan){
			$this->db->delete('tblayanan', array('idLayanan' => $idLayanan));
		}
        
		function editlayanan($idLayanan){
			$query=$this->db->get_where('tblayanan', array('idLayanan' => $idLayanan));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idLayanan').val('".$data->idLayanan."');</script>";
				echo "<script>$('#namaLayanan').val('".$data->namaLayanan."');</script>";	
				echo "<script>$('#durasiLayanan').val('".$data->durasiLayanan."');</script>";
				echo "<script>$('#hargaLayanan').val('".$data->hargaLayanan."');</script>";
				echo "<script>$('#keterangan').val('".$data->keterangan."');</script>";
			}
		}

        function simpanterapis(){
            $data=$_POST;
            $idTerapis=$data['idTerapis'];
            $config['upload_path'] = './upload/'; // Folder untuk menyimpan gambar
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            $upload_data = $this->upload->data();
            $data['fotoTerapis'] = $upload_data['file_name'];

            $query=$this->db->get_where('tbterapis', array('idTerapis' => $idTerapis));

			if($query->num_rows()==0){
                $this->db->insert('tbterapis',$data);
				$this->session->set_flashdata('pesan','Data sudah disimpan');
            } else{
                $kode=array('idTerapis'=>$idTerapis);
                $this->db->where($kode);
                $this->db->update('tbterapis',$data);
				$this->session->set_flashdata('pesan','Data sudah diedit');
            }
        }

        function hapusterapis($idTerapis){
			$this->db->delete('tbterapis', array('idTerapis' => $idTerapis));
		}
        
		function editterapis($idTerapis){
			$query=$this->db->get_where('tbterapis', array('idTerapis' => $idTerapis));
			if ($query->num_rows()>0){
				$data=$query->row();
				echo "<script>$('#idTerapis').val('".$data->idTerapis."');</script>";
				echo "<script>$('#namaTerapis').val('".$data->namaTerapis."');</script>";	
				echo "<script>$('#Spesialisasi').val('".$data->Spesialisasi."');</script>";
				echo "<script>$('#telpTerapis').val('".$data->telpTerapis."');</script>";
				echo "<script>$('#fotoTerapis').val('".$data->fotoTerapis."');</script>";
			}
		}

        function schedule(){
            $currentDate = date('Y-m-d');
            $this->db->select('idPesanan, namaLayanan, tglLayanan, wktMulai, wktSelesai, pTelp, status');
            $this->db->from('tbpelanggan');
            $this->db->join('tbpesanan', 'tbpelanggan.idPelanggan=tbpesanan.idPelanggan');
            $this->db->join('tblayanan', 'tbpesanan.idLayanan=tblayanan.idLayanan');
            
            $this->db->order_by('tglLayanan', 'ASC');
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

        function datareservasi(){
            $this->db->select('idPesanan, namaLayanan, tglPesanan, wktMulai, wktSelesai, pTelp');
            $this->db->from('tbpelanggan');
            $this->db->join('tbpesanan', 'tbpelanggan.idPelanggan=tbpesanan.idPelanggan');
            $this->db->join('tblayanan', 'tbpesanan.idLayanan=tblayanan.idLayanan');
            $this->db->where('validasi', null);
            $this->db->order_by('tglpesanan', 'ASC');
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

        function validasipesanan($idPesanan){
            $data=$_POST;
            $id=array('idPesanan'=>$idPesanan);
            $this->db->where($id);
            $this->db->update('tbpesanan', $data);
            $this->db->where($id);
            $qr=$this->db->get('tbpesanan');
            if($qr->row('validasi')=='Valid'){
                $data1=array('status'=>'Aktif');
                $this->db->where($id);
                $this->db->update('tbpesanan', $data1);
            } elseif($qr->row('validasi')=='Invalid'){
                $data1=array('status'=>'Inaktif');
                $this->db->where($id);
                $this->db->update('tbpesanan', $data1);
            }
        }
    }
?>