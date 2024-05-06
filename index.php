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
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id_from_session");
    $stmt->execute([
        "user_id_from_session" => $_SESSION['user_id']
    ]);

    $user_from_db = $stmt->fetch();
}

$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['password'] = $_POST['password'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute([
        "username" => $_POST['username']
    ]);

    $user_from_db = $stmt->fetch();

    if($user_from_db) {
        if(password_verify($_POST['password'], $user_from_db['password'])) {
            $_SESSION["user_id"] = $user_from_db['user_id'];
            // echo var_dump($_SESSION);
            echo '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Login completato!</h4>
                            <p>Benvenuto a Netflix Clone.</p>
                            </div>';
            header('Location: /progetto-netflix-php/build-week5/myNavbar.php');
            exit;
        } else {
                    echo '<div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading">Password errata</h4>
                          <p>Si è verificato un errore durante il login. Riprova più tardi.</p>
                          </div>';
        }

    } else {
    echo '<div class="alert alert-danger" role="alert">
          <h4 class="alert-heading">Utente non esistente</h4>
          <p>Si è verificato un errore durante il login. Riprova più tardi.</p>
        </div>';
    }


    // $error['credentials'] = "Credenziali non valide";


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <style>
        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Login</h1>
    <form action="" method="POST" novalidate  class="mb-4">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <a href="http://localhost/progetto-netflix-php/build-week5/registrazione.php">Vai alla registrazione</a>
 </div>
</body>
</html>