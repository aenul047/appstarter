<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="my-3 ml-4">Form Update User</h2>

                    <form action="/UserController/saveUpdate" method="post"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $User["id"]; ?>">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 ml-4 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("nama"))
                                    ? "is-invalid" : "" ; ?>" id="nama" name="nama" autofocus value="<?= (old("nama")) ? old("nama") : $User["nama"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("nama"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="komunitas" class="col-sm-2 ml-4 col-form-label">Komunitas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError("komunitas"))
                                    ? "is-invalid" : "" ; ?>" id="komunitas" name="komunitas" autofocus value="<?= (old("komunitas")) ? old("komunitas") : $User["komunitas"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("komunitas"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 ml-4 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control <?= ($validation->hasError("email"))
                                    ? "is-invalid" : "" ; ?>" id="email" name="email" autofocus value="<?= (old("email")) ? old("email") : $User["email"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("email"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-2 ml-4 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control <?= ($validation->hasError("password"))
                                    ? "is-invalid" : "" ; ?>" id="password" name="password" autofocus value="<?= (old("password")) ? old("password") : $User["password"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("password"); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-sm-2 ml-4 col-form-label">Contact</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control <?= ($validation->hasError("contact"))
                                    ? "is-invalid" : "" ; ?>" id="contact" name="contact" autofocus value="<?= (old("contact")) ? old("contact") : $User["contact"] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError("contact"); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary ml-4">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>