<?php $patient = $this->getTableRow(); ?>
<div class="container-fluid m-0 p-4">
<form method="post" action="<?php echo $this->getUrl()->getUrl('save','Patient');?>" id="patientForm">
	<div class="container-fluid m-0 p-2 row">
		<h3><?php if (!$patient->patientId) { echo "Add patient";} ?></h3>
		<h3><?php if ($patient->patientId) { echo "Update patient";} ?></h3>
	</div>
	<div class="container-fluid m-0 p-2">
		<div class="row m-0 p-1">
			<div class="col-md-2 m-0 p-0">
				<p>Patient Name</p>
			</div>
			<div class="col-md-5 m-0 p-0">
				<input type="text" class="form-control" name="patient[name]" required="" value="<?php echo $patient->name; ?>">
			</div>
		</div>
		<div class="row m-0 p-1">
			<div class="col-md-2 m-0 p-0">
				<p>Age</p>
			</div>
			<div class="col-md-5 m-0 p-0">
				<input type="number" class="form-control" name="patient[age]" required="" value="<?php echo $patient->age; ?>">
			</div>
		</div>
		<div class="row m-0 p-1">
			<div class="col-md-2 m-0 p-0">
				<p>Address</p>
			</div>
			<div class="col-md-5 m-0 p-0">
				<textarea name="patient[address]" class="form-control" required="" cols="23" rows="3"><?php echo $patient->address; ?></textarea>
			</div>
		</div>
		<div class="row m-0 p-1">
			<div class="col-md-2 m-0 p-0">
				<p>Mobile Number</p>
			</div>
			<div class="col-md-5 m-0 p-0">
				<input type="number" name="patient[mobileNumber]" class="form-control" required="" value="<?php echo $patient->mobileNumber; ?>">
			</div>
		</div>
		<div class="row m-0 p-1">
			<div class="col-md-2 m-0 p-0">
				<button type="submit" class="btn btn-success"><?php if (!$patient->patientId) { echo "Add";} else {echo 'Update';} ?></button>
				<a type="button" class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('grid','Patient'); ?>">Back</a>
			</div>
		</div>
	</div>
</form>
</div>