    <!-- Edit model -->
    <div class="modal fade" id="editPassenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="card stacked-form">
                <div class="card-header">
                    <h4 class="card-title" style="margin-left: 9rem; margin-top: 1rem">
                        Edit Information
                    </h4>
                </div>
                <div class="card-body">
                    <form id="updatePassengerForm">
                        <div class="form-group">
                            <!-- set hidden values -->
                            <input type="text" class="form-control cs-hide" id="up_passenger_currentNIC" name="up_passenger_currentNIC">

                            <label>First Name</label>
                            <input type="text" placeholder="Enter First Namer" class="form-control" id="up_passenger_fname" name="up_passenger_fname" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" placeholder="Enter Last Namer" class="form-control" id="up_passenger_lname" name="up_passenger_lname" required>
                        </div>
                        <div class="form-group">
                            <label>NIC</label>
                            <input type="text" placeholder="Enter NIC" class="form-control" id="up_passenger_nic" name="up_passenger_nic" required>
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="text" placeholder="Enter Phone number" class="form-control" id="up_passenger_phone" name="up_passenger_phone" required>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="up_passenger_gender" name="up_passenger_gender">
                                <option selected hidden>Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="Enter Email" class="form-control" id="up_passenger_email" name="up_passenger_email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" class="form-control" id="up_passenger_password" name="up_passenger_password" required>
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
        $("#updatePassengerForm").submit(function(event) {
            updatePassengerFun('editPassenger');
            event.preventDefault();
        });

        function SetPassengerUpdateVal(nic, fname, lname, phone, email) {
            document.getElementById("up_passenger_currentNIC").value = nic;
            document.getElementById("up_passenger_nic").value = nic;
            document.getElementById("up_passenger_fname").value = fname;
            document.getElementById("up_passenger_lname").value = lname;
            document.getElementById("up_passenger_phone").value = phone;
            document.getElementById("up_passenger_email").value = email;
        }
    </script>