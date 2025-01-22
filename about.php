<?php
session_start();
if ((!isset($_SESSION['loggedin'])) || ($_SESSION['loggedin'] != true)) {
    $loggedin = true;
} else {
    $loggedin = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about1.css">
    <title>About EPHARMA</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <section class="img">
        <h1>We make healthcare Understandable, Accessible and Affordable.</h1>
    </section>
    <section class="about">
        <div class="about-sec">
            <div class="about-heading-one">
                <h1>About EPHARMA</h1>
            </div>
            <div class="about-heading-two">
                <p>India’s leading digital consumer healthcare platform</p>
            </div>
            <div class="about-boxes">
                <div class="about-box-one">
                    <img src="m-d-img/medicine-icon.png" alt="">
                    <h2>E-Pharmacy</h2>
                    <p>Order medicines and health products online and get it delivered
                        at home from licensed pharmacies</p>
                </div>
                <div class="about-box-two">
                    <img src="m-d-img/authentic.png" alt="">
                    <h2>Authentic Information</h2>
                    <p>Read medicine and health content written by qualified doctors and health professionals</p>
                </div>
            </div>
            <div class="about-para">
                <p>EPHARMA.com brings to you an online platform, which can be accessed for all your health needs. We are
                    trying
                    to
                    make healthcare a hassle-free experience for you. Get your allopathic, ayurvedic, homeopathic
                    medicines,
                    vitamins & nutrition supplements and other health-related products delivered at home. Lab tests?
                    That
                    too in
                    the comfort of your home. Doctor consult? Yes, we got that covered too.</p>
            </div>
        </div>
    </section>


    <section class="leadership">
        <div class="heading">
            <h1>Leadership</h1>
        </div>
        <div class="items">
            <div class="item">
                <img src="m-d-img/abinash1.jpg" alt="">
                <div class="work">
                    <h2>Abinash Sahu</h2>
                    <p>CEO & Co-Founder</p>
                </div>
                <div class="sociLink">
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/facebook-square.png" alt=""></a>
                    <a href="https://www.instagram.com/abinash8642/" target="_blank"><img src="m-d-img/instagram-square.png" alt=""></a>
                </div>
            </div>
            <div class="item">
                <img src="m-d-img/trilok.jpg" alt="">
                <div class="work">
                    <h2>Trilok kumar Sahu</h2>
                    <p>CTO & Co-Founder</p>
                </div>
                <div class="sociLink">
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/facebook-square.png" alt=""></a>
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/instagram-square.png" alt=""></a>
                </div>
            </div>
            <div class="item">
                <img src="m-d-img/abinash1.jpg" alt="">
                <div class="work">
                    <h2>Arun Acharya</h2>
                    <p>Co-Founder</p>
                </div>
                <div class="sociLink">
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/facebook-square.png" alt=""></a>
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/instagram-square.png" alt=""></a>
                </div>
            </div>
            <div class="item">
                <img src="m-d-img/abinash1.jpg" alt="">
                <div class="work">
                    <h2>Sager Jena</h2>
                    <p>COO</p>
                </div>
                <div class="sociLink">
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/facebook-square.png" alt=""></a>
                    <a href="https://www.facebook.com/abinash.sahu.5686" target="_blank"><img src="m-d-img/instagram-square.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>

    <section class="investor" style="margin-top: 50px;">
        <h3>Our Investors</h3>
        <div class="investors">
            <a href="https://www.sequoiacap.com/india/" target="_blank"><img src="m-d-img/sequoia.png" alt=""></a>
            <a href="http://www.maverickventures.com/" target="_blank"><img src="m-d-img/maverick.png" alt=""></a>
            <a href="https://www.hbmhealthcare.com/en" target="_blank"><img src="m-d-img/hbm.png" alt=""></a>
            <a href="http://www.kae-capital.com/" target="_blank"><img src="m-d-img/kae-capital.png" alt=""></a>
            <a href="https://www.omidyar.com/" target="_blank"><img src="m-d-img/omidyar-network.png" alt=""></a>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>