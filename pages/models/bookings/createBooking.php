    <!-- Create model -->
    <div class="modal fade" id="createBooking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Create New Booking
                    </h4>
                </div>
                <div class="card-body">
                    <form id="createBookingForm">
                        <div class="form-group">
                            <label>Passenger Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_passenger_NIC" name="booking_passenger_NIC">
                                <option selected hidden>Select Passenger Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM passenger";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                            <option value="' . $loadDataRow["nic"] . '">' . $loadDataRow["fname"] . ' ' . $loadDataRow["lname"] . '</option>
                                        ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seat Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_seat_id" name="booking_seat_id">
                                <option selected hidden>Select Seat Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM seat";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                            <option value="' . $loadDataRow["seatId"] . '">' . $loadDataRow["seatNumber"] . '</option>
                                        ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Route Id</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="booking_route_id" name="booking_route_id">
                                <option selected hidden>Select Route Id</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM route";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                            <option value="' . $loadDataRow["routeId"] . '">' . $loadDataRow["routeFrom"] . ' - ' . $loadDataRow["routeTo"] . '</option>
                                        ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Booking Date</label>
                            <input type="text" class="form-control datepicker" placeholder="Select Date" id="booking_date" name="booking_date">
                        </div>
                        <button type="submit" class="btn btn-fill btn-success float-right">
                            Create Now
                        </button>
                        <button class="btn btn-fill btn-danger float-right mr-2" data-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- model end -->
    <script>
        $("#createBookingForm").submit(function(event) {
            cerateBookingFun('createBooking');
            event.preventDefault();
        });
    </script>