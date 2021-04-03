<!DOCTYPE html>
<?php
require_once'../Daos/BankBookDao.php';
require_once '../beans/Bankbook.php';
require_once '../beans/Users.php';
session_start();
$ub = unserialize($_SESSION['user']);
if ($ub == NULL) {
    header("Location: /MyAccount/index.php");
}
if (isset($_POST['sd']) && isset($_POST['ed'])) {
    $sd = $_POST['sd'];
    $ed = $_POST['ed'];
} else {
    $sd = date("Y/m/d");
    $ed = date("Y/m/d");
}
$uid = $ub->getUid();
$cd = new BankBookDao();
$bb = NULL;
if ($sd != NULL && $ed != NULL && $uid != NULL) {
    $bb = $cd->findAllDateWise($sd, $ed, $uid);
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;  charset=iso-8859-1" />
        <meta name="description" content="An minimal site format" />
        <meta name="keywords" content="blog" />
        <link rel="stylesheet" type="text/css" href="../../MyAccount/css/style.css" media="all" />  
        <title>BankBook</title>

    </head>
    <body>
        <div id="container">
            <?php include '../design/header.html'; ?>
            <div id="wrapper">
                <?php include '../design/menu.html'; ?>
                <div id="content-wrapper">
                    <div id="content">
                        <form name="myform"  method="post" action="bonkbookview.php">
                            <table border="1" width="100%">
                                <thead>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>Bank Book</b></font></th>
                                        <th bgcolor="black"><font color="white"><b>Date From<br><input type="date" name="sd"></b></font></th>
                                        <th bgcolor="black"><font color="white"><b>To<br><input type="date" name="ed"></b></font></th>
                                        <th bgcolor="black"><font color="white"><b><input type="submit" value="Show"></b></font></th>
                                    </tr>
                                    <tr>
                                        <th bgcolor="black"><font color="white"><b>S.No.</b></th>
                                        <th bgcolor="black"><font color="white"><b>Date</b></th>
                                        <th bgcolor="black"><font color="white"><b>Amount</b></th>
                                        <th bgcolor="black"><font color="white"><b>Pay/Receive</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt=0;
                                    foreach ($bb as $e) {
                                        $cnt++;
                                        echo '<tr><td>' . $cnt . '</td><td>' . $e->getTrandate() . '</td><td>' . $e->getAmount() . '</td><td>' . $e->getOperation() . '</td></tr>';
                                    }
                                    ?>
                                    <tr>
                                        <th bgcolor="black" colspan="2"><font color="white"><b>Closing Balance</b></th>
                                        <th bgcolor="black" colspan="2"><font color="white"><b><center><?php echo $cd->closingBalance($uid) ?></center></b></th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <?php include '../design/sidebar.html'; ?>
                <?php include '../design/footer.html'; ?>
            </div>
        </div>
    </body>
</html>
