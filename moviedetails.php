<?php
session_start();

$host = 'localhost';
$db = 'netflix_clone';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

if(isset($_SESSION['user_id'])) {
    $movie_id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM movies WHERE movie_id = ?');
    $stmt-> execute([
        $movie_id
    ]);
    $movie = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <style>
      body {
        background-color: #221f1f;
      }

      h2,
      h4,
      footer {
        color: #f5f5f1;
      }

      .icons {
        margin-left: 0.8em;
        margin-right: 0.8em;
        font-size: 1.2em;
        color: #f5f5f1;
      }

      .navbar-nav {
        font-size: 90%;
      }

      #kids {
        color: #f5f5f1;
        font-size: 0.8em;
      }

      .footer-icon {
        color: #838383;
      }

      .footer-links {
        font-size: 0.8em;
      }

      .footer-links p {
        margin-bottom: 0.3em;
        color: #838383;
      }

      .footer-links a {
        color: #838383;
        text-decoration: none;
      }

      .footer-button {
        color: #838383;
        border-color: #838383;
      }

      .copyright {
        color: #838383;
        font-size: 0.6em;
      }

      .col img {
        transition: transform 0.2s;
      }

      /* .custom-img{
       
        
        width: 301px;
        height: 164px;
        object-fit: cover;
      } */

      .details-img {
        width: 350px;
      }

      .col img:hover {
        transform: scale(1.1);
        cursor: pointer;
      }
    </style>
    <title>Epiflix</title>
  </head>
  <body>
    <div>
     <?= include __DIR__ . "/myNavbar.php"; ?>
      <div class="container-fluid px-4">
        <div class="d-flex justify-content-between">
          <div class="d-flex">
            <h2 class="mb-4">TV Shows</h2>
            <div class="btn-group" role="group">
              <div class="dropdown ms-4 mt-1">
                <button
                  type="button"
                  class="btn btn-secondary btn-sm dropdown-toggle rounded-0"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="background-color: #221f1f"
                >
                  Genres
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Comedy</a></li>
                  <li><a class="dropdown-item" href="#">Drama</a></li>
                  <li><a class="dropdown-item" href="#">Thriller</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div>
            <i class="bi bi-grid icons"></i>
            <i class="bi bi-grid-3x3 icons"></i>
          </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col col-8 text-center">
                <?php echo 
            "<div class='card'>
            <h2 class='card-title'>$movie[title]</h2>
            
            <img src='$movie[cover_image_url]' class='card-img-top details-img mx-auto' alt='$movie[title]'>
            <div class ='card-body'>
            <p class ='card-text'>$movie[description]</p>
            <p class = 'card-text'><span class ='fw-semibold'>Anno di Rilascio</span> : $movie[release_year]</p>
            <p class = 'card-text'><span class ='fw-semibold'>Durata</span> : $movie[duration_minutes]</p>
            <p class = 'card-text'><span class ='fw-semibold'>Genere</span> : $movie[genre]</p>
            <p class = 'card-text'><span class ='fw-semibold'>Director</span> : $movie[director]</p>
            <a href='$movie[trailer_url]' target='_blank'>Guarda il trailer</a>

            </div>
            </div>"
            ?>
        </div>
     </div>


     </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>