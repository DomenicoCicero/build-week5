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

if(isset($_SESSION["user_id"])) {
    $stmt = $pdo-> prepare("SELECT * FROM users WHERE user_id = :user_id_from_session");
    $stmt -> execute([
        "user_id_from_session" => $_SESSION["user_id"]

    ]);

    $user_from_db = $stmt -> fetch();
}

$success = false;

$user = [];
$user['username'] = $_POST['username'] ?? '';
$user['email'] = $_POST['email'] ?? '';
$user['password'] = $_POST['password'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $success = $stmt->execute([
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    if ($success) {
        $alertMessage = '<div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Registrazione completata!</h4>
                            <p>Benvenuto a Netflix Clone.</p>
                        </div>';
            
    } else {
        $alertMessage = '<div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Errore durante la registrazione</h4>
                            <p>Si è verificato un errore durante la registrazione. Riprova più tardi.</p>
                        </div>';
    }

    echo $alertMessage; // Stampiamo l'alert prima dell'header di reindirizzamento

    if ($success) {
        header('Refresh: 2; URL=/progetto-netflix-php/build-week5/');
        exit;
    }
    
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

    <div class="<?= $success ? 'd-none' : 'container'?>  ">
    <h1>Registrazione</h1>
    <form action="" method="POST" novalidate  class="mb-4">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Registrati</button>
    </form>
    <!-- <a href="http://localhost/pratica-s2-l1-php/register.php">Vai alla registrazione</a> -->
 </div>
</body>
</html>




