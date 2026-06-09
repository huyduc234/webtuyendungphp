<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.meanmenu.js"></script>
<script src="assets/js/jquery.nice-select.min.js"></script>
<script src="assets/js/jquery.mixitup.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/odometer.min.js"></script>
<script src="assets/js/jquery.appear.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/progressbar.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/comboselect.js"></script>
<script src="assets/js/global.js"></script>

<script>
$(document).ready(function(){

    $('.newsletter-form').off('submit').on('submit', function(e){
        e.preventDefault();

        let email = $(this).find('input[name="EMAIL"]').val().trim();

        if(email !== ''){
            $('#validator-newsletter').html(
                '<span style="color:#28a745;font-weight:bold;">✓ Đăng ký nhận thông báo thành công!</span>'
            );

            $(this).find('input[name="EMAIL"]').val('');
        } else {
            $('#validator-newsletter').html(
                '<span style="color:red;font-weight:bold;">Vui lòng nhập email!</span>'
            );
        }
    });

});
</script>

</body>
</html>