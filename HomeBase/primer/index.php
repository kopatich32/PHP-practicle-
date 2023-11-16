<?php
include 'all_process.php';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;

    $record = mysqli_query($conn, "SELECT * FROM data WHERE id=$id");
    $data = mysqli_fetch_array($record);
    $name = $data['name'];
    $address = $data['address'];
    $mobile_number = $data['mobile_number'];

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Crud Operation In PHP</title>
</head>
<body>
<center>
    <?php if (isset($_SESSION['message'])):?>
        <div class="message">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <form class="form-inline" method="POST" action="all_process.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
        <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
        <input type="text" name="mobile_number" placeholder="Mobile Number" value="<?php echo $mobile_number; ?>">
        <?php if ($edit_state == false): ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php else: ?>
            <button class="btn" type="submit" name="update" >Update</button>
        <?php endif ?>

    </form>
    <table>
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM data");
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["mobile_number"]; ?></td>
                <td><a href="index.php?edit=<?php echo $row["id"]; ?>" class="edit_btn">Edit</a></td>
                <td><a href="all_process.php?delete=<?php echo $row["id"]; ?>" class="del_btn">Delete</a></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
</center>
</body>
</html>