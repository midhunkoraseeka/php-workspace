<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Electronics Product Catalog</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, sans-serif;
      margin: 0;
      background-color: #f4f6f8;
      color: #333;
    }

    nav {
      background: linear-gradient(90deg, #111, #222);
      padding: 12px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    nav .logo {
      font-size: 1.6rem;
      font-weight: bold;
      color: #ffcc00;
      letter-spacing: 1px;
    }
    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }
    nav ul li {
      margin-left: 25px;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }
    nav ul li a:hover {
      color: #ffcc00;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6)), 
                  url('https://images.unsplash.com/photo-1519389950473-47ba0277781c') center/cover;
      color: white;
      text-align: center;
      padding: 70px 20px;
    }
    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    .hero p {
      font-size: 1.1rem;
      color: #f5f5f5;
    }

    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 25px;
      padding: 40px 20px;
      max-width: 1100px;
      margin: auto;
    }
    .category-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      text-align: center;
    }
    .category-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    .category-card img {
      width: 100%;
      height: 170px;
      object-fit: cover;
    }
    .category-card h3 {
      margin: 15px 0;
      font-size: 1.2rem;
    }
    .category-card a {
      text-decoration: none;
      color: inherit;
      display: block;
      padding-bottom: 10px;
    }
    .category-card a:hover h3 {
      color: #ff6600;
    }
    html {
        scroll-behavior: smooth;
    }
  </style>
</head>
<body>


  <nav>
    <div class="logo">ElectroStore</div>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">All Products</a></li>
      <li><a href="add_product.php">Add Product</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  
  <div class="hero">
    <h1>Shop by Category</h1>
    <p>Explore our wide range of premium electronic products</p>
  </div>


  <div class="category-grid">
    <div class="category-card">
      <a href="mobiles.php">
        <img src="https://etimg.etb2bimg.com/photo/98913352.cms" alt="Mobiles">
        <h3>Mobiles</h3>
      </a>
    </div>
    <div class="category-card">
      <a href="refrigerators.php">
        <img src="https://www.lg.com/content/dam/channel/wcms/images/REF-Indias-Most-Trusted-Banner-720x960-M-1.jpg" alt="Refrigerators">
        <h3>Refrigerators</h3>
      </a>
    </div>
    <div class="category-card">
      <a href="microwaves.php">
        <img src="https://cdn.thewirecutter.com/wp-content/media/2024/08/microwaves-2048px-2-4.jpg?auto=webp&quality=75&width=1024" alt="Microwaves">
        <h3>Microwaves</h3>
      </a>
    </div>
    <div class="category-card">
      <a href="washingmachines.php">
        <img src="https://media3.bsh-group.com/Product_Shots/5120x/25114476_WAJ24209IN_PGA4_def.webp" alt="Washing Machines">
        <h3>Washing Machines</h3>
      </a>
    </div>
  </div>


  <?php include 'footer.php'; ?>

</body>
</html>
