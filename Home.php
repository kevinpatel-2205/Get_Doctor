<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Get_Doctors</title>

  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

  <!-- Google Icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <!-- Favicons -->
  <link href="assets/favicon/logo1.png" rel="icon">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" type="text/css" href="css/Home.css">

  <!-- Bootstrap js -->
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

  <?php
  //import database
  include("php/database_connection.php");
  ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="home.php" class="logo1 me-auto"><img src="assets/favicon/logo.jpg" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="home.php"><span style="color: #166ab5">Get_Doctors</span></a></h1>


      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#feedback">Feedback</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="php/login.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Login / Registration &nbsp;&nbsp;<img src="assets/images/home/user-interface.png" style="width: 20px;" /></span></a>

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Get_Doctors</h1>
      <h2>Your Gateway to Seamless Healthcare Access.</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Why Choose Get_Doctors ?</h3>
            <p>
              Get Doctor" bridges the gap between patients and healthcare providers, offering a seamless digital platform for booking appointments and accessing medical services. With a user-friendly interface, it empowers individuals to find, connect, and consult with qualified doctors efficiently.
            </p>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <img src="assets/images/home/dermatology.png" width="45px">
                  <h4>Dermatology</h4>
                  <p>Radiant Skin, Confident You: Unveiling Beauty with Dermatology.</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <img src="assets/images/home/cardiology.png" width="45px" />
                  <h4>Cardiology</h4>
                  <p>Empowering Hearts, Saving Lives: Your Partner in Cardiac Care Excellence.</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <img src="assets/images/home/psychiatry.png" width="45px">
                  <h4>Psychiatry</h4>
                  <p>Unlocking Minds, Healing Souls: Your Path to Mental Wellness.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Why Us Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
          <img src="assets/images/home/about.jpg" class="glightbox play-btn mb-4 kp" />
        </div>

        <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
          <h3>About</h3>
          <p>Get Doctor is on a mission to transform the way people access healthcare. Our platform serves as a seamless bridge between patients and healthcare providers, offering convenient booking and access to a network of trusted professionals. With a commitment to reliability and quality care, we prioritize patient satisfaction above all else. Join us in our journey to revolutionize healthcare access and make a positive impact on lives worldwide.</p>

          <div class="icon-box">
            <div class="icon"><img src="assets/images/home/vision.png" /></div>
            <h4 class="title"><a href="">Vision</a></h4>
            <p class="description">Our vision is to revolutionize the way healthcare is accessed and experienced, empowering individuals to take control of their health journey with ease and confidence.</p>
          </div>

          <div class="icon-box">
            <div class="icon"><img src="assets/images/home/team.png" /></div>
            <h4 class="title"><a href="">Team</a></h4>
            <p class="description">Our diverse team of healthcare experts, technologists, and entrepreneurs is dedicated to driving positive change in the healthcare industry, leveraging technology to improve patient outcomes and experiences.</p>
          </div>

          <div class="icon-box">
            <div class="icon"><img src="assets/images/home/technology.png" /></div>
            <h4 class="title"><a href="">Technology</a></h4>
            <p class="description">At Get Doctor, we leverage cutting-edge technology and rigorous vetting processes to ensure that patients have access to the highest quality healthcare services and providers at their fingertips.</p>
          </div>

        </div>
      </div>

    </div>
  </section>
  <!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container">

      <div class="row">

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
            <img src="assets/images/home/doctor.png" />
            <?php
            $query = "SELECT * FROM DOCTOR";
            $result = $db->query($query);
            ?>
            <p class="countr"><?php
                              if ($result->num_rows > 0) {
                                echo $result->num_rows;
                              } else {
                                echo "0";
                              }
                              ?></p>
            <p>Doctors</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <img src="assets/images/home/hospital.png" />
            <?php
            $query = "SELECT * FROM specialization";
            $result = $db->query($query);
            ?>
            <p class="countr"><?php
                              if ($result->num_rows > 0) {
                                echo $result->num_rows;
                              } else {
                                echo "0";
                              }
                              ?>
            </p>
            <p>Departments</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <img src="assets/images/home/patient.png" />
            <?php
            $query = "SELECT * FROM patient";
            $result = $db->query($query);
            ?>
            <p class="countr"><?php
                              if ($result->num_rows > 0) {
                                echo $result->num_rows;
                              } else {
                                echo "0";
                              }
                              ?>
            </p>
            <p>Patient</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Departments Section ======= -->
  <section id="departments" class="departments">
    <div class="container">

      <div class="section-title">
        <h2>Departments</h2>
        <p>Get Doctor offers a diverse range of specialized healthcare services, including cardiology, dermatology, neurology, ophthalmology, radiology, psychiatry, and orthopedics. Our platform connects patients with expert practitioners dedicated to addressing various medical concerns, ensuring accessible and comprehensive care. From routine check-ups to complex treatments, we prioritize patient well-being and strive for excellence in every aspect of healthcare delivery</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiology</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurology</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Psychiatry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Orthopedics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Dermatology</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row gy-4">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Cardiology</h3>
                  <p> Cardiology, pivotal in heart health, blends precision with compassion. Get Doctor provides a dedicated network of cardiologists for holistic care. From screenings to treatments, our platform ensures accessible expertise. With innovative technology and patient education, we empower individuals to embrace heart health. Our specialists offer personalized solutions tailored to each patient's needs. Join us for compassionate cardiology care, where every heartbeat matters</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/images/home/departments-1.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row gy-4">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Neurology</h3>
                  <p> Neurology, pivotal for understanding cognition and behavior, is expertly addressed at Get Doctor. Our platform offers a network of neurologists, ensuring comprehensive care for neurological concerns. From chronic conditions to acute issues, accessible expertise is assured. With state-of-the-art diagnostics and patient-centered care, we empower individuals to navigate neurological disorders confidently. Our specialists provide personalized treatment plans tailored to each patient's needs. Join us for compassionate neurology care, where improving lives through innovative solutions is our commitment.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/images/home/departments-2.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row gy-4">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Psychiatry</h3>
                  <p>Psychiatry, essential for mental health and well-being, is expertly addressed at Get Doctor. Our platform offers a network of psychiatrists, ensuring comprehensive care for various mental health concerns. From anxiety disorders to mood disorders, accessible expertise is assured. With compassionate listening and evidence-based treatments, we empower individuals to navigate their mental health journey with confidence. Our specialists provide personalized treatment plans tailored to each patient's unique circumstances. Join us for compassionate psychiatry care, where improving mental wellness and resilience are our top priorities.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/images/home/departments-3.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-4">
              <div class="row gy-4">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Orthopedics</h3>
                  <p>Orthopedics, vital for musculoskeletal health and mobility, is expertly addressed at Get Doctor. Our platform hosts a network of orthopedic specialists, ensuring comprehensive care for various bone and joint concerns. From fractures to arthritis, accessible expertise is assured. With advanced diagnostics and personalized treatment plans, we empower individuals to regain function and mobility. Our specialists provide compassionate care tailored to each patient's needs. Join us for orthopedic excellence, where restoring movement and improving quality of life are our priorities.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/images/home/departments-4.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-5">
              <div class="row gy-4">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Dermatology</h3>
                  <p>Dermatology, central to skin health and beauty, is expertly addressed at Get Doctor. Our platform hosts a network of dermatologists, offering holistic care for various skin concerns. From acne treatments to skin cancer screenings, accessible expertise is assured. With advanced technology and patient education, we empower individuals to embrace their skin's natural beauty. Our specialists provide personalized solutions for each unique skin condition. Join us for compassionate dermatology care, where your skin's health and confidence are our priorities.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                  <img src="assets/images/home/departments-5.jpg" alt="" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Departments Section -->

  <!-- ======= Doctors Section ======= -->
  <?php
  $query = "SELECT * FROM DOCTOR";
  $result = $db->query($query);
  ?>
  <section id="doctors" class="doctors">
    <div class="container">

      <div class="section-title">
        <h2>Doctors</h2>
        <p>Doctors are the frontline warriors of healthcare, blending expertise with compassion. Their tireless dedication to healing and saving lives is commendable. Through their skill and empathy, they offer hope and comfort to those in need.</p>
      </div>

      <div class="row">

        <?php
        if ($result->num_rows > 0) {
          $i = 1;
          while ($row = $result->fetch_assoc() and $i <= 6) {
            $i++;
            $sid = $row['SID'];
            $qu = "SELECT * FROM SPECIALIZATION where SID=" . $sid;
            $re = $db->query($qu);
            while ($r = $re->fetch_assoc()) {
              $specialization = $r['SPECIALIZATION'];
            }
            echo '<div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/images/dimage/' . $row['DPHOTO'] . '" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>' . $row['DNAME'] . '</h4>
                <span>' . $specialization . '</span>
                <p>' . $row['DEXPERIENCE_YEARS'] . ' Years Of Experience</p>
                <div class="social">
                  <a href="https://www.instagram.com/accounts/login/" target="_blank"><img src="assets/images/home/instagram.png"/></a>
                  <a href="https://twitter.com/i/flow/login" target="_blank"><img src="assets/images/home/twitter.png"/></a>
                  <a href="https://web.whatsapp.com/" target="_blank"><img src="assets/images/home/whatsapp.png"/></a>
                  <a href="https://www.facebook.com/login/" target="_blank"><img src="assets/images/home/facebook.png"/></a>
                </div>
              </div>
            </div>
          </div>';
          }
        } else {
          echo "NO RECORDs FOUND";
        }
        ?>
      </div>

    </div>
  </section><!-- End Doctors Section -->

  <!-- Feedback  Section -->
  <?php
  $app = "SELECT * FROM appointment";
  $appointment = $db->query($app);
  ?>
  <div id="feedback" class="feedback">
    <div class="section-title">
      <h2>Feedback</h2>
      <p>Get Doctor, we value your feedback to continuously improve our services. Your satisfaction is our priority, and we strive to exceed your expectations. Share your experiences with us to help us better serve you and others in our community.</p>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php
        if ($appointment->num_rows > 0) {
          $i = 2;
          while ($row = $appointment->fetch_assoc() and $i <= 5) {
            echo '<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="' . $i - 1 . '" aria-label="Slide ' . $i . '"></button>';
            $i++;
          }
        } else {
          echo "No records found";
        }
        ?>
      </div>
      <div class="carousel-inner">
        <?php
        $app = "SELECT * FROM appointment";
        $appointment = $db->query($app);
        if ($appointment->num_rows > 0) {
          $i = 1;
          $j = 1;
          while ($a = $appointment->fetch_assoc() and $j <= 3) {
            $pat = "SELECT * FROM patient WHERE PID=" . $a['PID'] . "";
            $patient = $db->query($pat);
            $p = $patient->fetch_assoc();
            if ($i == 1) {
              echo '<div class="carousel-item active" data-bs-interval="10000">
<img src="assets/images/pimage/' . $p['PPHOTO'] . '" class="d-block w-25" alt="...">
<div class="carousel-caption d-none d-md-block">
  <h5>' . $p['PNAME'] . '</h5>
  <p>' . $a['FEEDBACK'] . '</p>
</div>
</div>';
              $i++;
            } else {
              echo '<div class="carousel-item" data-bs-interval="2000">
              <img src="assets/images/pimage/' . $p['PPHOTO'] . '" class="d-block w-25" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>' . $p['PNAME'] . '</h5>
                <p>' . $a['FEEDBACK'] . '</p>
              </div>
            </div>';
            }
            $j++;
          }
        } else {
          echo "No records found";
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Feedback  Section  End-->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container">

      <div class="section-title">
        <h2>Gallery</h2>
        <p>Get Doctor, explore our gallery showcasing our modern facilities and compassionate care environment. See firsthand the comforting spaces where healing begins, and discover the warm, welcoming atmosphere we offer to all our patients.</p>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row g-0">

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-1.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-1.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-2.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-2.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-3.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-3.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-4.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-4.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-5.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-5.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-6.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-6.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-7.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-7.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-4">
          <div class="gallery-item">
            <a href="assets/images/home/gallery/gallery-8.jpg" class="galelry-lightbox">
              <img src="assets/images/home/gallery/gallery-8.jpg" alt="" class="img-fluid">
            </a>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Gallery Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
    </div>

    <div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.7057464273626!2d72.12820857563503!3d23.864580478592625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395c8777ed874ad9%3A0x152ac01e378bee53!2sDepartment%20of%20Computer%20Science!5e0!3m2!1sen!2sin!4v1714569041549!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container">
      <div class="row mt-5">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi"><img src="assets/images/home/location.png" /></i>
              <h4>Location:</h4>
              <p>Department Of Computer Science-HNGU , Patan</p>
            </div>

            <div class="email">
              <i class="bi"><img src="assets/images/home/mail.png" /></i>
              <h4>Email:</h4>
              <p>getdoctor@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi"><img src="assets/images/home/smartphone.png" /></i>
              <h4>Call:</h4>
              <p>+91 9313166545</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">

          <form action="https://formsubmit.co/f67c82392ec4a847e3307bc94c743b78" method="POST" role="form" class="php-email-form" target="_blank">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <input type="hidden" name="_captcha" value="false">
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex">

      <div class="me-md-auto text-center text-md-start">
        <h4>Designed by : </h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kevin Patel<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sahil Patel</p>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><img src="assets/images/home/whatsapp.png" /></a>
        <a href="#" class="facebook"><img src="assets/images/home/instagram.png" /></a>
        <a href="#" class="instagram"><img src="assets/images/home/facebook.png" /></a>
        <a href="#" class="google-plus"><img src="assets/images/home/twitter.png" /></a>
        <a href="#" class="linkedin"><img src="assets/images/home/linkedin.png" /></a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><img src="assets/images/home/up-arrow.png" /></a>

  <!-- script javascript --->
  <script src="js/Home.js"></script>

  <!-- Database Connection Close -->
  <?php
  $db->close();
  ?>
</body>

</html>