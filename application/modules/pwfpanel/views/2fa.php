<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/fevicon_live.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Hospital management</title>

    <link rel="stylesheet" href="https://unpkg.com/@adminkit/core@latest/dist/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center"> <br><br>
                        <!-- <img src="img/logo_live.png" alt="Image" class="img-fluid" width="132" height="132" /> -->
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" style="text-align: center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 512 512">
                                        <title>ionicons-v5-g</title>
                                        <path d="M336,208V113a80,80,0,0,0-160,0v95" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path>
                                        <rect x="96" y="208" width="320" height="272" rx="48" ry="48" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></rect>
                                    </svg>
                                    <h2>2-step verification</h2>
                                    <h5>We sent a verification code to your email. Please enter the code in the field below.</h5>
                                </div>

                                <div class="card-body">
                                    <form method="POST" action="<?php echo site_url('pwfpanel/two_factor_confirm') ?>">
                                        <!-- Replace "your_action_url" with the actual URL where you want to submit the form -->
                                        <!-- No Blade syntax or PHP variables used below -->


                                        <?php session_start();


                                        if (isset($_SESSION["wrong_code"])) {
                                            // Display the error message
                                            echo '<div class="col-md-8 offset-md-4" style="color: red;">' . $_SESSION["wrong_code"] . '</div>';
                                        }
                                        if (isset($_SESSION["code_expired"])) {
                                            // Display the error message
                                            echo '<div class="col-md-8 offset-md-4" style="color: red;">' . $_SESSION["code_expired"] . '</div>';
                                        }
                                        if ($_SESSION["success_message"]) {
                                            // Display the error message
                                            echo '<div class="col-md-8 offset-md-4" style="color: green;">' . $_SESSION["success_message"] . '</div>';
                                        }
                                        ?>

                                        <br>
                                        <div class="row mb-3">
                                            <label for="code" class="col-md-4 col-form-label text-md-end">Enter Code</label>
                                            <div class="col-md-6">
                                                <input id="code" type="number" class="form-control" name="code" min="1" max="999999" required autocomplete="code" autofocus>
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">

                                            <a href="<?php echo site_url('pwfpanel/resendTwoFactor'); ?>" class="btn btn-link">Resend Code?</a>

                                            <!-- <a class="btn btn-link" href="your_resend_url">Resend Code?</a> -->
                                            <!-- Replace "your_resend_url" with the actual URL for resending the code -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
</body>

</html>