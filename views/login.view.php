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
    <script src="assets/code/js/main.js" defer></script>
    <link rel="manifest" href="<?= $_CONFIG['base_url']; ?>/manifest.json">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="text-center" style="max-width: 19rem;">
            <div class="row">
                <div class="col-12">
                    <h3>
                        Willkommen zurück!
                    </h3>
                    <span class="badge bg-primary bg-opacity-10 text-primary">
                        <?= $_COOKIE['username']; ?>
                    </span>

                    <?php if (isset($_GET['error'])) : ?>
                        <div class="alert alert-danger mt-5" role="alert">
                            <?= urldecode($_GET['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= $_CONFIG['base_url']; ?>/api/authentication/login" method="post" class="mt-5 text-start">
                        <div class="mb-4">
                            <label for="pin" class="form-label">4-stellige PIN</label>
                            <input type="number" class="form-control" id="pin" name="pin" placeholder="4-stellige PIN" min="1000" max="9999" maxlength="4">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-loader w-100">
                                Anmelden
                                <i class="far fa-arrow-right ms-2"></i>
                            </button>

                        </div>
                        <div class="mt-5">
                            Wenn du deine PIN vergessen hast oder dich mit einem anderen Account anmelden möchtest, klicke bitte <a href="<?= $_CONFIG['base_url']; ?>/logout" class="text-reset">hier</a>.
                        </div>
                    </form>

                </div>
            </div>

            <hr class="my-5">

            <div>
                <button onclick="toggleDarkMode();" class="btn btn-outline-secondary btn-sm dark-mode-toggle">
                    Toggle
                </button>
                <button class="btn btn-outline-secondary btn-sm ms-3">
                    <i class="far fa-question-circle"></i>
                    Hilfe
                </button>
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