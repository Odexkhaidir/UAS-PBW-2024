<?= $this->extend('weblayout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-5" style="border-color: black;">
                <div class="card-header">
                    <h2 href="/user" class="card-title text-center mt-1">Membership</h2>
                    <form action="/CtrlrUser" class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Search Nama or Username..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <br>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-secondary mt-3" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->has('search')) : ?>
                        <div id="flashMessage" class="alert alert-secondary" role="alert"><?= session('search') ?></div>

                        <script>
                            var flashMessage = document.getElementById('flashMessage');

                            setTimeout(function() {
                                flashMessage.remove();
                            }, 5000);
                        </script>
                    <?php endif; ?>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 0; ?>
                            <?php foreach ($user as $key) : ?>
                                <?php $num = $num + 1; ?>
                                <tr>
                                    <th scope="row"><?= $num; ?></th>
                                    <td name='nama'><?= $key['nama']; ?></td>
                                    <td name='username'><?= $key['username']; ?></td>
                                    <td><?= $key['email']; ?></td>
                                    <td>Bergabung sejak <?= $key['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<?= $this->endSection() ?>