<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activation de compte -  PFE-Manager</title>
    <style>
        :root {
            --primary-color: #001f3f;
            --secondary-color: #0074D9;
            --accent-color: #FF851B;
            --success-color: #2ECC40;
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
        .activation-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            width: 450px;
            padding: 3rem;
            text-align: center;
            position: relative;
        }
        .activation-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }
        .logo-container {
            margin-bottom: 1.5rem;
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
        }
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            position: relative;
        }
        .step-indicator::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #eee;
            z-index: 1;
        }
        .step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ddd;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            position: relative;
            z-index: 2;
        }
        .step.active {
            background-color: var(--primary-color);
            color: white;
        }
        .step.completed {
            background-color: var(--success-color);
            color: white;
        }
        .step-title {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            white-space: nowrap;
            color: #666;
        }
        .step.active .step-title {
            color: var(--primary-color);
            font-weight: bold;
        }
        .step.completed .step-title {
            color: var(--success-color);
        }
        .form-container {
            text-align: left;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }
        .form-group input:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 116, 217, 0.1);
        }
        .code-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .code-inputs input {
            width: 40px;
            height: 50px;
            text-align: center;
            font-size: 1.2rem;
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
            margin-top: 0.5rem;
        }
        .btn:hover {
            background-color: #FF851B;
        }
        .btn-secondary {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid #ddd;
        }
        .btn-secondary:hover {
            background-color: #f5f5f5;
        }
        .resend-code {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        .resend-code a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }
        .resend-code a:hover {
            text-decoration: underline;
        }
        .hidden {
            display: none;
        }
        .notification-box {
            background-color: #f8f9fa;
            border-left: 4px solid var(--secondary-color);
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }
        .notification-box i {
            color: var(--secondary-color);
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .notification-content {
            flex: 1;
        }
        .notification-box strong {
            color: var(--primary-color);
        }
        .action-links {
            margin-top: 1rem;
            text-align: center;
        }
        .action-links a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .btn-group {
            display: flex;
            gap: 10px;
        }
        .btn-group .btn {
            flex: 1;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="activation-container">
        <div class="logo-container">
            <img src="{{ asset('images/logoESP.png') }}" alt="Logo UCAD" class="logo-img">
            <span class="logo-text">Activation de compte</span>
        </div>
        
        <div class="step-indicator">
            <div class="step active" id="step1">
                <span>1</span>
                <span class="step-title">Vérification Email</span>
            </div>
            <div class="step" id="step2">
                <span>2</span>
                <span class="step-title">Code de vérification</span>
            </div>
            <div class="step" id="step3">
                <span>3</span>
                <span class="step-title">Nouveau mot de passe</span>
            </div>
        </div>
        
        <!-- Étape 1 : Saisie de l'email -->
        <div class="form-container" id="emailStep">
            <div class="form-group">
                <label for="email">Adresse Email UCAD</label>
                <input type="email" id="email" required placeholder="prenom.nom@ucad.edu.sn">
                <small>Un code d'activation sera envoyé à cette adresse</small>
            </div>
            <button type="button" class="btn" onclick="sendCode()">Envoyer le code</button>
            <div class="action-links">
                <a href="./login">J'ai déjà un compte</a>
            </div>
        </div>
        
        <!-- Étape 2 : Saisie du code -->
        <div class="form-container hidden" id="codeStep">
            <div class="notification-box">
                <i class="fas fa-envelope"></i>
                <div class="notification-content">
                    Nous avons envoyé un code à 6 chiffres à <strong id="userEmail"></strong>
                    <div style="font-size: 0.8rem; color: #666;">Vérifiez votre boîte de réception et votre dossier spam</div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Code de vérification</label>
                <div class="code-inputs">
                    <input type="text" maxlength="1" pattern="[0-9]">
                    <input type="text" maxlength="1" pattern="[0-9]">
                    <input type="text" maxlength="1" pattern="[0-9]">
                    <input type="text" maxlength="1" pattern="[0-9]">
                    <input type="text" maxlength="1" pattern="[0-9]">
                    <input type="text" maxlength="1" pattern="[0-9]">
                </div>
            </div>
            
            <div class="btn-group">
                <button type="button" class="btn btn-secondary" onclick="backToStep1()">
                    <i class="fas fa-arrow-left"></i> Retour
                </button>
                <button type="button" class="btn" onclick="verifyCode()">Vérifier le code</button>
            </div>
            
            <div class="resend-code">
                <span>Vous n'avez pas reçu de code? </span>
                <a href="#" onclick="resendCode()">Renvoyer le code</a>
            </div>
        </div>
        
        <!-- Étape 3 : Création du mot de passe -->
        <div class="form-container hidden" id="passwordStep">
            <div class="form-group">
                <label for="newPassword">Nouveau mot de passe</label>
                <input type="password" id="newPassword" required placeholder="••••••••">
                <small>Minimum 8 caractères avec chiffres et lettres</small>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" required placeholder="••••••••">
            </div>
            <button type="button" class="btn" onclick="submitPassword()">Activer mon compte</button>
        </div>
    </div>

    <script>
        function sendCode() {
            const email = document.getElementById('email').value;
            if (!email || !email.includes('@ucad.edu.sn')) {
                alert('Veuillez entrer une adresse email UCAD valide');
                return;
            }
            
            // Simulation d'envoi de code
            document.getElementById('userEmail').textContent = email;
            document.getElementById('emailStep').classList.add('hidden');
            document.getElementById('codeStep').classList.remove('hidden');
            
            // Mise à jour des étapes
            document.getElementById('step1').classList.remove('active');
            document.getElementById('step1').classList.add('completed');
            document.getElementById('step2').classList.add('active');
            
            // Auto-focus sur le premier champ de code
            document.querySelector('.code-inputs input').focus();
        }
        
        function backToStep1() {
            document.getElementById('codeStep').classList.add('hidden');
            document.getElementById('emailStep').classList.remove('hidden');
            
            // Mise à jour des étapes
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step1').classList.remove('completed');
            document.getElementById('step1').classList.add('active');
        }
        
        function verifyCode() {
            // Ici, vous vérifieriez normalement le code côté serveur
            document.getElementById('codeStep').classList.add('hidden');
            document.getElementById('passwordStep').classList.remove('hidden');
            
            // Mise à jour des étapes
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step2').classList.add('completed');
            document.getElementById('step3').classList.add('active');
        }
        
        function resendCode() {
            alert('Un nouveau code a été envoyé à votre adresse email');
        }
        
        function submitPassword() {
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword !== confirmPassword) {
                alert('Les mots de passe ne correspondent pas');
                return;
            }
            
            if (newPassword.length < 8) {
                alert('Le mot de passe doit contenir au moins 8 caractères');
                return;
            }
            
            // Ici, vous enverriez normalement le nouveau mot de passe au serveur
            alert('Votre compte a été activé avec succès!');
            window.location.href = './login';
        }
        
        // Gestion de la saisie automatique du code
        document.querySelectorAll('.code-inputs input').forEach((input, index, inputs) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });
            
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value.length === 0) {
                    if (index > 0) {
                        inputs[index - 1].focus();
                    }
                }
            });
        });
    </script>
</body>
</html>