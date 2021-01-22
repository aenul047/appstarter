<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Update Data Roster</h2>

                    <form action="/index.php/tabel_pesertaController/saveUpdate" method="post"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $tabel_peserta["id"]; ?>">
                        <div class="form-group row">
                            <label for="id_squad" class="col-sm-2 ml-4 col-form-label">Nama Squad</label>
                            <div class="col-sm-9">
                            <select class="form-control <?= ($validation->hasError(" id_komunitas"))
                                    ? "is-invalid" : "" ; ?>" id="id_komunitas" name="id_komunitas">
                                    <option value="">Pilih...</option>
                                    <?php foreach ($nama_squad as $p) : ?>
                                    <option value="<?= $p["id"]; ?>"><?= $p["nama_squad"]; ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError("id_squad"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 ml-4 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("nama"))
                                    ? "is-invalid" : "" ; ?>" id="nama" name="nama" value="<?= (old("nama")) ? old("nama") : $tabel_peserta["nama"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nama"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="in_game_name" class="col-sm-2 ml-4 col-form-label">In Game Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("in_game_name"))
                                    ? "is-invalid" : "" ; ?>" id="in_game_name" name="in_game_name" value="<?= (old("in_game_name")) ? old("in_game_name") : $tabel_peserta["in_game_name"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("in_game_name"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_game" class="col-sm-2 ml-4 col-form-label">Id Game</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("id_game"))
                                    ? "is-invalid" : "" ; ?>" id="id_game" name="id_game" value="<?= (old("id_game")) ? old("id_game") : $tabel_peserta["id_game"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("id_game"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Update Roster</button>
                                <a href="/tabel_pesertaController" class="btn btn-warning ml-4">Kembali Ke Daftar Roster</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>