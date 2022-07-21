<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tiket</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('tiket'); ?>">List Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Data</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="id_tiket" class="col-sm-2 col-form-label">Id Tiket</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_tiket" name="id_tiket" value="<?= set_value('id_tiket'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_tiket') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_kereta" class="col-sm-2 col-form-label">Nama Kereta</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="id_kereta" id="id_kereta">
                                <?php foreach ($data_kereta as $dk) : ?>
                                    <option value="<?= $dk['id_kereta'] ?>"><?= $dk['nama_kereta'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('nama_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_penumpang" class="col-sm-2 col-form-label">Nama Penumpang</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="id_penumpang" id="id_penumpang">
                                <?php foreach ($data_penumpang as $dk) : ?>
                                    <option value="<?= $dk['id_penumpang'] ?>"><?= $dk['nama_penumpang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('nama_penumpang') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipe_tiket" class="col-sm-2 col-form-label">Tipe Tiket</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="tipe_tiket" name="tipe_tiket">
                                <option value="Ekonomi" selected disabled>Pilih</option>
                                <option value="Ekonomi" <?php if (set_value('tipe_tiket') == "Ekonomi") : echo "selected";
                                                        endif; ?>>Ekonomi</option>
                                <option value="Eksekutif" <?php if (set_value('tipe_tiket') == "Eksekutif") : echo "selected";
                                                            endif; ?>>Eksekutif</option>
                                <option value="Bisnis" <?php if (set_value('tipe_tiket') == "Bisnis") : echo "selected";
                                                        endif; ?>>Bisnis</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('tipe_tiket') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tanggal_tiket" class="col-sm-2 col-form-label">Tanggal Tiket</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="tanggal_tiket" name="tanggal_tiket" value="<?= set_value('tanggal_tiket'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tanggal_tiket') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="seat_tiket" class="col-sm-2 col-form-label">Seat Tiket</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="seat_tiket" name="seat_tiket" value="<?= set_value('seat_tiket'); ?>">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>