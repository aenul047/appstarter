<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2>Detail Squad</h2>
                <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item"><b>Nama Squad :</b>
                        <?= $tabel_squad["nama_squad"];?>
                    <li>
                    <li class="list-group-item"><b>Ketua :</b>
                        <?= $tabel_squad["ketua"];?>
                    <li>
                    <li class="list-group-item"><b>Contact Person :</b>
                        <?= $tabel_squad["contact_person"];?>
                    <li>
                    <li class="list-group-item"><b>Status Pembayaran :</b>
                        <?= $tabel_squad["status_pembayaran"];?>
                    <li>
                    <?php $i = 1; ?><br>
                    <h6>Roster</h6>
                    <?php foreach ($roster  as $p) : ?>
                        <?= $p["nama"]; ?><br>
                        <?= $p["in_game_name"]; ?><br>
                        <?= $p["id_game"]; ?><br>

                    <?php endforeach; ?>

                </ul>
                <a href="/tabel_squadController" class="btn btn-warning ml-4">Kembali Ke
                                    Squad</button></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>