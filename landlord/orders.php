<!--header-->

<?php
require '../config.php';
include('../header.php');



if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $hasError = false;
} ?>


<!--body-->
<style>
    a {
        color: #17a2b8;
        text-decoration: none;
    }

    a:hover {
        color: #138496;
        text-decoration: underline;
    }

    .table {
        background-color: #1e1e1e;
        color: #ffffff;
    }

    .table-dark th {
        background-color: #343a40;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .modal-content {
        background-color: #1e1e1e;
        color: #ffffff;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-footer {
        border-top: none;
    }
</style>
<div class="row">

    <div class="row">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Time</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($hasError) {
                    $sql = "SELECT u.username, u.email, u.phone, o.reservation_date, o.status, o.order_id
    FROM `user` u
    JOIN rent r ON u.user_id = r.landlord_id
    JOIN ordertable o ON r.accommodation_id = o.accommodation_id
    WHERE r.landlord_id = $userId";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['reservation_date']; ?>
                            </td>
                            <td>
                                <?php echo $row['username']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                            <td>
                                <form action="orderLink.php?id=<?php echo $row['order_id']; ?>" method="post">
                                    <button type="submit" class="btn btn-primary" onclick="return confirmChoice();">
                                        <?php echo $row['status']; ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to accept this reservation?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function confirmChoice() {
        $('#confirmModal').modal('show');
        return false;
    }
</script>
</div>
<!--your main content end-->
<!--footer--><?php
include('../footer.php');
?>
