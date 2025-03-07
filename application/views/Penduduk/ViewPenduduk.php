<style type="text/css">
    #btnAction {
        width: 100%;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Penduduk</h4>
                <h6 class="card-subtitle">Desa Ketringan</h6>

            <!-- Message Notification Success or Failed -->
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <!-- End Message -->

                <div class="table-responsive m-t-40">
                    <a href="<?= base_url('add_penduduk') ?>" class="btn btn-primary">
                        <i class="mdi mdi-account-plus"></i> Tambah Data
                    </a>
                    <button class="btn btn-success" data-toggle="modal" data-target="#importModal">
                        <i class="mdi mdi-file-import"></i> Import Data
                    </button>

                    <!-- Modal Import -->
                    <div id="importModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="importModalLabel">Import Excel</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('import_penduduk') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="excelFile">File Excel</label>
                                            <input type="file" class="form-control" id="excelFile" name="excelFile" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Upload</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <table id="myTable" class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <!-- <th>No. KK</th> -->
                                <th>Nama</th>
                                <th>Tempat Tgl Lahir</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <!-- <th>No. KK</th> -->
                                <th>Nama</th>
                                <th>Tempat Tgl Lahir</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th>Pendidikan</th>
                                <th>Pekerjaan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get_penduduk as $row) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->nik; ?>
                                    </td>
                                    <!-- <td>
                                        <?php echo $row->no_kk; ?>
                                    </td> -->
                                    <td>
                                        <?php echo $row->nama; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->tmp_lahir; ?>, <?php echo $row->tgl_lahir; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->agama; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->status_nikah; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->pendidikan; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->pekerjaan; ?>
                                    </td>
                                    <td style="width: 12%;">
                                        <a class="btn btn-info mt-2" id="btnAction" href="<?php echo base_url('detail_penduduk/' . $row->nik); ?>">
                                            <i class="mdi mdi-library-books"></i> Detail
                                        </a>
                                        <a class="btn btn-warning mt-2" id="btnAction" href="<?php echo base_url('edit_penduduk/' . $row->nik); ?>">
                                            <i class="mdi mdi-table-edit"></i> Ubah
                                        </a>
                                        <!-- <a class="btn btn-danger" href="<?php echo base_url('delete_penduduk/' . $row->nik); ?>">
                                            <i class="mdi mdi-delete"></i>
                                        </a> -->
                                        <button class="btn btn-danger mt-2 mb-2" id="btnAction" onclick="confirmDelete('<?php echo base_url('delete_penduduk/' . $row->nik); ?>')">
                                            <i class="mdi mdi-delete"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>