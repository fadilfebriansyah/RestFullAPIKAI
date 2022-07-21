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
                        <label for="id_kereta" class="col-sm-2 col-form-label">Id Kereta</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="id_kereta" name="id_kereta" value="<?= set_value('id_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('id_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_kereta" class="col-sm-2 col-form-label">Nama Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_kereta" name="nama_kereta" value="<?= set_value('nama_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tujuan_kereta" class="col-sm-2 col-form-label">Tujuan Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tujuan_kereta" name="tujuan_kereta" value="<?= set_value('tujuan_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tujuan_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="asal_kereta" class="col-sm-2 col-form-label">Asal Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="asal_kereta" name="asal_kereta" value="<?= set_value('asal_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('asal_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_kereta" class="col-sm-2 col-form-label">Harga Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="harga_kereta" name="harga_kereta" value="<?= set_value('harga_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('harga_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="berangkat_kereta" class="col-sm-2 col-form-label">Berangkat Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="berangkat_kereta" name="berangkat_kereta" value="<?= set_value('berangkat_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('berangkat_kereta') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tiba_kereta" class="col-sm-2 col-form-label">Tiba Kereta</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tiba_kereta" name="tiba_kereta" value="<?= set_value('tiba_kereta'); ?>">
                            <small class="text-danger">
                                <?php echo form_error('tiba_kereta') ?>
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