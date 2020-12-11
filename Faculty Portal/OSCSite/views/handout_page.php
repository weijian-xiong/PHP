<h1> --> Handout Page <-- </h1>
<p>  Handout for week <?php echo $_SESSION['weekNo']; ?></p>

<form method="POST" action="index.php">
    <textarea name="handout_content" rows="20" cols="150"><?php
        if ($handout_exist && empty($handout_error)) {
            echo $handout->content;
        };
        ?></textarea>
    <input type="hidden" name="handout_exist" value='<?php echo $handout_exist; ?>'/> 
    <input type="hidden" name="action" value="save_handout_page"/>
    <br><br>
    <input type="submit" name="save_handout" value="Submit"/>
    <?php
    if (!empty($handout_error)) {
        echo "<br> $handout_error";
    } else if (!empty($insertCount)) {
        echo "<br> $insertCount";
    }
    ?>
</form>
