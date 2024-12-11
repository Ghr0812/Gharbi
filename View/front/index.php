<?php

include 'D:/wamp64/www/Crud tache_Cours/config.php';
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/TypeC.php'; // Classe TypeC
include 'D:/wamp64/www/Crud tache_Cours/Controlleur/CoursC.php';


try {
  $pdo = new PDO('mysql:host=localhost;dbname=education', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'La connexion à la base de données a échoué: ' . $e->getMessage();
  exit;
}

// Instancier un objet de la classe TypeC
$typeC = new TypeC($pdo); // Passer $pdo comme paramètre
// Récupérer la liste des types pour affichage
$typeList = $typeC->afficherTypes();
$coursC = new CoursC($pdo);
$coursList = $coursC->afficherCours();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>EduWell - Education HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <nav class="main-nav">
                  <!-- ***** Logo Start ***** -->
                  <a href="index.php" class="logo">
                    <img src="assets/images/logo.png" alt="EduWell Logo" style="width: 70px; height: auto;">
                  </a>
                  <!-- ***** Logo End ***** -->
                  <!-- ***** Menu Start ***** -->
                  <ul class="nav">
                      <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#teachers">teachers</a></li>
                      <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                      <li class="has-sub">
                          <a href="javascript:void(0)">Pages</a>
                          <ul class="sub-menu">
                              <li><a href="about-us.html">About Us</a></li>
                              <li><a href="our-services.html">Our Services</a></li>
                              <li><a href="Assignment.html">Assignment</a></li>
                              <li><a href="http://127.0.0.1/Crud tache_Cours/View/back/login.html">Login</a></li>
                              <li><a href="forum.html">Forum</a></li>
                          </ul>
                      </li>
                      <li class="scroll-to-section"><a href="#testimonials">Testimonials</a></li> 
                      <li class="scroll-to-section"><a href="#contact-section">Contact Us</a></li>
                  </ul>        
                  <a class='menu-trigger'>
                      <span>Menu</span>
                  </a>
                  <!-- ***** Menu End ***** -->
              </nav>
          </div>
      </div>
  </div>
</header>
<!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Welcome to our Eduventure</h6>
            <h2>Best Place To Learn</h2>
            <div class="main-button-gradient">
              <div class="scroll-to-section"><a href="#contact-section">Join Us Now!</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="assets/images/banner-right-image.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ***** Main Banner Area End ***** -->
  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Our Services</h6>
            <h4>Provided <em>Services</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p><a href="forum.html">EduWell is the professional HTML5 template for your school or university websites.</a></p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Creative Ideas</h4>
                <p>You can download and use this EduWell Template for your teaching and learning stuffs.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Ready Target</h4>
                <p>Please tell your friends about the best CSS template website that is TemplateMo.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <p>Aenean bibendum consectetur ex eu porttitor. Pellentesque id ultrices metus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p>When working on any project, having a set of useful tricks up your sleeve can make your work more efficient and enjoyable. Whether it’s using keyboard shortcuts to navigate quickly, leveraging browser extensions to save time, or employing automation tools for repetitive tasks, these small strategies can have a big impact. Don’t underestimate the value of learning new shortcuts or exploring productivity tools—they can boost your workflow and free up time for more creative pursuits.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Creative Ideas</h4>
                <p>Creative ideas are the cornerstone of innovation and progress. They can come from observing everyday life, brainstorming with others, or simply allowing your mind to wander. To generate creative ideas, try stepping out of your comfort zone, exploring new hobbies, or immersing yourself in different cultures and perspectives. Remember, even the simplest thoughts can evolve into groundbreaking concepts with time and development. Stay open-minded, experiment without fear of failure, and let your imagination lead the way.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Ready Target</h4>
                <p>Setting a ready target is essential for achieving your goals efficiently. It means identifying a clear and specific objective, preparing the necessary tools and strategies, and aligning your resources towards that goal. When you set a ready target, you stay focused and motivated, knowing exactly what you are aiming for. This approach helps prioritize tasks and measure progress, ensuring that your efforts lead to meaningful results. Remember, preparation and clarity are key to hitting your target with confidence.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <p>Technology has transformed the way we live, work, and connect with one another. From the smartphones in our pockets to the advanced artificial intelligence systems that drive innovation, technology shapes every aspect of modern life. It enables us to access information instantly, automate tasks, and solve complex problems with unprecedented efficiency. As it continues to evolve, technology presents both opportunities and challenges, pushing us to adapt and rethink traditional approaches. Embracing new technological advancements responsibly can unlock endless possibilities and improve our quality of life.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p>In non nisi eget magna efficitur ultricies non quis sapien. Pellentesque tellus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Creative Ideas</h4>
                <p>Aenean bibendum consectetur ex eu porttitor. Pellentesque id ultrices metus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Ready Target</h4>
                <p>In non nisi eget magna efficitur ultricies non quis sapien. Pellentesque tellus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <p>Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
/* Conteneur des cartes */
.cards-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 30px;
  padding: 30px;
}

