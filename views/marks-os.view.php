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
    <script src="assets/code/js/main.js" defer></script>
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
                        <a class="nav-link active" href="<?= $_CONFIG['base_url']; ?>/marks">
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


        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">
                    Halbjahr wählen
                </h5>
                <form action="<?= $_CONFIG['base_url']; ?>/marks" method="get">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="year">Halbjahr</label>
                        <select class="form-select" id="year" name="year">
                            <?php
                            $years = OSgetAllHalfYears($output);
                            $i = 0;
                            foreach ($years as $y) :
                            ?>
                                <option value="<?= $i; ?>" <?= $year == $i ? 'selected' : ''; ?>>
                                    <?= $y; ?>
                                </option>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-primary btn-loader" type="submit" id="searchHalfYear">
                            <i class="fa-regular fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

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

        <div id="coursesCards">

            <?php
            $courses = OSgetAllCourses($output, @$year);
            $overallAverage = array();
            foreach ($courses as $course => $courseAverage) :
                $overallAverage[] = OSgetCourseData($output, $course, "overall-arithmetical-mean", 1);
            ?>
                <a href="<?= $_CONFIG['base_url']; ?>/course/<?= urlencode($course); ?>?year=<?= $year; ?>" class="text-decoration-none text-reset">
                    <div class="card mb-5">
                        <div class="row g-0">
                            <div class="col-4 bg-success bg-opacity-10">
                                <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                                    <?= getCourseIcon(parseCourseName($course)); ?>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body my-3">
                                    <h5 class="card-title">
                                        <?= parseCourseName($course); ?>
                                    </h5>
                                    <div class="fs-3 fw-bold">
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            Ø <?= OSgetCourseData($output, $course, "overall-arithmetical-mean", $year); ?>
                                        </span>
                                        <i class="fa-regular fa-arrow-right mx-3"></i>
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            <?= round(OSgetCourseData($output, $course, "overall-arithmetical-mean", $year)); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>

            <span class="form-text">
                <i class="fa-regular fa-circle-info me-1"></i>
                Die Endnoten werden maschinell berechnet und können daher von den tatsächlichen Noten abweichen.
                Deine korrekte Endnote findest du in der Detailansicht des jeweiligen Faches.
            </span>

            <hr class="my-5">

            <?php
            $overallAverage = array_sum($overallAverage) / count($overallAverage);
            $overallAverage = round($overallAverage, 2);
            ?>

            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-4 bg-primary bg-opacity-10">
                        <div class="d-flex align-items-center justify-content-center" style="height: 100%;">
                            <i class="fa-regular fa-empty-set fa-3x text-primary"></i>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body my-3">
                            <h5 class="card-title">
                                Gesamtdurchschnitt
                            </h5>
                            <div class="fs-3 fw-bold">
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    Ø <?= $overallAverage; ?>
                                </span>
                                <i class="fa-regular fa-arrow-right mx-3"></i>
                                <span class="badge bg-primary bg-opacity-10 text-primary">
                                    <?= round($overallAverage); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <table class="table mb-5" id="tableMarks">
                <thead>
                    <tr>
                        <th scope="col">Fach</th>
                        <th scope="col">Durchschnitt</th>
                        <th scope="col">Note</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course => $courseAverage) : ?>
                        <tr>
                            <td><?= parseCourseName($course); ?></td>
                            <td>Ø <?= OSgetCourseData($output, $course, "overall-arithmetical-mean", $year); ?></td>
                            <td><?= round(OSgetCourseData($output, $course, "overall-arithmetical-mean", $year)); ?></td>
                            <td>
                                <a href="<?= $_CONFIG['base_url']; ?>/course/<?= urlencode($course); ?>?year=<?= $year; ?>" class="text-reset text-decoration-none">
                                    <i class="fa-regular fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>

        <script>
            if (typeof navigator.serviceWorker !== 'undefined') {
                navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
            }

            // on change year
            $('#year').on('change', function() {
                $('#searchHalfYear').click();
            });
        </script>
</body>

</html>