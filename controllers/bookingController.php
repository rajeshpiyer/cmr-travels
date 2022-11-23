<?php

include_once 'dbConnection.php';


if (isset($_POST['createBooking']) && $_POST['createBooking'] == true) {
    //define data
    $booking_id = rand(10000, 99999);
    $booking_passenger_NIC = $_POST['booking_passenger_NIC'];
    $booking_seat_id = $_POST['booking_seat_id'];
    $booking_route_id = $_POST['booking_route_id'];
    $booking_date = $_POST['booking_date'];


    $sql = "INSERT INTO `booking`(`id`,`passengerNIC`, `seatId`, `routeId`, `date`) 
    VALUES ('" . $booking_id . "','" . $booking_passenger_NIC . "','" . $booking_seat_id . "','" . $booking_route_id . "','" . $booking_date . "')";

    if ($con->query($sql) === TRUE) {
        //set seat not available
        setSeatAvailability(0, $booking_seat_id, $con);
        echo json_encode(['status' => '1', 'msg' => 'Booking Created', 'bookingId' => $booking_id]);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['adminDeleteBooking']) && $_POST['adminDeleteBooking'] == true) {
    //define data
    $id = $_POST['del_booking_id'];
    $sql = "DELETE FROM booking WHERE id='" . $id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Booking Deleted']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
    
} else if (isset($_POST['adminUpdateBooking']) && $_POST['adminUpdateBooking'] == true) {
    //define data
    $up_booking_id = $_POST['up_booking_id'];
    $up_booking_passenger_NIC = $_POST['up_booking_passenger_NIC'];
    $up_booking_seat_id = $_POST['up_booking_seat_id'];
    $up_booking_route_id = $_POST['up_booking_route_id'];
    $up_booking_date = $_POST['up_booking_date'];

    $sql = "UPDATE booking SET passengerNIC='" . $up_booking_passenger_NIC . "', seatId='" . $up_booking_seat_id . "',routeId='" . $up_booking_route_id . "',date='" . $up_booking_date . "' WHERE id='" . $up_booking_id . "'";

    if ($con->query($sql) === TRUE) {
        echo json_encode(['status' => '1', 'msg' => 'Booking Updated']);
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
    $con->close();
} else if (isset($_POST['getBookingData']) && $_POST['getBookingData'] == true) {

    $id = $_POST['id'];
    $loadDataSql = "SELECT * FROM booking 
                    INNER JOIN
                    seat ON booking.seatId = seat.seatId
                    INNER JOIN
                    route ON booking.routeId = route.routeId
                    INNER JOIN passenger
                    ON booking.passengerNIC = passenger.nic 
                    WHERE id='" . $id . "';";

    $loadDataResult = $con->query($loadDataSql);
    if ($loadDataResult->num_rows > 0) {
        // output data of each row
        while ($loadDataRow = $loadDataResult->fetch_assoc()) {

            $busNumber = $loadDataRow["busNumber"];

            $bookingId = $loadDataRow["id"];
            $routeFrom = $loadDataRow["routeFrom"];
            $routeTo = $loadDataRow["routeTo"];
            $seatPrice = $loadDataRow["seatPrice"];
        }


        $loadBusDataSql = "SELECT * FROM bus WHERE busNumber='" . $busNumber . "'";
        $loadBusDataResult = $con->query($loadBusDataSql);
        if ($loadBusDataResult->num_rows > 0) {
            // output data of each row
            while ($loadBusDataRow = $loadBusDataResult->fetch_assoc()) {

                $busName = $loadBusDataRow["busName"];
                $departureTime = $loadBusDataRow["departureTime"];

                $newDTime = date('h:i a', strtotime($departureTime));
            }

            $data = '{
                "id": ' . $bookingId . ',
                "routeFrom": "' . $routeFrom . '",
                "routeTo": "' . $routeTo . '",
                "seatPrice": ' . $seatPrice . ',
                "busName": "' . $busName . '",
                "busNumber": "' . $busNumber . '",
                "departureTime": "' . $newDTime . '"
            }';

            echo json_encode(['status' => '1', 'msg' => 'Buses Found.', 'bookingData' => $data]);
        } else {
            echo json_encode(['status' => '0', 'msg' => 'Cannot Find Selected bus.']);
        }
    } else {
        echo json_encode(['status' => '0', 'msg' => 'Cannot find values.']);
    }
} else if (isset($_POST['onSelectLoadItems']) && $_POST['onSelectLoadItems'] == true) {
    //define data
    $curElementVal = $_POST['curElementVal'];
    $nxtElementID = $_POST['nxtElementID'];
    $data = '';

    if ($nxtElementID == "booking_bus") {
        $loadDataSql = "SELECT * FROM bus WHERE busRouteId='" . $curElementVal . "'";
        $loadDataResult = $con->query($loadDataSql);
        if ($loadDataResult->num_rows > 0) {
            // output data of each row
            while ($loadDataRow = $loadDataResult->fetch_assoc()) {

                $busNumber = $loadDataRow["busNumber"];
                $busName = $loadDataRow["busName"];
                $departureTime = $loadDataRow["departureTime"];
                $arrivalTime = $loadDataRow["arrivalTime"];
                $busType = $loadDataRow["busType"];

                $newDTime = date('h:i a', strtotime($departureTime));
                $newATime = date('h:i a', strtotime($arrivalTime));

                $data = $data . "<option value='" . $busNumber . "'>" . $busName . " (" . $newDTime . " - " . $newATime . ") | " . $busType . "</option>";
            }
            echo json_encode(['status' => '1', 'msg' => 'Buses Found.', 'data' => $data]);
        } else {
            echo json_encode(['status' => '0', 'msg' => 'Buses Not Available']);
        }
    } else if ($nxtElementID == "booking_seat_id") {

        $loadDataSql = "SELECT * FROM seat WHERE seatAvailability=1 AND busNumber='" . $curElementVal . "'";
        $loadDataResult = $con->query($loadDataSql);
        if ($loadDataResult->num_rows > 0) {
            // output data of each row
            while ($loadDataRow = $loadDataResult->fetch_assoc()) {

                $seatId = $loadDataRow["seatId"];
                $seatNumber = $loadDataRow["seatNumber"];
                $seatType = $loadDataRow["seatType"];
                $seatPrice = $loadDataRow["seatPrice"];
                $data = $data . "<option value='" . $seatId . "'>" . $seatNumber . " (" . $seatType . ") | Rs " . $seatPrice . ".00 /=</option>";
            }
            echo json_encode(['status' => '1', 'msg' => 'Seats Found.', 'data' => $data]);
        } else {
            echo json_encode(['status' => '0', 'msg' => 'Seats Not Available']);
        }
    } else {
        echo json_encode(['status' => '0', 'msg' => 'Check Element ID.']);
    }

    $con->close();
} else {
    echo json_encode(['status' => '0', 'msg' => 'executed outside']);
}

function setSeatAvailability($seatState, $seatId, $con)
{
    $sql2 = "UPDATE seat SET seatAvailability='" . $seatState . "' WHERE seatId='" . $seatId . "'";

    if ($con->query($sql2) === TRUE) {
    } else {
        echo json_encode(['status' => '0', 'msg' => $con->error]);
    }
}
