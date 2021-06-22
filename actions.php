<?php
session_start();
include 'configs.php'; //inclur configurações

$act = $_GET['act']; //act a tomar em consideração

//valid login admin
if ($act == 'login') {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $sql = 'SELECT count(*) as total, `name`, ID FROM not_admin WHERE email=? AND `password`=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();
    $login = $result->fetch_assoc();

    if ($login['total'] != 0) {
        $_SESSION['login'] = true;
        $_SESSION['ID'] = $login['ID'];
        $_SESSION['name'] = $login['name'];

        $rep = array(
            'status' => 'OK',
            'msg' => 'Login is sucessfull!'
        );
        echo json_encode($rep);
    } else {
        $rep = array(
            'status' => 'ERR',
            'msg' => 'Login wrong, please try again!'
        );
        echo json_encode($rep);
    }
    exit;
} else if ($act == 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}
//valid login of user
if ($act == 'loginUser') {
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $sql = 'SELECT count(*) as total, `name`, ID FROM watcher_list WHERE email=? AND `password`=?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $password);

    $stmt->execute();
    $result = $stmt->get_result();
    $login = $result->fetch_assoc();

    if ($login['total'] != 0) {
        $_SESSION['loginUser'] = true;
        $_SESSION['ID'] = $login['ID'];
        $_SESSION['name'] = $login['name'];

        $rep = array(
            'status' => 'OK',
            'msg' => 'Login is sucessfull!'
        );
        echo json_encode($rep);
    } else {
        $rep = array(
            'status' => 'ERR',
            'msg' => 'Login wrong, please try again!'
        );
        echo json_encode($rep);
    }
    exit;
} else if ($act == 'logoutUser') {
    session_destroy();
    header('Location: index.php');
    exit;
}
//Eliminar utilizador baseado no parametro "ACT"
else if ($act == 'deleteUser') {
    if (!$_SESSION['login'])
        exit;

    $ID = htmlentities($_GET['ID']); // buscar ID enviado por GET

    $sql = "DELETE FROM watcher_list WHERE ID=?"; //colocar "?" nos locais a prevenir o SQL injection
    $stmt = $conn->prepare($sql); //preparar a query como Statement ("Declaração")
    $stmt->bind_param('i', $ID); // Atribuir os dados aos "?" que foram criados na query --> i = inteiros, d = double, s = strings

    if ($stmt->execute() && $conn->affected_rows != 0) //executar o pedido à base de dados e analisar se a Query surtiu efeito
        //echo 'Eliminado com sucesso';
        header('Location: watcher_list.php?msg=deleteUserOk');
    else
        header('Location: watcher_list.php?msg=deleteUserErr');
    //echo 'Erro ao elminar o registo!';

    $stmt->close(); //encerrar o Statement
    $conn->close(); //Encerrar a ligação com a base de dados

    exit;
}
//Register new user
else if ($act == 'registerUser') {
    $nameIn = htmlentities($_POST['name']);
    $emailIn =  htmlentities($_POST['email']);
    $passwordIn = sha1($_POST['password']); //password encripted em SHA1
    $notWalletIn = htmlentities($_POST['notWallet']);
    $paySysIn = htmlentities($_POST['paySys']);


    $sql = "INSERT INTO watcher_list (name, email, password, notWallet, paySys) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssds', $nameIn, $emailIn, $passwordIn, $notWalletIn, $paySysIn);

    if ($stmt->execute() && $conn->affected_rows != 0) //executar o pedido à base de dados e analisar se a Query surtiu efeito
        echo 'Registered - success';
    else
        echo 'Error registering!';

    $stmt->close(); //encerrar o Statement
    $conn->close(); //Encerrar a ligação com a base de dados

    exit;
}
//editar utilizador
else if ($act == 'editUser') {
    $nameIn = htmlentities($_POST['name']);
    $emailIn =  htmlentities($_POST['email']);
    $notWalletIn = htmlentities($_POST['notWallet']);
    $paySysIn = htmlentities($_POST['paySys']);
    $IDin = $_POST['ID'];

    $sql = 'UPDATE watcher_list SET `name`=?, email=?, notWallet=?, paySys=?  WHERE ID = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssdsi', $nameIn, $emailIn, $notWalletIn, $paySysIn, $IDin);

    if ($stmt->execute())
        if ($conn->affected_rows == 0)
            header('Location: watcher_list.php?msg=editUserNoAlt');
        else
            header('Location: watcher_list.php?msg=editUserOk');
    else
        header('Location: watcher_list.php?msg=editUserErr');

    exit;
}
