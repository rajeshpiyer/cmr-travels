    <!-- Edit model -->
    <div class="modal fade" id="editSeat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Edit Information
                    </h4>
                </div>
                <div class="card-body">
                    <form id="updateSeatForm">
                        <input type="text" class="cs-hide" id="up_seat_id" name="up_seat_id">
                        <div class="form-group">
                            <label>seat Number</label>
                            <input type="text" placeholder="Enter Seat Number" class="form-control" id="up_seat_number" name="up_seat_number" required>
                        </div>
                        <div class="form-group">
                            <label>Seat Type</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_seat_type" name="up_seat_type">
                                <option selected hidden>Select Seat Type</option>
                                <option value="window">Window</option>
                                <option value="non window">Non window</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Bus Number</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_seat_bus_number" name="up_seat_bus_number">
                                <option selected hidden>Select Bus Number</option>
                                <?php
                                include_once '../../controllers/dbConnection.php';
                                $loadDataSql = "SELECT * FROM bus";
                                $loadDataResult = $con->query($loadDataSql);
                                if ($loadDataResult->num_rows > 0) {
                                    // output data of each row
                                    while ($loadDataRow = $loadDataResult->fetch_assoc()) {
                                        echo '
                                            <option value="' . $loadDataRow["busNumber"] . '">' . $loadDataRow["busNumber"] . '</option>
                                        ';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-success float-right">
                            Update Now
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
        $("#updateSeatForm").submit(function(event) {
            updateSeatFun('editSeat');
            event.preventDefault();
        });

        function SetSeatUpdateVal(id, number, type, bus_number) {
            document.getElementById("up_seat_id").value = id;
            document.getElementById("up_seat_number").value = number;
            document.getElementById("up_seat_type").value = type;
            document.getElementById("up_seat_bus_number").value = bus_number;
        }
    </script>