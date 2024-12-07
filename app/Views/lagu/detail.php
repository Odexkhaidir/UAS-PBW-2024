<?php

use App\Controllers\CtrlrLagu;
?>
<?= $this->extend('weblayout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1 class="mt-5 text-center">Detail Lagu</h1>
            <div class="card mb-3 mt-3 text-center" style="width: 100%;">
                <img src="/img/<?= $lagu['sampul']; ?>" class="card-img-top" alt="Song/Album Cover">
                <div class="card-body">
                    <h5 class="card-title"><?= $lagu['judul']; ?></h5>
                    <p class="card-text"><?= $lagu['penyanyi']; ?></p>
                    <?php
                    // Extract the video ID from the YouTube link
                    $youtubeLink = $lagu['link'];
                    $videoId = '';

                    preg_match('/v=([^&]+)/', $youtubeLink, $matches);
                    if (isset($matches[1])) {
                        // If the video ID is found, assign it to the $videoId variable
                        $videoId = $matches[1];
                    }

                    // Construct the embed link for the YouTube video using the video ID
                    $embedLink = 'https://www.youtube.com/embed/' . $videoId;
                    ?>

                    <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#videoModal">Beat it!</a>

                    <!-- Modal to display the YouTube video -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: black;">
                                    <!-- Display the title of the video in the modal header -->
                                    <h5 class="modal-title" id="videoModalLabel" style="color: white;"><?= $lagu['judul']; ?></h5>
                                    <!-- Display a close button to close the modal -->
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: white;"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Display the YouTube video in the modal body -->
                                    <iframe id="videoIframe<?= $lagu['id']; ?>" width="100%" height="315" src="<?= $embedLink ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="background-color: maroon;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <a href="/lagu/edit/<?= $lagu['slug'] ?>" class="btn btn-outline-light">Edit</a>

                    <form action="/lagu/<?= $lagu['id'] ?>" method="post" class="d-inline">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <br><br>
                    <a class="icon-link icon-link-hover text-white" href="/lagu" style="text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                        Back
                    </a>
                </div>
                <div class="card-footer bg-secondary">
                    <small class="text-white" id="updatedAt" data-updated-at="<?= $lagu['updated_at']; ?>"></small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>