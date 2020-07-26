<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 border">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login</h1>
                            </div>
                            <?= $this->session->flashdata('massage'); ?>
                            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Alamat Email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Masukan Password" name="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-secondary" href="<?= base_url('auth/lupapassword'); ?>">Lupa Password</a>
                            </div>
                            <div class="text-center">
                                <a class="small text-secondary" href="<?= base_url(); ?>auth/register">Buat Akun Baru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>