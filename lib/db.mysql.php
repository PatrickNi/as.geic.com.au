<?php

function open_connect($host = FRONTEND_DB_HOST, $name = FRONTEND_DB_NAME,$user = FRONTEND_DB_USER, $pass = FRONTEND_DB_PASS) {
    global $CONN;
    $CONN = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($CONN, 'set names latin1');
    return $CONN;
}

function close_connect() {
    global $CONN;
    return mysqli_close($CONN);
}

function get_error() {
    global $CONN;
    return mysqli_error($CONN);
}

function send_query($sql) {
    if ($sql == '')
        return false;

	global $CONN;
    if ($CONN == '')
        $CONN = open_connect();

    $res = mysqli_query($CONN,$sql);
    if (stripos($sql, 'insert') === 0)
        return mysqli_insert_id($CONN);
    else
        return $res;
}

function fetch_row($res, $key = '') {
    $rtn = mysqli_fetch_assoc($res);
    if ($key != '')
        return $rtn[$key];
    else
        return $rtn;
}

