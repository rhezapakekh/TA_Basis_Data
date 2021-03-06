<?php
  //Errro upload
  if (isset($error)) {
   	echo '<p class="alert-warning">';
   	echo $error;
   	echo '</p>';  
  } 
	// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
echo form_open_multipart(base_url('admin/produk/edit/'.$produk->ID_BAJU_M),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Baju</label>
				<input type="text" name="NAMA_BAJU_M" class="form-control" placeholder="Nama Produk" value="<?php echo $produk->NAMA_BAJU_M ?>" required>
			</div>
			<div class="form-group">
				<label>Jenis Baju</label>
				<select name="ID_JENIS_M"class="form-control">
					<?php foreach ($jenis as $jenis) {?>
						<option value="<?php echo $jenis->ID_JENIS_M ?>" <?php if($produk->ID_JENIS_M==$jenis->ID_JENIS_M) { echo "selected"; } ?>>
							<?php echo $jenis->NAMA_JENIS_BAJU_M ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Ukuran Produk</label>
				<input type="text" name="UKURAN_BAJU_M" class="form-control" placeholder="Ukuran Produk" value="<?php echo $produk->UKURAN_BAJU_M ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Harga Produk</label>
				<input type="text" name="HARGA_BAJU_M" class="form-control" placeholder="harga Produk" value="<?php echo $produk->HARGA_BAJU_M ?>" required>
			</div>
			<!-- <div class="form-group">
				<label for="exampleInputFile">File input</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="GAMBAR" class="custom-file-input" id="exampleInputFile">
						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
					</div>
				</div>
			</div> -->
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>