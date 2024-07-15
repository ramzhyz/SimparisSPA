<div class="container mt-3">
	<div class="row g-4">
		<div class="col-sm-12 col-xl-12">
			<div class="rounded h-100 p-4 border border-dark">
				<h2>Reservasi Layanan</h2>
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
			
			
				<form name="formdaftarreservasi" id="formdaftarreservasi" method="post" action="<?php echo base_url('controller_pelanggan/simpanreservasi') ?>">
						
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Reservasi Layanan</label>
						<div class="col-sm-10">
							<select class="form-select" name="idLayanan" id="idLayanan" required>
								<option value="">PILIH</option>
								<?php
									if(empty($hasil)){
										
									} else{
										foreach ($hasil as $data):
											?>
												<input type="checkbox" id="idLayanan" name="namaLayanan" value="<?php echo $data->idLayanan; ?>"><?php echo $data->namaLayanan; ?></input>
											<?php
										endforeach;
									}
								?>
							</select>
							<form >
								<input type="checkbox" id="idLayanan" name="namaLayanan" value="<?php echo $data->idLayanan; ?>"><?php echo $data->namaLayanan; ?></input>
							</form>
						</div>
					</div>
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Tanggal Reservasi</label>
						<div class="col-sm-10">
							<input type="date" class="form-control" id="tglPesanan" name="tglPesanan" required>
						</div>
					</div>
					<!--<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Waktu Reservasi</label>
						<div class="col-sm-10">
							<input type="time" class="form-control" id="wktMulai" name="wktMulai" required>
						</div>
					</div>-->
					<div class="row mb-3">
						<label class="col-sm-2 col-form-label">Waktu Reservasi</label>
						<div class="col-sm-10">
							<select class="form-select" name="wktMulai" id="wktMulai" required>
								<option value="">PILIH</option>
								<option value="08:00">08:00</option>
								<option value="09:00">09:00</option>
								<option value="10:00">10:00</option>
								<option value="11:00">11:00</option>
								<option value="12:00">12:00</option>
								<option value="13:00">13:00</option>
								<option value="14:00">14:00</option>
								<option value="15:00">15:00</option>
							</select>
						</div>
					</div>
					<br>
					<br>
					<br>
					<button type="submit" class="btn btn-primary" >Save</button>
					<button type="reset" class="btn btn-danger">cancel</button>
				</form>
			</div>
		</div>
	</div>
</div>