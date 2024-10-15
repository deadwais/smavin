<?php include 'database.php';

     if (isset($_GET['search'])){
     $pdo = Database::connect();
     $sql = 'SELECT * FROM eleve WHERE ? is null or matricul like ? or nam like ? or lastname like ? or mention like ? or niveau like ? or atestation like ? ORDER BY id DESC'; 
     $search = '%' . $_GET['search'] . '%';
     $st = $pdo->prepare($sql);
     $st->execute(array($search, $search, $search, $search, $search, $search, $search));
    }

else if (isset($_GET['tout'])){
 $pdo = Database::connect();
 $sql = 'SELECT * FROM eleve';
 $st = $pdo->prepare($sql);
 $st->execute();
}
else if (isset($_GET['mention'])){
    $prt=$_GET['mention'];
    $pdo = Database::connect();
    $sql = "SELECT * FROM eleve where mention = ? ";
    $st = $pdo->prepare($sql);
    $st->execute(array($prt));
   }
 $reponse="";
 
    <?while ($row=$st->fetch()) { ?>
        <div  id="tr-<?php echo $row['id']; ?>" class="border" style="border-radius: 10px;display:inline block;margin:8px;padding:0.5rem">
           <div>
               <span style="font-weight: bold"><?php echo $row['nam'].' '?></span><span><?php echo ' '.$row['lastname'].' ' ?></span>
           </div>
           <div style="font-size: 0.8rem">
               <span style="color: #888">#<?php echo $row['matricul'] ?> </span>
               <?php echo $row['mention'] ?> &ndash; <?php echo $row['niveau'] ?></div>
           <!-- <div>monton_brut:<?php echo $row['date_last_pay'] ?></div> -->
           <!-- <div>date_last_pay:<?php echo $row['date_last_pay'] ?></div> -->
           <div style="font-size: 0.8rem">
               <?php echo ($row['monton_brut'] * $row['payement'] / 2) . ' / ' . $row['monton_brut'] . ' Ar' ?>
               (<?php echo $row['date_last_pay'] ?>)
           </div>
           <!-- <div>payement:<?php echo $row['payement'] ?></div>
           <div>reste:<?php echo $row['reste'] ?></div>
           <div>tranche:<?php echo $row['tranche'] ?></div> -->
           <div style="font-size: 0.8rem">Attestation: <?php echo $row['atestation'] ? 'oui': 'non' ?></div>
           <div style="font-size: 0.9rem">
               <a
                   style="color: #8af;text-decoration: underline; margin-right: 0.5rem"
                   href="edit.php?id=<?php echo $row['id']?>"
               >Read</a>
               <a style="color: #8af;text-decoration: underline; margin-right: 0.5rem"
                   href="update.php?id=<?php echo $row['id']?>">Update</a>
               <a style="color: #f68;text-decoration: underline" href="javascript:delet(<?php echo $row['id']?>)">Delete</a> </div>
           
       </div>?php
 }
