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

$alertMessage = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    try {
            $success = $stmt->execute([
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);
} catch (\PDOException $e) {
    $errorMessage = "Errore durante l'esecuzione della query: " . $e->getMessage();
}


    if ($success) {
        $alertMessage = '<div style="padding: 1rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: 0.25rem; color: #155724; background-color: #d4edda; border-color: #c3e6cb;" role="alert">
        <h4 style="margin-top: 0; margin-bottom: 0.5rem;">Registrazione completata!</h4>
        <p style="margin-top: 0; margin-bottom: 0;">Benvenuto a Netflix Clone.</p>
    </div>';
        // $alertMessage = '<div class="alert alert-success" role="alert">
        //                     <h4 class="alert-heading">Registrazione completata!</h4>
        //                     <p>Benvenuto a Netflix Clone.</p>
        //                 </div>';
            
    } else {
        $alertMessage = '<div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Errore durante la registrazione</h4>
                            <p>Si è verificato un errore durante la registrazione. Riprova più tardi.</p>
                        </div>';
    }

    echo $alertMessage;

    if ($success) {
        header('Refresh: 2; URL=/progetto-netflix-php/build-week5/');
        exit;
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" href="login-registrazione.css">
<title>Epiflix</title>
</head>
<body>
    <header class="showcase">
        

            <div class="logo">
                <img src="./assets/logo.png">
            </div>

            <div class="showcase-content">
                <div class="formm">
                    <form action="" method="POST" >
                        <h1>Registrazione</h1>
                        <div class="<?= $success ? 'd-none' : 'container'?>  ">
                        <div class="info">
                            <input type="text" class="email"  name="username" placeholder="username" required value="<?= $user['username'] ?>">
                            <input type="email" class="email" placeholder="email"  name="email" required value="<?= $user['email'] ?>">
                            <input type="password" class="email" placeholder="password" name="password" required value="<?= $user['password'] ?>">
                        </div>
                        <div class="btn">
                            <button class="btn-primary" type="submit">Registrati</button>
                        </div>
                        <div class="help">
                            <div>
                                <input value="true" type="checkbox"><label>Ricordami</label>
                            </div>

                            <a href="#">Need Help ?</a>
                        
                        </div>

                    </form>
    
                </div>
                
                
                <div class="signup">
                    <p>Hai già un profilo ?</p>
                    <a href="http://localhost/progetto-netflix-php/build-week5/">Login</a>
                </div>
                


            </div>

       
            
       
    </header>


</body>
</html>





