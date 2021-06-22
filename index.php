<?php
session_start();
header("X-Frame-Options: DENY");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    img.icon {
      margin-left: 10px;
      margin-right: 10px;
    }
  </style>
  <header>

    <div class="navbar navbar-dark bg-dark box-shadow">
      <div class="container d-flex justify-content-between">
        <a href="registerUser.php" class="navbar-brand d-flex align-items-center">
          <img class="icon" src="imgs/cinema.png" alt="register"> <strong> Register</strong>
        </a>
        <a href="login_user.php" class="navbar-brand d-flex align-items-center"><strong>Login</strong><img class="icon" src="imgs/login.png" alt="login"> </a>
      </div>
    </div>
  </header>


  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Welcome to Movie 4 two-night</h1>
        <p class="lead text-muted">4 decent movies, no endless scrolling, no endless choices. Spend your night enjoying your company & your movie. <br> Tonight the movie will be great.
        </p>
      </div>
    </section>

    <div class="row row-cols-1 row-cols-md-4">
      <div class="col mb-4">
        <div class="card">
          <img class="card-img-top" alt="Nobody" style="height: 100%; width: 100%; display: block;" src="imgs/nobody.jpg" data-holder-rendered="true">
          <div class="card-body">
            <p class="card-text">A bystander who intervenes to help a woman being harassed by a group of men becomes the target of a vengeful drug lord and ensure that he will never be underestimated as a nobody again.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/wZti8QKBWPo"> View trailer</button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="login_user.php"> Pay & Watch</button></a>
              </div>
              <small class="text-muted">3.99$</small>
            </div>
          </div>
        </div>
      </div>


      <div class="col mb-4">
        <div class="card">
          <img class="card-img-top" alt="Courier" style="height: 100%; width: 100%; display: block;" src="imgs/courier.jpg" data-holder-rendered="true">
          <div class="card-body">
            <p class="card-text">A true-life spy thriller, the story of an unassuming British businessman Greville Wynne recruited into one of the greatest international conflicts in history Cold War, while spy and his Russian source try to put an end to the Cuban Missile Crisis.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/Qeo8qs9xohM"> View trailer </button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="login_user.php">Pay & Watch</button></a>
              </div>
              <small class="text-muted">3.99$</small>
            </div>
          </div>
        </div>
      </div>


      <div class="col mb-4">
        <div class="card">
          <img class="card-img-top" alt="I care a lot" style="height: 100%; width: 100%; display: block;" src="imgs/carealot.jpg" data-holder-rendered="true">
          <div class="card-body">
            <p class="card-text">A crooked legal guardian who drains the savings of her elderly wards meets her match when a woman she tries to swindle turns out to be more than she first appears.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group" wfd-id="48">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/D40uHmTSPew"> View trailer </button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="login_user.php">Pay & Watch</button></a>
              </div>
              <small class="text-muted">3.99$</small>
            </div>
          </div>
        </div>
      </div>


      <div class="col mb-4">
        <div class="card">
          <img class="card-img-top" alt="Mauritanian" style="height: 100%; width: 100%; display: block;" src="imgs/mauritanian.jpg" data-holder-rendered="true">
          <div class="card-body">
            <p class="card-text">This is the inspiring true story of Mohamedou Ould Slahi fights for freedom after being detained and imprisoned without charge by the U.S. Government for years.</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group" wfd-id="48">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/7tmxxzZXLEM"> View trailer </button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="login_user.php">Pay & Watch</button></a>
              </div>
              <small class="text-muted">3.99$</small>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark border-dark">
            <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body bg-dark p-0">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>

    <script>
      $(document).ready(function() {
        // Set iframe attributes when the show instance method is called
        $("#videoModal").on("show.bs.modal", function(event) {
          let button = $(event.relatedTarget); // Button that triggered the modal
          let url = button.data("video"); // Extract url from data-video attribute
          $(this).find("iframe").attr({
            src: url,
            allow: "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
          });
        });
        // Remove iframe attributes when the modal has finished being hidden from the user
        $("#videoModal").on("hidden.bs.modal", function() {
          $("#videoModal iframe").removeAttr("src allow");
        });
      });
    </script>

  </main>

  <footer>
    <div>
      <p class="float-right">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

  </body>

</html>