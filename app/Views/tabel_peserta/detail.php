<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2>Detail Roster</h2>
                <ul class="list-group list-group-flush">

                    <li class="list-group-item"><b>Id Squad :</b>
                        <?= $tabel_peserta["id_squad"];?>
                    <li>
                    <li class="list-group-item"><b>Nama :</b>
                        <?= $tabel_peserta["nama"];?>
                    <li>
                    <li class="list-group-item"><b>In Game Name :</b>
                        <?= $tabel_peserta["in_game_name"];?>
                    <li>
                    <li class="list-group-item"><b>Id Game :</b>
                        <?= $tabel_peserta["id_game"];?>
                    <li>

                </ul>
                <a href="/tabel_pesertaController" class="btn btn-warning ml-4">Kembali Ke Daftar
                                    Roster</button></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>