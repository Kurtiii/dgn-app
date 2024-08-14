<!DOCTYPE html>
<html lang="de" id="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noten und so...</title>
    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>/assets/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $_CONFIG['base_url']; ?>/assets/code/css/main.css">
    <script src="a<?= $_CONFIG['base_url']; ?>/ssets/lib/bootstrap/bootstrap.min.js" defer></script>
    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/jquery/jquery.min.js"></script>
    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/fontawesome/fontawesome.min.js"></script>
    <!-- <script src="<?= $_CONFIG['base_url']; ?>/assets/code/js/darkmode.js" defer></script> -->
    <link rel="manifest" href="<?= $_CONFIG['base_url']; ?>/manifest.json">
    <link rel="icon" type="image/png" href="<?= $_CONFIG['base_url']; ?>/assets/img/favicon.png" />
</head>

<body>

    <div class="container">
        <div class="text-center mt-5" style="max-width: 400px;">
            <i class="fa-brands fa-android text-primary fa-2x"></i>
            <h1 class="h5 mb-4">Android</h1>

            <a href="https://play.google.com/store/apps/details?id=de.kurtiii.dgn_app">
                <img src="<?= $_CONFIG['base_url']; ?>/assets/img/stores/playstore.png" alt="Google Play Store" height="40px">
            </a>

            <hr class="my-5">
            <i class="fa-brands fa-apple text-primary fa-2x"></i>
            <h1 class="h5 mb-4">iPhone &bull; iPad</h1>

            <div id="pwa" style="display: none;">
                <a href="#" id="btnInstall">
                    <img src="<?= $_CONFIG['base_url']; ?>/assets/img/stores/pwa.png" alt="Install as PWA" height="40px">
                </a>

            </div>

            <div id="pwa-error" class="text-danger">
                <i class="fa-regular fa-triangle-exclamation me-2"></i>
                <b>Du verwendest einen veralteten Browser.</b>
                Um diese App auf deinem <b>iPhone</b> zu installieren, öffne diese Seite in <b>Safari</b> und versuche es erneut.
                Du kannst diese App auch <a href="<?= $_CONFIG['base_url']; ?>/web" class="text-danger">hier</a> im Browser verwenden.
            </div>

            <hr class="my-5">
            <i class="fa-brands fa-windows text-primary fa-2x"></i>
            <h1 class="h5 mb-4">Windows</h1>

            <a href="https://www.microsoft.com/store/productId/9NVGBT5BDPM">
                <img src="<?= $_CONFIG['base_url']; ?>/assets/img/stores/microsoft.svg" alt="Microsoft Store" height="40px">
            </a>

            <hr class="my-5">
            <i class="fa-regular fa-globe text-primary fa-2x"></i>
            <h1 class="h5 mb-4">Im Browser nutzen</h1>

            <a href="<?= $_CONFIG['base_url']; ?>">
                <img src="<?= $_CONFIG['base_url']; ?>/assets/img/stores/webapp.png" alt="Open as Webapp" height="40px">
            </a>

        </div>
    </div>

    <div class="my-5"></div>

    <script src="<?= $_CONFIG['base_url']; ?>/assets/lib/bootstrap/bootstrap.min.js"></script>
    <script>
        if (typeof navigator.serviceWorker !== 'undefined') {
            navigator.serviceWorker.register('<?= $_CONFIG['base_url']; ?>/assets/code/js/service-worker.js');
        }
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            deferredPrompt = e;
            document.getElementById('pwa').style.display = 'block';
            document.getElementById('pwa-error').style.display = 'none';
        });

        const installApp = document.getElementById('btnInstall');
        installApp.addEventListener('click', async () => {
            if (deferredPrompt !== null) {
                deferredPrompt.prompt();
                const {
                    outcome
                } = await deferredPrompt.userChoice;
                if (outcome === 'accepted') {
                    deferredPrompt = null;
                }
            }
        });
    </script>
</body>

</html>