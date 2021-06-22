<?php
    include 'configs.php';

    $ID = htmlentities($_GET['ID']);

    $sql = 'SELECT * FROM watcher_list WHERE ID=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $ID);

    $stmt->execute();
    $result = $stmt->get_result();

    $user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit user</title>
</head>
<body>
    <form action="actions.php?act=editUser" method="POST">
        <input type="hidden" name="ID" value="<?php echo $ID ?>">
        <br>
        <label>
            User name:
            <input type="text" name="name" value="<?php echo $user['name'] ?>">
        </label>
        <br>
        <label>
            Email:
            <input type="email" name="email" value="<?php echo $user['email'] ?>">
        </label>
        <br>
        <label>
            Amount of money in wallet:
            <input type="number" name="notWallet" step="0.01" value="<?php echo $user['notWallet'] ?>">
        </label>
        <br>
        <label>
            Payment System:
            <select name="paySys" required>
                <option></option>
                <option value="card" <?php if($user['paySys'] == 'card') echo 'selected'?>>Credit card tranfer</option>
                <option value="paypal" <?php if($user['paySys'] == 'paypal') echo 'selected'?>>Paypal</option>
                <option value="code" <?= $user['paySys'] == 'code'?'selected':'' ?>>Multibanco refference</option>
            </select>
        </label>
        <br>
        <a href="watcher_list.php">Cancelar</a>
        <input type="submit" value="Edit user">
    </form>

    
</body>
</html>