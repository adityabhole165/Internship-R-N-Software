<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title> Invoice Report</title>
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
$hotel_id=$_GET['hotelid'];


$url = "http://52.66.71.147/countryliqure/invoice_report.php?fromdate" . urlencode($fromdate) . "&todate=" . urlencode($todate) . "&hotelid=".urlencode($hotel_id);
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
 <h5 class="text-center my-1">Invoice Report From <?php echo $fromdate ?> To <?php  echo $todate?></h5>
</div>
<table class="table table-striped" style="font-size: x-small;border-top:1px solid black;">
<thead>
    <tr>
        <!-- <th style="width: 5%;">Sr No</th> -->
        <th style="width: 10%;">Invoice_No</th>
        <th class="date">Employee_name</th>
        <th>closing_stock_date</th>
        <th>Bill_Amount</th>
      
    </tr>
</thead>
<tbody>
    <?php 
    $i=1;
   
foreach($row['result'] as $result){
    
?>
    <tr>
        
        <!-- <td><?php //echo $i; ?></td> -->
        <td><?php echo $result['Invoice_No']; ?></td>
        <td class="date"><?php echo $result['Employee_name']; ?></td>
        <td><?php echo $result['closing_stock_date']; ?></td>
        <td><?php echo $result['Bill_Amount']; ?></td>
        
       
    </tr>
    <?php
    
  

}

    ?>
            

  
</tbody>
</table>

</body>
</html>