<?php

include_once 'dbConnection.php';


if (isset($_POST['createBus']) && $_POST['createBus'] == true) {
    //define data
    $busNumber = $_POST['input_bus_number'];
    $busName = $_POST['input_bus_name'];
    $busDeparture = $_POST['input_dep_time'];
    $busArrival = $_POST['input_ari_time'];
    $busRouteId = $_POST['input_route_id'];
    $busType = $_POST['input_bus_type'];


    $sql = "INSERT INTO bus (busNumber, busName, departureTime, arrivalTime, busRouteId, busType) 
    VALUES ('" . $busNumber . "','" . $busName . "','" . $busDeparture . "','" . $busArrival . "','" . $busRouteId . "','" . $busType . "')";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Created']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['deleteBus']) && $_POST['deleteBus'] == true) {
    //define data
    $busNumber = $_POST['del_bus_num'];

    $sql = "DELETE FROM bus WHERE busNumber='" . $busNumber . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Deleted']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['updateBus']) && $_POST['updateBus'] == true) {
    //define data
    $busNumber = $_POST['up_bus_num'];
    $busName = $_POST['up_bus_name'];
    $busDeparture = $_POST['up_dep_time'];
    $busArrival = $_POST['up_ari_time'];
    $busRouteId = $_POST['up_route_id'];
    $busType = $_POST['up_bus_type'];

    $sql = "UPDATE bus SET busName='" . $busName . "',departureTime='" . $busDeparture . "',arrivalTime='" . $busArrival . "',busRouteId='" . $busRouteId . "', busType='" . $busType . "' WHERE busNumber='" . $busNumber . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}
