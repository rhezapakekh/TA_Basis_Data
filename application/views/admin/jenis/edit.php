<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open(base_url('admin/jenis/edit/' .$jenis->ID_JENIS_M), 'class="form-horizontal"');
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title"><?php echo $title ?></h3>
	</div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="NAMA_JENIS_BAJU_M" class="form-control" placeholder="Nama Jenis" value="<?php echo $jenis->NAMA_JENIS_BAJU_M ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
	<?php echo form_close(); ?>
</div>
