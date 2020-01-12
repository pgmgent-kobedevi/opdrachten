<?php require_once 'app.php'?>

<h2 class="indigo-text text-darken-1"><?php echo $doedel->name?></h2>
<p><?php echo $doedel->description?></p>
<?php 

 ?>
<?php 

    if(isset($_POST['submit'])){
        Doedel::add_votes($_GET['doedel_code'], $_POST['name'], $_POST['email'], $_POST['dates']);
        header("location: views/doedel_results.php?doedel_code=".$_GET['doedel_code']);
    }

?>
<form method="post">
<div class="input-field">    
    <input type="text" id="name" name="name" class="validate">
    <label for="name">Naam</label>
</div>
<div class="input-field">    
    <input type="text" id="email" name="email" class="validate">
    <label for="email">E-mail</label>
</div>
<p>
    <!-- name is dates[] because it is an array of possible answers, the value should be the id -->
    <?php 
        $doedel_dates = Doedel::get_dates($doedel_code);
        
        foreach ($doedel_dates as $date) {
            # code...
            ?>
            <label><input type="checkbox" name ="dates[]" value="<?php echo $date['doedel_date_id'] ?>"> <span><?php echo $date['doedel_date']?></span></label><br>
            <?php
        }

    ?>
</p>
<input type="hidden" name="code" value="<?php echo $doedel->doedel_code ?>">
<p>
    <button type="submit" name="submit" class="waves-effect indigo darken-1 btn-large">Verstuur <i class="material-icons right">send</i></button>
</p>
</form>