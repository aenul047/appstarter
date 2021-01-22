<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Tambah Data Squad</h2>

                    <form action="/index.php/tabel_squadController/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row">
                            <label for="id_event" class="col-sm-2 ml-4 col-form-label">Event</label>
                            <div class="col-sm-9">
                                    <select class="form-control <?= ($validation->hasError(" id_event"))
                                    ? "is-invalid" : "" ; ?>" id="id_event" name="id_event">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($Event as $p) : ?>
                                    <option value="<?= $p["id_event"]; ?>"><?= $p["nama_event"]; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("id_event"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_squad" class="col-sm-2 ml-4 col-form-label">Nama Squad</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" nama_squad"))
                                    ? "is-invalid" : "" ; ?>" id="nama_squad" name="nama_squad"  value="<?= old("nama_squad"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nama_squad"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ketua" class="col-sm-2 ml-4 col-form-label">Ketua</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" ketua"))
                                    ? "is-invalid" : "" ; ?>" id="ketua" name="ketua"  value="<?= old("ketua"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("ketua"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact_person" class="col-sm-2 ml-4 col-form-label">Contact Person</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" contact_person"))
                                    ? "is-invalid" : "" ; ?>" id="contact_person" name="contact_person" 
                                value="<?= old("contact_person"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("contact_person"); ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($session == "user") { ?>
                        <div class="form-group row">
                            <label for="status_pembayaran" class="col-sm-2 ml-4 col-form-label">Status
                                Pembayaran</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" status_pembayaran"))
                                    ? "is-invalid" : "" ; ?>" id="status_pembayaran" name="status_pembayaran" 
                                value="<?= old("status_pembayaran"); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("status_pembayaran"); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Tambah Tabel Squad</button>
                                <a href="/tabel_squadController" class="btn btn-warning ml-4">Kembali Ke
                                    Squad</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>