    <!-- Delete model -->
    <div id="deleteBus" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form id="modelDeleteBusForm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <input type="text" class="cs-hide" id="del_bus_num" name="del_bus_num">
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
        $("#modelDeleteBusForm").submit(function(event) {
            modelDeleteBusFun('deleteBus');
            event.preventDefault();
        });
    </script>