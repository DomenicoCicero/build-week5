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
            header('Location: /progetto-netflix-php/build-week5/homepage.php');
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="login-registrazione.css"/>
</head>
<body>
    <nav>
        <a href="#"><img src="./assets/logo.png" alt="Logo-Netflix"></a>
    </nav>
    <div class="form-wrapper">
    <h2>Login</h2>
    <form action="" method="POST" novalidate  >
        <div class="form-control">
            <label for="username" >Username</label>
            <input type="text" class="form-control" id="username" name="username" value="">
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="">
        </div>
        <button type="submit" >Login</button>
        <div class="form-help">
            <div class="remember-me">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Ricordami</label>
            </div>
            <a href="https://www.netflix.com/it/">Aiuto</a>
        </div>
    </form>
    
    <a href="http://localhost/progetto-netflix-php/build-week5/registrazione.php">Vai alla registrazione</a>
 </div>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
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
                    <form action="" method="POST" novalidate >
                        <h1>Login</h1>
                        <div class="info">
                            <!-- <input class="email" type="email" placeholder="Email or phone number"> <br> -->
                            <input type="text" class="email"  name="username" placeholder="username" value="<?= $user['username'] ?>">
                            <!-- <input class="email" type="password" placeholder="Password"> -->
                            <input type="password" class="email" placeholder="password" name="password" value="">
                        </div>
                        <div class="btn">
                            <button class="btn-primary" type="submit">Login</button>
                        </div>
                        <div class="help">
                            <div>
                                <input value="true" type="checkbox"><label>Ricordami</label>
                            </div>

                            <a href="https://www.netflix.com/dz-en/LoginHelp">Need Help ?</a>
                        
                        </div>

                    </form>
    
                </div>
                
                
                <div class="signup">
                    <p>New to Netflix ?</p>
                    <a href="http://localhost/progetto-netflix-php/build-week5/registrazione.php">Registrati</a>
                </div>
                


            </div>

       
            
       
    </header>


</body>
</html>



