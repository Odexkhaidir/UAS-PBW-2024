<?= $this->extend('weblayout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <a class="icon-link icon-link-hover text-danger" href="/lagu" style="text-decoration: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
                Back
            </a>
            <h2 class="my-5 text-center">Add Discography</h2>
            <?php
            $validation = session('validation');
            ?>
            <form action="/CtrlrLagu/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation && $validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
                        <div class="invalid-feedback">
                            <?php
                            if ($validation) {
                                echo $validation->getError('judul');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="penyanyi" class="col-sm-2 col-form-label">Penyanyi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation && $validation->hasError('penyanyi')) ? 'is-invalid' : '' ?>" id="penyanyi" name="penyanyi" value="<?= old('penyanyi'); ?>">
                        <div class="invalid-feedback">
                            <?php
                            if ($validation) {
                                echo $validation->getError('penyanyi');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation && $validation->hasError('link')) ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= old('link'); ?>">
                        <div class="invalid-feedback">
                            <?php
                            if ($validation) {
                                echo $validation->getError('link');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="previewImage()">
                            <label class="custom-file-label" for="sampul"></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Submit</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>