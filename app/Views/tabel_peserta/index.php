<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Daftar Roster</h2>
                    <a href="/tabel_pesertaController/add" class="btn btn-warning">Tambah Roster</a>
                    <a href="/tabel_squadController" class="btn btn-succes ml-4">Kembali Ke Squad</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Id Squad</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">In Game Name</th>
                                    <th scope="col" class="text-center">Id Game</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tabel_peserta as $p) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++; ?>
                                    </th>

                                    <td class="text-center">
                                        <?= $p["id_squad"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["nama"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["in_game_name"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["id_game"]; ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="/tabel_pesertaController/update/<?= $p["id"]; ?>" class="btn
                                            btn-warning btn-sm">Edit</a>
                                        <a href="/tabel_pesertaController/detail/<?= $p["id"]; ?>" class="btn
                                            btn-success btn-sm">Detail</a>
                                        <a href="/tabel_pesertaController/delete/<?= $p["id"]; ?>" class="btn
                                            btn-danger btn-sm">Delete</a>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>