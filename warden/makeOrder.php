<!--header-->
<?php
require '../config.php';
$hasError = true;
include('../header.php');



if (isset($_GET["accommodation_id"])) {
    $rentId = $_GET["accommodation_id"];
} else {
    $hasError = false;
}
?>
<style>
    h3 {
        color: #17a2b8;
        margin-bottom: 20px;
        /* Add spacing for better readability */
    }
</style>
<script>
    //js for save button
    function confirmChoice() {
        var confirmation = confirm("Please confirm your choice:");
        if (confirmation) {
            return true;
        }
        else {
            return false;
        }
    }
</script>

<br>
<?php
if ($hasError) {
    $query = "SELECT title, description, address, approve 
        FROM rent 
        WHERE accommodation_id = '$rentId' 
        AND (approve='approved' OR approve='pending')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="container"><br><br>
            <div class="row">
                <div class="col-md-6">
                    <h3>Title:
                        <?php echo $row['title']; ?>
                    </h3>
                    <p style="color: black;">Description:
                        <?php echo $row['description']; ?>
                        <br>
                        Address:
                        <?php echo $row['address']; ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <form action="reserve.php?id=<?php echo $rentId ?>" method="post">
                        <select name="approve" placeholder="select your choice"><br>
                            <option value="approved">approved</option>
                            <option value="rejected">rejected</option>
                        </select><br>
                        <input class="btn btn-primary" type="submit" name="submit" value="save"
                            onclick="return confirmChoice();">
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-4">
            <div class="row">
                <?php
                $sql = "SELECT * FROM img WHERE accommodation_id='$rentId'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-3">
                        <img src="../landlord/img/<?php echo $row['img']; ?>" class="img-fluid" style="margin-bottom: 10px;">
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
} else {
    echo "An error occurred";
}
?>





<!--footer-->
<?php
include('../footer.php');
?>
