<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Account Statement Report</title>
    <style>
        @media screen and (max-width:576px) {
            
        }
    </style>
</head>
<body>
   

    <?php 
//$hotel_id=$_GET['hotel_id'];
$fromdate=$_GET['fromdate'];
$todate=$_GET['todate'];
$hotel_id=$_GET['hotel_id'];
$cust_id=$_GET['cust_id'];

$url = "http://52.66.71.147/XpressPP/sundry_detors.php?hotel_id=" . urlencode($hotel_id) . "&todate=" . urlencode($todate) .  "&cust_id=".urlencode($cust_id) . "&fromdate=".urlencode($fromdate);
// http://52.66.71.147/XpressPP/sundry_detors.php?hotel_id=138&todate=10-8-2024&cust_id=827&fromdate=1-7-2024
$ch3 = curl_init();
curl_setopt($ch3, CURLOPT_URL, $url);
curl_setopt($ch3, CURLOPT_POST, true);
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch3);

// echo $url;
$row=json_decode($response,true);
// print_r($row);
?>
<div class="text-center">
 <h5 class="text-center my-1">Customer Statement Report From <?php echo $fromdate ?> To <?php  echo $todate?></h5>
<h6 class="text-center">Customer Name:<?php  echo $row['result'][0]['PartyName'] ?></h6>
</div>
<table class="table table-striped" style="font-size: x-small;border-top:1px solid black;">
<thead>
    <tr>
        <th style="width: 5%;">Sr No</th>
        <th style="width: 10%;">Party Name</th>
        <th class="date">Date</th>
        <!-- <th>Voucher No</th> -->
        <th>Voucher Type</th>
        <!-- <th>Account</th> -->
        <th>Paymode</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Balance</th>
    </tr>
</thead>
<tbody>
    <?php 
    $i=1;
    $balance=0;
    $cr_total=0;
    $dr_total=0;
foreach($row['result'] as $result){
    $balance += $result['Credit'] - $result['Debit'];
?>
    <tr>
        
        <td><?php echo $i; ?></td>
        <td><?php echo $result['PartyName']; ?></td>
        <td class="date"><?php echo $result['Date']; ?></td>
        <!-- <td><?php //echo $result['VoucherNo']; ?></td> -->
        <td><?php echo $result['Type']; ?></td>
        <!-- <td><?php //echo $result['AccountName']; ?></td> -->
        <td><?php echo $result['Paymode']; ?></td>
        <td><?php echo $result['Credit']; ?></td>
        <td><?php echo $result['Debit']; ?></td>
        <td><?php  echo $balance.'.00'; ?></td>
       
    </tr>
    <?php
    
    $i++;
    $cr_total+=$result['Credit'];
    $dr_total+=$result['Debit'];

}

    ?>
            

    <div class="d-flex justify-content-around">
    <h6>Total Credit :<?php echo $cr_total.'.00';  ?></h6>
    <h6>Total Debit :<?php echo $dr_total.'.00';  ?></h6>
    <h6 class="text-danger"> Balance:<?php echo $balance.'.00';  ?></h6>
    </div>
    </div>
</tbody>
</table>

</body>
</html>