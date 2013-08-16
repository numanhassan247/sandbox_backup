<?php

$dbDap = null;

function &getDBConnection() {
    $dbConnection = new PDO('mysql:host=localhost;dbname=prayertab', 'prayertab', 'pl@123');
//    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConnection;
}

function executeQuery($query) {
    global $dbDap;
    if (!$dbDap) {
        $dbDap = getDBConnection();
    }
    $cmd = $dbDap->prepare($query);
    $cmd->execute();
    return $cmd->fetchAll();
}

function insertData($table, $arr) {
    global $dbDap;
    if (!$dbDap) {
        $dbDap = getDBConnection();
    }
    $query = "INSERT INTO `$table` ";
    foreach ($arr as $k => $a) {
        $names[] = $k;
        $values[] = "'" . $a . "'";
    }
    $query .= '(' . implode(',', $names) . ') VALUES (' . implode(',', $values) . ')';
    executeQuery($query);
    return $dbDap->lastInsertId();
}

function sqlSafePlease($string) {
    $string = str_replace("'", '', $string);
    return mysql_real_escape_string($string);
}

function updateData($table, $arr, $where = null) {
    global $dbDap;
    $query = "UPDATE `$table` SET ";
    $i = 1;
    foreach ($arr as $key => $a) {
        if (sizeof($arr) > $i) {
            $query .= " `$key`='$a' , ";
        } else {
            $query .= " `$key`='$a' ";
        }
        $i++;
    }
    if ($where) {
        $query.='WHERE ' . $where;
    }
    return executeQuery($query);
}

function dumper($dumper, $type = 0, $isexit = 0) {
    echo '<pre style="color:red;">';
    if ($type) {
        var_dump($dumper);
    } else {
        print_r($dumper);
    }
    echo '</pre>';
    if ($isexit) {
        exit(0);
    }
}

