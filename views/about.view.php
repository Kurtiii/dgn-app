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
                        <a class="nav-link active" aria-current="page" href="<?= $_CONFIG['base_url']; ?>/marks">
                            <i class="fa-regular fa-face-frown-slight me-1"></i>
                            Noten
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

    <div class="container mt-5" style="max-width: 70em;">

        <h1>
            Informationen über die App
        </h1>

        <p>
            Vorab: Die App ist noch in der Entwicklung und wird ständig verbessert.
            Wenn ihr also Fehler findet, meldet diese bitte über <a href="https://github.com/Kurtiii/dgn-app/issues" target="_blank" class="text-reset">GitHub</a> oder <a href="https://instagram.com/kurtiii06" target="_blank" class="text-reset">Instagram</a> an mich.<br>
        </p>

        <hr class="my-5">

        <h4>
            Von wem ist die App?
        </h4>
        <p>
            Diese App wird <i>nicht</i> vom Domgymnasium Naumburg betrieben.
            Sie wird von mir, <a href="https://kurtiii.de" target="_blank" class="text-reset">Kurt</a>, entwickelt und betrieben.
            Ich stehe in keinerlei Verbindung mit dem Domgymnasium Naumburg und bin auch nicht für die angezeigten Noten verantwortlich.
            Außerdem hat diese App keinerlei komerzielle Absichten.
            Ich entwickle diese App in meiner Freizeit und stelle sie allen Schülern des Domgymnasiums Naumburg zur Verfügung, weil ich finde, dass die <a href="https://schueler.domgymnasium-nmb.de/login.php" target="_blank" class="text-reset">Notenverwaltung des Domgymnasiums Naumburg</a> möglicherweise Übelkeit verursachen kann und einmal überarbeitet werden könnte.
            Naja, wenn die Schule es selbst nicht macht, dann eben ich.
            Die App ist Quelloffen und kann von theoretisch jedem auf seinem eigenen Server betrieben werden.
        </p>

        <hr class="my-5">

        <h4>
            Ist die Nutzung der App kostenlos?
        </h4>
        <p>
            Definitiv <b>ja</b>!
            Ich verfolge mit dieser App keinerlei kommerzielle Absichten und stelle sie allen Schülern des Domgymnasiums Naumburg kostenlos zur Verfügung.
            Ich denke, dass es nicht gerecht wäre, wenn ich für die Nutzung der App Geld verlangen würde.
            Ihr werdet auch keinerlei Werbung in der App sehen. I mean come on, wer will schon Werbung sehen? Absoluter Bullshit!
            Außerdem ist die App komplett Open Source und kann von jedem auf seinem eigenen Server betrieben werden.
        </p>

        <hr class="my-5">

        <h4>
            Ist die App sicher?
        </h4>
        <p>
            Ich gebe mein bestes, um die App so sicher wie möglich zu machen.
            Beispielsweise werden alle eingebenen Anmeldedaten verschlüsselt an den Server übertragen.
            Auf meinem Server werden die Anmeldedaten nicht gespeichert, sondern nur zur Anmeldung verwendet.
            Ich speichere die Anmeldedaten lokal auf deinem Gerät mithilfe von Cookies.
            Dabei wird deine Passwort verschlüsselt gespeichert und kann nur mithilfe der PIN entschlüsselt werden.
            Um die Sicherheit deines Schul-Kontos zu erhöhen empfehle ich dir, ein starkes Passwort zu verwenden.
        </p>

        <hr class="my-5">

        <h4>
            Welche Klassen werden unterstützt?
        </h4>
        <p>
            Derzeit wird von mir nur die 10. Klassenstufe offiziell unterstützt.
            Einige Funktionen der App funktionieren jedoch auch in anderen Klassenstufen (Beispielsweise laden einige Icons nicht, wenn du nicht in der 10. Klassenstufe bist).
            Gerne kannst du die App für deine Klassenstufe testen und ggf. deine Erfahrungen mit mir teilen oder deine Klassenstufe selbst implementieren und einen Pull Request auf <a href="https://github.com/Kurtiii/dgn-app/" target="_blank" class="text-reset">GitHub</a> erstellen.
        </p>

        <hr class="my-5">

        <h4>
            Wie funktioniert die App?
        </h4>
        <p>
            Grob gesagt, loggt sich die App in deinem Namen auf der <a href="https://schueler.domgymnasium-nmb.de/login.php" target="_blank" class="text-reset">Notenverwaltung des Domgymnasiums Naumburg</a> ein und versucht automatisch die Noten aus der Tabelle zu extrahieren und dir anzuzeigen.
            Für eine detailierte technische Erklärung kannst du dir gerne die <span class="font-monospace">readme.md</span> auf <a href="https://github.com/Kurtiii/dgn-app/" target="_blank" class="text-reset">GitHub</a> ansehen.
        </p>

        <hr class="my-5">

        <p>
            &copy; 2023 <a href="https://kurtiii.de" target="_blank" class="text-reset">Kurt Krüger</a>
            &bull;
            Notendaten von <a href="https://schueler.domgymnasium-nmb.de/login.php" target="_blank" class="text-reset">schueler.domgymnasium-nmb.de</a>
            &bull;
            <a href="https://kurtiii.de" target="_blank" class="text-reset">Besuche meine Website</a>
        </p>

    </div>

    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
        }
    </script>
</body>

</html>