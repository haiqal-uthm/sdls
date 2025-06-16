<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Smart Door Lock System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #a8edea, #fed6e3); /* light turquoise to soft blue */
            color: #000;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #00796b; /* Deep greenish turquoise */
        }
        .logo-container {
            text-align: center;
            margin: 20px 0;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #e0f7fa, #b2ebf2); /* Light turquoise/blue */
            color: #004d40;
            padding: 50px 20px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 30px;
        }
        .button-container {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn-custom {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #0097a7; /* Rich turquoise */
            border: none;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #00acc1; /* Slightly lighter blueish turquoise */
        }
        .features-section {
            margin-top: 40px;
        }
        .feature-card {
            background: #80deea; /* Soft blueish turquoise */
            border: none;
            border-radius: 10px;
            color: #004d40;
            text-align: center;
            padding: 20px;
        }
        footer {
            background-color: #00796b; /* Consistent turquoise footer */
            text-align: center;
            padding: 10px 0;
            color: #fff;
        }
    </style>
    
    
    
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Smart Door Lock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Logo -->
    <div class="logo-container">
        <img src="{{ asset('image/logo2.png') }}" alt="Smart Lock Logo">
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Welcome to Admin Panel Smart Door Lock System</h1>
        <p>Enhance your security with cutting-edge smart locks that provide convenience and safety.</p>
        
        <!-- Separate Buttons for Admin and Staff -->
        <div class="button-container">
            <a href="{{ url('/login') }}" class="btn btn-secondary btn-custom">Login</a>
            <a href="{{ url('/register') }}" class="btn btn-secondary btn-custom">Register</a>

        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>RFID & Remote Control</h3>
                    <p>Allow the door to be controlled via web interfaces</p>
                    <p>Users can unlock the door using an RFID card or tag</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>Monitoring & Logging</h3>
                    <p>Record every door access attemp</p>
                    <p>Can be viewed via dashboard for monitoring the door status and exported the report into PDF file</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h3>IoT Platform Integration (ThingSpeak)</h3>
                    <p>Real-time data streaming and visualization</p>
                </div>
            </div>
        </div>
    </section>

    <div class="logo-container">
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Smart Door Lock System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
