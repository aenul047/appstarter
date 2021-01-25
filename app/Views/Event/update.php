<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Update Data Event</h2>
                    <form action="/EventController/saveUpdate" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_event" value="<?= $Event[0]["id_event"]; ?>">

                        <?php if ($session == "admin") { ?>
                        <div class="form-group row">
                            <label for="id_komunitas" class="col-sm-2 ml-4 col-form-label">Komunitas</label>
                            <div class="col-sm-9">
                            <select class="form-control <?= ($validation->hasError(" id_komunitas"))
                                    ? "is-invalid" : "" ; ?>" id="id_komunitas" name="id_komunitas">

                                    <option value="<?= $Event[0]["id_komunitas"]; ?>"><?= $Event[0]["komunitas"]; ?></option>

                                    <?php foreach ($User as $p) : ?>
                                    <option value="<?= $p["id"]; ?>"><?= $p["komunitas"]; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("id_komunitas"); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="form-group row">
                            <label for="nama_event" class="col-sm-2 ml-4 col-form-label">Nama Event</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" nama_event"))
                                    ? "is-invalid" : "" ; ?>" id="nama_event" name="nama_event" value="<?= (old("nama_event")) ? old("nama_event") : $Event[0]["nama_event"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nama_event"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_event" class="col-sm-2 ml-4 col-form-label">Image Event</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control <?= ($validation->hasError(" image_event"))
                                    ? "is-invalid" : "" ; ?>" id="image_event" name="image_event" value="<?= (old("image_event")) ? old("image_event") : $Event[0]["image_event"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("image_event"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="registrasi_slot" class="col-sm-2 ml-4 col-form-label">Registrasi Slot</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" registrasi_slot"))
                                    ? "is-invalid" : "" ; ?>" id="registrasi_slot" name="registrasi_slot"
                                value="<?= (old("registrasi_slot")) ? old("registrasi_slot") : $Event[0]["registrasi_slot"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("registrasi_slot"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hadiah" class="col-sm-2 ml-4 col-form-label">Hadiah</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" hadiah"))
                                    ? "is-invalid" : "" ; ?>" id="hadiah" name="hadiah" value="<?= (old("hadiah")) ? old("hadiah") : $Event[0]["hadiah"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("hadiah"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estimasi_waktu" class="col-sm-2 ml-4 col-form-label">Estimasi Waktu</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" estimasi_waktu"))
                                    ? "is-invalid" : "" ; ?>" id="estimasi_waktu" name="estimasi_waktu"
                                value="<?= (old("estimasi_waktu")) ? old("estimasi_waktu") : $Event[0]["estimasi_waktu"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("estimasi_waktu"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_mulai" class="col-sm-2 ml-4 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control <?= ($validation->hasError(" tanggal_mulai"))
                                    ? "is-invalid" : "" ; ?>" id="tanggal_mulai" name="tanggal_mulai" value="<?= (old("tanggal_mulai")) ? old("tanggal_mulai") : $Event[0]["tanggal_mulai"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("tanggal_mulai"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_selesei" class="col-sm-2 ml-4 col-form-label">Tanggal Selesei</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control <?= ($validation->hasError(" tanggal_selesei"))
                                    ? "is-invalid" : "" ; ?>" id="tanggal_selesei" name="tanggal_selesei"
                                value="<?= (old("tanggal_selesei")) ? old("tanggal_selesei") : $Event[0]["tanggal_selesei"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("tanggal_selesei"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-2 ml-4 col-form-label">Tempat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" tempat"))
                                    ? "is-invalid" : "" ; ?>" id="tempat" name="tempat" value="<?= (old("tempat")) ? old("tempat") : $Event[0]["tempat"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("tempat"); ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($session == "admin") { ?>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 ml-4 col-form-label">Status</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="status" name="status">
                                <option value="Pilih">Pilih...</option>
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="On Progres">On Progres</option>
                                <option value="Finish">Finish</option> 
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("status"); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 ml-4 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError(" keterangan"))
                                    ? "is-invalid" : "" ; ?>" id="keterangan" name="keterangan" value="<?= (old("keterangan")) ? old("keterangan") : $Event[0]["keterangan"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("keterangan"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Update Event</button>
                                <a href="/EventController" class="btn btn-warning ml-4">Kembali Ke Event</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>