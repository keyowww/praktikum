<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - mas keyo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            line-height: 1.6;
            background-color: #f9f9f9;
        }
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .info-section {
            margin-bottom: 20px;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }
        .info-section h2 {
            margin-top: 0;
            color: #555;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .info-item {
            margin: 10px 0;
            padding: 5px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-style: italic;
            color: #777;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .error {
            color: red;
            font-weight: bold;
            background-color: #ffe6e6;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid red;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .back-link {
            text-align: center;
            margin: 20px 0;
        }
        .back-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>THANK YOU</h1>
    
    <?php
    // Fungsi untuk membersihkan input
    function clean_input($data) {
        if (!empty($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }
        return $data;
    }

    // Cek apakah form telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        
        // Validasi dan cleaning input
        $name = clean_input($_POST["customername"]);
        $address = clean_input($_POST["address"]);
        $telephone = clean_input($_POST["telephone"]);
        $email = clean_input($_POST["email"]);
        $instructions = clean_input($_POST["instructions"]);
        $crust = isset($_POST["crust"]) ? clean_input($_POST["crust"]) : "";
        $toppings = isset($_POST["toppings"]) ? $_POST["toppings"] : [];
        $quantity = clean_input($_POST["quantity"]);
        
        // Validasi required fields
        if (empty($name)) {
            $errors[] = "Name is required";
        }
        
        if (empty($address)) {
            $errors[] = "Address is required";
        }
        
        if (empty($telephone)) {
            $errors[] = "Telephone number is required";
        }
        
        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
        
        if (empty($crust)) {
            $errors[] = "Please select a crust type";
        }
        
        if (empty($quantity)) {
            $errors[] = "Please select the number of pizzas";
        }
        
        // Jika ada errors, tampilkan
        if (!empty($errors)) {
            echo '<div class="error">';
            echo '<h2>Error:</h2>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo '</ul>';
            echo '</div>';
            
            echo '<div class="back-link">';
            echo '<a href="index.html">← Back to Order Form</a>';
            echo '</div>';
        } else {
            // Jika tidak ada errors, tampilkan hasil
            echo '<div class="success">';
            echo '<p style="text-align: center; font-size: 18px;">Thank you for ordering from Black Goose Bistro. We have received the following information about your order:</p>';
            echo '</div>';
            
            echo '<div class="info-section">';
            echo '<h2>Your Information</h2>';
            echo '<div class="info-item"><strong>Name:</strong> ' . $name . '</div>';
            echo '<div class="info-item"><strong>Address:</strong> ' . $address . '</div>';
            echo '<div class="info-item"><strong>Telephone number:</strong> ' . $telephone . '</div>';
            echo '<div class="info-item"><strong>Email Address:</strong> ' . $email . '</div>';
            
            if (!empty($instructions)) {
                echo '<div class="info-item"><strong>Delivery Instructions:</strong> ' . $instructions . '</div>';
            } else {
                echo '<div class="info-item"><strong>Delivery Instructions:</strong> None</div>';
            }
            echo '</div>';
            
            echo '<div class="info-section">';
            echo '<h2>Your Pizza</h2>';
            
            // Konversi nilai crust ke teks
            $crust_types = [
                'classic' => 'Classic white',
                'multigrain' => 'Multigrain',
                'cheese-stuffed' => 'Cheese-stuffed crust',
                'gluten-free' => 'Gluten-free'
            ];
            echo '<div class="info-item"><strong>Crust:</strong> ' . $crust_types[$crust] . '</div>';
            
            // Konversi toppings ke teks
            $topping_names = [
                'red-sauce' => 'red sauce',
                'white-sauce' => 'white sauce',
                'mozzarella' => 'mozzarella cheese',
                'pepperoni' => 'pepperoni',
                'mushrooms' => 'mushrooms',
                'peppers' => 'peppers',
                'anchovies' => 'anchovies'
            ];
            
            $selected_toppings = [];
            foreach ($toppings as $topping) {
                if (isset($topping_names[$topping])) {
                    $selected_toppings[] = $topping_names[$topping];
                }
            }
            
            if (!empty($selected_toppings)) {
                echo '<div class="info-item"><strong>Toppings:</strong> ' . implode(', ', $selected_toppings) . '</div>';
            } else {
                echo '<div class="info-item"><strong>Toppings:</strong> None</div>';
            }
            
            echo '<div class="info-item"><strong>Number of pizzas:</strong> ' . $quantity . '</div>';
            echo '</div>';
            
            echo '<div class="back-link">';
            echo '<a href="index.html">← Order Another Pizza</a>';
            echo '</div>';
        }
    } else {
        echo '<div class="error">';
        echo '<p>Error: Form was not submitted properly.</p>';
        echo '</div>';
        
        echo '<div class="back-link">';
        echo '<a href="index.html">← Back to Order Form</a>';
        echo '</div>';
    }
    ?>
    
    <div class="footer">
        <p>This site is for educational purposes only. No pizzas will be delivered.</p>
    </div>
</body>
</html>