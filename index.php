<?php
// Set content type to JSON
header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$rating = $data['rating'] ?? null;

if ($rating) {
    // Example: Save rating to a file (in a real scenario, you would save this to a database)
    file_put_contents('ratings.txt', "Rating: $rating\n", FILE_APPEND);
    echo json_encode(['rating' => $rating, 'status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid rating']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Rating System</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="product">
        <h1>Product Name</h1>
        <div class="rating">
            <span class="rating-star" data-value="5">&#9733;</span>
            <span class="rating-star" data-value="4">&#9733;</span>
            <span class="rating-star" data-value="3">&#9733;</span>
            <span class="rating-star" data-value="2">&#9733;</span>
            <span class="rating-star" data-value="1">&#9733;</span>
        </div>
        <div class="rating-result" id="ratingResult"></div>
    </div>

    <script src="main.js"></script>
</body>

</html>