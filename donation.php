<!DOCTYPE html>
<html lang="en">

<head>
  <title>Watercare - raise funds to stop water scarcity in tunisia</title>


  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link + icons link
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" >
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
    rel="stylesheet">
</head>

<body>
  
<?php
session_start(); // Start the session
if (isset($_POST["con2"])) {
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;

  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "watercareproject";

    try {
      // Create a new PDO instance
      $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

      // Set PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      // Debugging output

      // Check if user exists in the database
      $query = "SELECT * FROM client WHERE email = ? ";
      $stmt = $pdo->prepare($query);
      $stmt->execute([$email]);

      
      // Debugging output to check the number of rows returne
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($stmt->rowCount() == 0) {
        echo "No data found for the client.";
        header("Location: form.html");
    }
    if ($row['email'] == $email && $row['password'] != $password){
      echo "No data found for the client.";
      header("Location: login.php");
    }

      if(isset($_POST["con1"])){
      if ($row) {
        // Debugging output to check the existing amounts
        echo "Existing Amount 1: " . $row['Harvest Rainwater'] . "<br>";
        echo "Existing Amount 2: " . $row['Conserve Water'] . "<br>";
        echo "Existing Amount 3: " . $row['Desalination'] . "<br>";
        echo "Existing Amount 4: " . $row['Reuse Wastewater'] . "<br>";
        header("Location: donation-process.php?email=$email");
    } 
  }
      } catch (PDOException $e) {
          echo "Error updating donation information: " . $e->getMessage();
      }
  } else {
      // Redirect to the donation form if accessed directly without submitting the form
      header("Location: donation.php");
      exit();
  }
}
  ?>
  
  <header class="header" data-header style="background-color:#2B2B2B ;">
    <div class="container">

      <h1>
        <a href="#" class="logo">Watercare</a>
      </h1>

      <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
        </button>

        <a href="#" class="logo">Watercare</a>

        <ul class="navbar-list">

          <li>
            <a href="#home" class="navbar-link" data-nav-link>
              <span>Home</span>

              <ion-icon name="chevron-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#about" class="navbar-link" data-nav-link>
              <span>About</span>

            </a>
          </li>

          <li>
            <a href="#service" class="navbar-link" data-nav-link>
              <span>Service</span>

            </a>
          </li>

          <li>
            <a href="#event" class="navbar-link" data-nav-link>
              <span>Event</span>

            </a>
          </li>

          <li>
            <a href="#" class="navbar-link" data-nav-link>
              <span>Contact</span>

            </a>
          </li>

        </ul>

      </nav>
      <div class="header-action">
        <a href="index.php">
        <button class="btn btn-primary">
          <span>Go Back</span>

          <ion-icon name="arrow-back-outline" aria-hidden="true"></ion-icon>
        </button>
        </a>

      </div>

    </div>
  </header>


  <section class="form-section">
    <div class="form-container">
      
        <form action="donation-process.php" method="POST" >

          <div class="row">
  
              <div class="col">
  
                  <h3 class="title">donation</h3>
                  <table style="margin-right: 100px;">
                   <tr>
                      <th>Email:</th>
                      <td><input type="email" class="personal-info-input" id="email" name="email"value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                      <th>donation method <span style="color: red;display: inline-block;">*</span> :</th>
                      <td>
                        <select id="options" name="options">
                          <option value="card">card</option>
                          <option value="cash">cash</option>
                          <option value="check">check</option>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <th>Quick notice:</th>
                      <td><p style="color:orange;">If you are from Tunisia, you can donate also by cash or by check.<br>
                      You can find us in our location mentioned in the description or you can reach us during our events.</p>
                      </td>
                    </tr>
                    <tr>
                      <th>Cards accepted <span style="color: red;display: inline-block;">*</span>:</th>
                      <td>
                           <img src="./assets/images/card_img.png" style=" height:43px; margin-bottom: 10px;" alt="">
                           <div class="card-opt">
                                <input type="radio" id="paypal" value="paypal" name="card">
                                <input type="radio" id="mastercard" value="mastercard" name="card">
                                <input type="radio" id="american express" value="american express" name="card">
                                <input type="radio" id="visa" value="visa" name="card">
                           </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Name on card <span style="color: red;display: inline-block;">*</span>:</th>
                      <td><input type="text" placeholder="mr. x" style="padding-left: 10px;" id="card-name" name="NameOnCard"></td>
                    </tr>
                    <tr>
                      <th>Credit card number <span style="color: red;display: inline-block;">*</span>:</th>
                      <td><input type="number" placeholder="1111-2222-3333-4444" style="padding-left: 10px;" id="nbr" name="CreditCardNumber"></td>
                    </tr>
                    <tr>
                      <th>Choose your purpose of donation <span style="color: red;display: inline-block;">*</span>:</th>
                      <td>
                        <ol>
                          <li class="purpose-li">
                            <input type="checkbox" id="option1" name="option1" value="Harvest Rainwater">
                            <label for="option1"> 1. Harvest Rainwater </label>
                  
                          </li >
                          <li class="purpose-li">
                            <input type="checkbox" id="option2" name="option2" value="Conserve Water">
                            <label for="option2">2. Conserve Water </label>
                            
                          </li>
                          <li class="purpose-li" >
                            <input type="checkbox" id="option3" name="option3" value="Desalination">
                            <label for="option3">3. Desalination </label>
                            
                          </li>
                          <li class="purpose-li">
                            <input type="checkbox" id="option4" name="option4" value="Reuse Wastewater">
                            <label for="option4">4. Reuse Wastewater </label>
                            
                          </li>
                        </ol>
                      </td>
                    </tr>
                    <tr class="hidden" id="op1">
                      <th>Donate to Harvest Rainwater:</th>
                      <td><input type="number" placeholder="2,000 " style="padding-left: 10px;" value="0" id="donation1" name="DonatedAmount1"></td>
                    </tr>
                    <tr class="hidden" id="op2">
                      <th >Donate to Conserve Water:</th>
                      <td ><input type="number" placeholder="2,000 " style="padding-left: 10px;" value="0"  id="donation2" name="DonatedAmount2"></td>
                    </tr>
                    <tr class="hidden" id="op3">
                      <th >Donate for Desalination:</th>
                      <td><input type="number" placeholder="2,000 " style="padding-left: 10px;" value="0"  id="donation3" name="DonatedAmount3"></td>
                    </tr>
                    <tr class="hidden" id="op4">
                      <th >Donate For Reuse Wastewater:</th>
                      <td ><input type="number" placeholder="2,000 " style="padding-left: 10px;" value="0"  id="donation4" name="DonatedAmount4"></td>
                    </tr>

                    <tr>
                      <th>Message:</th>
                      <td><textarea name="message" rows="6" cols="55"></textarea></td>
                    </tr>
                  </table>
  
              </div>
      
          </div>
          
  
          <input type="submit" method='POST' value="Donate" name="con1"  class="btn btn-secondary" style="color:white;" id="donation-button">
          <input type="reset" value="clear"  class="btn btn-secondary" style="color:white; margin-top: 10px;" id="donation-reset">
  
      </form>
    </div>
    <div class="info">
       <h1 style="margin-left: 20px; color:white; ">Why Donate?</h1>
       <p style="color:rgb(255, 255, 255);margin-left: 20px; margin-top: 30px;
       margin-bottom: 40px;">Join us in making a difference 
        for our beloved Tunisia. Water scarcity is threatening the health and wellbeing of our 
        families and communities. With your support, we can provide clean water and hope for a 
        better tomorrow. Every drop counts. Every donation matters. 
        Together,we can bring life back to our land. Thank you for your kindness and generosity.<br>
          <br>
          "Thousands have lived without love, not one without water." - W. H. Auden<br>
          we remind you of our goals :
          </p>
          <ul style=" color:rgb(255, 255, 255);margin-left: 60px;margin-bottom: 40px;">

            <li style="list-style-type: circle;">Empower Change</li>
            <li style="list-style-type: circle;">Raise Awareness</li>
            <li style="list-style-type: circle;">Save Water</li>
            <li style="list-style-type: circle;">Create Solutions</li>

          </ul>
        <img src="./assets/images/kido.jpg" class="img">
    </div>
  
  </section>

