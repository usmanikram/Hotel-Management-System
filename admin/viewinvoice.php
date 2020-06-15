<?php
require_once "../config/config.php";
require_once "../classes/bill.php";
$id=$_GET['id'];
$querybill="SELECT * FROM bill b join reservation r join customer c join room ro join roomtype rt on 
b.custID='$id' and b.custID=c.custID and b.resID=r.resID and r.roomID=ro.roomID and ro.roomType=rt.rtypeID";
$resultbill = $mysqli->query($querybill);
$fetchbill = $resultbill->fetch_assoc();
function taxcalculator($amount)
{
    $total = $amount * 15 /100;
    return $total;
}

function total($amount,$tax)
{
    $total=$amount+$tax;
    return $total;
}
$start=date_create($fetchbill['resStartDate']);
$end=date_create($fetchbill['resEndtDate']);
$diff=date_diff($start,$end);



?>
<html>
<head>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .invoice-title h2, .invoice-title h3 {
            display: inline-block;
        }

        .table > tbody > tr > .no-line {
            border-top: none;
        }

        .table > thead > tr > .no-line {
            border-bottom: none;
        }

        .table > tbody > tr > .thick-line {
            border-top: 2px solid;
        }
    </style>
    <title>Invoice Generated</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h1>Hotel Management System</h1>
                <h2>Customer Invoice</h2><h3 class="pull-right"><u>Invoice ID:</u> <?php echo $fetchbill['billID']; ?></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong><u>Billed To:</u></strong><br>
                        <strong>Name: </strong><?php echo $fetchbill['custName'] ?><br>
                        <strong>Contact: </strong><?php echo $fetchbill['custContact'] ?><br>
                        <strong>Address: </strong><?php echo $fetchbill['custAddress'] ?><br>
                    </address>

                    <address>
                        <strong><u>Reservation Details:</u></strong><br>
                        <strong>Start Date: </strong><?php echo $fetchbill['resStartDate'] ?><br>
                        <strong>End Date: </strong><?php echo $fetchbill['resEndtDate'] ?><br>
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong><u>Invoice Date:</u></strong><br>
                        <?php echo $fetchbill['billDate'] ?><br><br>
                        <strong><u>Room No:</u></strong><br>
                        <?php echo $fetchbill['roomID'] ?><br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Bill Summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Details</strong></td>
                                <td class="text-center"><strong>Amount</strong></td>
                                <td class="text-right"><strong>Total</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td><?php echo $fetchbill['roomDetails'] ?></td>
                                <td class="text-center"><?php echo "Rs.".$fetchbill['rtypePrice']." Per Night * ". $diff->format("%a Days") ?></td>
                                <td class="text-right"><?php echo "Rs. ".$fetchbill['amount'] ?></td>
                            </tr>

                            <tr>

                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right"><?php echo "Rs. ".$fetchbill['amount'] ?></td>
                            </tr>
                            <tr>

                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Tax (15%)</strong></td>
                                <td class="no-line text-right"><?php echo "PKR ".taxcalculator($fetchbill['amount']) ?></td>
                            </tr>
                            <tr>

                                <td class="no-line"></td>
                                <td class="thick-line text-center"><strong>Total</strong></td>
                                <td class="thick-line text-right"><?php echo "Rs. ".total($fetchbill['amount'],taxcalculator($fetchbill['amount'])) ?></td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div align="center">
    <a href="bills.php" class="btn btn-success pull-right">Go Back</a>
</div>
</body>
</html>


