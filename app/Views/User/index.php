<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">User</h2>
                    <!-- <a href="/UserController/add" class="btn btn-success">Tambah</a> -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Komunitas</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Contact</th>
                                    <th scope="col" class="text-center">Tanggal</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($User as $p) : ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i++; ?>
                                    </th>

                                    <td class="text-center">
                                        <?= $p["nama"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["komunitas"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["email"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["contact"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p["tgl"]; ?>
                                    </td>
                                    <td class="text-center">
                                        <!-- <a href="/UserController/update/<?= $p["id"]; ?>" class="btn -->
                                            <!-- btn-warning btn-sm">Edit</a> -->
                                        <a href="/UserController/delete/<?= $p["id"]; ?>" class="btn
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