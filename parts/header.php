<?php

if (!isset($headerType)) {
    $headerType = 'default';
}
// Podľa typu headera vypíšeme konkrétny HTML
switch ($headerType) {
case 'index':
?>

    <!DOCTYPE html>
    <html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House Template</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />
	<link href="css/templatemo-style.css" rel="stylesheet" />
</head>

<?php
break;

case 'contact':
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Simple House - Contact Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="css/all.min.css" rel="stylesheet" />
    <link href="css/templatemo-style.css" rel="stylesheet" />
</head>
<?php

    break;

    case 'about':
        ?>
        <?php
        session_start(); // Začiatok session
        ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Simple House - About Page</title>
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
            <link href="css/all.min.css" rel="stylesheet" />
            <link href="css/templatemo-style.css" rel="stylesheet" />
        </head>
    <body>

    <div class="container">
        <!-- Top box -->
        <!-- Logo & Site Name -->
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="img/simple-house-01.jpg">
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <img src="img/simple-house-logo.png" alt="Logo" class="tm-site-logo" />
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title">Simple House</h1>
                                <h6 class="tm-site-description">new restaurant template</h6>
                            </div>
                        </div>
                        <nav class="col-md-6 col-12 tm-nav">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
                                <li class="tm-nav-li"><a href="about.php" class="tm-nav-link active">About</a></li>
                                <li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>

                                <?php if (isset($_SESSION['user'])): ?>
                                    <!-- Ak je používateľ prihlásený -->
                                    <li class="tm-nav-li"><a href="crud/admin_dashboard.php" class="tm-nav-link">Admin Dashboard</a></li>
                                    <li class="tm-nav-li"><a href="crud/logout.php" class="tm-nav-link">Logout</a></li>
                                <?php else: ?>
                                    <!-- Ak nie je prihlásený -->
                                    <li class="tm-nav-li"><a href="crud/login.php" class="tm-nav-link">Login</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

<?php
}
?>