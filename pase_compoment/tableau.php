
        <?php include 'database.php'; 
        //on inclut notre fichier de connectiown 
        $pdo = Database::connect();
        if (empty($search)){
        $sql = "SELECT * from `eleve`;";
        $rows = $pdo->query($sql);
        
        while($row = $rows->fetch(PDO::FETCH_ASSOC)) : ?>
        <?php 
  
        
            echo '
<br />
<tr>';
            echo '

<th>' . $row['matricul'] . '</th>
';
            echo '

<th>' . $row['nam'] . '</th>
';
            echo '

<th>' . $row['lastname'] . '</th>
';

            echo '

<th>' . $row['mention'] . '</th>
';
            echo '

<th>' . $row['niveau'] . '</th>
';
            echo '

<th>' . $row['monton_brut'] . '</th>
';
            echo '

<th>' . $row['date_last_pay'] . '</th>
';
            echo '

<th>' . $row['payement'] . '</th>
';
echo '

<th>' . $row['reste'] . '</th>
';
echo '

<th>' . $row['tranche'] . '</th>
';
echo '

<th>' . $row['atestation'] . '</th>
';
            echo '

            <th>
            <a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a>
        

            <a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>

        


            <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a> 
            </th>
            </tr>
';endwhile;}else{
             
            $sql="SELECT * FROM `eleve` WHERE  `matricul` like '%".$search."%' or  `nam` like '%".$search."%' or  `lastname` like '%".$search."%' or  `mention` like '%".$search."%' or  `niveau` like '%".$search."%' or  `monton_brut` like '%".$search."%' or  `date_last_pay` like '%".$search."%' or  `payement` like '%".$search."%' or  `reste` like '%".$search."%' or  `tranche` like '%".$search."%' or  `atestation` like '%".$search."%';";
            $rows = $pdo->query($sql);
            while($row = $rows->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php 
      
            
                echo '
    <br />
    <tr>';
                echo '
    
    <th>' . $row['matricul'] . '</th>
    
    ';
                echo '
    
    <th>' . $row['nam'] . '</th>
    
    ';
                echo '
    
    <th>' . $row['lastname'] . '</th>
    ';
    
                echo '
    
    <th>' . $row['mention'] . '</th>
    ';
                echo '
    
    <th>' . $row['niveau'] . '</th>
    ';
                echo '
    
    <th>' . $row['monton_brut'] . '</th>
    ';
                echo '
    
    <th>' . $row['date_last_pay'] . '</th>
    ';
                echo '
    
    <th>' . $row['payement'] . '</th>
    ';
    echo '
    
    <th>' . $row['reste'] . '</th>
    ';
    echo '
    
    <th>' . $row['tranche'] . '</th>
    ';
    echo '
    
    <th>' . $row['atestation'] . '</th>
    ';
                echo '<th>
    
                <a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a> 
                </th>    
                <a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a> 
                <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>
                </th>
    </tr>
    ';endwhile;}
               
       ?>

</table>