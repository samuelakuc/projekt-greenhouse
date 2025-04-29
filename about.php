<?php
require_once 'classes/Employee.php';

$employee = new Employee();
$employees = $employee->getAllEmployees();

$headerType = 'about';
include 'parts/header.php';
?>

<main>
    <header class="row tm-welcome-section">
        <h2 class="col-12 text-center tm-section-title">About Simple House</h2>
    </header>

    <div class="tm-container-inner tm-persons">
        <div class="row">

            <?php while ($row = $employees->fetch(PDO::FETCH_ASSOC)): ?>
                <article class="col-lg-6">
                    <figure class="tm-person">
                        <img src="img/<?php echo $row['image']; ?>" alt="Image" class="img-fluid tm-person-img" />
                        <figcaption class="tm-person-description">
                            <h4 class="tm-person-name"><?php echo $row['name']; ?></h4>
                            <p class="tm-person-title"><?php echo $row['position']; ?></p>
                            <p class="tm-person-about"><?php echo $row['description']; ?></p>
                            <div>
                                <a href="<?php echo $row['facebook_link']; ?>" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
                                <a href="<?php echo $row['twitter_link']; ?>" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
                                <a href="<?php echo $row['instagram_link']; ?>" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
                                <a href="<?php echo $row['youtube_link']; ?>" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="tm-container-inner tm-featured-image">
        <div class="row">
            <div class="col-12">
                <div class="placeholder-2">
                    <div class="parallax-window-2" data-parallax="scroll" data-image-src="img/about-05.jpg"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-container-inner tm-features">
        <div class="row">
            <div class="col-lg-4">
                <div class="tm-feature">
                    <i class="fas fa-4x fa-pepper-hot tm-feature-icon"></i>
                    <p class="tm-feature-description">Donec sed orci fermentum, convallis lacus id, tempus elit. Sed eu neque accumsan, porttitor arcu a, interdum est. Donec in risus eu ante.</p>
                    <a href="index.php" class="tm-btn tm-btn-primary">Read More</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tm-feature">
                    <i class="fas fa-4x fa-seedling tm-feature-icon"></i>
                    <p class="tm-feature-description">Maecenas pretium rutrum molestie. Duis dignissim egestas turpis sit. Nam sed suscipit odio. Morbi in dolor finibus, consequat nisl eget.</p>
                    <a href="index.php" class="tm-btn tm-btn-success">Read More</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tm-feature">
                    <i class="fas fa-4x fa-cocktail tm-feature-icon"></i>
                    <p class="tm-feature-description">Morbi in dolor finibus, consequat nisl eget, pretium nunc. Maecenas pretium rutrum molestie. Duis dignissim egestas turpis sit.</p>
                    <a href="index.php" class="tm-btn tm-btn-danger">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="tm-container-inner tm-history">
        <div class="row">
            <div class="col-12">
                <div class="tm-history-inner">
                    <img src="img/about-06.jpg" alt="Image" class="img-fluid tm-history-img" />
                    <div class="tm-history-text">
                        <h4 class="tm-history-title">History of our restaurant</h4>
                        <p class="tm-mb-p">Sed ligula risus, interdum aliquet imperdiet sit amet, auctor sit amet justo. Maecenas posuere lorem id augue interdum vehicula. Praesent sed leo eget libero ultricies congue.</p>
                        <p>Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a href="https://templatemo.com/contact">contact TemplateMo</a> for additional permissions about our templates. Thank you.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
$footerType = 'about';
include 'parts/footer.php';
?>

