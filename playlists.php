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
$search = $_GET['search'] ?? '';
$playlistId = $_GET['playlistId'] ?? '';
$userId = $_SESSION['user_id'] ?? '';
$edit = $_POST['edit'] ?? '';


if(isset($_SESSION['user_id'])) {
  $stmt = $pdo->prepare(
    'SELECT * FROM movies 
    JOIN playlist_movies ON movies.movie_id = playlist_movies.movie_id 
    WHERE playlist_movies.playlist_id = :playlistId
    AND title LIKE :search');
  $stmt -> execute([
    'playlistId' => $playlistId,
    'search' => "%$search%"
  ]);

  $movies = $stmt->fetchAll();

  $playlists = $pdo->prepare('SELECT * FROM playlists WHERE playlist_id = ? AND user_id = ?');
  $playlists->execute([
    $playlistId,
    $userId
  ]);
  $playlist = $playlists->fetch();

  $stmt = $pdo->prepare('SELECT * FROM playlists WHERE user_id = ?');
  $stmt->execute([
  
    $userId
  ]);
  $playlists =$stmt->fetchAll();

  if(isset($_POST['edit'])) {
    // Aggiorna il nome della playlist nel database
    $stmtEdit = $pdo->prepare('UPDATE playlists SET name = :name WHERE playlist_id = :playlist_id');
    $stmtEdit->execute([
      ':name' =>  $edit,
      ':playlist_id' => $playlistId
    ]);

    // Reindirizza l'utente alla stessa pagina con l'ID della playlist
    header("Location: http://localhost/progetto-netflix-php/build-week5/playlists.php?playlistId=$playlistId");
    exit;
  }
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
    <link rel="stylesheet" href="style.css"/>
    <title>Epiflix</title>
  </head>
  <body>
    <div>
    <nav
 class="navbar navbar-expand-lg bg-dark"
        data-bs-theme="dark"
        style="background-color: #221f1f !important"
      >
        <div class="container-fluid">
          <a class="navbar-brand" href="http://localhost/progetto-netflix-php/build-week5/homepage.php"
            ><img src="assets/logo.png" style="width: 100px; height: 55px"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active fw-bold" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">TV Shows</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="#">Recently Added</a>
              </li>
              <li class="nav-item">
              <div class="dropdown ms-4 mt-1">
                <button
                  type="button"
                  class="btn btn-secondary btn-sm dropdown-toggle rounded-0"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                  style="background-color: #221f1f"
                >
                  My Playlists
                </button>
                <ul class="dropdown-menu">
                  <?php foreach($playlists as $row) {
                    echo "<li><a class='dropdown-item' href='?playlistId=".urlencode($row['playlist_id'])."'>$row[name]</a></li>";
                  } ?>
                </ul>
              </div>
              </li>
            </ul>
            <div class="d-flex align-items-center">
             <form class="row g-3 d-none" id="searchForm" method="GET">
             <div class="col">
              
              <input type="hidden" name="playlistId" value="<?=$playlistId?>"  />
             <input type="text" name="search" class="form-control" placeholder="Cerca un titolo">
             </div>
             <div class="col-auto">
             <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>
              <i class="bi bi-search icons" id="searchIcon"></i>
              <div id="kids" class="fw-bold">KIDS</div>
              <i class="bi bi-bell icons"></i>
              <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle icons"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="dropdownUser1" style="background-color: white;">
                            <li><a class="dropdown-item" href="http://localhost/progetto-netflix-php/build-week5/logout.php" style="color: black;">Esci</a></li>
                        </ul>
                    </div>
              <!-- <a href="http://localhost/progetto-netflix-php/build-week5/logout.php"><i class="bi bi-person-circle icons"></i></a> -->
            </div>
          </div>
        </div>
      </nav>
      <div class="container-fluid px-4">
        <div class="d-flex justify-content-between">
        <h4><?= $playlist['name'] ?></h4>
        <div>
        <form class="row g-3 d-none" id="putForm" method="post">
             <div class="col">
             <input type="text" name="edit" class="form-control" placeholder="Modifica Playlist" value="<?= $playlist['name']?>">
             </div>
             <div class="col-auto">
             <button type="submit" class="btn btn-primary mb-3">Modifica</button>
        </div>
    </form>
          <button type="button" class="btn btn-primary" id="btn-put">Rinomina Playlist</button>
        <a class='btn btn-danger' href="http://localhost/progetto-netflix-php/build-week5/deletePlaylist.php?playlistId=<?= urlencode($playlistId) ?>">Elimina Playlist</a>
        </div>
        </div>
        <div
          class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 row-cols-xl-6 mb-4"
        >
        <?php 
        if(count($movies) > 0) {
        foreach($movies as $row) {
          echo 
          "
          <div class='d-flex flex-column my-2'>
          <div class='col mb-2 text-center px-1'>
          <a href='http://localhost/progetto-netflix-php/build-week5/moviedetails.php?id={$row['movie_id']}'>
            <img class='img-fluid custom-img' src='$row[cover_image_url]' alt='movie picture' />
          </div>
          <a class='btn btn-danger' href='http://localhost/progetto-netflix-php/build-week5/deleteMovieFromPlaylist.php?movieId=".urlencode($row['movie_id'])."&playlistId=".urlencode($playlistId)."'>Elimina</a>
          </div>";
                   
        } 
      } else {
        echo "<div class='alert alert-danger' role='alert'>
        Nessun Risultato trovato!
        </div>";
   };
        
        ?>
        </div>
        <?php include __DIR__ . "/footer.php" ?>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script>
      const searchBtn = document.getElementById("searchIcon")
      searchBtn.style.cursor = "pointer"
      const searchForm = document.getElementById("searchForm")
      searchBtn.addEventListener("click", () => {
        if(searchForm.classList.contains("d-none")){
          searchForm.classList.remove("d-none")
        } else {
          searchForm.classList.add("d-none")
        }
      })

      const btnPut = document.getElementById("btn-put")
      const putForm = document.getElementById("putForm")
      btnPut.addEventListener("click", () => {
        if(putForm.classList.contains("d-none")) {
          putForm.classList.remove("d-none")

        } else {
          putForm.classList.add("d-none")
        }
      })
    </script>
  </body>
</html>
