<!DOCTYPE html>
<html lang="de" id="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noten und so...</title>
    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>/assets/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>/assets/code/css/main.css">
    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/bootstrap/bootstrap.min.js" defer></script>
    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/jquery/jquery.min.js"></script>
    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/fontawesome/fontawesome.min.js"></script>
    <script src="<?= $_CONFIG['base_url']; ?>/assets/code/js/darkmode.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">
                Domgymnasium Naumburg
                <span class="text-muted d-block" style="font-size: 50%">
                    (naja fast offiziell zumindest, aber nicht mehr so kacke)
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fa-regular fa-face-frown-slight me-1"></i>
                            Noten
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-circle-info me-1"></i>
                            Infos
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" aria-current="page" href="#">
                            <i class="fa-regular fa-arrow-right-from-bracket text-danger me-1"></i>
                            Abmelden
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#">
                            <i class="fa-regular fa-lock text-danger me-1"></i>
                            Sperren
                        </a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="dropstart d-none d-lg-block">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="text-decoration-none text-reset">
                            <?php if (@$_COOKIE['creeper']) : ?>
                                <img src="<?= $_CONFIG['base_url']; ?>/assets/img/creeper.jpg" alt="Avatar" width="30" height="30" class="rounded-circle">
                            <?php else : ?>
                                <i class="fa-regular fa-circle-user fa-2x"></i>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-regular fa-arrow-right-from-bracket text-danger me-1"></i>
                                    Abmelden
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-regular fa-lock text-danger me-1"></i>
                                    Sperren
                                </a>
                            </li>
                        </ul>
                    </div>
                </span>
            </div>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 29em;">

        <a href="#tableMarks" class="text-reset text-decoration-none">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-4 bg-primary bg-opacity-10">
                        <!-- center icon verticaly and horizontaly -->
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <i class="fa-regular fa-table fa-2x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body py-5">
                            <h3 class="d-inline text-muted">
                                Tabellenansicht
                            </h3>
                            <span class="form-text d-block">
                                Habe alle Noten mit einmal auf einen Blick
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <hr class="my-5">

        <!-- Biologie -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-dna fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Biologie</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chemie -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-flask-vial fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Chemie</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deutsch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-book fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Deutsch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Englisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-mug-tea fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Englisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ethik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-people-arrows fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Ethik</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Geographie -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-globe fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Geographie</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Geschichte -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-scroll-old fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Geschichte</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kunst -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-palette fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Kunst</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mathematik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-calculator-simple fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Mathematik</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Physik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-bolt fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Physik</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Spanisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-taco fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Spanisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sport -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-face-head-bandage fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Sport</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wirtschaft -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-money-bill-trend-up fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Wirtschaft</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Französisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-baguette fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Französisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latein -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-message-slash fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Latein</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Russisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <span class="fs-1 fw-bold text-success">UKR</span>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Russisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Italienisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-pizza-slice fa-spin fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Italienisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Griechisch -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-piggy-bank fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Grichisch</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sozialkunde -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-users fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Sozialkunde</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Musik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-music fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Musik</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Evangelische Religion -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-bible fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Evangelische Religion</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Katholische Religion -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-bible fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Katholische Religion</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Psychologie -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-head-side-brain fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Psychologie</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rechtskunde -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-gavel fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Rechtskunde</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Technik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-gears fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">Technik</h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informatik -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <!-- center icon verticaly and horizontaly -->
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-display-code fa-3x text-success"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">
                            Informatik
                            <i class="fa-regular fa-heart ms-1 text-danger"></i>
                        </h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> 4,67
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <table class="table" id="tableMarks">
            <thead>
                <tr>
                    <th scope="col">Fach</th>
                    <th scope="col">Durchschnitt</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>Englisch</td>
                    <td>Ø 4,67</td>
                    <td>
                        <a href="#" class="text-reset text-decoration-none">
                            <i class="fa-regular fa-arrow-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</body>

</html>