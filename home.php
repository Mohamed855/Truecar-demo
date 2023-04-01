<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
    
        <title>TRUEcar -Home-</title>

        <meta charset="utf-8">

        <link rel="icon" type="image/png" href="images/truecar-sl.jpg">
        <link rel="stylesheet" type="text/css" href="styleCss/home.css" media="all" />
        <link rel="stylesheet" type="text/css" href="styleCss/all.css">
        <link rel="stylesheet" type="text/css" href="styleCss/animate.css">
        <link rel="stylesheet" type="text/css" href="styleCss/aos.css">
       
    </head>

    <body>
        
        <!--navbar-->

        <?php include('navbar.php');?>

        <!--header-->

        <div class="container">
            <div class="slider">
                <div class="slide slide1"><div class="half-black-bg"></div></div>
                <div class="slide slide2"><div class="half-black-bg"></div></div>
                <div class="slide slide3"><div class="half-black-bg"></div></div>
                <div class="slide slide4"><div class="half-black-bg"></div></div>
                <div class="slide slide1"><div class="half-black-bg"></div></div>
            </div>
            <div class="newdiv">
                <div class="principal">
                    <h1><span>TRUE</span>CAR</h1>
                    <p>The place that you trust 'Always be ready'</p>
                </div>
            </div>
        </div>

        <!--end-->


         <!--About Truecar-->

        <div  data-aos="fade-up" data-aos-anchor-placement="top-center" class="about">
            <img class="img" src="images/truecar-classic-logo.png">
            <div class="paragraph">
                It’s a question on every car shopper’s mind: “How do I know that the price I see on this car is a good price?” There hasn't been a great answer to this question, until now. <br/><br/> With TrueCar, a Certified Dealer gives you an upfront, discounted price that includes all fees, accessory costs and incentives. This is your TruePrice, the price you’ll pay at the dealership. Better than any price you will find on other websites. <br><br> TruePrice is better because over 12,000 dealers uniquely set the price in TrueCar knowing you will see their prices alongside what other people paid.
            </div>
        </div>  

        <!--End-->

         <!--offers-->

        <center>
        <div class="caroffers" id="section02">
            <div class="newestcar">
                <a href="models/ford-Expedition.html"><div class="oc" style="background-image: url(images/offers/1.png);"></div></a>
                <p style="font-size: 20px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;">FORD EXPEDITION</p>
                <p style="font-size: 25px;color: #000000;font-family: sans-serif;letter-spacing: 0.5px;">$ 180.00 / day<br><span style="font-size: 14px;color: black;font-family: sans-serif;">instead of</span><br><del style="font-size: 19px;color: #cf2020;">$ 210.00</del></p>
                <p style="font-size: 15px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;"></p>
            </div>
            <div class="newestcar">
                <a href="models/Audi-Q5.html"><div class="oc" style="background-image: url(images/offers/2.jpg);"></div></a>
                <p style="font-size: 20px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;">AUDI Q5</p>
                <p style="font-size: 25px;color: #000000;font-family: sans-serif;letter-spacing: 0.5px;">$ 130.00 / day<br><span style="font-size: 14px;color: black;font-family: sans-serif;">instead of</span><br><del style="font-size: 19px;color: #cf2020;">$ 170.00</del></p>
                <p style="font-size: 15px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;"></p>
            </div>
            <div class="newestcar">
                <a href="models/BMW-X4.html"><div class="oc" style="background-image: url(images/offers/3.jpeg);"></div></a>
                <p style="font-size: 20px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;">BMW X4</p>
                <p style="font-size: 25px;color: #000000;font-family: sans-serif;letter-spacing: 0.5px;">$ 200.00 / day<br><span style="font-size: 14px;color: black;font-family: sans-serif;">instead of</span><br><del style="font-size: 19px;color: #cf2020;">$ 220.00</del></p>
                <p style="font-size: 15px;color: #37587E;font-family: sans-serif;letter-spacing: 0.5px;"></p>
            </div>
        </div>
        </center>

        <!--end-->


        <!--marks-->



        <div id="marks" style="background-color: #F9F9F9;">
            <div data-aos="zoom-in" class="marks-bg">
                <center>

                    <?php 

                    $db=mysqli_connect("localhost","root","","truecar(web)");

                    $sql="SELECT * FROM brands ORDER BY name";
                    $result=mysqli_query($db,$sql);

                    ?>
                    
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <a href="brands/<?php echo $row['name'];?>page.php"><img class="marks-logos" src="brands/logos/<?php echo $row['image'];?>"></a>
                        
                    <?php } ?>
                
                </center>
            </div>
        </div>

        <!--end-->

        <!--sponsers-->
            
        <div class="sponsers-bg">
            <center>
            <div class="sponsers-def">
                <p class="title-s">Trusted to Deliver the TruePrice</p>
                <p class="paragraph-s">Since the very beginning, TrueCar has partnered with some of the largest membership organizations in the country, including USAA, Sam’s Club, American Express and Chase, giving members who use TrueCar a superiorcar-buying experience.</p><br>
            </div>
            <div class="sponsers">
                <img class="sponsers-logos" src="images/s1.png" style="width: 90px;height: 90px;margin-left: 30px;">
                <img class="sponsers-logos" src="images/s2.png" style="margin-left: 30px;">
                <img class="sponsers-logos" src="images/s3.png" style="width: 110px;height: 90px;margin-left: 20px;">
                <img class="sponsers-logos" src="images/s4.png">
            </div>
            <div class="sponsers">
                <img class="sponsers-logos" src="images/s5.png" >
                <img class="sponsers-logos" src="images/s6.png">
                <img class="sponsers-logos" src="images/s7.png" style="width: 90px;height: 75px;margin-left: 10px;">
                <img class="sponsers-logos" src="images/s8.png">
            </div>
            </center>
        </div>

        <!--end-->

        <!--footer-->

        <?php include('footer.php');?>

        <!--Scripts-->
        
        <script src ="js/jquery-3.3.1.js"> </script>
        <script src ="js/aos.js"> </script>
        <script src ="js/home.js"> </script>

    </body>

</html>