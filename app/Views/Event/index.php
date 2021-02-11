<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Event</h2>
                    <a href="/EventController/add" class="btn btn-success">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Komunitas</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Image Event</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesei</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($Event as $p) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++; ?>
                                    </th>
                                    <td class="text-center">
                                        <?= $p["komunitas"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["nama_event"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <img src="/event/<?= $p["image_event"]; ?>" alt="" width="100" height="100">
                                    </td>
                                    <td class="text-center">
                                        <?= $p["tanggal_mulai"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["tanggal_selesei"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["status"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/EventController/update/<?= $p["id_event"]; ?>" class="btn
                                            btn-warning btn-sm">Edit</a>
                                        <a href="/EventController/detail/<?= $p["id_event"]; ?>" class="btn
                                            btn-success btn-sm">Detail</a>
                                        <a href="/EventController/delete/<?= $p["id_event"]; ?>" class="btn
                                            btn-danger btn-sm mt-1">Delete</a>
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