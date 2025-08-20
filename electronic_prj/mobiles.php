<?php
require_once 'db_connect.php';


$search_term = $_GET['search'] ?? '';
$price_filter = $_GET['price'] ?? '';
$rating_filter = $_GET['rating'] ?? '';

$sql = "SELECT * FROM products WHERE LOWER(category) = 'mobiles'";
$conditions = [];
$params = [];
$types = '';

if (!empty($search_term)) {
    $conditions[] = "LOWER(Name) LIKE ?";
    $params[] = '%' . strtolower($search_term) . '%';
    $types .= 's';
}

if (!empty($price_filter)) {
    $price_range = explode('-', $price_filter);
    if (count($price_range) === 2) {
        $conditions[] = "Price BETWEEN ? AND ?";
        $params[] = $price_range[0];
        $params[] = $price_range[1];
        $types .= 'dd';
    } else {
        $conditions[] = "Price >= ?";
        $params[] = $price_range[0];
        $types .= 'd';
    }
}

if (!empty($rating_filter)) {
    $conditions[] = "Rating >= ?";
    $params[] = $rating_filter;
    $types .= 'i';
}

if (!empty($conditions)) {
    $sql .= " AND " . implode(" AND ", $conditions);
}

$stmt = $conn->prepare($sql);
if (!empty($types) && !empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();


if (!$result) {
    die("Query Error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobiles</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --background-color: #121212;
            --card-background: #1e1e1e;
            --text-color: #e0e0e0;
            --heading-color: #ffffff;
            --accent-color: #ffffff;
            --border-color: #333333;
            --card-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            --card-hover-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }
        *, *::before, *::after { box-sizing: border-box; }
        body { margin: 0; font-family: 'Inter', sans-serif; background-color: var(--background-color); color: var(--text-color); }
        .page-header { background-color: var(--background-color); padding: 2rem 1rem; text-align: center; border-bottom: 1px solid var(--border-color); position: relative; }
        .page-title { font-size: 3rem; font-weight: 700; margin: 0; color: var(--heading-color); letter-spacing: 1px; }
        .back-to-home { position: absolute; top: 50%; left: 20px; transform: translateY(-50%); color: var(--heading-color); text-decoration: none; font-size: 1rem; font-weight: 500; padding: 8px 16px; border: 2px solid var(--border-color); border-radius: 50px; transition: background-color 0.3s ease, border-color 0.3s ease; }
        .back-to-home:hover { background-color: var(--accent-color); border-color: var(--accent-color); color: var(--background-color); }
        
        /* --- CSS for Advanced Filters --- */
        .filter-section { padding: 2rem 1.5rem; background-color: #1a1a1a; border-bottom: 1px solid var(--border-color); }
        .filter-form { display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 15px; max-width: 900px; margin: 0 auto; }
        .filter-input { padding: 12px 20px; font-size: 1rem; border: 2px solid var(--border-color); border-radius: 50px; background-color: var(--card-background); color: var(--heading-color); outline: none; transition: border-color 0.3s ease; }
        .filter-input:focus { border-color: var(--accent-color); }
        .filter-input.search-input { flex: 2 1 300px; } /* More flexible width */
        .filter-input.select-input { flex: 1 1 150px; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23e0e0e0%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22/%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 1rem center; background-size: .65em auto; padding-right: 2.5rem;}
        .filter-button { padding: 12px 30px; font-size: 1rem; font-weight: 600; border: 2px solid var(--accent-color); border-radius: 50px; background-color: var(--accent-color); color: var(--background-color); cursor: pointer; transition: background-color 0.3s ease, color 0.3s ease; flex-shrink: 0;}
        .filter-button:hover { background-color: transparent; color: var(--accent-color); }
        /* --- End of CSS --- */

        .card-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2.5rem; max-width: 1400px; margin: 0 auto; padding: 3rem 1.5rem; }
        .card { border-radius: 16px; background: var(--card-background); border: 1px solid var(--border-color); box-shadow: var(--card-shadow); transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease; overflow: hidden; display: flex; flex-direction: column; }
        .card:hover { transform: translateY(-10px); box-shadow: var(--card-hover-shadow); border-color: var(--accent-color); }
        .card-image-container { height: 240px; background-color: #2a2a2a; }
        .card img { width: 100%; height: 100%; object-fit: contain}
        .card-content { padding: 1.5rem; text-align: left; display: flex; flex-direction: column; flex-grow: 1; }
        .card .name { font-size: 1.25rem; font-weight: 600; color: var(--heading-color); margin: 0 0 0.5rem 0; line-height: 1.4; }
        .card .price { font-size: 1.5rem; font-weight: 700; color: var(--accent-color); margin-bottom: 1rem; }
        .card .rating { color: #b0b0b0; font-size: 1.1rem; margin-top: auto; padding-top: 1rem; }
        .no-products { font-size: 1.2rem; color: #777; text-align: center; grid-column: 1 / -1; }
    </style>
</head>
<body>
    <header class="page-header">
        <a href="index.php" class="back-to-home">← Back to Home</a>
        <h1 class="page-title">Mobiles</h1>
    </header>

    <section class="filter-section">
        <form action="mobiles.php" method="GET" class="filter-form">
            <input type="text" name="search" class="filter-input search-input" placeholder="Search by name..." value="<?= htmlspecialchars($search_term) ?>">
            
            <select name="price" class="filter-input select-input">
                <option value="">All Prices</option>
                <option value="0-10000" <?= $price_filter == '0-10000' ? 'selected' : '' ?>>Under ₹10,000</option>
                <option value="10000-25000" <?= $price_filter == '10000-25000' ? 'selected' : '' ?>>₹10,000 - ₹25,000</option>
                <option value="25000-50000" <?= $price_filter == '25000-50000' ? 'selected' : '' ?>>₹25,000 - ₹50,000</option>
                <option value="50000" <?= $price_filter == '50000' ? 'selected' : '' ?>>₹50,000 & Above</option>
            </select>

            <select name="rating" class="filter-input select-input">
                <option value="">All Ratings</option>
                <option value="4" <?= $rating_filter == '4' ? 'selected' : '' ?>>4★ & Up</option>
                <option value="3" <?= $rating_filter == '3' ? 'selected' : '' ?>>3★ & Up</option>
                <option value="2" <?= $rating_filter == '2' ? 'selected' : '' ?>>2★ & Up</option>
            </select>
            
            <button type="submit" class="filter-button">Apply Filters</button>
        </form>
    </section>
    <main>
        <div class="card-container">
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $img_file = !empty($row['Image']) ? htmlspecialchars($row['Image']) : '';
                    $img_path = $img_file ? $img_file : 'default_mobile.png';
                    $rating = isset($row['Rating']) ? floatval($row['Rating']) : 0;
                    $stars = str_repeat('★', floor($rating)) . str_repeat('☆', 5 - floor($rating));
            ?>
                    <div class="card">
                        <div class="card-image-container"><img src="<?= $img_path ?>" alt="<?= htmlspecialchars($row['Name']) ?>" onerror="this.onerror=null;this.src='default_mobile.png';"></div>
                        <div class="card-content">
                            <h3 class="name"><?= htmlspecialchars($row['Name']) ?></h3>
                            <p class="price">₹<?= number_format($row['Price']) ?></p>
                            <p class="rating"><?= $stars ?> (<?= $rating ?>)</p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='no-products'>No mobiles found matching your criteria.</p>";
            }
            ?>
        </div>
    </main>
    
    <?php require_once 'footer.php'; ?>
    
</body>
</html>