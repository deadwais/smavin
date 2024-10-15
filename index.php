<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud en php</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }                                             ?>
    <div class="hat">
        <div class="divhead">
            <div class="hot">
                <form>
                    <input type="text" name="search" id='search' aria-label="search" onkeyup="srx(this.value)" placeholder="search" style="position: absolute;"><img src="search.gif" style="position: relative;top:20%;left:1050%;" alt="4x4" class="img">
                </form>
            </div>
            <div class="hot">
                <a name="tout" class="btn" id='tout' onclick="tout()">tout</a>
                <a name="mention" class="btn" id="mention" onclick="mention('DAII')">DAII</a>
                <a name="mention" class='btn' id="mention" onclick="mention('AES')">AES</a>
            </div>
            <div class="hot">
                <span>langue :</span>
                <a class='btn' href="">&#127467;&#127479;</a>
            </div>
            <div class="hot">
                <p><a href="logout.php" style="background-color: pink;color:black" class="btn btn-danger">Dec...xion</a></p>
            </div>
        </div>
    </div>
    <?php
    ?>
    <div class="container">
        <div>
            <h2>Gestion des frais de scolariter</h2>
        </div>

        
        <a href="add.php" class="btn btn-success">Ajouter une Nouvel eleve</a>
        <div>

            <div id="result" style="display: grid; grid-template-columns: repeat(auto-fill, 20rem)">
                <div></div>
            </div>

        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>