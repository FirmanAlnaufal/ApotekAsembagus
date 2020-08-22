<section class="content-header">
      <h1>
        Data
        <small>Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php $this->view('messages')?>
      <div class="box">
      	<div class="box-header">
      			<a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-social" title="Tambah Data" data-toggle="tooltip">
      				<i class="fa fa-plus"></i> Tambah
				  </a>
				  <!-- <a href="<?=site_url('distributor/print')?>" class="btn btn-danger btn-social" title="print" data-toggle="tooltip">
      				<i class="fa fa-print"></i> Print
				  </a>
				  <a href="<?=site_url('distributor/pdf')?>" class="btn btn-danger btn-social" title="export pdf" data-toggle="tooltip">
      				<i class="fa fa-file"></i> PDF
      			</a> -->
      		</div>
      		<div class="box-body table-responsive">
      			<table class="table table-bordered table-striped" id="table1">
      				<thead>
      					<tr>
      						<th>No</th>
      						<th>id customer</th>
      						<th>nama customer</th>
      						<th>nomor telephone</th>
      						<th>jarak tempuh</th>
      						<th>potongan</th>
      						<th>harga</th>
      						<th>aksi</th>
      					</tr>
      				</thead>
      				<tbody>
      					<?php $no=1;
      					foreach($row->result() as $key => $data) { ?>
      					<tr>
      						<td><?= $no++?></td>
      						<td><?= $data->id_customer?></td>
      						<td><?= $data->nama_c?></td>
      						<td><?= $data->telephone?></td>
      						<td><?= $data->jarak?></td>
      						<td><?= $data->potongan?></td>
      						<td><?= $data->harga?></td>
      						<td class="text-center" width="160px">
      							<a href="<?=site_url('customer/edit/' .$data->id_customer)?>"  class="btn btn-primary btn-xs">
			      				<i class="fa fa-pencil"> Update</i>
			      				</a>
      							<a href="<?=site_url('customer/del/' .$data->id_customer)?>" onclick="return confirm('apakah anda yakin hapus data? ')" class="btn btn-danger btn-xs">
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