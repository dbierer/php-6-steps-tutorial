<?php
// loops and control structures
$clean = [];
if (!empty($_POST)) {
    // sanitize incoming data
    $clean = [];
    foreach ($_POST as $key => $value)
        $clean[$key] = strip_tags($value ?? '');
}
?>
<h1>New User Info</h1>
<form method="post">
First Name:&nbsp;<input type="text" name="first_name" /><br />
Last Name:&nbsp;&nbsp;<input type="text" name="last_name" /><br />
Birth Date:&nbsp;<input type="date" name="dob" /><br />
<input type="submit" />
</form>
<?php if (!empty($clean)) : ?>
<hr />
<h1>You Entered This:</h1>
<?= implode(':', $clean); ?>
<?php endif; ?>
