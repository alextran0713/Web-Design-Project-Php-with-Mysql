<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  </head>
  <body>
    <!-- header -->
    <?php
    require 'components/navbar.php';
    ?>
    <!-- end of header -->
    <!-- Contact Us Section -->
    <section class="Material-contact-section section-padding section-dark">
      <div class="container">
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                  <h1 class="section-title" style="margin-top:2%;">We'd Love to Hear From You!</h1>
              </div>
          </div>
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft jumbotron " data-wow-delay=".2s" style="margin-bottom:10%;">
                <img class="contactImg" src="images/contactImg.jpg">
                <div>
                <div class="find-widget lead">
                 Address: <a href="#">California State University Fullerton</a>
                </div>
                <div class="find-widget lead">
                  Phone:  <a href="#">(123)123-4322</a>
                </div>

                <div class="find-widget lead">
                  Website:  <a href="index.php">pettinder.com</a>
                </div>
                <div class="find-widget lead">
                   Contact Name: <a href="#">Jimmy John</a>
                </div>
              </div>
              </div>
              <!-- contact form -->
              <div class="col-md-6 mt-3 wow animated fadeInRight jumbotron" id="contactForm" data-wow-delay=".2s" style="margin-bottom:10%">
                  <form class="shake" style="padding:4%;border-radius:5px;" role="form" method="post" name="contact-form" data-toggle="validator" action="form-to-email.php">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label lead" for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label lead" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="visitoremail" required data-error="Please enter your Email">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Subject -->
                      <div class="form-group label-floating">
                        <label class="control-label lead">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label lead">Message</label>
                          <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                          <button class="btn btn-primary" type="submit" id="form-submit" name = "submit"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                          <div id="msgSubmit" class="h3 text-center hidden"></div>
                          <div class="clearfix"></div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </section>

    <!-- footer -->
    <?php
    require 'components/footer.php';
    ?>
    <!-- end of footer -->
    <script>
      $("#navbarheader").load("/components/navbar.html");
      $("#footer").load("/components/footer.html");
    </script>
    <script src ="scripts/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
