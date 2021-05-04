<?php $collection = $this->getCollection()->getData(); ?>
<div class="container-fluid m-0 p-4">
	<div class="row m-0 p-1">
		<div class="container-fluid m-0 p-0 row">
			<div class="container-fluid m-0 p-0 col-8">
				<?php foreach ($this->getButtons() as $key => $button) : ?>
					<?php $method = $button['method']; ?>
						</button>
						<a class="<?php echo $button['class'] ?> m-1" href="<?php echo $this->$method(); ?>"><?php echo $button['label']; ?></a>
				<?php endforeach; ?>
			</div>
			<form class="container-fluid m-0 p-0 col-3" method="post" action="<?php echo $this->getUrl()->getUrl('searchPatient','Patient',null,true); ?>">
				<div class="container-fluid m-0 p-0 row">
					<div class="container-fluid m-0 p-0 col-10">
						<input type="text" class="form-control" name="patientName" required="">
					</div>
					<div class="container-fluid m-0 p-0 col-2">
						<button class="btn btn-primary ml-1" type="submit">Find</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<h3><?php echo $this->getTitle(); ?></h3>
	<div class="container-fluid m-0 p-1">
		<table class="table">
			<tr>
				<?php foreach ($this->getColumns() as  $column): ?>
					<th><?php echo $column['label']; ?></th>
				<?php endforeach ?>
			</tr>

			<?php if (count($collection)): ?>
				<?php foreach ($collection as $key => $value): ?>
					<tr>
						<?php foreach ($this->getColumns() as $column): ?>
							<?php if ($column['field'] != 'action'): ?>
								<td><?php echo $this->getFieldValue($value, $column['field']); ?></td>
							<?php endif ?>
						<?php endforeach ?>
						
						<td>
							<?php foreach ($this->getActions() as $key => $action): ?>
								<a class="btn" href="<?php echo $this->getMethodUrl($value, $action['method']);?>"><?php echo $action['label']; ?></a>
							<?php endforeach ?>
						</td>
					</tr>
				<?php endforeach ?>
			<?php else: ?>
				<center><p>No Data Found</p></center>
			<?php endif; ?>
		</table>
	</div>
</div>