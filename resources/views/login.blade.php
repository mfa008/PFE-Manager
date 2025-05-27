<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - PFE-Manager</title>
    <style>
        :root {
            --primary-color: #001f3f; /* Navy blue */
            --secondary-color: #0074D9;
            --accent-color: #FF851B;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('https://www.ucad.sn/sites/default/files/background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            width: 420px;
            padding: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .login-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        .logo-container {
            margin-bottom: 2rem;
        }
        .logo-img {
            height: 60px;
            margin-bottom: 1rem;
        }
        .logo-text {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.5rem;
            display: block;
            margin-bottom: 0.5rem;
        }
        .login-container h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
        }
        .form-group {
            margin-bottom: 1.8rem;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.6rem;
            color: var(--primary-color);
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        .form-group input:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 116, 217, 0.1);
        }
        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1rem;
            width: 100%;
            font-weight: bold;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        .btn:hover {
            background-color: #003366;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .links {
            margin-top: 2rem;
            font-size: 0.95rem;
            color: #666;
        }
        .links a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="{{ asset('images/logoESP.png') }}" alt="Logo UCAD" class="logo-img">
            <span class="logo-text">Gestion des Mémoires</span>
        </div>
        
        <h1>Connexion à l'espace membre</h1>
        
        <form action="/login" method="POST">
            <div class="form-group">
                <label for="email">Adresse Email UCAD</label>
                <input type="email" id="email" name="email" required placeholder="prenom.nom@ucad.edu.sn">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn">Se connecter</button>
        </form>

        <div class="links">
            <p>Première connexion? <a href="./inscription">Activer mon compte</a></p>
            <p><a href="./">← Retour à l'accueil</a></p>
        </div>
    </div>
</body>
</html>