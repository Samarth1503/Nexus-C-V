<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        *{
            margin: 0;
            padding: 0
            
        }
        .footer-container{
            height:60vh;
            width:100vw;
            background-color: rgb(24, 27, 27);
            color: rgb(153, 153, 153);
            padding-top: 10vh;

        }
        .footer-content{
            height:70%;
            display: flex;
        }

        .footer-logo-section{
           width:33%;
           height:100%;
           padding-left: 10vw;
        }
        .footer-links-section{
            width:33%;
            height:100%;
            padding-left: 100px;
            
         }
         .footer-joinus-section{
            width:33%;
            height:100%;
           padding-right: 100px;
            
         }

        hr{
            width:60%;
            margin-left: 20vw;
        }
        .footer-logo-wrap{
            display: flex;
            margin-bottom: 30px;
        }
        .footer-logo{
            height:60px;
            width:100px;
            background-color: aliceblue;
            border-radius: 5px;
        }
       
        .footer-page-name{
            padding-top: 20px;
            padding-left: 20px;
        }
        .footer-links-section > ul > li {
            margin-bottom: 30px;
        }
        .footer-social-icons > a > img{
            height:30px;
            width:30px; 
            margin-top: 10px;
            margin-right:10px;
        }
        
        .footer-joinus-section p{
           margin-top: 10px;
        }
        .Affiliate-brand-section{
            display: flex;
            margin-top: 30px;
        }
        input[type=text] {
            padding:10px;
            border:0;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
            border-radius:20px;
            margin-right: 30px; 
            width:300px;
          }
          button{
            padding: 10px;
            background-color:rgb(77, 125, 237);
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
            border-radius:20px;
            width: 100px;   
          }
          .copyright{
            margin-top: 10px;
            margin-left: 42%;
          }
          .footer-social-icons{
            display:flex;
          }
          .footer-links-section > ul > li > a{
            color: white;
          }
          .footer-links-section > ul > li > a:hover{
            text-decoration: none;
          }
          .footerhr{
            background-color: white;
          }

</style>

</head>
<body>
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-logo-section">
                <div class="footer-logo-wrap">
                <div class="footer-logo"><img src="images used\Logo.jpg" alt="Logo" height="60px" width="100px"></div>
                <div class="footer-page-name">Nexus C&V</div>
            </div>
            <div>
            Unlock exclusive deals and unbeatable discounts with Nexus Coupons & Vouchers. Your savings journey begins here.
            </div>
            </div>
            <div class="footer-links-section">
                <ul type="none">
                    <li><a href="https://localhost/project-pushkar/AboutUs.php">About Us</a></li>
                    <li><a href="https://localhost/project-pushkar/Index.php#shopDiv">Shop</a></li>
                    <li><a href="" id="contactUsTrigger">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-joinus-section">
                    <div class="footer-get-in-touch">
                        <div>
                            <p>Get in touch</p>
                        </div>
                        <div class="footer-social-icons">
                           <a href="https://www.facebook.com"> <img src="images used\facebook.png" alt=""></a>
                           <a href="https://www.X.com"> <img src="images used\twitter.png" alt=""></a>
                           <a href="https://www.linkedin.com"> <img src="images used\linkedin.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <p>Want your Brand on our Website?</p>
                        <p>Become Affiliate brand just send us your Email and we will contact you</p>
                    </div>
                    <div class="Affiliate-brand-section">
                        <form action="affiliate_brand.php" method="post">
                            <input type="text" name="affiliate-brand-email" placeholder="  E-mail">
                            <button type="submit">Join Us</button>
                        </form>
                    </div>
            </div>

        </div>
        <hr class="footerhr">
        <div class="copyright">&copy 2023 Coupon Store all rights reserved</div>
    </div>
</body>
</html>