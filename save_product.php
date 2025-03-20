<?php
require_once 'db.php';

$response = ['status' => 'error', 'message' => ''];

try {
    // Start transaction
    $conn->begin_transaction();

    // Insert product into Products table
    $stmt = $conn->prepare("INSERT INTO Products 
        (product_name, product_description, product_code, product_sub_code, base_price)
        VALUES (?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssd", 
        $_POST['product_name'],
        $_POST['product_description'],
        $_POST['product_code'],
        $_POST['product_sub_code'],
        $_POST['base_price']
    );
    
    $stmt->execute();
    $product_id = $conn->insert_id;
    $stmt->close();

    // Loop through each variant and insert into ProductVariants
    foreach($_POST['size'] as $index => $size) {
        $stmt = $conn->prepare("INSERT INTO ProductVariants
            (product_id, size, color, price, stock)
            VALUES (?, ?, ?, ?, ?)");
        
        $stmt->bind_param("isssi",
            $product_id,
            $size,
            $_POST['color'][$index],
            $_POST['price'][$index],
            $_POST['stock'][$index]
        );
        
        $stmt->execute();
        $variant_id = $conn->insert_id;
        $stmt->close();

        // Check if an image was uploaded for this variant
        if(isset($_FILES['variant_images']['name'][$index]) && !empty($_FILES['variant_images']['name'][$index])) {
            $target_dir = "uploads/";
            // Create uploads folder if it doesn't exist
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            $file_name = uniqid() . '_' . basename($_FILES['variant_images']['name'][$index]);
            $target_file = $target_dir . $file_name;
            
            if(move_uploaded_file($_FILES['variant_images']['tmp_name'][$index], $target_file)) {
                $stmt = $conn->prepare("INSERT INTO ProductImages (variant_id, image_path) VALUES (?, ?)");
                $stmt->bind_param("is", $variant_id, $target_file);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    $conn->commit();
    $response = ['status' => 'success', 'message' => 'Product saved successfully'];
} catch(Exception $e) {
    $conn->rollback();
    $response['message'] = 'Error: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>