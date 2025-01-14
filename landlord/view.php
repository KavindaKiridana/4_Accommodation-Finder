<!--header-->
<?php include ('../header.php');
require '../config.php';
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    //echo "<script>alert('An error occurred while session');</script>";
    //JS code for event handler
    $hasError = false;
}
?>
<style>
    .table {
        background-color: #1e1e1e;
        color: #ffffff;
    }

    .table-dark th {
        background-color: #343a40;
    }

    .button {
        color: #ffffff;
    }

    .button:hover {
        color: #ffffff;
    }


    @media (max-width: 576px) {
        .button {
            margin-top: 10px;
        }
    }
</style>
<div class="row">

    <table class="table table-bordered table-responsive">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Details</th>
                <th>Address</th>
                <th>Approve</th>
                <th>Images</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($hasError) {
                $x = 1;
                $row1s = mysqli_query($conn, "select * from rent where landlord_id='$user_id'");
                foreach ($row1s as $row1) { ?>
                    <tr>
                        <td>
                            <?php echo $x; ?>
                        </td>
                        <td>
                            <?php echo $row1['title']; ?>
                        </td>
                        <td>
                            <?php echo $row1['description']; ?>
                        </td>
                        <td>
                            <?php echo $row1['address']; ?>
                        </td>
                        <td>
                            <?php echo $row1['approve']; ?>
                        </td>
                        <td class="d-flex flex-wrap">
                            <?php
                            $accommodation_id = $row1['accommodation_id'];
                            $row2s = mysqli_query($conn, "select * from img where accommodation_id='$accommodation_id'");
                            foreach ($row2s as $row2) { ?>
                                <img src="img/<?php echo $row2['img']; ?>" style="max-width: 100px; margin: 5px;"
                                    alt="Accommodation Image">
                            <?php } ?>
                        </td>
                        <td>
                            <form action="delete.php?id=<?php echo $row1['accommodation_id']; ?>" method="post">
                                <input type="submit" class="btn btn-danger" name="submit" value="Delete Record"
                                    onclick="return confirmChoice();">
                            </form>
                        </td>
                    </tr>
                    <?php
                    $x++;
                }
            }
            ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmChoice() {
            var confirmation = confirm("Do you want to delete this record :");
            if (confirmation) {
                return true;
            }
            else {
                return false;
            }
        }
    </script>
</div>
<!--your main content end-->
<!--footer--><?php
include ('../footer.php');
?>