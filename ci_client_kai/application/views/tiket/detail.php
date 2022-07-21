<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tiket</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tiket'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Tiket
                </div>
                <div class="card-body">
                    <?php foreach ($data_tiket as $data_tiket) : ?>
                        <h5 class="card-title"><b>Id Tiket :</b><br><?= $data_tiket['id_tiket'] ?></h5>
                        <p class="card-text"><b>Id Kereta :</b><br><?= $data_tiket['id_kereta'] ?></p>
                        <p class="card-text"><b>Id Penumpang :</b><br><?= $data_tiket['id_penumpang'] ?></p>
                        <p class="card-text"><b>Nama Kereta :</b><br><?= $data_tiket['nama_kereta'] ?></p>
                        <p class="card-text"><b>Nama Penumpang :</b><br><?= $data_tiket['nama_penumpang'] ?></p>
                        <p class="card-text"><b>Berangkat Kereta :</b><br><?= $data_tiket['berangkat_kereta'] ?></p>
                        <p class="card-text"><b>Tiba Kereta :</b><br><?= $data_tiket['tiba_kereta'] ?></p>
                        <p class="card-text"><b>Tipe Tiket :</b><br><?= $data_tiket['tipe_tiket'] ?></p>
                        <p class="card-text"><b>Tanggal Tiket :</b><br><?= $data_tiket['tanggal_tiket'] ?></p>
                        <p class="card-text"><b>Seat Tiket :</b><br><?= $data_tiket['seat_tiket'] ?></p>
                        <p></p>
                        <a href="<?= base_url(); ?>tiket" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>