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
$movie_id = $_GET['id'];
$selectedPlaylist = $_POST['playlists'] ?? '';
$userId = $_SESSION['user_id'];
$addPlaylist = $_POST['add-playlist'] ?? '';

if(isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare('SELECT * FROM movies WHERE movie_id = ?');
    $stmt-> execute([
        $movie_id
    ]);
    $movie = $stmt->fetch();

    $playlists = $pdo->prepare('SELECT * FROM playlists WHERE user_id = ?');
    $playlists->execute([
      $userId
    ]);
}

if(isset($_POST['playlists'])){

  $addToPlaylist = $pdo->prepare('INSERT INTO playlist_movies (playlist_id, movie_id) VALUES (:playlist_id, :movie_id)');
  $addToPlaylist->execute([
   'playlist_id' => $selectedPlaylist,
   'movie_id' => $movie_id
  ]);
}

if(isset($_POST['add-playlist'])) {
  $add = $pdo->prepare('INSERT INTO playlists (user_id, name) VALUES (?, ?)');
  $add->execute([
    $userId,
    $addPlaylist
  ]);
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
     <?= include __DIR__ . "/myNavbar.php"; ?>
      <div class="container-fluid px-4">
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-center mb-4">
            <h2 class="mb-0">TV Shows</h2>
            <div class="btn-group" role="group">
              <form method="post">
              <select name="playlists" id="playlists" style="background-color: #221f1f; cursor: pointer;" class="text-white py-1">
                <?php foreach($playlists as $row){
                  echo "<option value='$row[playlist_id]'>$row[name]</option>";
                } ?>
    </select>
    <button type="submit">Aggiungi</button>
</form>
            </div>
          </div>
          <div class="pt-2">
          <span class="add-playlist" id="plus-playlist" style="font-size: 1rem;"><i class="bi bi-plus-circle"></i> Crea Nuova Playlist</span>
          
          <form class="row g-3 d-none" id="add-playlist" method="POST">
             <div class="col">
             <input type="text" name="add-playlist" class="form-control" placeholder="Aggiungi Playlist">
             </div>
             <div class="col-auto">
             <button type="submit" class="btn btn-primary mb-3">Aggiungi</button>
        </div>
    </form>
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
     <?php include __DIR__ . "/footer.php" ?>

     </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script>
            const addPlaylistBtn = document.getElementById("plus-playlist")
      addPlaylistBtn.style.cursor = "pointer"
      const addPlaylistForm = document.getElementById("add-playlist")
      addPlaylistBtn.addEventListener("click", () => {
        if(addPlaylistForm.classList.contains("d-none")) {
          addPlaylistForm.classList.remove("d-none")
        } else {
          addPlaylistForm.classList.add("d-none")
        }
      })
    </script>
  </body>
</html>