    <!-- Delete model -->
    <div id="deleteBooking" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form id="deleteBookingForm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <input type="text" class="cs-hide" name="del_booking_id" id="del_booking_id" value="<?= $bookingId ?>">
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Do you really want to delete these record? Please note This
                            process cannot be undone.
                        </p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger mr-2">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- model end -->
    <script>
        $("#deleteBookingForm").submit(function(event) {
            deleteBookingFun('deleteBooking');
            event.preventDefault();
        });
    </script>