<?php
require_once("include/header.php");
$users = $pm->fetchResult("SELECT * FROM `users`");
if ($_SESSION['user']['type'] != "1") {
    header("Location:login.php");
}
?>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#userModal">Create User</button>
    </div>
    <div class="col-md-6 col-md-offset-3" style="margin-top:15px;">
        <table class="table table-condensed table-bordered" id="userTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th class="nosort"></th>
                    <th class="nosort"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td>
                            <select class="form-control input-sm editType" data-id="<?= $user['id']; ?>">
                                <option value="1" <?= $user['type'] == "1" ? "selected" : ""; ?>>Admin</option>
                                <option value="0" <?= $user['type'] == "0" ? "selected" : ""; ?>>User</option>
                            </select>
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="editUser" data-id="<?= $user['id']; ?>" title="Edit">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="deleteUser" data-id="<?= $user['id']; ?>" title="Delete">
                                <i class="glyphicon glyphicon-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->

<!-- Modal -->
<div id="userModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modalTitle">Create User</h4>
            </div>
            <form id="userForm" class="userForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" class="form-control input-sm" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">Username:</label>
                        <input type="text" class="form-control input-sm" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password:</label>
                        <input type="password" class="form-control input-sm" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Conform Password:</label>
                        <input type="password" class="form-control input-sm" id="conformPassword" name="conform_password" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" id="action" name="action" value="createUser"/>
                    <input type="hidden" id="userId" name="userId" value=""/>
                    <button type="submit" class="btn btn-primary btn-sm" id="userFormButton" data-loading-text="<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Create">Create</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div id="userDeleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modalTitle">Delete User</h4>
            </div>
            <form id="deleteUserForm" class="deleteUserForm">
                <div class="modal-body">
                    Are you sure want to delete the user?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="action" name="action" value="deleteUser"/>
                    <input type="hidden" id="deleteUserId" name="deleteUserId" value=""/>
                    <input type="hidden" id="currentUserId" name="currentUserId" value="<?= $_SESSION['user']['id']; ?>"/>
                    <button type="submit" class="btn btn-danger btn-sm" id="deleteUserFormButton" data-loading-text="<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Create">Delete</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php require_once("include/footer.php"); ?>