/* Style premium des cartes */
.card {
  position: relative;
  background: linear-gradient(145deg, #ffffff, #f9f9f9);
  border-radius: 20px;
  padding: 25px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  background-image: url('https://via.placeholder.com/600x400'); /* Placeholder, remplacer par une image contextuelle */
  background-size: cover;
  background-position: center;
}

.card:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(145deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
  z-index: 1;
  border-radius: 20px;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.card-content {
  position: relative;
  z-index: 2;
  color: #fff;
  text-align: left;
}

.card h3 {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 15px;
  text-transform: uppercase;
}

.card p {
  font-size: 16px;
  line-height: 1.6;
  margin-bottom: 20px;
}

.card .tag {
  display: inline-block;
  padding: 8px 15px;
  border-radius: 50px;
  background: linear-gradient(145deg, #ff6f61, #ff8a65);
  color: #fff;
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 15px;
}

.card .actions {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
}

.card .actions button {
  border: none;
  padding: 12px 15px;
  border-radius: 10px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s ease, transform 0.3s ease;
  font-weight: bold;
  color: #ffffff;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.card .actions button:hover {
  transform: scale(1.1);
}

.card .actions .edit {
  background: linear-gradient(145deg, #42a5f5, #1e88e5);
}

.card .actions .delete {
  background: linear-gradient(145deg, #e53935, #ef5350);
}

.card .actions .view {
  background: linear-gradient(145deg, #43a047, #66bb6a);
}

/* Effet responsive premium */
@media (max-width: 768px) {
  .card h3 {
    font-size: 20px;
  }

  .card p {
    font-size: 14px;
  }

  .card .actions button {
    font-size: 14px;
  }
}
</style>

<section class="courses-section">
  <h2>Gestion des cours</h2>
  <button class="add-course-btn" onclick="window.location.href='enroll.php'">
    <i class="fa fa-plus"></i> Ajouter un cours
  </button>

  <div class="cards-container">
    <?php
    if (isset($coursList) && is_array($coursList)) {
        foreach ($coursList as $cours) {
            echo "<div class='card' style=\"background-image: url('image_placeholder_" . $cours['id_cours'] . ".jpg');\">";
            echo "<div class='card-content'>";
            echo "<h3>" . htmlspecialchars($cours['Titre']) . "</h3>";
            echo "<span class='tag'>" . ($cours['id_type'] == 1 ? 'Vidéo' : 'Document') . "</span>";
            echo "<p>" . htmlspecialchars($cours['Description']) . "</p>";
            echo "<div class='actions'>
                    <button class='edit' onclick=\"window.location.href='modifier.php?id=" . $cours['id_cours'] . "';\"><i class='fa fa-edit'></i> Modifier</button>
                    <button class='delete' onclick=\"if(confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')) window.location.href='suppression.php?id=" . $cours['id_cours'] . "';\"><i class='fa fa-trash'></i> Supprimer</button>
                    <button class='view' onclick=\"window.location.href='afficher.php?id=" . $cours['id_cours'] . "';\"><i class='fa fa-eye'></i> Voir</button>
                  </div>";
            echo "</div></div>";
        }
    } else {
        echo "<p>Aucun cours trouvé.</p>";
    }
    ?>
  </div>
</section>

<section class="course-types-section">
  <h2>Gestion des types de cours</h2>
  <button class="add-course-btn" onclick="window.location.href='ajouter_form.php'">
    <i class="fa fa-plus"></i> Ajouter un type de cours
  </button>

  <div class="cards-container">
    <?php
    if (isset($typeList) && is_array($typeList)) {
        foreach ($typeList as $type) {
            echo "<div class='card' style=\"background-image: url('type_image_placeholder_" . $type['id_type'] . ".jpg');\">";
            echo "<div class='card-content'>";
            echo "<h3>" . htmlspecialchars($type['type'], ENT_QUOTES, 'UTF-8') . "</h3>";
            echo "<p>URL : " . htmlspecialchars($type['url'], ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<div class='actions'>
                    <button class='edit' onclick=\"window.location.href='modifier_type.php?id=" . urlencode($type['id_type']) . "';\"><i class='fa fa-edit'></i> Modifier</button>
                    <button class='delete' onclick=\"if(confirm('Êtes-vous sûr de vouloir supprimer ce type ?')) window.location.href='suppression_type.php?id=" . urlencode($type['id_type']) . "';\"><i class='fa fa-trash'></i> Supprimer</button>
                    <button class='view' onclick=\"window.location.href='afficher_type.php?id=" . urlencode($type['id_type']) . "';\"><i class='fa fa-eye'></i> Voir</button>
                  </div>";
            echo "</div></div>";
        }
    } else {
        echo "<p>Aucun type trouvé.</p>";
    }
    ?>
  </div>
</section>



  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="left-image">
            <img src="assets/images/cta-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h6>Get the sale right now!</h6>
          <h4>Up to 50% OFF For 1+ courses</h4>
          <p>Kogi VHS freegan bicycle rights try-hard green juice probably haven't heard of them cliche la croix af chillwave.</p>
          <div class="white-button">
            <a href="contact-us.html">View Courses</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h4>What They <em>Think</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <p>“just think about TemplateMo if you need free CSS templates for your website”</p>
                <h4>Catherine Walk</h4>
                <span>CEO &amp; Founder</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need free HTML templates for your website”</p>
                <h4>David Martin</h4>
                <span>CTO of Tech Company</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“just think about our website wherever you need free templates for your website”</p>
                <h4>Sophia Whity</h4>
                <span>CEO and Co-Founder</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>Helen Shiny</h4>
                <span>Tech Officer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>George Soft</h4>
                <span>Gadget Reviewer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>Andrew Hall</h4>
                <span>Marketing Manager</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>Maxi Power</h4>
                <span>Fashion Designer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>Olivia Too</h4>
                <span>Creative Designer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="map">
          
            <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d99301.41984856074!2d10.7121721!3d35.7634356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQ1JzQ4LjAiTiAxMMKwNDgnNDMuOCJF!5e0!3m2!1sfr!2stn!4v1699375267000!5m2!1sfr!2stn" width="100%" height="420px" frameborder="0" style="border:0; border-radius: 15px; position: relative; z-index: 2;" allowfullscreen=""></iframe>
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Phone</h4>
                  <span>29300322</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Mobile</h4>
                  <span>71220300</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Contact us</h6>
                  <h4>Say <em>Hello</em></h4>
                  <p>IF you need a working contact form by PHP script, please visit TemplateMo's contact page for more info.</p>
                </div>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Full Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" id="message" placeholder="Your Message"></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-gradient-button">Send Message</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-12">
          <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <p class="copyright">Copyright © 2022 EduWell Co., Ltd. All Rights Reserved. 
          
          <br>Design: <a rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</html>