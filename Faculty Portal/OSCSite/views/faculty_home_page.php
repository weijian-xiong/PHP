<h1> --> Home Page <-- </h1>
<p>Welcome to faculty home page, please select week number: </p>
<form method='POST' action='index.php'>
    <select name="weekNo">
        <?php
        $weeks = range(1, 15);
        foreach ($weeks as $week) {
            ?>
            <option value="<?php echo $week; ?>" <?php echo ($_SESSION['weekNo'] == $week) ? 'selected' : '' ?>> <?php echo $week; ?> </option>
            <?php
        }
        ?>

    </select>
    <input type="hidden" name="action" value="show_faculty_home_page" /><br>
    <input type="submit" name="submit_week" value="Select"/>
</form>