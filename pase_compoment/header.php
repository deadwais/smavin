

<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:login.php");
    }
    ?>
    <div class="hat">
        <div class="divhead">
            <div class="custom-select" style="width: 187px">
                <select style="padding-bottom: 2px;padding-right: 3px;">
                    <option value="1"><a href="DAII.php">DAII(Develloppement ...)</a></option>
                    <option value="2"><a href="AES.php">AES(Administration Eco...)</a></option>
                </select>
            </div>
            <div class="hot">
                <form method='post'>
                    <input type="text" name="search">
                    <Button type="submit">
                        search
                    </Button>
                </form>
            </div>
            <div class="hot">
                <select style="
    padding-bottom: 2px;">
                    <option value="">
                        langue1
                    </option>
                    <option value="">
                        langue2()
                    </option>
                </select>
            </div>
            <div class="hot">
                <button>
                    <a href="logout.php">logout</a>
                </button>
            </div>
        </div>
    </div>
    <?php
    $search="";
    if (isset($_POST['search'])){
        $search=$_POST['search'].';';
    }?>