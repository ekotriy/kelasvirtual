<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                            </div>
                            <?= $this->session->flashdata('massage'); ?>
                            <form class="user" method="post" action="<?= base_url('auth/lupapassword'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Alamat Email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button tepe="submit" class="btn btn-info btn-user btn-block">
                                    Reset
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-secondary" href="<?= base_url(); ?>auth">Kembali Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>