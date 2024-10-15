<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Classic Login Form Example</title>
  <link rel="stylesheet" href="./login.css">

</head>

<body>
  <?php
  
  require "connect.php";
  session_start();
  if (isset($_SESSION['username'])){
    header('Location: index.php');
  }
  if (isset($_POST['password']) && isset($_POST['username'])) {
    $motDePasseUtilisateur = $_POST['password'];
    $nomUtilisateur = $_POST['username'];
    $requet = 'SELECT * FROM `user` WHERE `name`= ?';
    $resultat = $conn->prepare($requet);
    $resultat->bind_param("s", $nomUtilisateur);
    $resultat->execute();
    $getresultat = $resultat->get_result();
    if ($getresultat->num_rows == 1) {
      $row = $getresultat->fetch_assoc();
      $motDePasseStocke = $row['password'];
      if ($motDePasseUtilisateur == $motDePasseStocke) {
        $_SESSION['username']=$nomUtilisateur;
        header('Location: index.php');
      }
    }else{ $message="Nom d'utilisateur ou mots de pass incorrect";
    /*prevenir brute force attack ou dictionnary attack*/sleep(5);}
  }
  ?>
  
  <div class='login' id='login'>
    <div class='head'>
      <h1 class='company'>Universe Explorer</h1>
    </div>
    <p class='msg'>Welcome back</p>
     <?php if (!empty($message)){?>
      <p class='msg' style="color: red;" id="echec"><?php echo $message;?></p>
     <?php }?></p>
    <div class='form'>
      <form method="POST">
        <input type="text" name="username" placeholder='Username' class='text' id='username'><br>
        <input type="password" name="password" placeholder='••••••••••••••' class='password'><br>
        <button type="submit"  class='btn-login' id='do-login'> Submit </button>
        <button type="reset" class='forgot' id="forgot">Forgot?</button>
      </form>
    </div>
</div>
</body>

</html>