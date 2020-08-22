<section class="content-header">
	<h1>
		Data
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">User</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<div>
				<a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
					<i class="fa fa-plus"></i> Tambah
				</a>
			</div>
			<div class="box-body table-responsive">
				<!-- <?php print_r($row->result()) ?> -->
				<table class="table table-bordered table-striped" id="table1">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Name</th>
							<th>Level</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($row->result() as $key => $data) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data->username ?></td>
								<td><?= $data->name ?></td>
								<td><?= $data->level == 1 ? "Admin" : "Pegawai" ?></td>
								<td class="text-center" width="160px">
									<form action="<?= site_url('user/del') ?>" method="post">
										<a href="<?= site_url('user/edit/' . $data->id_user) ?>" class="btn btn-primary btn-xs">
											<i class="fa fa-pencil"></i> Update
										</a>

										<input type="hidden" name="id_user" value="<?= $data->id_user ?>">
										<button onclick="javascript: return confirm('are u sure delete this data?')" class="btn btn-danger btn-xs">
											<i class="fa fa-trash"></i> Delete
										</button>
									</form>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
</section>