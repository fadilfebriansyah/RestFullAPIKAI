<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Kereta</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tiket'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
        </ol>
    </nav>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header bg-info">
                    Detail Data Kereta
                </div>
                <div class="card-body">
                    <?php foreach ($data_kereta as $data_kereta) : ?>
                        <h5 class="card-title"><b>Id Kereta :</b><br><?= $data_kereta['id_kereta'] ?></h5>
                        <p class="card-text"><b>Nama Kereta :</b><br><?= $data_kereta['nama_kereta'] ?></p>
                        <p class="card-text"><b>Tujuan Kereta :</b><br><?= $data_kereta['tujuan_kereta'] ?></p>
                        <p class="card-text"><b>Asal Kereta :</b><br><?= $data_kereta['asal_kereta'] ?></p>
                        <p class="card-text"><b>Harga Kereta :</b><br><?= $data_kereta['harga_kereta'] ?></p>
                        <p class="card-text"><b>Berangkat Kereta :</b><br><?= $data_kereta['berangkat_kereta'] ?></p>
                        <p class="card-text"><b>Tiba Kereta :</b><br><?= $data_kereta['tiba_kereta'] ?></p>
                        <p></p>
                        <a href="<?= base_url(); ?>kereta" class="btn btn-primary">Kembali</a>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>