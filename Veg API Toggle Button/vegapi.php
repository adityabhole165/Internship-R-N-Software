<?php
// API URL
$api_url = "http://52.66.71.147/XpressPP_Running/vegonlyothers.php";

// Input data
$input_data = [
    [
        "Parameter" => "QUxnWDFSNWVscHdJYTJXZzBjTmFyZz09",
        "UserName" => "hotelorder@6262",
        "Password" => "hotelorder@4474",
        "VegOnly" => 1
    ]
];

// Convert the input data to JSON
$json_input = json_encode($input_data);

// Initialize cURL
$curl = curl_init($api_url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json_input);

// Execute the API call
$response = curl_exec($curl);

// Check for cURL errors
if ($response === false) {
    echo "cURL Error: " . curl_error($curl);
    exit;
}

// Close cURL
curl_close($curl);

// Decode the JSON response
$data = json_decode($response, true);

// Handle JSON decoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Failed to decode JSON: " . json_last_error_msg();
    exit;
}

// Extract menu items
$menu_items = $data['result'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veg Only Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center mt-4">Veg Only Menu Items</h1>
    <div class="row">
        <?php foreach ($menu_items as $item): ?>
            <?php
            // Determine the icon based on MenuTypeId (Veg/Non-Veg)
            $menuTypeIcon = $item['MenuTypeId'] == 1 ? 'pic/veg_icon.png' : 'pic/nonvegicon.png';
            ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title" style="font-size:18px; display: flex; align-items: center;">
                            <!-- Veg/Non-Veg Icon before the menu name -->
                            <img src="<?php echo $menuTypeIcon; ?>" alt=""
                                 style="width: 20px; margin-right: 8px;">
                            <?php echo htmlspecialchars($item['MenuName']); ?>
                        </h6>
                        <p class="card-text"><strong>Price:</strong> ₹<?php echo htmlspecialchars($item['Rate']); ?></p>
                        <?php if (!empty(trim($item['Description']))): ?>
                            <p class="card-text" style="font-size:12px;">
                                <?php echo nl2br(htmlspecialchars($item['Description'])); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="card-footer text-right">
                        <?php if (!empty(trim($item['MenuImageUrl']))): ?>
                            <img src="<?php echo htmlspecialchars($item['MenuImageUrl']); ?>" class="img-fluid mb-2"
                                 alt="Menu Image" style="max-width:100px;">
                        <?php else: ?>
                            <img src="placeholder.jpg" class="img-fluid mb-2" alt="Menu Image" style="max-width:100px;">
                        <?php endif; ?>
                        <button class="btn btn-primary add-btn w-100" onclick="addToCart(this)">ADD</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function addToCart(button) {
        alert('Added to cart');
    }
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
