<base href="<?= base_url(); ?>"/>
</div>
</div>
<div class="clearfix"></div>
</div>
</section>
</div>
</div>
<footer>
    <div class="container">
        <ul class="footer-menu">
            <li><a href="index.php/welcome/index">HOME &nbsp; | </a></li>
            <li><a href="index.php/welcome/about_us">ABOUT US &nbsp; | </a></li>
            <li><a href="index.php/welcome/product">PRODUCTS &nbsp; | </a></li>
            <li><a href="index.php/welcome/news">NEWS &nbsp; | </a></li>
            <li><a href="index.php/welcome/contact">CONTACT US</a></li>
        </ul>
        <div class="footer-contact">
            <b>CAS-CR Co.,Ltd.</b>
            MMC Factory 75/110 Moo 11,Phahonyothin Rd.,<br>
            Klong Nueng Klong Luang, Pathumthani 12120 Thailand <br><br>
            Tel : +662-908-1308-10<br>
            E-mail : info@cas-cr.com<br>

            <p>2015© CAS-CR Co.,Ltd. All Right Reserved.</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel()
    $(document).ready(function() {
        var url = window.location;
        var mode = url['href'].split("/");
        var page = mode[5];
        var org = window.location.origin;
        if(page == "index"){
            $("#link").addClass("active");
            $("#link1").removeClass("active");
            $("#link2").removeClass("active");
            $("#link3").removeClass("active");
            $("#link4").removeClass("active");
        }else if(page == "about_us"){
            $("#link1").addClass("active");
            $("#link").removeClass("active");
            $("#link2").removeClass("active");
            $("#link3").removeClass("active");
            $("#link4").removeClass("active");
        }else if(page == "product"){
            $("#link2").addClass("active");
            $("#link1").removeClass("active");
            $("#link").removeClass("active");
            $("#link3").removeClass("active");
            $("#link4").removeClass("active");
        }else if(page == "news"){
            $("#link3").addClass("active");
            $("#link").removeClass("active");
            $("#link1").removeClass("active");
            $("#link2").removeClass("active");
            $("#link4").removeClass("active");
        }else if(page == "contact"){
            $("#link4").addClass("active");
            $("#link").removeClass("active");
            $("#link1").removeClass("active");
            $("#link2").removeClass("active");
            $("#link3").removeClass("active");
        }else if(url == org+"/"){
            $("#link").addClass("active");
            $("#link1").removeClass("active");
            $("#link2").removeClass("active");
            $("#link3").removeClass("active");
            $("#link4").removeClass("active");
        }else{
            $("#link2").addClass("active");
            $("#link1").removeClass("active");
            $("#link").removeClass("active");
            $("#link3").removeClass("active");
            $("#link4").removeClass("active");
        }
    });
</script>
</body>
</html>
