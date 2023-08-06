<?php
// connect form to database
$msg   = '';
$list  = [];
$clean = [];
$output = '';
// database connection
try {
    include __DIR__ . '/Connect.php';
    $db = new Connect();
    if (!empty($_POST)) {
        // sanitize incoming data
        $clean = [];
        foreach ($_POST as $key => $value)
            $clean[$key] = strip_tags($value ?? '');
        // add form data to database
        $db->put($clean);
    }
    // produce output
    $list = $db->get();
} catch (Throwable $t) {
    error_log(__FILE__ . ':' . $t->getMessage());
    $msg = 'ERROR: unable to connect to the database';
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
You Entered This:&nbsp;
<pre><?= implode(' : ', $clean); ?></pre>
<?php endif; ?>
<?php if (!empty($list)) : ?>
<hr />
<table>
<tr><th>First</th><th>Last</th><th>DOB</th></tr>
<?php foreach ($list as $row) : ?>
    <tr><td>
    <?= implode ('</td><td>', array_values($row)); ?>
    </td></tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
<?php if (!empty($msg)) echo $msg; ?>
