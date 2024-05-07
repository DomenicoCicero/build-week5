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

$userId = $_SESSION['user_Id'] ?? '';
$playlistId = $_GET['playlistId'] ?? '';


if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare('DELETE FROM playlists WHERE user_id = ? AND playlist_id = ?');
    $stmt -> execute([
        $userId,
        $playlistId
    ]);


}

header("Location: http://localhost/progetto-netflix-php/build-week5/homepage.php");
exit;

?>