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
                        <a class="nav-link active" href="<?= $_CONFIG['base_url']; ?>/timetable">
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


        <div class="justify-content-between d-flex justify-space-between">
            <a href="<?= $_CONFIG['base_url']; ?>/timetable?date=<?= date('Y-m-d', strtotime($date . ' -1 day')); ?>" class="btn-loader">
                <i class="fa-regular fa-arrow-left me-2"></i>
            </a>
            <p class="text-muted mb-0 pb-0">
                <?= date('l, d.m.Y', strtotime($date)); ?>
            </p>
            <a href="<?= $_CONFIG['base_url']; ?>/timetable?date=<?= date('Y-m-d', strtotime($date . ' +1 day')); ?>" class="btn-loader">
                <i class="fa-regular fa-arrow-right me-2"></i>
            </a>
        </div>

        <hr class="my-4">

        <div class="list-group">
            <a href="<?= $_CONFIG['base_url']; ?>/timetable/filter" class="list-group-item list-group-item-action justify-content-between d-flex justify-space-between py-3">
                <span>
                    <i class="fa-regular fa-filter text-primary me-2"></i>
                    Kurse filtern
                </span>
                <span><i class="fa-regular fa-chevron-right"></i></span>
            </a>
            <a href="#<?= uniqid(); ?>" class="list-group-item list-group-item-action justify-content-between d-flex justify-space-between py-3 btn-loader" id="group-blocks">
                <span>
                    <i class="fa-regular fa-object-union text-primary me-2"></i>
                    Blöcke gruppieren
                    <span class="badge bg-primary bg-opacity-10 text-primary ms-2">Beta</span>
                </span>
                <span id="group-blocks-status">An <i class="fa-regular fa-check text-success ms-2"></i></span>
            </a>
            <?php if ($additional_info) : ?>
                <a href="#" class="list-group-item list-group-item-action justify-content-between d-flex justify-space-between py-3" data-bs-toggle="modal" data-bs-target="#additionalInfoModal">
                    <span>
                        <i class="fa-regular fa-info-circle text-primary me-2"></i>
                        Zusätzliche Informationen
                    </span>
                    <span><i class="fa-regular fa-chevron-right"></i></span>
                </a>
            <?php endif; ?>
        </div>

        <hr class="my-4">

        <?php if (!$timetable) : ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa-regular fa-exclamation-triangle me-2"></i>
                Für diesen Tag liegen keine Stundenpläne vor.
            </div>
        <?php endif; ?>

        <?php
        if ($timetable) :
            foreach ($timetable as $item) :

                if ($_COOKIE['group-blocks'] == 'true') {
                    if ($item['St'] == 1 || $item['St'] == 3 || $item['St'] == 5 || $item['St'] == 7 || $item['St'] == 9) {
                        $block_start = true;
                        $block_end = false;
                        switch ($item['St']) {
                            case 1:
                                $block = '<b>1. Block</b> (1. und 2. Stunde)';
                                break;
                            case 3:
                                $block = '<b>2. Block</b> (3. und 4. Stunde)';
                                break;
                            case 5:
                                $block =  '<b>3. Block</b> (5. und 6. Stunde)';
                                break;
                            case 7:
                                $block = '<b>4. Block</b> (7. und 8. Stunde)';
                                break;
                            case 9:
                                $block = '<b>5. Block</b> (9. und 10. Stunde)';
                                break;
                        }
                    } else {
                        $block_start = false;
                        $block_end = true;
                    }
                } else {
                    $block_start = false;
                    $block_end = false;
                    $show_hours = true;
                }

                if (isset($item['Le']['@attributes']) || isset($item['Fa']['@attributes']) || isset($item['Ra']['@attributes'])) {
                    $color = 'bg-danger text-danger';
                } else {
                    $color = 'bg-primary text-primary';
                }
        ?>
                <div class="card <?= $block_start ? 'rounded-bottom-0 mb-0 pb-0' : 'mb-4'; ?> <?= $block_end ? 'rounded-top-0 mt-0 pt-0' : ''; ?>">
                    <?php if ($block_start): ?>
                        <div class="card-header">
                            <h5 class="card-title form-text text-muted mb-0">
                                <?= $block; ?>
                            </h5>
                        </div>
                    <?php endif; ?>
                    <?php if (@$show_hours): ?>
                        <div class="card-header">
                            <h5 class="card-title form-text text-muted mb-0">
                                <?= $item['St']; ?>. Stunde
                            </h5>
                        </div>
                    <?php endif; ?>
                    <div class="row g-0">
                        <div class="col-4 bg-opacity-10 <?= $color; ?>">
                            <!-- center icon verticaly and horizontaly -->
                            <div class="d-flex align-items-center justify-content-center text-center fs-3 fw-bold" style="height: 100%;">
                                <?= $item['Beginn']; ?>
                                <br>
                                <?= $item['Ende']; ?>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card-body py-4">
                                <h3 class="d-inline text-muted fw-bold">
                                    <?php if (isset($item['Fa']['@attributes'])) : ?>
                                        <?php if (is_array($item['Fa'])) : ?>
                                            <span class="text-danger">
                                                ohne Angabe
                                            </span>
                                        <?php else : ?>
                                            <span class="text-danger">
                                                <?= strtoupper($item['Fa']) ?? 'ohne Angabe'; ?>
                                            </span>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?= strtoupper($item['Fa']) ?? 'ohne Angabe'; ?>
                                    <?php endif; ?>
                                </h3>
                                <span class="form-text d-block">
                                    Lehrer: <b>
                                        <?php if (isset($item['Le']['@attributes'])) : ?>
                                            <?php if (is_array($item['Le'])) : ?>
                                                <span class="text-danger">
                                                    ohne Angabe
                                                </span>
                                            <?php else : ?>
                                                <span class="text-danger">
                                                    <?= $item['Le'] ?? 'ohne Angabe'; ?>
                                                </span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $item['Le'] ?? 'ohne Angabe'; ?>
                                        <?php endif; ?>

                                    </b> &bull; Raum: <b>
                                        <?php if (isset($item['Ra']['@attributes'])) : ?>
                                            <?php if (is_array($item['Ra'])) : ?>
                                                <span class="text-danger">
                                                    ohne Angabe
                                                </span>
                                            <?php else : ?>
                                                <span class="text-danger">
                                                    <?= $item['Ra'] ?? 'ohne Angabe'; ?>
                                                </span>
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <?= $item['Ra'] ?? 'ohne Angabe'; ?>
                                        <?php endif; ?>
                                    </b>

                                    <br>
                                    <?php if (!empty($item['If'])) : ?>
                                        <hr>
                                        <span class="text-muted">
                                            <i class="fa-regular fa-solid fa-triangle-exclamation text-danger me-2"></i>
                                            <?= $item['If']; ?>
                                        </span>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>

        <div class="my-5"></div>
    </div>


    <!-- Modal -> Zusätzliche Informationen -->
    <div class="modal fade" id="additionalInfoModal" tabindex="-1" aria-labelledby="additionalInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="additionalInfoModalLabel">
                        <i class="fa-regular fa-info-circle me-2"></i>
                        Zusätzliche Informationen
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <?php
                        if ($additional_info) :
                            foreach ($additional_info as $item) :
                                if (empty($item) || is_array($item)) {
                                    echo "<br>";
                                    continue;
                                }
                                echo $item;
                                echo "<br>";
                            endforeach;
                        endif;
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
        }

        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }


        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        $(document).ready(function() {
            // get "group-blocks" cookie
            group_blocks = getCookie('group-blocks');

            if (group_blocks == 'true') {
                $('#group-blocks-status').html('An <i class="fa-regular fa-check text-success ms-2"></i>');
            } else {
                $('#group-blocks-status').html('Aus <i class="fa-regular fa-times text-danger ms-2"></i>');
            }

            // save "group-blocks" cookie
            $('#group-blocks').click(function() {
                group_blocks = getCookie('group-blocks');
                if (group_blocks) {
                    group_blocks = false;
                } else {
                    group_blocks = true;
                }
                setCookie('group-blocks', group_blocks, 365);

                // reload page
                location.reload();
            });
        });
    </script>
</body>

</html>