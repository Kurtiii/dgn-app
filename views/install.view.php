<!DOCTYPE html>
<html lang="de" id="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noten und so...</title>
    <link rel="stylesheet" href="assets/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/code/css/main.css">
    <script src="assets/lib/bootstrap/bootstrap.min.js" defer></script>
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <script src="assets/lib/fontawesome/fontawesome.min.js"></script>
    <script src="assets/code/js/darkmode.js" defer></script>
    <link rel="manifest" href="<?= $_CONFIG['base_url']; ?>/manifest.json">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="text-center" style="max-width: 19rem;">
            <i class="fa-duotone fa-arrow-down-to-line text-primary fa-2x mb-4"></i>
            <h1 class="h5">Installieren</h1>

            <div class="accordion mt-5" id="accordionInstall">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAndroid" aria-expanded="true" aria-controls="collapseAndroid">
                            <i class="fa-brands fa-android me-2"></i>
                            Android
                        </button>
                    </h2>
                    <div id="collapseAndroid" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionInstall">
                        <div class="accordion-body">
                            Klicke auf <i class="fa-regular fa-ellipsis-vertical mx-2"></i> oben links und wähle "Zum Startbildschirm hinzufügen" bzw. "App installieren" aus.
                            Folge danach den Anweisungen auf dem Bildschirm.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIOS" aria-expanded="false" aria-controls="collapseIOS">
                            <i class="fa-brands fa-apple me-2"></i>
                            iOS
                        </button>
                    </h2>
                    <div id="collapseIOS" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionIOS">
                        <div class="accordion-body">
                            Klicke auf <i class="fa-regular fa-arrow-up-from-square mx-2"></i> unten in der Mitte und wähle "Zum Startbildschirm hinzufügen" aus.
                            Folge danach den Anweisungen auf dem Bildschirm.
                        </div>
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