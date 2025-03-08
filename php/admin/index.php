<!DOCTYPE html>
<html>
<head>
    <title>Contatti - Agenzia Immobiliare</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 50px;
            background: url('https://source.unsplash.com/1600x900/?office,contact') no-repeat center center fixed;
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
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        .contact-info {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .contact-info img {
            width: 40px;
            margin-right: 10px;
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
</body>
</html>
