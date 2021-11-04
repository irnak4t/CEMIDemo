<?php

try {
    /** @var PDO $pdo */
    $pdo = require __DIR__ . '/../pdo.php';
    $sql = 'SELECT * FROM test_tbl';
    $sth = $pdo->query($sql);
    $data = $sth->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename=cemi.csv');
    header('Content-Transfer-Encoding: binary');


    $fp = fopen('php://output', 'w');
    foreach ($data as $i => $row) {
        fputcsv($fp, $row, ",", '"');
    }
    fclose($fp);

    exit;
} catch (PDOException $e) {
    print($e->getMessage());
}
