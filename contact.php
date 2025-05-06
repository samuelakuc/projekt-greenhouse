<?php
$headerType = 'contact';
include 'parts/header.php';

require_once 'classes/FAQ.php';

$faq = new FAQ();
$faqs = $faq->getAllFaqs();
?>

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
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link active">Contact</a></li>
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

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact Page</h2>
				<p class="col-12 text-center">You may use <a rel="nofollow" href="https://www.ltcclock.com/downloads/simple-contact-form/" target="_blank">Simple Contact Form</a> to send email to your inbox. You can modify and use this template for your website. Header image has a parallax effect. Total 3 HTML pages included in this template.</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="database/databaza_formular.php" method="POST" class="tm-contact-form">
					        <div class="form-group">
                                <label for="name"></label><input type="text" name="name" id="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
                                <label for="email"></label><input type="email" name="email" id="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
                                <label for="message"></label><textarea rows="5" name="message" id="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>

					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								180 Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus 10550
							</address>
							<a href="tel:080-090-0110" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>080-090-0110
							</a>
							<a href="mailto:info@company.co" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>info@company.co
							</a>
							<div class="tm-contact-social">
								<a href="https://fb.com/templatemo" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
								<a href="#" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
            
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11196.961132529668!2d-43.38581128725845!3d-23.011063013218724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bdb695cd967b7%3A0x171cdd035a6a9d84!2sAv.%20L%C3%BAcio%20Costa%20-%20Barra%20da%20Tijuca%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%20Brazil!5e0!3m2!1sen!2sth!4v1568649412152!5m2!1sen!2sth" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
						<h2 class="text-center tm-section-title">FAQs</h2>
						<p class="text-center">This section comes with Accordion tabs for different questions and answers about Simple House HTML CSS template. Thank you. #666</p>
						<div class="tm-accordion">
                            <div class="tm-accordion">
                                <?php foreach ($faqs as $index => $item): ?>
                                    <button class="accordion"><?php echo ($index + 1) . '. ' . htmlspecialchars($item['question']); ?></button>
                                    <div class="panel">
                                        <p><?php echo nl2br(htmlspecialchars($item['answer'])); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
					</div>
				</div>
			</div>
		</main>

        <?php
$footerType = 'contact';
include 'parts/footer.php';
?>