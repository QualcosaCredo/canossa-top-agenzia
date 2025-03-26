<!DOCTYPE html>
<html>
<head>
    <title>Gestione Agenzia Immobiliare</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 50px;
            background: url('https://source.unsplash.com/1600x900/?luxury-house,architecture') no-repeat center center fixed;
            background-size: cover;
            color: white;
            margin: 0;
        }
        .navbar {
            background: rgba(0, 0, 0, 0.9);
            padding: 15px;
            display: flex;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .navbar a:hover {
            color: #ff7eb3;
        }
        .container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            margin-top: 80px;
        }
        h1 {
            color: #f8f9fa;
            font-size: 36px;
            margin-bottom: 20px;
        }
        a.btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px auto;
            padding: 15px;
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            color: white;
            text-decoration: none;
            width: 280px;
            border-radius: 30px;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 117, 140, 0.4);
        }
        a.btn:hover {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            transform: scale(1.05);
            box-shadow: 0 6px 14px rgba(255, 117, 140, 0.6);
        }
        .icon {
            width: 30px;
            margin-right: 15px;
            vertical-align: middle;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <a href="index.php">🏠 Home</a>
        <a href="immobili.php">📋 Immobili</a>
        <a href="vendite.php">📝 Vendite</a>
        <a href="contatti.php">📞 Contatti</a>
    </div>
    <div class="container">
        <h1>🏡 Gestione Agenzia Immobiliare</h1>
        <a href="immobili.php" class="btn"><img src="https://cdn-icons-png.flaticon.com/128/684/684908.png" class="icon"> Visualizza Immobili</a>
        <a href="vendite.php" class="btn"><img src="https://cdn-icons-png.flaticon.com/128/3062/3062634.png" class="icon"> Registra una Vendita</a>
    </div>
</body>
</html>
