<nav class="col-md-6 col-12 tm-nav">
    <ul class="tm-nav-ul">
        <li class="tm-nav-li"><a href="index.php" class="tm-nav-link active">Home</a></li>
        <li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
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
