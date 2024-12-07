<?= $this->extend('weblayout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <h2 class="my-5 text-center">Edit Discography</h2>
            <form action="/CtrlrLagu/update/<?= $lagu['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $lagu['slug']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $lagu['sampul']; ?>">
                <div class="form-group row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $lagu['judul']; ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="penyanyi" class="col-sm-2 col-form-label">Penyanyi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('penyanyi')) ? 'is-invalid' : '' ?>" id="penyanyi" name="penyanyi" value="<?= (old('penyanyi')) ? old('penyanyi') : $lagu['penyanyi']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penyanyi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('link')) ? 'is-invalid' : '' ?>" id="link" name="link" value="<?= (old('link')) ? old('link') : $lagu['link']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('link'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $lagu['sampul']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="sampul" name="sampul" onchange="previewImage()">
                            <label class="custom-file-label" for="sampul"><?= $lagu['sampul'] ?></label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>