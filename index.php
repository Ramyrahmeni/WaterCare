<!DOCTYPE html>
<html lang="en">

<head>
  <title>Watercare - raise funds to stop water scarcity in tunisia</title>

  <!-- 
    - favicon
  -->
  <!-- <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml"> -->

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
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Roboto:wght@300;400;500;700&family=Oswald:wght@600&display=swap"
    rel="stylesheet">
</head>

<body>

  <!-- 
    - #HEADER
  -->
  <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "watercareproject";

    try {
        // Establish the database connection
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $raised1 = 0; // Initialize with default value
        $raised2 = 0; // Initialize with default value
        $raised3 = 0; // Initialize with default value
        $raised4 = 0; // Initialize with default value
      
      // Perform the database queries and fetch the results
      $query1 = $pdo->query('SELECT SUM(`Harvest Rainwater`) AS total1 FROM client;');
      $result1 = $query1->fetch(PDO::FETCH_ASSOC);
      $raised1 = intval($result1['total1']);
      
      $query2 = $pdo->query('SELECT SUM(`Conserve Water`) AS total2 FROM client;');
      $result2 = $query2->fetch(PDO::FETCH_ASSOC);
      $raised2 = intval($result2['total2']);
      
      $query3 = $pdo->query('SELECT SUM(`Desalination`) AS total3 FROM client;');
      $result3 = $query3->fetch(PDO::FETCH_ASSOC);
      $raised3 = intval($result3['total3']);
      
      $query4 = $pdo->query('SELECT SUM(`Reuse Wastewater`) AS total4 FROM client;');
      $result4 = $query4->fetch(PDO::FETCH_ASSOC);
      $raised4 = intval($result4['total4']);
      // Update the values in the totals_amount table
      $updateQuery = $pdo->prepare('UPDATE donation_totals SET `amount1` = :raised1, `amount2` = :raised2, `amount3` = :raised3, `amount4` = :raised4 WHERE id = 1');

// Bind the raised amounts to the parameters in the prepared statement
     $updateQuery->bindParam(':raised1', $raised1, PDO::PARAM_INT);
     $updateQuery->bindParam(':raised2', $raised2, PDO::PARAM_INT);
     $updateQuery->bindParam(':raised3', $raised3, PDO::PARAM_INT);
     $updateQuery->bindParam(':raised4', $raised4, PDO::PARAM_INT);

// Execute the update query
$updateQuery->execute();

      
        // Calculate the difference between raised and the goal
        $goal1 = 200000;
        $goal2 = 100000;
        $goal3 = 500000;
        $goal4 = 400000;
    
        $difference1 = $goal1 - $raised1;
        $difference2 = $goal2 - $raised2;
        $difference3 = $goal3 - $raised3;
        $difference4 = $goal4 - $raised4;
        
        // Calculate the percentage of raised amount
        $percentage1 = ($raised1 / $goal1) * 100;
        $percentage2 = ($raised2 / $goal2) * 100;
        $percentage3 = ($raised3 / $goal3) * 100;
        $percentage4 = ($raised4 / $goal4) * 100;

        
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>


  <header class="header" data-header>
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
            <a href="#donate" class="navbar-link" data-nav-link>
              <span>Donate</span>

            </a>
          </li>

          <li>
            <a href="#event" class="navbar-link" data-nav-link>
              <span>Event</span>

            </a>
          </li>

          <li>
            <a href="#footer" class="navbar-link" data-nav-link>
              <span>Contact</span>

            </a>
          </li>

          <li>
            <a href="login.php" class="navbar-link" data-nav-link>
              <span>log in</span>

            </a>
          </li>

        </ul>

      </nav>

      <div class="header-action">
        <a href="form.html">
        <button class="btn btn-primary">
          <span>Sign Up</span>

          <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
        </button>
        </a>

      </div>

    </div>
  </header>

  




  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <p class="section-subtitle">

            <span>Welcome to WaterCare</span>
          </p>

          <h2 class="h1 hero-title">
            Join Hands to End<strong>Water Scarcity</strong>
            <strong>In Tunisia</strong>
          </h2>

          <p class="hero-text">
            Around 30% of Tunisia's population (3 million people) are affected by water scarcity 
            and lack of access to safe drinking water.
          </p>
        <a href="form.html">
          <button class="btn btn-primary">
            <span>Donation</span>

            <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
          </button>
        </a>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="section features-section-1">
        <div class="container">

          <ul class="features-list">

            <li class="features-item" >
              <div class="item-icon">
                <ion-icon name="medkit-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Public Health</h3>

                <p class="item-text">
                  the risk of waterborne diseases may increase, particularly
                  among vulnerable populations such as children and the elderly.
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="water-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">lack of water</h3>

                <p class="item-text">
                  Thirst is a significant issue in Tunisia due to the country's 
                  arid climate and limited water resources.
                </p>
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="leaf-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Agriculture</h3>

                <p class="item-text">
                  Without adequate water resources, the agricultural sector will continue to suffer, 
                  leading to a decline in the country's economy.
                </p>
              </div>
            </li>

            <li class="features-item">
              <div class="item-icon">
                <ion-icon name="earth-outline"></ion-icon>
              </div>

              <div>
                <h3 class="h4 item-title">Environment</h3>

                <p class="item-text">
                  Water scarcity can lead to environmental degradation,
                  such as soil erosion and desertification
                </p>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" id="about">
        <div class="container">

          <div class="about-banner">

            <div class="banner-row">

              <div class="banner-col">
                <img src="./assets/images/about-earth.jfif" width="315" height="380" loading="lazy" alt="earth"
                  class="about-img w-100">

                <img src="./assets/images/about-barrage.jpg" width="200" height="200" loading="lazy" alt="barrage"
                  class="about-img about-img-2 w-100">
              </div>

              <div class="banner-col">
                <img src="./assets/images/about-drops.jfif" width="300" height="277" loading="lazy" alt="drops"
                  class="about-img about-img-3 w-100">

                <img src="./assets/images/about-hands.png"  loading="lazy" alt="hands"
                  class="about-img about-img-4 w-100">
              </div>

            </div>

          </div>

          <div class="about-content">

            <p class="section-subtitle">
              <span>Why Choose Us</span>
            </p>

            <h2 class="h2 section-title">
               <strong>Water is Life</strong>Let's Save It Together
            </h2>

            <ul class="tab-nav" style="list-style-type: cercle; color:black;">

              <li>
                <button class="tab-btn" id="missionButton"  onclick="switchParagraph('missionButton', 'missionParagraph')">Our Mission</button>
              </li>

              <li>
                <button id="visionButton" class="tab-btn" onclick="switchParagraph('visionButton', 'visionParagraph')">Our Vision</button>
              </li>

              <li>
                <button class="tab-btn" id="nextPlanButton" onclick="switchParagraph('nextPlanButton', 'nextPlanParagraph')">Next Plan</button>
              </li>

            </ul>

            <div class="tab-content">

              <p class="section-text" id="missionParagraph">
                With our expertise, experience, and commitment to making a difference, 
                choosing us means that your donation will go towards making 
                a real and lasting impact in the fight against water scarcity in Tunisia.
              </p>
              <p class="section-text" id="visionParagraph">
                Our vision is a water-abundant Tunisia, where every 
                person has access to clean and sustainable water resources. It aims
                 to raise awareness, foster responsible water usage, and implement 
                 innovative solutions to overcome water scarcity challenges. By 
                 creating a culture of conservation and collaboration, the 
                 organization envisions a future where water scarcity is minimized, 
                 and the well-being of 
                communities is secured through reliable and equitable access to water.
              </p>
              <p class="section-text" id="nextPlanParagraph">
                Our next plan focuses on implementing effective 
                water conservation strategies in Tunisia. This includes enhancing 
                infrastructure, promoting efficient water usage, and increasing
                 awareness about sustainable water practices. Through collaboration,
                  research, and education, the organization aims to ensure long-term
                   water availability 
                and improve the quality of life for communities across Tunisia.
              </p>

              <ul >

                <li style=" list-style-image: url(./assets/images/puce.png);" >Empower Change</li>
                <li style=" list-style-image: url(./assets/images/puce.png);">Raise Awareness</li>
                <li style=" list-style-image: url(./assets/images/puce.png);">Save Water</li>
                <li style=" list-style-image: url(./assets/images/puce.png);">Create Solutions</li>

              </ul>

              <button class="btn btn-secondary" style="margin-top: 20px;">
                <a href="#footer" class="navbar-link" data-nav-link>
                  <span>Learn More About Us</span>
                </a>
                

                <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
              </button>

            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #stat
      -->

      <section class="section stat">
        <div class="container">

          <div class="stat-content">
            <h2 class="h2 section-title">Around 30% of Tunisia's population <br>
              are affected by water scarcity <br>
              and lack of access to safe drinking water.</h2> 
          </div>

          <figure class="stat-banner">
            <img src="./assets/images/pic1.jpg"  loading="lazy" alt="water"
              class="img-cover">
          </figure>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service" id="service" style="background-image: url('./assets/images/service-map.png')">
        <div class="container">

          <p class="section-subtitle">
            <span>What We Do</span>
          </p>

          <h2 class="h2 section-title">
            We Work Differently on a<strong>multifaceted approach :</strong>
          </h2>

          <ul class="service-list">

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="water-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Conserve Water</h3>

                <p class="card-text">
                  Encouraging water conservation practices, such as fixing leaks,
                   using water-efficient appliances, and reducing water waste <br> <br>
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="rainy-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title" >Harvest Rainwater</h3>

                <p class="card-text">
                  Capturing and storing rainwater can help to 
                  increase the available water supply during dry periods 
                  <br> <br> <br>
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="reload-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Reuse Wastewater</h3>

                <p class="card-text">
                  Treating and reusing wastewater can help to reduce the demand 
                  for fresh water and increase the available water supply <br> <br>
                </p>

              </div>
            </li>

            <li>
              <div class="service-card">

                <div class="card-icon">
                  <ion-icon name="leaf-outline"></ion-icon>
                </div>

                <h3 class="h3 card-title">Desalination</h3>

                <p class="card-text">
                  desalinating plants can help to increase the supply of fresh water in coastal
                  areas and reduce the reliance on limited freshwater resources.
                  
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #DONATE
      -->

      <section class="section donate" id="donate">
        <div class="container">

          <ul class="donate-list">

            <li>
              <div class="donate-card">

                <figure class="card-banner">
                  <img src="./assets/images/conserve.jfif" width="520" height="325" loading="lazy" alt="Elephant"
                    class="img-cover ">
                </figure>

                <div class="card-content">

                  <div class="progress-wrapper">
                    <p class="progress-text">
                      <span>Raised</span>

                      <data  value="<?php echo $raised2; ?>"><?php echo $raised2; ?> DT</data>
                    </p>

                    <data class="progress-value" value="<?php echo $percentage2; ?>"><?php echo $percentage2; ?>%</data>
                  </div>

                  <h3 class="h3 card-title">Conserve Water</h3>

                  <div class="card-wrapper">

                    <p class="card-wrapper-text">
                      <span>Goal</span>

                      <data class="blue" value="<?php echo $goal2; ?>"><?php echo $goal2; ?> DT</data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>Raise</span>

                      <data class="yellow" value="<?php echo $raised2; ?>"><?php echo $raised2; ?></data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>To Go</span>

                      <data class="cyan" value="<?php echo $difference2; ?>"><?php echo $difference2; ?></data>
                    </p>

                  </div>
                  <a href="form.html">
                    <button class="btn btn-secondary">
                      <span>Donation</span>

                      <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                    </button>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="donate-card">

                <figure class="card-banner">
                  <img src="./assets/images/harvest.jfif" width="520" height="325" loading="lazy" alt="Elephant"
                    class="img-cover img-cover-2">
                </figure>

                <div class="card-content">

                  <div class="progress-wrapper">
                    <p class="progress-text">
                      <span>Raised</span>

                      <data value="<?php echo $raised1; ?>"><?php echo $raised1; ?> DT</data>
                    </p>

                    <data class="progress-value" value="<?php echo $percentage1; ?>"><?php echo $percentage1; ?>%</data>
                  </div>

                  <h3 class="h3 card-title">Harvest Rainwater</h3>

                  <div class="card-wrapper">

                    <p class="card-wrapper-text">
                      <span>Goal</span>

                      <data class="green" value="<?php echo $goal1; ?>"><?php echo $goal1; ?> DT</data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>Raise</span>

                      <data class="yellow" value="<?php echo $raised1; ?>"><?php echo $raised1; ?></data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>To Go</span>

                      <data class="cyan" value="<?php echo $difference1; ?>"><?php echo $difference1; ?></data>
                    </p>

                  </div>
                  <a href="form.html">
                    <button class="btn btn-secondary">
                      <span>Donation</span>

                      <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                    </button>
                  </a>
                </div>

              </div>
            </li>

            <li>
              <div class="donate-card">

                <figure class="card-banner">
                  <img src="./assets/images/reuse1.jpg" width="520" height="325" loading="lazy" alt="Elephant"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="progress-wrapper">
                    <p class="progress-text">
                      <span>Raised</span>

                      <data value="<?php echo $raised4; ?>"><?php echo $raised4; ?> DT</data>
                    </p>

                    <data class="progress-value" value="<?php echo $percentage4; ?>"><?php echo $percentage4; ?>%</data>
                  </div>

                  <h3 class="h3 card-title">Reuse Wastewater</h3>

                  <div class="card-wrapper">

                    <p class="card-wrapper-text">
                      <span>Goal</span>

                      <data class="green" value="<?php echo $goal4; ?>"><?php echo $goal4; ?></data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>Raise</span>

                      <data class="yellow"  value="<?php echo $raised4; ?>"><?php echo $raised4; ?></data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>To Go</span>

                      <data class="cyan"  value="<?php echo $difference4; ?>"><?php echo $difference4; ?>DT</data>
                    </p>

                  </div>
                  <a href="form.html">
                    <button class="btn btn-secondary">
                      <span>Donation</span>

                      <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                    </button>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="donate-card">

                <figure class="card-banner">
                  <img src="./assets/images/desalination.png" width="520" height="325" loading="lazy" alt="Elephant"
                    class="img-cover">
                </figure>

                <div class="card-content">

                  <div class="progress-wrapper">
                    <p class="progress-text">
                      <span>Raised</span>

                      <data value="<?php echo $raised3; ?>"><?php echo $raised3; ?>DT</data>
                    </p>

                    <data class="progress-value"  value="<?php echo $percentage3; ?>"><?php echo $percentage3; ?>%</data>
                  </div>

                  <h3 class="h3 card-title">Desalination</h3>

                  <div class="card-wrapper">

                    <p class="card-wrapper-text">
                      <span>Goal</span>

                      <data class="green" value="500,000">500,000</data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>Raise</span>

                      <data class="yellow" value="<?php echo $raised3; ?>"><?php echo $raised3; ?></data>
                    </p>

                    <p class="card-wrapper-text">
                      <span>To Go</span>

                      <data class="cyan" value="<?php echo $difference3; ?>"><?php echo $difference3; ?></data>
                    </p>

                  </div>
                  <a href="form.html">
                    <button class="btn btn-secondary">
                      <span>Donation</span>

                      <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                    </button>
                  </a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #testimonial
      -->

      <section class="testi">

        <div class="testi-content">

          <p class="section-subtitle">
            <span>Public sharing</span>
          </p>

          <h2 class="h2 section-title">
            <strong>The Truth</strong> Through The Eyes Of a Citizen
          </h2>

          <div class="testi-card">

            <figure class="card-avatar">
              <img class="img1" src="./assets/images/dreamer.jpg" width="70" height="70" loading="lazy" alt="the dreamer">
            </figure>

            <div>
              <blockquote class="testi-text">
                "Last year, at this exact period, I filmed a video about El-Kef.
                 It was spring, with flowers and grass all over the place, 
                 and water flowing with no regard. People were happy, filling
                  their containers with what they could handle. But today, 
                  drought has taken over, and thirst is threatening our well-being. 
                  The river where I used to swim is now dry. It has been a while since 
                  it rained. All creatures suffer from thirst. So many dams are now empty,
                   and we are expecting a severe summer. Please conserve water."
              </blockquote>

              <h3 class="testi-name">The Dreamer Wild And Free</h3>

              <p class="testi-title">Tunisian Traveler</p>
            </div>

          </div>

        </div>

        <figure class="testi-banner">
          <section id = "video">
            <div class = "video-wrapper flex">
                <video >
                    <source src = "./assets/images/video.mp4" type = "video/mp4" loop="false">
                </video>
                <button type = "button" id = "play-btn">
                    <i class = "fas fa-play"></i>
                </button>
            </div>
        </section>
        </figure>

      </section>





      <!-- 
        - #EVENT
      -->

      <section class="section event" id="event">
        <div class="container">

          <p class="section-subtitle">

            <span>Events & Programs</span>

          </p>

          <h2 class="h2 section-title">
            Our Most Popular Causes For <strong>Building Funds</strong>
          </h2>

          <ul class="event-list">

            <li>
              <div class="event-card">

                <time class="card-time" datetime="07-15">
                  <span class="month">July</span>

                  <span class="date">15</span>
                </time>

                <div class="wrapper">

                  <div class="card-content">
                    <p class="card-subtitle">Charity Walk/Run for Water</p>

                    <h3 class="card-title"> we organize our own walk</h3>

                    <p class="card-text">
                      Organize a walk or run event and ask participants to donate or pledge
                       to support the cause of water scarcity in Tunisia
                    </p>
                  </div>

                  

                </div>

              </div>
            </li>

            <li>
              <div class="event-card">

                <time class="card-time" datetime="02-23">
                  <span class="month">Feb</span>

                  <span class="date">23</span>
                </time>

                <div class="wrapper">

                  <div class="card-content">
                    <p class="card-subtitle">Water-Saving Technology Showcase</p>

                    <h3 class="card-title">Here come the inventors</h3>

                    <p class="card-text">
                      Organize an event where manufacturers and vendors of water-saving technologies 
                      can showcase their products and services.
                    </p>
                  </div>

                  

                </div>

              </div>
            </li>

            <li>
              <div class="event-card">

                <time class="card-time" datetime="05-27">
                  <span class="month">May</span>

                  <span class="date">27</span>
                </time>

                <div class="wrapper">

                  <div class="card-content">
                    <p class="card-subtitle">Water Conservation Challenge</p>

                    <h3 class="card-title">we raise the challenge</h3>

                    <p class="card-text">
                      Encourage individuals, schools, or communities to participate in a water conservation 
                      challenge and track their water use reduction over a period of time.
                    </p>
                  </div>

                  

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>



    </article>
  </main>





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
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script>
    // play/pause video
    let video = document.querySelector('.video-wrapper video');
    document.getElementById('play-btn').addEventListener('click', () => {
        if(video.paused){
            video.play();
        } else {
            video.pause();
        }
    });
</script>
</body>

</html>