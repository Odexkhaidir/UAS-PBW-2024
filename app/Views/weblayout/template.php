<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- my CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?> ">
    <!-- my JS -->
    <script src="/js/script.js"></script>
</head>

<body>
    <nav class="navbar sticky-top text-white" style="top: 0; background-color: maroon;">
        <div class="container-fluid">
            <a class="navbar-brand" href="/webpage/home" style="color: white;">
                NipponBeats
            </a>
            <span data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Alt + N for shortcut">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </span>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color: black; color: maroon;">
                <div class="offcanvas-header float-end">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/webpage/home" style="color: white;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/lagu" style="color: white;">Discography</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user" style="color: white;">Membership</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webpage/about" style="color: white;">About Me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logout" style="color: white;">Logout</a>
                        </li>
                    </ul>
                    <form action="/CtrlrLagu" class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" name="keyword" placeholder="Search for Artist or Songs" aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <footer class="bg-black text-white mt-5 p-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="mb-0">&copy; 2024 Politeknik Statistika STIS</p>
                    <p class="mb-0">Created by <b>La Ode Muhammad Khaidir</b> (<a href="mailto:222212697@stis.ac.id" class="text-white">222212697@stis.ac.id</a>)</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>