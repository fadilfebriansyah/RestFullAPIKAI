<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tiket</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tiket'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes); ?>

                    <?php foreach ($data_tiket as $data_tiket) : ?>

                        <div class="form-group row">
                            <label for="id_tiket" class="col-sm-2 col-form-label">Id Tiket</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_tiket" name="id_tiket" value=" <?= $data_tiket['id_tiket']; ?>" readonly>
                                <small class="text-danger">
                                    <?php echo form_error('id_tiket') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_kereta" class="col-sm-2 col-formlabel">Id Kereta</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_kereta" name="id_kereta" value=" <?= $data_tiket['id_kereta']; ?>">
                                <small class="text-danger">
                                    <?php echo form_error('id_kereta') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_penumpang" class="col-sm-2 col-formlabel">Id Penumpang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_penumpang" name="id_penumpang" value=" <?= $data_tiket['id_penumpang']; ?>">
                                <small class="text-danger">
                                    <?php echo form_error('id_penumpang') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_tiket" class="col-sm-2 col-formlabel">Tipe Tiket</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="tipe_tiket" name="tipe_tiket">
                                    <option value="Ekonomi" selected disabled>Pilih</option>
                                    <option value="Ekonomi" <?php if ($data_tiket['tipe_tiket'] == "Ekonomi") : echo "selected";
                                                            endif; ?>>Ekonomi</option>
                                    <option value="Bisnis" <?php if ($data_tiket['tipe_tiket'] == "Bisnis") : echo "selected";
                                                            endif; ?>>Bisnis</option>
                                    <option value="Eksekutif" <?php if ($data_tiket['tipe_tiket'] == "Eksekutif") : echo "selected";
                                                                endif; ?>>Eksekutif</option>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('tipe_tiket') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_tiket" class="col-sm-2 col-form-label">Tanggal Tiket</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="tanggal_tiket" name="tanggal_tiket" value="<?= $data_tiket['tanggal_tiket']; ?>">
                                <small class="text-danger">
                                    <?php echo form_error('tanggal_tiket') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seat_tiket" class="col-sm-2 col-formlabel">Seat Tiket</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="seat_tiket" name="seat_tiket" value="<?= $data_tiket['seat_tiket']; ?>">
                                <small class="text-danger">
                                    <?php echo form_error('seat_tiket') ?>
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>