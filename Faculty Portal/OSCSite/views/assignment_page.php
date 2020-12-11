<h1> --> Assignment Page <-- </h1>
<p>  Assignment for week <?php echo $_SESSION['weekNo']; ?></p>

<form method="POST" action="index.php">
    <p>
        Assignment question: <br>
        <textarea name="question" rows="15" cols="100"><?php
            if ($assign_exist && (empty($assign_error))) {
                echo $assignment->question;
            } else if (!empty($question)) {
                echo $question;
            }
            ?></textarea>
        <br>
    <p> 
        Total Marks: 
        <input type ="text" name="marks" value='<?php
        if ($assign_exist && empty($assign_error)) {
            echo $assignment->total_mark;
        } else if (!empty($total_marks)) {
            echo $total_marks;
        }
        ?>' />
        <br><br>
        Due Date: 
        <input type="date" name="due_date" value='<?php
        if (!empty($assignment) && empty($assign_error)) {
            echo $assignment->due_data;
        } else if (!empty($due_date)) {
            echo $due_date;
        }
        ?>'/>

    </p >
    <br><br>
    <input type="hidden" name="assign_exist" value="<?php echo $assign_exist ?>"/>
    <input type="hidden" name="action" value="save_assignment_page"/>
    <input type="submit" name="save_assignment" value="Submit"/>
    <?php
    if (!empty($assign_error)) {
        echo "<br> $assign_error";
    } else if (!empty($insertCount)) {
        echo "<br> $insertCount";
    }
    ?>
</form>

