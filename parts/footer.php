<?php

if (!isset($footerType)) {
    $footerType = 'default';
}
// Podľa typu footera vypíše konkrétny HTML
switch ($footerType) {
case 'index':
?>

<footer class="tm-footer text-center">
    <p>Copyright &copy; 2020 Simple House

        | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
</footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script>
    $(document).ready(function(){
        // Handle click on paging links
        $('.tm-paging-link').click(function(e){
            e.preventDefault();

            var page = $(this).text().toLowerCase();
            $('.tm-gallery-page').addClass('hidden');
            $('#tm-gallery-page-' + page).removeClass('hidden');
            $('.tm-paging-link').removeClass('active');
            $(this).addClass("active");
        });
    });
</script>
</body>
</html>

<?php
        break;
        case 'about':
            ?>
<footer class="tm-footer text-center">
    <p>Copyright &copy; 2020 Simple House

        | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
</footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
</body>
</html>

<?php
        break;
        case 'contact':
            ?>
<footer class="tm-footer text-center">
    <p>Copyright &copy; 2020 Simple House

        | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
</footer>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script>
    $(document).ready(function(){
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    });
</script>
</body>
</html>
<?php
}
?>
