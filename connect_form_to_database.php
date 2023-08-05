<?php
// connect form to database
$clean = [];
$output = '';
// database connection
try {
    include __DIR__ . '/connect_to_database.php';
    $db = new Connect();
    if (!empty($_POST)) {
        // sanitize incoming data
        $clean = [];
        foreach ($_POST as $key => $value)
            $clean[$key] = strip_tags($value ?? '');
        // add form data to database
        $db->put($clean);
    }
} catch (Throwable $t) {
    error_log(__FILE__ . ':' . $t->getMessage());
    $output = 'ERROR: unable to connect to the database';
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
