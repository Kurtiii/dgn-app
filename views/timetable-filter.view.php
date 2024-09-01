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

        <a href="<?= $_CONFIG['base_url']; ?>/timetable" class="btn btn-sm btn-outline-secondary w-100 btn-loader mb-3">
            <i class="fa-regular fa-arrow-left me-1"></i>
            Zurück
        </a>

        <p>
            Hier findest du alle Kurse, welche du aus der Übersicht ausgeblendet hast. Tippe einen Kurs an, um ihn wieder anzuzeigen. <br>
            Wenn du deinen Kurs nicht findest, kann es sein, dass du die falsche Klasse ausgewählt hast.
            <a href="<?= $_CONFIG['base_url']; ?>/logout" class="text-decoration-none">Melde dich erneut an</a>, um deine Klasse zu ändern.
        </p>

        <?php foreach ($hidden_courses as $course) :

            // remove id
            $raw = $course;
            $course = substr($course, 19);

            $course = explode(":", $course);

            $lk = false;
            $chr = mb_substr($course[0], 0, 1, "UTF-8");
            if (mb_strtolower($chr, "UTF-8") != $chr) {
                $lk = true;
            }
        ?>
            <button type="button" class="btn btn-outline-primary w-100 mt-3" id="<?= $raw; ?>">
                <b><?= $course[0]; ?></b>
                <span class="badge bg-primary bg-opacity-10 text-primary ms-2"><?= $course[1]; ?></span>
                <?php if ($lk) : ?>
                    <span class="badge bg-primary bg-opacity-10 text-primary ms-2">LK</span>
                <?php endif; ?>
                <br>
                <small class="form-text text-primary">Tippe, um Kurs wieder anzuzeigen</small>
            </button>
        <?php endforeach; ?>
        <?php if (empty($hidden_courses)) : ?>
            <div class="alert alert-success mt-3" role="alert">
                <i class="fa-regular fa-circle-check me-2"></i>
                Alle Kurse sind sichtbar.
            </div>
        <?php endif; ?>

        <a href="<?= $_CONFIG['base_url']; ?>/timetable" class="btn btn-sm btn-outline-secondary w-100 btn-loader mt-3">
            <i class="fa-regular fa-arrow-left me-1"></i>
            Zurück
        </a>



        <div class="my-5"></div>
    </div>

    <script>
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

        function eraseCookie(name) {
            document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }

        $(document).ready(function() {
            hidden_courses = getCookie('hidden_courses');

            // save "courses" cookie
            $('.btn-outline-primary').click(function() {
                console.log(hidden_courses);
                // remove course from hidden courses (json)
                hidden_courses = JSON.parse(hidden_courses);
                hidden_courses = hidden_courses.filter(function(course) {
                    return course !== $(this).attr('id');
                }.bind(this));
                hidden_courses = JSON.stringify(hidden_courses);

                // save hidden courses
                setCookie('hidden_courses', hidden_courses, 365);

                // hide button
                $(this).hide();
            });
        });
    </script>


    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
        }
    </script>
</body>

</html>