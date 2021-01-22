<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Squad</h2>
                    <a href="/tabel_squadController/add" class="btn btn-success">Tambah Squad</a>
                    <a href="/tabel_pesertaController" class="btn btn-danger ml-4">Roster</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Nama Squad</th>
                                    <th scope="col" class="text-center">Ketua</th>
                                    <th scope="col" class="text-center">Contact Person</th>
                                    <th scope="col" class="text-center">Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tabel_squad as $p) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++; ?>
                                    </th>
                                    <td class="text-center">
                                        <?= $p["nama_squad"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["ketua"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["contact_person"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["status_pembayaran"]; ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="/tabel_squadController/update/<?= $p["id"]; ?>/<?= $p["id_event"]; ?>" class="btn
                                            btn-warning btn-sm">Edit</a>
                                        <a href="/tabel_squadController/detail/<?= $p["id"]; ?>" class="btn
                                            btn-success btn-sm">Detail</a>
                                        <a href="/tabel_squadController/delete/<?= $p["id"]; ?>" class="btn
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