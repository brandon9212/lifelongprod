<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LifeLongIncome</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- awesome font icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
<?php 


					// Import PHPMailer classes into the global namespace
					// These must be at the top of your script, not inside a function
					use PHPMailer\PHPMailer\PHPMailer;
					use PHPMailer\PHPMailer\Exception;

					// If necessary, modify the path in the require statement below to refer to the
					// location of your Composer autoload.php file.
					require 'vendor/autoload.php';


?>

</head>

<body>


<?php

//Form submitted
if(isset($_POST['submit'])) {
  //Error checking
  if($_POST['fname']) {
    echo"First Name. ".$_POST['fname']."\n" ;
	echo"Family Name.  ".$_POST['famname']."\n" ;
	echo"Age Group.  ".$_POST['agegroup']."\n" ;
	echo"Contact Number.  ".$_POST['tel']."\n" ;
	echo"Email address.  ".$_POST['email']."\n" ;
	echo"Desired Passive Income.  ".$_POST['income']."\n" ;
	echo"Monthly Savings.  ".$_POST['saving']."\n" ;
	echo"Referral.  ".$_POST['referral']."\n" ;

	
					$sender = 'samuel.webhosting@gmail.com';
					$senderName = 'Samuel';

					// Replace recipient@example.com with a "To" address. If your account
					// is still in the sandbox, this address must be verified.
					$recipient = 'brandon92@hotmail.sg';

					// Replace smtp_username with your Amazon SES SMTP user name.
					$usernameSmtp = 'AKIA37MXBNKDPVSEOPVP';

					// Replace smtp_password with your Amazon SES SMTP password.
					$passwordSmtp = 'BGNv6T2XNlaBsurBgH43HUuGWb1niuZyxhDbr6ejPJLE';

					// Specify a configuration set. If you do not want to use a configuration
					// set, comment or remove the next line.
					//$configurationSet = 'ConfigSet';

					// If you're using Amazon SES in a region other than US West (Oregon),
					// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP
					// endpoint in the appropriate region.
					$host = 'email-smtp.us-west-2.amazonaws.com';
					$port = 587;

					// The subject line of the email
					$subject = 'Life Long Income Notification';

					// The plain-text body of the email
					//$bodyText =  "Life Long Income\r\nFirst Name: Brandon";
					
					$fname=$_POST['fname'];
					$famname=$_POST['famname'];
					$agegroup='';
					if ($_POST['agegroup'] == '0025'){
						$agegroup='Below 25 years old';
					} elseif($_POST['agegroup'] == '2530'){
						$agegroup='25 - 30 years old';
					} elseif($_POST['agegroup'] == '3135'){
						$agegroup='31 - 35 years old';
					} elseif($_POST['agegroup'] == '3640'){
						$agegroup='36 - 40 years old';
					} elseif($_POST['agegroup'] == '4145'){
						$agegroup='41 - 45 years old';
					} elseif($_POST['agegroup'] == '4650'){
						$agegroup='46 - 50 years old';
					} else{
						$agegroup='Above 50 years old';
					}
					$tel=$_POST['tel'];
					$email=$_POST['email'];
					$income=$_POST['income'];
					$saving=$_POST['saving'];
					$referral=$_POST['referral'];
					

	
					// The HTML-formatted body of the email
					//$bodyHtml = "<h1>Life Long Income</h1><p>First Name: {$fname}</p>";
					$bodyText =  "Email Test\r\nThis email was sent through the
						Amazon SES SMTP interface using the PHPMailer class.";

					// The HTML-formatted body of the email
					$bodyHtml = "<h1>Email Test</h1>
								<p>First Name: {$fname}</p>
								<p>Family Name: {$famname}</p>
								<p>Age Group: {$agegroup}</p>
								<p>Contact Number: {$tel}</p>
								<p>Email address: {$email}</p>
								<p>Desired Passive Income: {$income}</p>
								<p>Monthly Savings willing to set aside: {$saving}</p>
								<p>Referral Name: {$referral}</p>";
						
						//was sent through the
						//<a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
						//interface using the <a href="https://github.com/PHPMailer/PHPMailer">
						//PHPMailer</a> class.</p>
			
			
					//	'<p> First Name:'$fname'</p>'
					//	'<p> Family Name:'$_POST['famname']'</p>'
					//	'<p> Age Group:'$_POST['agegroup']'</p>'
					//	'<p> Contact Number:'$_POST['tel']'</p>'
					//	'<p> Email address:'$_POST['email']'</p>'
					//	'<p> Desired Passive Income:'$_POST['income']'</p>'
					//	'<p> Monthly Savings:'$_POST['saving']'</p>'
					//	'<p> Referral:'$_POST['referral']'</p>'
					//$bodyHtml .=	'<p>This email was sent through the
					//	<a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
					//	interface using the <a href="https://github.com/PHPMailer/PHPMailer">
					//	PHPMailer</a> class.</p>';

					$mail = new PHPMailer(true);
						$mail->isSMTP();
						$mail->setFrom($sender, $senderName);
						$mail->Username   = $usernameSmtp;
						$mail->Password   = $passwordSmtp;
						$mail->Host       = $host;
						$mail->Port       = $port;
						$mail->SMTPAuth   = true;
						$mail->SMTPSecure = 'tls';
						$mail->addAddress($recipient);
						$mail->isHTML(true);
						$mail->Subject    = $subject;
						$mail->Body       = $bodyHtml;
						$mail->AltBody    = $bodyText;
						$mail->Send();
	
  }

}

