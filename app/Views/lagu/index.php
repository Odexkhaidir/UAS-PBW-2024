<?= $this->extend('weblayout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-3 mb-5 text-center">Discography</h1>
            <form action="/CtrlrLagu" class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" name="keyword" placeholder="Search for Artist or Songs" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="/lagu/create" class="btn btn-warning mt-3">Add new discography!</a>
                </div>
            </div>
            <br><br>
            <?php if (session()->has('pesan')) : ?>
                <div id="flashMessage" class="alert alert-secondary" role="alert"><?= session('pesan') ?></div>

                <script>
                    var flashMessage = document.getElementById('flashMessage');

                    setTimeout(function() {
                        flashMessage.remove();
                    }, 10000);
                </script>
            <?php endif; ?>
            <?php if (session()->has('error')) : ?>
                <div id="flashMessage" class="alert alert-secondary" role="alert"><?= session('error') ?></div>

                <script>
                    var flashMessage = document.getElementById('flashMessage');

                    setTimeout(function() {
                        flashMessage.remove();
                    }, 5000);
                </script>
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
            <br><br>
            <div class="container">
                <div class="row">
                    <?php foreach ($lagu as $key) : ?>
                        <div class="col-md-3 mb-4">
                            <!-- Add Bootstrap card to display each song/album -->
                            <div class="card text-center" style="width: 100%;">
                                <img src="/img/<?= $key['sampul']; ?>" class="card-img-top" alt="Song/Album Cover">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $key['judul']; ?></h5>
                                    <p class="card-text"><?= $key['penyanyi']; ?></p>
                                    <?php
                                    // Extract the video ID from the YouTube link
                                    $youtubeLink = $key['link'];
                                    $videoId = '';

                                    preg_match('/v=([^&]+)/', $youtubeLink, $matches);
                                    if (isset($matches[1])) {
                                        // If the video ID is found, assign it to the $videoId variable
                                        $videoId = $matches[1];
                                    }

                                    // Construct the embed link for the YouTube video using the video ID
                                    $embedLink = 'https://www.youtube.com/embed/' . $videoId;
                                    ?>

                                    <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#videoModal<?= $key['id']; ?>">Beat it!</a>

                                    <!-- Modal to display the YouTube video -->
                                    <div class="modal fade" id="videoModal<?= $key['id']; ?>" tabindex="-1" aria-labelledby="videoModalLabel<?= $key['id']; ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <!-- Display the title of the video in the modal header -->
                                                    <h5 class="modal-title" id="videoModalLabel<?= $key['id']; ?>"><?= $key['judul']; ?></h5>
                                                    <!-- Display a close button to close the modal -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Display the YouTube video in the modal body -->
                                                    <iframe id="videoIframe<?= $key['id']; ?>" width="100%" height="315" src="<?= $embedLink ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        // Function to stop the video when the modal is closed
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var modal = document.getElementById('videoModal<?= $key['id']; ?>');
                                            modal.addEventListener('hidden.bs.modal', function() {
                                                var iframe = document.getElementById('videoIframe<?= $key['id']; ?>');
                                                iframe.src = iframe.src; // This reloads the iframe to stop the video
                                            });
                                        });
                                    </script>
                                    <br><br>
                                    <a href="/lagu/<?= $key['slug']; ?>" class="btn btn-outline-light">Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- add bootstrap pagination -->
        </div>

        <!-- <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penyanyi</th>
                        <th scope="col">Link</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lagu as $key) : ?>
                        <tr>
                            <th scope="row"><?= $key['id']; ?></th>
                            <td><?= $key['judul']; ?></td>
                            <td><?= $key['penyanyi']; ?></td>
                            <td><?= $key['link']; ?></td>
                            <td><img src="/img/<?= $key['sampul']; ?>" alt="Song/Album Cover" width="100px"></td>
                            <td><a href="/lagu/<?= $key['slug']; ?>" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> -->
    </div>
</div>

<?= $this->endSection() ?>