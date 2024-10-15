<?php require 'database.php'; 
$id = null; 
if ( isset($_REQUEST['id'])) { $id = $_REQUEST['id']; }
var_dump($_REQUEST["id"]);
if(isset($_POST['id'])){
    $id=$_POST['id'];
}
if ( $id==null ) { header("Location: index.php"); }
if (isset($_POST['nam'])==true 
&& isset($_POST['matricul'])==true
&& isset($_POST['nam'])==true
&& isset($_POST['lastname'])==true
&& isset($_POST['mention'])==true
&& isset($_POST['niveau'])==true
&& isset($_POST['date_last_pay'])==true) {
    $matriculeError = null;
    //on initialise nos messages d'erreurs; 
    $namError = null;
    $lastnameError = null;
    $mentionError = null;
    $niveaulError = null;
    $montontError = null;
    $date_last_payError = null;
    $payementError = null;
    $resteError=null;
    // on recupère nos valeurs 
    $matricul = htmlentities(trim($_POST['matricul']));
    $nam = htmlentities(trim($_POST['nam']));
    $lastname = htmlentities(trim($_POST['lastname']));
    $mention = htmlentities(trim($_POST['mention']));
    $niveau = htmlentities(trim($_POST['niveau']));
    $date_last_Pay = htmlentities(trim($_POST['date_last_pay']));
    if (isset($_POST['payement'])){$payement = htmlentities(trim($_POST['payement']));}else{$payement="0";};
    // on vérifie nos champs 
    $valid=true;
    if (empty($matricul)) {
        $matriculeError = 'Please enter Name';
        $valid = false;}
        if (empty($nam)) {
            $namError = 'Please enter Name';
            $valid = false;
        } else if (!preg_match('/^[a-zA-Z ]*$/', $nam)) {
            $namError = "Only letters and white space allowed";
        }
        if (empty($lastname)) {
            $lastnameError = 'Please enter firstname';
            $valid = false;
        }  
        if(empty($date_last_Pay)){
            $date_last_payError='please choise the date last payment';
            $valid= false;
        }
        if (empty($mention)) {
            $mentionError = 'Please enter Email Address';
            $valid = false;
        }
        if (empty($niveau)){
            $niveauError= 'please rechoise the niveau';
            $valid=false;}
        if ($niveau=="L1" && $mention=="DAII"){
                $monton_brut="500 000  Ar";
            }elseif($niveau=="L2" && $mention=="DAII"){
                $monton_brut="600 000 Ar";
            }elseif($niveau=="L3" && $mention=="DAII"){
                $monton_brut="700 000 Ar";
            }
            if ($niveau=="L1" && $mention=="AES"){
                $monton_brut="400 000  Ar";
            }elseif($niveau=="L2" && $mention=="AES"){
                $monton_brut="500 000 Ar";
            }elseif($niveau=="L3" && $mention=="AES"){
                $monton_brut="600 000 Ar";
            }
        if (!isset($date_last_Pay)) {
            $date_last_payError = 'entrer un date';
            $valid = false;
        }
        $reste=null;
        var_dump($valid);
       
        $reste= 2- intval($payement);
        if($reste<0){
            $resteError= 'probleme at the payement';
            $Attestaion="false";
            $valid=null;}
        else if($payement>0) {
            $Attestaion="true";
        }else{
            $Attestaion="false";
        }   
        $tranche=2;
        var_dump($valid);
             if ($valid) { $pdo = Database::connect(); 
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "UPDATE eleve SET matricul=?,nam=?,lastname=?, mention=?, niveau=?,monton_brut=?,date_last_pay=?,payement=?,reste=?,tranche=?,atestation=? WHERE id = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($matricul,$nam, $lastname, $mention, $niveau,$monton_brut,$date_last_Pay, $payement, $reste,$tranche,$Attestaion,$id));
            
             header("Location: index.php");
         } 
        }
             $pdo = Database::connect();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM eleve where id = $id";
             $q = $pdo->query($sql);
             $row = $q->fetch(PDO::FETCH_ASSOC);
             $matricul=$row['matricul'];
             $nam=$row['nam'];
             $lastname=$row['lastname']; 
             $mention=$row['mention'] 
;
                            
$niveau=$row['niveau'] 
;
                            

$monton_brut=$row['monton_brut'] 
;
                            

$date_last_Pay=$row['date_last_pay'] 
;
                            

$payement=$row['payement'] 
;
                            

$reste=$row['reste'] 
;
$tranche=$row['tranche'] 
;
$Attestaion=$row['atestation'] 
;      
                       
                        ;
                        ?>    
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Nouvel eleve</h3>
        </div>
        <form method="post" action="update.php?id=<?php echo $id ;?>">
            <?php if(isset($message)){
              echo'<p style="color:red">'.$message.'</p>';
            }?>
            
            <div class="control-group <?php echo !empty($matriculeError) ? 'error' : ''; ?>">
                <label class="control-label">Matricule</label>
                <div class="controls">
                    <input name="matricul" type="text" placeholder="matricul" value="<?php echo !empty($matricul) ? $matricul : ''; ?>">
                    <?php if (!empty($matriculeError)) : ?>
                        <span class="help-inline"><?php echo $matriculeError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($nam) ? 'error' : ''; ?>">
                <label class="control-label">nam</label>
                <div class="controls">
                    <input type="text" name="nam" value="<?php echo !empty($nam) ? $nam : ''; ?>">
                    <?php if (!empty($namError)) : ?>
                        <span class="help-inline"><?php echo $namError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="control-group<?php echo !empty($date_last_pay) ? 'error' : ''; ?>">
                <label class="control-label">dernier payement</label>
                <div class="controls">
                    <input type="date" name="date_last_pay" value="<?php echo $date_last_pay ; ?>" <?php if (!empty($date_last_payError)) : ?>> <span class="help-inline"><?php echo $date_last_payError; ?></span>
                <?php endif; ?>
                </div>
            </div>
            <div class="control-group <?php echo !empty($lastname) ? 'error' : ''; ?>">
                <label class="control-label">lastname</label>
                <div class="controls">
                    <input name="lastname" type="text" placeholder="lastname" value="<?php echo !empty($lastname) ? $lastname : ''; ?>">
                    <?php if (!empty($lastnameError)) : ?>
                        <span class="help-inline"><?php echo $lastnameError; ?></span>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <div class="control-group<?php echo !empty($mentionError) ? 'error' : ''; ?>">
                <select name="mention">
                    <option value="DAII">DAII</option>
                    <option value="AES">AES</option>
                </select>
            </div>
            <div class="control-group<?php echo !empty($niveauError) ? 'error' : ''; ?>">
                <select name="niveau">
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                </select>
            </div>
            <div class="control-group<?php echo !empty($payementError) ? 'error' : ''; ?>">
                <label class="checkbox-inline">PAYEMENTS:</label>
                <div class="controls">  
                    tranche :<input type="radio" name="payement" value="1" <?php if (isset($payement) && $payement == "1") echo "checked"; ?>>1
                             <input type="radio" name="payement" value="2" <?php if (isset($payement) && $payement == "2") echo "checked"; ?>>2
                </div>
                    <?php if (!empty($paymentError)) : ?>
                        <span class="help-inline"><?php echo $payementError; ?></span>
                    <?php endif; ?>
            </div>
            <br />
            <div class="form-actions">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
                <a class="btn" href="index.php">Retour</a>
            </div>
            <p>
        </form>
        <p>
    </div>
    <p>
</body>

