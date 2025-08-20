<?php
require_once 'db_connect.php';

$message = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $image_file = $_FILES['image'];

    
    $max_file_size = 2 * 1024 * 1024; 
    $allowed_extensions = ['jpg', 'png', 'jpeg'];
    $file_extension = strtolower(pathinfo($image_file['name'], PATHINFO_EXTENSION));
    
    $upload_error = true;

    if ($image_file['error'] === UPLOAD_ERR_OK) {
        $message = "Error during file upload. Please try again.";
        $upload_error = false;
    } elseif ($image_file['size'] > $max_file_size) {
        $message = "Error: File is too large. Maximum allowed size is 2MB.";
        $upload_error = false;
    } elseif (!in_array($file_extension, $allowed_extensions)) {
        $message = "Error: Invalid file extension. Only .jpg, .png, .jpeg are allowed.";
        $upload_error = false;
    }

    
    if (!$upload_error) {
        $unique_filename = uniqid() . '.' . $file_extension;
        $destination_path = 'uploads/' . $unique_filename;


        if (move_uploaded_file($image_file['tmp_name'], $destination_path)) {
            
   
            $sql = "INSERT INTO products (Image, Name, Category, Price, Description, Rating) VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            

            if ($stmt) {
                
                $stmt->bind_param("sssdsi", $destination_path, $name, $category, $price, $description, $rating);


                if ($stmt->execute()) {
                    $message = "<span style='color: green;'>✅ Product added successfully!</span>";
                } else {
                    $message = "Error: Could not save product to database. " . $stmt->error;
                }
                $stmt->close();
            } else {
                $message = "Error preparing the database query: " . $conn->error;
            }

        } else {
            $message = "Error: Could not move uploaded file. Check 'uploads' directory permissions.";
        }
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: white;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            padding: 30px 35px;
            border-radius: 20px;
            box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.8s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 2rem;
            background: linear-gradient(90deg, #ff8a00, #e52e71);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: 500;
            font-size: 0.95rem;
        }

        input, textarea, select {
            padding: 12px;
            font-size: 14px;
            border: none;
            border-radius: 8px;
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transition: all 0.3s ease;
        }

        select {
            appearance: none;
        }

        select option {
            background: #1e1e1e;
            color: white;
            padding: 10px;
        }

        input:focus, textarea:focus, select:focus {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 10px rgba(255, 138, 0, 0.6);
        }

        textarea {
            resize: none;
        }

        button {
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #ff8a00, #e52e71, #9b00ff);
            background-size: 300% 100%;
            color: white;
            cursor: pointer;
            transition: all 0.4s ease;
            animation: gradientMove 5s infinite linear;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 20px rgba(255, 138, 0, 0.5);
        }
        
        .message {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        input::placeholder, textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Product Form</h2>
    <?php
        if (!empty($message)) {
            echo "<p class='message'>$message</p>";
        }
    ?>
    <form action="add_product.php" method="POST" enctype="multipart/form-data">
        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter product name" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="">--Select Category--</option>
            <option value="Mobiles">Mobiles</option>
            <option value="Microwave">Microwave</option>
            <option value="Refrigerator">Refrigerator</option>
            <option value="Washing Machine">Washing Machine</option>
        </select>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="3" placeholder="Enter product description" required></textarea>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" placeholder="Enter rating" required>

        <button type="submit">Submit</button>
    </form>
    <button onclick="window.location.href='index.php'" style="margin-top:18px;width:100%;background:linear-gradient(90deg,#00c6ff,#0072ff);color:#fff;font-weight:600;letter-spacing:1px;">Go to Home</button>
</div>

</body>
</html>