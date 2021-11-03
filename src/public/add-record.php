<?php

$string = filter_input(INPUT_POST, 'string');
$message = '';
if (validate($string)) {
    try {
        $message = addRecord($string) ?
                 '<strong style="color: #90ee90">Save string successfully.</strong></br>':
                 '<strong style="color: #dc143c">Data save failed.</strong></br>';
    } catch (\PDOException $e) {
        var_dump($e->getMessage());
        $message = '<strong style="color: #dc143c">Database connection error.</strong></br>';
    }
} elseif (is_null($string)) {
    // Skip when HTTP request is GET.
} else {
    $message = '<strong style="color: #dc143c">Validation error.</strong></br>';
}

function addRecord($string) {
    $pdo = require __DIR__ . '/../pdo.php';
    $sql = 'INSERT INTO test_tbl VALUES(null, ?)';

    $sth = $pdo->prepare($sql);
    return $sth->execute([$string]);
}

function validate($string) {
    return !empty($string) && mb_check_encoding($string, 'UTF-8') && mb_strlen($string, 'UTF-8');
}

?>
<html>
    <body>
    <?= $message ?>
    <form action="add-record.php" method="POST">
    <label for="string">Some string to save in database</label>
    <input type="text" name="string" maxlength="255" size="20">
    <input type="submit" value="Add record">
    </form>
    <p>For Excel Macro: <code>=cmd|' /C calc'!A0</code></p>
    <p>For Google Spreadsheet: <code>=IMPORTXML("https://en.wikipedia.org/wiki/Moon_landing", "//a/@href", "en_US")</code></p>
        <a href='/'>back to top</a>
    </body>
    </html>
