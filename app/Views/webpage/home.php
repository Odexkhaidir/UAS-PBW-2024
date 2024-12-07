<?= $this->extend('weblayout/template') ?>
<?= $this->section('content') ?>

<style>
    .banner {
        background: url("/img/home_4.jpg") no-repeat center center;
        background-size: cover;
        padding-top: 15%;
        padding-bottom: 30%;
        height: 80vh;
        /* width: 100%; */

        color: #fff;
    }

    h4{
        font-size: 4rem;
        font-variant: small-caps;
        color: black;
        margin-bottom: 0;
        margin-top: 0;
        text-shadow: maroon 1px 0 5px;
    }
    body {
        background-color: rgb(38, 44, 60); 
;
    }
</style>

<div class="container-fluid banner">
    <div class="container text-center text-white">
        <h4 class="display-6 ">Underrated,</h4>
        <h4 class="display-6"">Peaceful, & Calm</h4>
        <h4 class="display-6">Japanese musics are here...</h4>
        <div class="container">
            <div class="row mt-5">
                <div class="col align-self-start">
                </div>
                <div class="col align-self-center d-flex justify-content-center">
                    <a href="/lagu">
                        <button type="button" class="btn btn-dark btn-lg btn-block shadow">BEAT IT!</button>
                    </a>
                </div>
                <div class="col align-self-end">
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>