<!-- 
    - #FOOTER
  -->

  <footer class="footer" id="footer">
    <div class="container">
      <div class="footer-col1 footer-col" style="padding-right: 40px;">
        <h1>
          <a href="#" class="logo">Watercare</a>
        </h1>
        <p style="margin-top: 20px; margin-right: 20px; color: lightgrey; ">Choosing our fund raising organization for addressing water scarcity is a 
          smart choice because we are committed to making a tangible difference in the 
          lives of those affected by water scarcity in Tunisia. We have a team of dedicated 
          professionals who are passionate about promoting sustainable water use practices, 
          investing in water-saving technologies, and supporting policies that ensure access 
          to safe and reliable water for all. 
        </p>
        
      </div>
        <div class="footer-col">
          <h2>Organization</h2>
          <ul>
            <li><a href="#about">about us</a></li>
            <li><a href="#service">our services</a></li>
            <li><a href="#">privacy policy</a></li>
            <li><a href="#event">affiliate program</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h2>Contact</h2>
          <div class="social-links" style="display: flex; flex-direction: column;">
            <div style="display: flex; flex-direction: row;"><a href="mailto:watercare@gmail.com"><i class="fas fa-envelope"></i></a><p style="color:lightgrey;margin-top: 7px;">info@water.co.nz</p></div>
          
          <div  style="display: flex; flex-direction: row;">  <a rel="noreferrer noopener noreferrer" aria-label="Address" target="_blank" href="http://www.google.com/maps/place/36.8592743,10.2039706"><i class="fas fa-map-marker-alt"></i></a><p style="color:lightgrey;margin-top: 7px;">Ariana, Tunisia</p></div>
          <div style="display: flex; flex-direction: row;"><a href="tel:+216 50 754 654"><i class="fas fa-phone-alt"></i></a><p style="color:lightgrey;margin-top: 7px;">+216 50 754 654</p></div>
          </div>
        </div>
        <div class="footer-col">
          <h2>follow us</h2>
          <div class="social-links">
            <a href="https://www.facebook.com/WatercareNZ"><i class="fab fa-facebook-f"></i></a>
            <!--<a href="#"><i class="fab fa-twitter"></i></a>-->
            <a href="https://www.instagram.com/watercare_nz/?fbclid=IwAR2SuThSeivgUokjz4Cg4pvt800aVL5CtC-JTYRMITbDgdAITfwO5sDNQuo"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/watercare-services-limited/"><i class="fab fa-linkedin-in"></i></a>
          </div>
      </div>
        
    </div>
   <p style="text-align: center; color:lightgrey; margin-top: 70px;">Copyright © 2023 All Rights Reserved By WATERCARE Organization</p>
  </footer>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>
</body>
</html>
