<?php

include_once 'dbConnection.php';


if (isset($_POST['adminCreateRoute']) && $_POST['adminCreateRoute'] == true) {
    //define data
    $route_to = $_POST['route_to'];
    $route_from = $_POST['route_from'];

    $sql = "INSERT INTO `route`(`routeFrom`, `routeTo`) 
    VALUES ('" . $route_from . "','" . $route_to . "')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Route Created']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminDeleteRoute']) && $_POST['adminDeleteRoute'] == true) {
    //define data
    $id = $_POST['del_route_id'];

    $sql = "DELETE FROM route WHERE routeId='" . $id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Route Deleted']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminUpdateRoute']) && $_POST['adminUpdateRoute'] == true) {
    //define data
    $route_id = $_POST['up_route_id'];
    $route_to = $_POST['up_route_to'];
    $route_from = $_POST['up_route_from'];


    $sql = "UPDATE route SET routeFrom='" . $route_from . "', routeTo='" . $route_to . "' WHERE routeId='" . $route_id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Route Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}
