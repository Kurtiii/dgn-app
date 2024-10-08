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
    <script src="<?= $_CONFIG['base_url']; ?>/assets/code/js/main.js" defer></script>
    <link rel="manifest" href="<?= $_CONFIG['base_url']; ?>/manifest.json">
    <link rel="icon" type="image/png" href="<?= $_CONFIG['base_url']; ?>/assets/img/favicon.png" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="<?= $_CONFIG['base_url']; ?>/marks">
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
                        <a class="nav-link" href="<?= $_CONFIG['base_url']; ?>/marks">
                            <i class="fa-regular fa-face-frown-slight me-1"></i>
                            Noten
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $_CONFIG['base_url']; ?>/timetable">
                            <i class="fa-regular fa-calendar me-1"></i>
                            Vertretungsplan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $_CONFIG['base_url']; ?>/about">
                            <i class="fa-regular fa-circle-info me-1"></i>
                            Infos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-mode-toggle" href="#" onclick="toggleDarkMode();">
                            <i class="fa-regular fa-circle-info me-1"></i>
                            Toggle
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" aria-current="page" href="<?= $_CONFIG['base_url']; ?>/logout">
                            <i class="fa-regular fa-arrow-right-from-bracket text-danger me-1"></i>
                            Abmelden
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="<?= $_CONFIG['base_url']; ?>/lock">
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
                                <a class="dropdown-item" href="<?= $_CONFIG['base_url']; ?>/logout">
                                    <i class="fa-regular fa-arrow-right-from-bracket text-danger me-1"></i>
                                    Abmelden
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= $_CONFIG['base_url']; ?>/lock">
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

        <a href="<?= $_CONFIG['base_url']; ?>/marks" class="btn btn-sm btn-outline-secondary w-100 btn-loader mb-3">
            <i class="fa-regular fa-arrow-left me-1"></i>
            Zurück
        </a>

        <div class="card">
            <div class="row g-0">
                <div class="col-4 bg-success bg-opacity-10">
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <?= getCourseIcon(parseCourseName($course_name)); ?>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title">
                            <?= parseCourseName($course_name); ?> <span class="badge bg-success bg-opacity-10 text-success"><?= $half_year; ?></span>
                        </h5>
                        <div class="fs-3 fw-bold">
                            <span class="form-text text-muted" style="font-size: 70%;"><i class="fa-regular fa-empty-set"></i></span> <?= OSgetCourseData($output, $course_name, 'overall-arithmetical-mean', $year); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <?php if (getCourseData($output, $course_name, 'other-arithmetical-mean') != "?"): ?>
            <div class="card">
                <div class="row g-0">
                    <div class="col-4 bg-primary bg-opacity-10">
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <i class="fa-regular fa-memo fa-3x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body my-3">
                            <h5 class="card-title mb-0 pb-0">
                                sonstige Noten
                            </h5>
                            <div class="form-text">
                                ∅ <span class="fw-bold"><?= OSgetCourseData($output, $course_name, 'other-arithmetical-mean', $year); ?></span> berechnet mit <?= OSgetCourseData($output, $course_name, 'other-percent', $year); ?> % Gewichtung
                            </div>
                            <div class="fs-5 mt-2">
                                <?php
                                $other_marks = OSgetCourseData($output, $course_name, 'other', $year);
                                $other_marks = explode(' ', $other_marks);
                                foreach ($other_marks as $mark) :
                                    if ($mark == '?') continue;
                                ?>
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-1"><?= $mark; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (OSgetCourseData($output, $course_name, 'class-test-arithmetical-mean', $year) != "?"): ?>
            <div class="card mt-5">
                <div class="row g-0">
                    <div class="col-4 bg-primary bg-opacity-10">
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <i class="fa-regular fa-memo fa-3x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body my-3">
                            <h5 class="card-title mb-0 pb-0">
                                Klassenarbeiten
                            </h5>
                            <div class="form-text">
                                ∅ <span class="fw-bold"><?= OSgetCourseData($output, $course_name, 'class-test-arithmetical-mean', $year); ?></span> berechnet mit <?= OSgetCourseData($output, $course_name, 'class-test-percent', $year); ?> % Gewichtung
                            </div>
                            <div class="fs-5 mt-2">
                                <?php
                                $classtest_marks = OSgetCourseData($output, $course_name, 'class-test', $year);
                                $classtest_marks = explode(' ', $classtest_marks);
                                foreach ($classtest_marks as $mark) :
                                    if ($mark == '?') continue;
                                ?>
                                    <span class="badge bg-primary bg-opacity-10 text-primary me-1"><?= $mark; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="card mt-5">
            <div class="row g-0">
                <div class="col-4 bg-primary bg-opacity-10">
                    <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                        <i class="fa-regular fa-calendar fa-3x text-primary"></i>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card-body my-3">
                        <h5 class="card-title mb-0 pb-0">
                            Halbjahresstatistik
                        </h5>
                        <div class="form-text">
                            Statistiken für das Halbjahr
                        </div>
                        <div class="fs-5 mt-2">
                            <span class="badge bg-primary bg-opacity-10 text-primary">∅ <?= OSgetCourseData($output, $course_name, 'overall-arithmetical-mean', $year); ?></span>
                            <i class="fa-regular fa-arrow-right mx-3"></i>
                            <span class="badge bg-primary bg-opacity-10 text-primary"><?= OSgetCourseData($output, $course_name, 'overall-mark', $year); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <h6 class="text-muted mb-3">
            Weitere Funktionen
        </h6>

        <div class="list-group mb-5">
            <a href="#" class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#markSimulationModal">
                <i class="fa-regular fa-chart-line me-2"></i>
                Noten simulieren
            </a>
        </div>




        <!-- Modal -> Eingabemaske Notensimulation -->
        <div class="modal fade" id="markSimulationModal" tabindex="-1" aria-labelledby="markSimulationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="markSimulationModalLabel">
                            <i class="fa-regular fa-chart-line me-2"></i>
                            Notensimulation
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Alert -->
                        <div class="alert alert-warning" role="alert">
                            <i class="fa-regular fa-exclamation-triangle me-2"></i>
                            Die Notensimulation ist derzeit nur für die Unterstufe verfügbar.
                            Bin dabei, kommt bald auch für euch &lt;3
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <script>
            if (typeof navigator.serviceWorker !== 'undefined') {
                navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
            }
        </script>
</body>

</html>