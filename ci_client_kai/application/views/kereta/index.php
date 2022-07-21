<div class="container pt-5">
    <h3><?= $title ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Kereta</a></li>
            <li class="breadcrumb-item active" aria-current="page">List Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('kereta/add/') ?>">Tambah Data</a>
            <div mb-2>
                <!-- Menampilkan flash data (pesan saat data error)-->
                <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error! <?= $this->session->flashdata('message'); ?>
                        <button type="button" class="close" data-dismiss="alert" arialabel="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered tablehover text-sm" id="tabletiket">
                            <thead>
                                <tr class="table-primary">
                                    <th>Id Kereta</th>
                                    <th>Nama Kereta</th>
                                    <th>Tujuan Kereta</th>
                                    <th>Asal Kereta</th>
                                    <th>Harga Kereta</th>
                                    <th>Berangkat Kereta</th>
                                    <th>Tiba Kereta</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data_kereta as $row) :
                                ?>
                                    <tr>
                                        <td><?= $row['id_kereta'] ?></td>
                                        <td><?= $row['nama_kereta'] ?></td>
                                        <td><?= $row['tujuan_kereta'] ?></td>
                                        <td><?= $row['asal_kereta'] ?></td>
                                        <td><?= $row['harga_kereta'] ?></td>
                                        <td><?= $row['berangkat_kereta'] ?></td>
                                        <td><?= $row['tiba_kereta'] ?></td>
                                        <td>
                                            <a href="<?= base_url('kereta/detail/' . $row['id_kereta']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="<?= base_url('kereta/edit/' . $row['id_kereta']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('kereta/delete/' . $row['id_kereta']) ?>" class="btn btn-danger btn-sm item-delete tombol-hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tabletiket').DataTable();
</script>