<div class="container mt-3">
    <br>
    <h2>Jadwal</h2>
	<hr class="mb-4">
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="bg-info">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <!--select>
                            <option value="">Nama</option>
                        <!?php
                            foreach($hasil as $data):
                                ?>
                                <option value="<!?php echo $data->idTerapis ?>"><!?php echo $data->namaTerapis ?></option>
                                <!?php
                            endforeach;
                        ?>
                        </select-->
                    </th>
                    <th></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nama Layanan</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Telepon</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(empty($hasil)){
                        ?>
                            <tr>
                                <td colspan="6" align="center">Kosong</td>
                            </tr>
                        <?php
                    } else{
                        foreach($hasil as $data):
                ?>
                        <tr>
                            <td><?php echo $data->idPesanan; ?></td>
                            <td><?php echo $data->namaLayanan; ?></td>
                            <td><?php echo $data->tglLayanan; ?></td>
                            <td><?php echo $data->wktMulai; ?></td>
                            <td><?php echo $data->wktSelesai; ?></td>
                            <td><?php echo $data->pTelp; ?></td>
                        </tr>
                <?php
                        endforeach;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>