?>

  <!-- Navigation -->
  <!-- <nav class="navbar navbar-light bg-light static-top"> -->
    <!-- <div class="container"> -->
      <!-- <a class="navbar-brand" href="#">Skys Anchor</a> -->
      <!-- <a class="btn btn-primary" href="#">Sign In</a> -->
    <!-- </div> -->
  <!-- </nav> -->

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Dont Worry about Old Age</h1>
          <p class="lead">Create passive income as low as $20/per day
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
        </div>
      </div>
    </div>
  </header>

  <!-- Table -->
  <section class="testimonials bg-light">
    <div class="container-fluid features-icons text-center lead" >
      <h2 class="mb-1">Is your money in the right place?</h2>
      <br>
        <table class="table" style="font-size:20px">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="fas fa-hand-holding-usd m-auto text-primary" ></i>
                  </div>
                  <h5>Retire smart fund</h5>
                </div>
                </th>
              <th scope="col">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                  <div class="features-icons-icon d-flex">
                    <i class="fa fa-university m-auto text-primary"></i>
                  </div>
                  <h5>Saving in a bank</h5>
                </div>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Monthly Passive Income</th>
              <td><i class="fa fa-check" style="font-size: 50px; color:green;"></i></td>
              <td><i class="fa fa-times" style="font-size: 50px; color:grey;"></i></td>
            </tr>
            <tr>
              <th scope="row">Minimum amount to set aside</th>
              <td>$500/month</td>
              <td>Any amount</td>
            </tr>
            <tr>
              <th scope="row">Interest Rate</th>
              <td>4%</td>
              <td>0.05%</td>
            </tr>
            <tr>
              <th scope="row">Total returns after 20 years</th>
              <td>$146,000</td>
              <td>$72,343</td>
            </tr>
          </tbody>
        </table>
    </div>

  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-5 order-lg-1 my-auto showcase-text">
          <h2>Place your Money Wisely</h2>
          <p class="lead mb-0">Focus on your responsibilities without fear and enjoy a constant stream of passive income during retirement 
        </div>
        <!-- <div class="col-lg-7 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div> -->
        <div class="col-lg-7 order-lg-2 text-white showcase-img"><img src="img/graph.jpg" alt="Italian Trulli" style="width:inherit"></div>
      </div>
  </section>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <h2 class="mb-5">Retirement Funds for you</h2>
      <br>
      <div class="row">
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="far fa-clock m-auto text-primary"></i>
            </div>
            <h3>Flexibility</h3>
            <p class="lead mb-0">Decide your own investment amount, period and returns
          </div>
        </div>
        <div class="col-lg-3">

          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="far fa-money-bill-alt m-auto text-primary"></i>
            </div>
            <h3>Principal Guaranteed</h3>
            <p class="lead mb-0">Capital is protected to secure your golden years
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-coins m-auto text-primary"></i>
            </div>
            <h3>Affordable</h3>
            <p class="lead mb-0">As low as $20/day
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-sort-amount-up m-auto text-primary"></i>
            </div>
            <h3>High Guaranteed Yield</h3>
            <p class="lead mb-0">Bonus declared yearly are guaranteed irrespective of market performance
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center">
    <div class="container">
      <h2 class="mb-5">Meet your Financial Advisor</h2>
      <div class="row">
        <div class="col-lg-12">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
            <h5>Samuel Seah</h5>
            <p class="font-weight-light mb-0">"asdasdadamsdmoso."
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Contact form-->
  <section class="text-center"style="background-color:	#cdebf9; padding-top:2rem; padding-bottom:2rem" >
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-5">Ready to get started?</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">

          <form name="contact_form" data-toggle="validator" method="post" action="<?=$_SERVER['PHP_SELF']?>">

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="FirstName">First Name*</label>
                <input type="text" class="form-control" name="fname" id="FirstName" aria-describedby="nameHelp" placeholder="First name" required>
              </div>

              <div class="form-group col-md-4">
                <label for="FamName">Family Name*</label>
                <input type="text" class="form-control" name="famname" id="FamName" aria-describedby="nameHelp" placeholder="Family name" required>
              </div>

              <div class="form-group col-md-4">
                <label for="AgeGroup">Age group*</label>
                <select class="form-control" name="agegroup" required>
                  <option value='0025'>Below 25 years old</option>
                  <option value='2530'>25 - 30 years old</option>
                  <option value='3135'>31 - 35 years old</option>
                  <option value='3640'>36 - 40 years old</option>
                  <option value='4145'>41 - 45 years old</option>
                  <option value='4650'>46 - 50 years old</option>
                  <option value='0050'>Above 50 years old</option>
                </select>
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tel">Contact Number*</label>
                <input type="tel" class="form-control" name='tel' id="tel" placeholder="(+65) 12345678" pattern="[0-9]{8}" data-error="Singapore phone number contains 8 numbers"  required>
              </div>

              <div class="form-group col-md-6">
                <label for="email">Email address*</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="DesiredIncome">Desired Passive Income*</label>
                <select class="form-control" name="income" required>
                  <option value='500'>Less than $500/month</option>
                  <option value='1000'>$1000/month</option>
                  <option value='2000'>$2000/month</option>
                  <option value='3000'>$3000/month</option>
                  <option value='3001'>More than $3000/month</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label for="MthySavings">Monthly Savings willing to set aside*</label>
                <select class="form-control" name="saving" required>
                  <option value='500'>$500 - $1000/month</option>
                  <option value='1000'>$1001 - $2000/month</option>
                  <option value='2000'>$2001 - $3000/month</option>
                  <option value='3000'>More than $3000/month</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="ReferraltName">Referral Name(If any)</label>
                <input type="text" class="form-control" name="referral" id="FirstName" aria-describedby="nameHelp" placeholder="Person that introduce you to us">
              </div>
            </div>

            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="confidential" required>
              <label class="form-check-label" for="confidential">By submitting this form, I Authorise, agree and consent for consultants to email or call me to provide information regarding their services.*</label>
            </div>

            <br>
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

          </form>
        </div>
      </div>
    </div>
  </section>

 <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <h4>Contact Us</h4>

            <li class="list-inline-item">
              asdad@gmail.com
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              +65 1231312889
            </li>
            <!-- <li class="list-inline-item">&sdot;</li> -->
            <!-- <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li> -->
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="https://www.linkedin.com/in/samuel-seah-19440916a/" target="_blank">
                <i class="fab fa-linkedin fa-2x fa-fw"></i>

              </a>
            </li>

            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>

            <li class="list-inline-item">
              <a href="https://instagram.com/skys.anchor?igshid=f0v5zydk1psy" target="_blank">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
