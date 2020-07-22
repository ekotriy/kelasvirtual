<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900">Ganti Password</h1>
                                <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                            </div>
                            <?= $this->session->flashdata('massage'); ?>
                            <form class="user" method="post" action="<?= base_url('auth/gantipassword'); ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Masukan Password Baru" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="2" placeholder="Ulangi Password Baru" name="password2">
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button tepe="submit" class="btn btn-info btn-user btn-block">
                                    Ganti Password
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>