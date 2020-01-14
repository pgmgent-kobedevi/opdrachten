    <a href="index.php" class="brand">Pixels</a>
    <form>
        <input type="text" name="q" placeholder="What do you want to see?" <?php if(isset($_GET['q'])) {
            echo "value='". $search_term . "'";
        }?>>
        <button type="submit" class="btn"><i class="demo-icon icon-search"></i></button>
    </form>
    <nav>
        <?php
            // Items enkel indien ingelogd
            if(isset($_SESSION['loginmail'])){
                ?>
                <a href="add.php">Upload</a>
                <a href="index.php?user_id=<?php echo $_SESSION['loginid'] ?>">Mijn fotos</a>
                <a href="logout.php">Uitloggen</a>
                <?php
            }
            // Items enkel indien niet ingelogd
            else {
                ?>
                <a href='login.php'>Inloggen</a>
                <?php
            }
        ?>
    </nav>