<?php 
include('../header.php');
require '../config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">User List</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Join Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch all users from the database
                        $query = "SELECT * FROM users ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $query);
                        
                        if (mysqli_num_rows($result) > 0) {
                            $counter = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Determine the badge color based on user role
                                $roleBadgeColor = '';
                                switch(strtolower($row['role'])) {
                                    case 'admin':
                                        $roleBadgeColor = 'bg-danger';
                                        break;
                                    case 'landlord':
                                        $roleBadgeColor = 'bg-success';
                                        break;
                                    default:
                                        $roleBadgeColor = 'bg-primary';
                                        break;
                                }

                                // Determine status badge color
                                $statusBadgeColor = $row['status'] == 'active' ? 'bg-success' : 'bg-secondary';
                        ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td>
                                        <span class="badge <?php echo $roleBadgeColor; ?>">
                                            <?php echo ucfirst(htmlspecialchars($row['role'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php 
                                        $date = new DateTime($row['created_at']);
                                        echo $date->format('M d, Y'); 
                                        ?>
                                    </td>
                                    <td>
                                        <span class="badge <?php echo $statusBadgeColor; ?>">
                                            <?php echo ucfirst(htmlspecialchars($row['status'])); ?>
                                        </span>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="6" class="text-center">No users found</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table {
        background-color: #1e1e1e;
        color: #ffffff;
    }
    
    .table-dark th {
        background-color: #343a40;
    }
    
    .badge {
        font-size: 0.9em;
        padding: 0.5em 0.75em;
    }
</style>

<?php include('../footer.php'); ?>