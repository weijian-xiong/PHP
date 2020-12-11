<h1> --> Attendance Page <-- </h1>
<p> Attendance for week <?php echo $_SESSION['weekNo']; ?>:</p>

<table border="1"> 
    <tr> 
        <th>StudentID</th>  
        <th>First Name</th>  
        <th>Last Name</th> 
        <th>Attendance</th>
        <th>Update</th>
        <th>Delete</th>
    </tr> 
    <?php
    if ($attList) {
        foreach ($attList as $stuAtt) :
            ?>

            <tr>
            <form method="POST" action="index.php" >
                <td><?php echo $stuAtt->studentID ?></td>
                <td><input type="text" name="firstName" value='<?php echo $stuAtt->firstName; ?>'/></td>
                <td><input type='text' name="lastName" value='<?php echo $stuAtt->lastName; ?>'/></td>
                <td>
                    <select name='att_val'>
                        <option value=""  <?php if (empty($stuAtt->atten)) {
            echo 'selected';
        } ?>> -- Select -- </option>
                        <option value="A" <?php if ($stuAtt->atten == 'A') {
            echo 'selected';
        } ?>> A - Absent </option>
                        <option value="P" <?php if ($stuAtt->atten == 'P') {
            echo 'selected';
        } ?>> P - Present </option>
                        <option value="E" <?php if ($stuAtt->atten == 'E') {
            echo 'selected';
        } ?>> E - Leaving early </option>
                        <option value="L" <?php if ($stuAtt->atten == 'L') {
            echo 'selected';
        } ?>> L - Came Late </option>
                    </select>
                </td>
                <td>
                    <input type ="hidden" name="att_insert" value="<?php if (empty($stuAtt->atten)) {
            echo "1";
        } else {
            echo "0";
        } ?>"/>
                    <input type="hidden" name="action" value="save_attendance_page" />
                    <input type="hidden" name="studentID" value="<?php echo $stuAtt->studentID; ?>">
                    <input type="submit" name="stu_att" value="update"/>
                </td>
                <td>
                    <input type ="hidden" name="att_insert" value="<?php if (empty($stuAtt->atten)) {
            echo "1";
        } else {
            echo "0";
        } ?>"/>
                    <input type="hidden" name="action" value="save_attendance_page" />
                    <input type="hidden" name="studentID" value="<?php echo $stuAtt->studentID; ?>">
                    <input type="submit" name="stu_att" value="delete"/>
                </td>
            </form>
        </tr>
    <?php endforeach;
} ?>
<form method="POST" action="index.php" >
    <tr>
        <td> NEW </td>
        <td> <input type="text" name="newfirstName" value="<?php if (!empty($newfirstName)) {
    echo $newfirstName;
} ?>"/></td>
        <td> <input type="text" name="newlastName"  value="<?php if (!empty($newlastName)) {
    echo $newlastName;
} ?>"/></td>
        <td>
            <select name="new_att_val">
                <option value=""  <?php if (empty($newAtten)) {
    echo 'selected';
} ?>> -- Select -- </option>
                <option value="A" <?php if ($newAtten == 'A') {
    echo 'selected';
} ?>> A - Absent </option>
                <option value="P" <?php if ($newAtten == 'P') {
    echo 'selected';
} ?>> P - Present </option>
                <option value="E" <?php if ($newAtten == 'E') {
    echo 'selected';
} ?>> E - Leaving early </option>
                <option value="L" <?php if ($newAtten == 'L') {
    echo 'selected';
} ?>> L - Came Late </option>
            </select>
        </td>
        <td colspan="2" align="center">
            <input type ="hidden" name="action" value="save_attendance_page"/>
            <input type ="submit" name="stu_att" value="add" />
        </td>

    </tr>
</form>
</table>
</form>
<?php
if (!empty($error_msg)) {
    echo "<br> $error_msg";
} else if (!empty($stu_status) || !empty($att_status)) {
    echo "<br>$stu_status";
    echo "<br>$att_status";
}
?>
    
