<section class="content-header">
	<h1>
		Data
		<small>pegawai</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
		<li class="active">pegawai</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<?php $this->view('messages') ?>
	<div class="box">
		<div class="box-header">
			<a href="<?= site_url('pegawai/add') ?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
				<i class="fa fa-plus"></i> Tambah
			</a>
		</div>
		<div class="box-body table-responsive">
			<!-- <?php print_r($row->result()) ?> -->
			<table class="table table-bordered table-striped" id="table1">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Gender</th>
						<th>Telephone</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $data->name ?></td>
							<td><?= $data->gender ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->address ?></td>
							<td class="text-center" width="160px">
								<a href="<?= site_url('pegawai/edit/' . $data->id_pegawai) ?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil"> Update</i>
								</a>
								<a href="<?= site_url('pegawai/del/' . $data->id_pegawai) ?>" onclick="return confirm('apakah anda yakin hapus data? ')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"> Delete</i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>