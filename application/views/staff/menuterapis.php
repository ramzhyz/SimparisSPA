<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h2>Daftar Terapis</h2>
				<hr class="mb-4">
				<?php
					$pesan=$this->session->flashdata('pesan');
					if($pesan==""){
						echo "";
					} else{
						?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
								<?php echo $pesan; ?>
							</div>
						<?php
					}
				?>
			
			
				<form name="formdaftarterapis" id="formdaftarterapis" method="post" action="<?php echo base_url('controller_staff/simpanterapis') ?>">
					
							<input type="hidden" class="form-control" name="idTerapis" id="idTerapis">
						
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Nama Terapis</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="namaTerapis" name="namaTerapis" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Spesialisasi</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="Spesialisasi" name="Spesialisasi" required>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">No. Telepon</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="telpTerapis" name="telpTerapis" required>
						</div>
					</div>
					<button type="submit" class="btn btn-primary" >Save</button>
					<button type="reset" class="btn btn-danger">Cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container mt-3">
    <br>
    <h2>Data Terapis</h2>
	<hr class="mb-4">
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="bg-info">
                <tr>
                    <th>Nama Terapis</th>
                    <th>Spesialisasi</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(empty($hasil)){
                        ?>
                            <tr>
                                <td colspan="4" align="center">Data Kosong</td>
                            </tr>
                        <?php
                    } else{
                        foreach($hasil as $data):
                ?>
                        <tr>
                            <td><?php echo $data->namaTerapis; ?></td>
                            <td><?php echo $data->Spesialisasi; ?></td>
                            <td><?php echo $data->telpTerapis; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" onclick="editterapis('<?php echo $data->idTerapis; ?>');">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapusterapis('<?php echo $data->idTerapis; ?>');">Hapus</button>
                            </td>
                        </tr>
                <?php
                        endforeach;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script language="javascript">
        function hapusterapis(idTerapis){
            if(confirm("Apakah yakin menghapus data ini?")){
                window.open("<?php echo base_url(); ?>controller_staff/hapusterapis/"+idTerapis,"_self");	
            }
        }
        
        function editterapis(idTerapis){
            load("controller_staff/editterapis/"+idTerapis,"#script");	
        }
</script>