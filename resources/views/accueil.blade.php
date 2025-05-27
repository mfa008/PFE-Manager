<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - PFE-Manager</title>
    <style>
        :root {
            --primary-color: #001f3f; /* Navy blue */
            --secondary-color: #0074D9; /* Blue */
            --light-color: #f8f9fa;
            --accent-color: #FF851B;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
        .navbar {
            background-color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo-img {
            height: 50px;
        }
        .logo-text {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.3rem;
        }
        .nav-links a {
            color: var(--primary-color);
            text-decoration: none;
            margin-left: 1.5rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: all 0.3s;
            font-weight: 500;
        }
        .nav-links a:hover {
            color: var(--secondary-color);
        }
        .nav-links a.login {
            background-color: var(--primary-color);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 30px;
        }
        .nav-links a.login:hover {
            background-color: #003366;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .hero {
            background: linear-gradient(135deg, var(--primary-color), #00284d);
            color: white;
            padding: 6rem 2rem 5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: url('https://www.ucad.sn/sites/default/files/logo_0.png') no-repeat;
            background-position: 90% 20%;
            background-size: 200px;
            opacity: 0.1;
        }
        .hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            position: relative;
        }
        .hero p {
            font-size: 1.25rem;
            max-width: 800px;
            margin: 0 auto 2.5rem;
            position: relative;
        }
        .btn {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s;
            position: relative;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn:hover {
            background-color: #e67300;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .features {
            padding: 4rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .features h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 3rem;
            font-size: 2rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-card h3 {
            color: var(--primary-color);
            border-bottom: 2px solid var(--light-color);
            padding-bottom: 0.5rem;
        }
        .footer {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }
        .user-types {
            background-color: var(--light-color);
            padding: 4rem 2rem;
        }
        .user-types h2 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 3rem;
        }
        .user-cards {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .user-card {
            background: white;
            border-radius: 8px;
            width: 300px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        .user-card h3 {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo-container">
            <img src="{{ asset('images/logoESP.png') }}" alt="Logo UCAD" class="logo-img">
            <span class="logo-text">PFE-Manager</span>
        </div>
        <div class="nav-links">
            <a href="#features">Fonctionnalités</a>
            <a href="#users">Pour qui?</a>
            <a href="./login" class="login"> Se connecter</a>
            <a href="./inscription" class="login"> Activer son compte</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Plateforme de gestion des mémoires</h1>
        <p>Solution centralisée pour l'affectation et le suivi des mémoires de fin d'études à l'Université Cheikh Anta Diop</p>
        <a href="./login" class="btn">Accéder à la plateforme</a>
    </section>

    <section class="features" id="features">
        <h2>Fonctionnalités clés</h2>
        <div class="features-grid">
            <div class="feature-card">
                <h3>Gestion centralisée</h3>
                <p>Un espace unique pour gérer toutes les étapes du processus de mémoire, de l'affectation à la validation finale.</p>
            </div>
            <div class="feature-card">
                <h3>Affectation transparente</h3>
                <p>Les étudiants peuvent choisir leur encadrant parmi les disponibles selon leur département et spécialité.</p>
            </div>
        </div>
    </section>

    <section class="user-types" id="users">
        <h2>Pour qui est cette plateforme?</h2>
        <div class="user-cards">
    <div class="user-card">
        <h3>Étudiants</h3>
        <p>Choisissez votre encadrant, téléversez votre mémoire pour qu'il puisse être validé ou commenté.</p>
    </div>
    <div class="user-card">
        <h3>Encadrants</h3>
        <p>Visualisez la liste de vos étudiants encadrés et commentez ou validez leur mémoire.</p>
    </div>
</div>
    </section>

    <footer class="footer">
        <p>© 2025 Plateforme de Gestion des Mémoires</p>
        <p>Service des enseignements - Direction des systèmes d'information</p>
    </footer>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>