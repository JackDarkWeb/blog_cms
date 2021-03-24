<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route_name("manage-users.store") }}" id="UserForm">

                @csrf

                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" required>
                        <span style="font-style: normal; color: red" class="error-name"></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" required>
                        <span style="font-style: normal; color: red" class="error-email"></span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address" required></textarea>
                        <span style="font-style: normal; color: red" class="error-address"></span>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" required>
                        <span style="font-style: normal; color: red" class="error-phone"></span>
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control select2" style="width: 100%;">
                            <option value="1" selected="selected">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
