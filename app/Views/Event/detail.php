<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <h2>Detail Event</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Komunitas     :</b>
                        <?= $Event[0]["komunitas"];?>
                    <li class="list-group-item"><b>Nama Event       :</b>
                        <?= $Event[0]["nama_event"];?>
                    <li class="list-group-item"><b>Image Event      :</b>
                        <?= $Event[0]["image_event"];?>
                    <li class="list-group-item"><b>Registrasi Slot  :</b>
                        <?= $Event[0]["registrasi_slot"];?>
                    <li class="list-group-item"><b>Hadiah           :</b>
                        <?= $Event[0]["hadiah"];?>
                    <li class="list-group-item"><b>Estimasi Waktu   :</b>
                        <?= $Event[0]["estimasi_waktu"];?>
                    <li class="list-group-item"><b>Tanggal Mulai    :</b>
                        <?= $Event[0]["tanggal_mulai"];?>
                    <li class="list-group-item"><b>Tanggal Selesei  :</b>
                        <?= $Event[0]["tanggal_selesei"];?>
                    <li class="list-group-item"><b>Tempat           :</b>
                        <?= $Event[0]["tempat"];?>
                    <li class="list-group-item"><b>Status           :</b>
                        <?= $Event[0]["status"];?>
                    <li class="list-group-item"><b>Keterangan       :</b>
                        <?= $Event[0]["keterangan"];?><br>


                    <?php $i = 1; ?><br>
                    <h6>Nama Squad Terdaftar</h6>
                    <?php foreach ($Squad as $p) : ?>
                    <?= $p["nama_squad"]; ?><br>
                    <?php endforeach; ?>

                </ul>
                <a href="/EventController" class="btn btn-warning ml-4">Kembali Ke Event</button></a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>