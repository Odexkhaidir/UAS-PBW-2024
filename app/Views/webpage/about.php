<?= $this->extend('weblayout/template') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            color: maroon;
            background-color: white;
            border-color: gray;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Profile Image Column -->
            <div class="col-md-6">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/img/IMG20230907104747.jpg" alt="User profile picture" style="width:7em;">
                        </div>
                        <h4 class="profile-username text-center">La Ode Muhammad Khaidir</h4>
                        <p class="text-muted text-center">Fullstack Developer?</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Followers</b> <a class="float-end text-danger">323</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-end text-danger">538</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-end text-danger">1,216</a>
                            </li>
                        </ul>
                        <a href="https://www.instagram.com/ode.khaidir?igsh=eGc1dWtoYTB1amsw" class="btn btn-warning btn-block align-center"><b>Follow</b></a>
                    </div>
                </div>
            </div>
            <!-- About Me Column -->
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>
                        <p class="text-muted">Bachelor of Computational Statistics from Politeknik Statistika STIS </p>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">Palu, Sulawesi Tengah</p>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                        <p class="text-muted">
                            <span class="badge bg-secondary">Java</span>
                            <span class="badge bg-info text-dark">PHP</span>
                            <span class="badge bg-warning text-dark">Javascript</span>
                            <span class="badge bg-primary">C</span>
                            <span class="badge bg-success">R</span>
                            <span class="badge bg-danger">HTML</span>
                        </p>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">Bingung milih Sains Data atau Sistem Informasi...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>

<?= $this->endSection() ?>