<style>
    /* Ensure the same font is used for consistency */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

    .site-footer {
        background-color: #1e1e1e; /* A slightly lighter dark shade */
        color: #a0a0a0;
        font-family: 'Inter', sans-serif;
        padding: 40px 20px;
        border-top: 1px solid #333;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
        gap: 20px;
    }

    .footer-section {
        flex: 1;
        min-width: 220px;
        padding: 0 15px;
    }

    .footer-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #ffffff;
        margin-bottom: 15px;
        position: relative;
        padding-bottom: 8px;
    }
    
    /* Underline effect for titles */
    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background-color: #ffffff;
    }

    .footer-section p {
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .footer-section ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-section ul li a {
        color: #a0a0a0;
        text-decoration: none;
        display: block;
        padding: 5px 0;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .footer-section ul li a:hover {
        color: #ffffff;
        transform: translateX(5px);
    }

    .social-links a {
        display: inline-block;
        margin-right: 15px;
        color: #a0a0a0;
        font-size: 1.4rem;
        text-decoration: none;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .social-links a:hover {
        color: #ffffff;
        transform: translateY(-3px);
    }

    .footer-bottom {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #333;
        font-size: 0.9rem;
        color: #777;
    }

</style>

<footer class="site-footer" id="contact">
    <div class="footer-container">
        
        <div class="footer-section about">
            <h3 class="footer-title">Electro Mobile</h3>
            <p>Your destination for the latest in mobile technology. We are committed to bringing you the best devices with top-tier service.</p>
        </div>

        <div class="footer-section links">
            <h3 class="footer-title">Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="mobiles.php">Mobiles</a></li>
                <li><a href="add_product.php">Add Product</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>

        <div class="footer-section contact">
            <h3 class="footer-title">Contact Us</h3>
            <p>Email: support@electromobile.com</p>
            <p>Phone: +91 98765 43210</p>
            <div class="social-links">
                <a href="#" title="Facebook">FB</a>
                <a href="#" title="Twitter">TW</a>
                <a href="#" title="Instagram">IG</a>
            </div>
        </div>

    </div>
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> Electro Mobile. All Rights Reserved.</p>
    </div>
</footer>