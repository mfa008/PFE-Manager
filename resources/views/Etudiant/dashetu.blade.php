<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Étudiant - Plateforme Mémoires UCAD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #001f3f;
            --secondary-color: #0074D9;
            --accent-color: #FF851B;
            --success-color: #2ECC40;
            --warning-color: #FFDC00;
            --danger-color: #FF4136;
            --light-gray: #f8f9fa;
            --dark-gray: #333;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: var(--dark-gray);
            line-height: 1.6;
        }
        
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        .dashboard-header h1 {
            color: var(--primary-color);
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 8px 15px;
            border-radius: 25px;
            transition: background-color 0.3s;
        }
        
        .user-profile:hover {
            background-color: var(--light-gray);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            min-width: 200px;
            z-index: 1000;
            display: none;
        }
        
        .dropdown-menu.show {
            display: block;
        }
        
        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s;
        }
        
        .dropdown-item:hover {
            background-color: var(--light-gray);
        }
        
        .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .dropdown-item.logout {
            color: var(--danger-color);
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        
        .alert-warning {
            background-color: var(--warning-color);
            color: #000;
        }
        
        .alert-success {
            background-color: var(--success-color);
            color: white;
        }
        
        .alert-info {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .alert i {
            font-size: 1.5rem;
        }
        
        .workflow-steps {
            display: flex;
            margin-bottom: 30px;
            position: relative;
            justify-content: space-between;
        }
        
        .workflow-steps::before {
            content: "";
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #ddd;
            z-index: 1;
        }
        
        .workflow-step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 2;
            max-width: 25%;
        }
        
        .step-number {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            font-weight: bold;
        }
        
        .step-active .step-number {
            background-color: var(--accent-color);
            color: white;
        }
        
        .step-completed .step-number {
            background-color: var(--success-color);
            color: white;
        }
        
        .step-title {
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .dashboard-section {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .dashboard-section h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary-color);
        }
        
        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .form-control:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 116, 217, 0.1);
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #003366;
            transform: translateY(-2px);
        }
        
        .btn-accent {
            background-color: var(--accent-color);
            color: white;
        }
        
        .btn-accent:hover {
            background-color: #e67300;
        }
        
        .upload-section {
            border: 2px dashed #ddd;
            padding: 40px 20px;
            text-align: center;
            margin: 30px 0;
            border-radius: 8px;
            background-color: var(--light-gray);
        }
        
        .upload-section p {
            margin-bottom: 20px;
            color: #666;
        }
        
        .file-input {
            display: none;
        }
        
        .file-info {
            margin-top: 15px;
            font-size: 0.9rem;
        }
        
        .feedback-section {
            background-color: var(--light-gray);
            padding: 25px;
            border-radius: 8px;
            margin-top: 30px;
            border-left: 4px solid var(--secondary-color);
        }
        
        .feedback-section h3 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .feedback-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            margin: 15px 0;
        }
        
        .feedback-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 0.9rem;
            color: #666;
        }
        
        .validation-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 15px;
        }
        
        .badge-pending {
            background-color: var(--warning-color);
            color: #000;
        }
        
        .badge-approved {
            background-color: var(--success-color);
            color: white;
        }
        
        .badge-rejected {
            background-color: var(--danger-color);
            color: white;
        }
        
        .hidden {
            display: none;
        }
        
        .supervisor-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 15px;
            padding: 15px;
            background-color: var(--light-gray);
            border-radius: 5px;
        }
        
        .supervisor-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--secondary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .supervisor-details h4 {
            margin-bottom: 5px;
        }
        
        .supervisor-details p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .thesis-info {
            margin-top: 30px;
        }
        
        .thesis-info h3 {
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .thesis-details {
            background-color: var(--light-gray);
            padding: 20px;
            border-radius: 5px;
        }
        
        .thesis-details p {
            margin-bottom: 10px;
        }
        
        .version-history {
            margin-top: 30px;
        }
        
        .version-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .version-item:last-child {
            border-bottom: none;
        }
        
        .version-date {
            font-weight: bold;
        }
        
        .version-comment {
            color: #666;
            font-style: italic;
        }
        
        .modification-alert {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }
        
        .modification-alert h4 {
            color: #856404;
            margin-bottom: 10px;
        }
        
        @media (max-width: 768px) {
            .workflow-steps {
                flex-direction: column;
                align-items: flex-start;
                gap: 25px;
            }
            
            .workflow-step {
                max-width: 100%;
                text-align: left;
                display: flex;
                align-items: center;
                gap: 15px;
            }
            
            .workflow-steps::before {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- En-tête -->
        <header class="dashboard-header">
            <h1><i class="fas fa-book-open"></i> Mon Mémoire</h1>
            <div class="user-menu">
                <div class="user-profile" onclick="toggleDropdown()">
                    <span id="userName">Mame Diaratoulah Dieng</span>
                    <div class="user-avatar" id="userAvatar">
                    <i class="fas fa-user"></i>
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="dropdown-menu" id="dropdownMenu">
                    <div class="dropdown-item">
                        <i class="fas fa-user"></i>
                        <span>Mon profil</span>
                    </div>
                    <div class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>Paramètres</span>
                    </div>
                    <div class="dropdown-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Aide</span>
                    </div>
                    <div class="dropdown-item logout" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Se déconnecter</span>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Alertes dynamiques -->
        <div id="alertContainer"></div>
        
        <!-- Workflow visuel -->
        <div class="workflow-steps" id="workflowSteps">
            <div class="workflow-step step-completed">
                <div class="step-number">1</div>
                <div class="step-title">Activation compte</div>
            </div>
            <div class="workflow-step step-active">
                <div class="step-number">2</div>
                <div class="step-title">Configuration mémoire</div>
            </div>
            <div class="workflow-step">
                <div class="step-number">3</div>
                <div class="step-title">Téléversement</div>
            </div>
            <div class="workflow-step">
                <div class="step-number">4</div>
                <div class="step-title">Validation</div>
            </div>
        </div>
        
        <!-- Section Configuration -->
        <div class="dashboard-section" id="configSection">
            <h2><i class="fas fa-cog"></i> Configuration du mémoire</h2>
            
            <div class="form-group">
                <label for="supervisor">Choix de l'encadrant *</label>
                <select id="supervisor" class="form-control" required>
                    <option value="">-- Sélectionnez un encadrant --</option>
                </select>
                <small class="text-muted">Contactez le secrétariat si votre encadrant n'apparaît pas dans la liste</small>
            </div>
            
            <div class="form-group">
                <label for="thesisTitle">Titre provisoire du mémoire *</label>
                <input type="text" id="thesisTitle" class="form-control" required 
                       placeholder="Ex: Analyse des systèmes distribués dans les environnements cloud">
                <small class="text-muted">Maximum 200 caractères</small>
            </div>
            
            <div class="form-group">
                <label for="thesisAbstract">Résumé succinct *</label>
                <textarea id="thesisAbstract" class="form-control" rows="6" required
                          placeholder="Décrivez en 300-500 mots votre problématique, méthodologie et objectifs..."></textarea>
                <small class="text-muted">Ce résumé sera visible par votre encadrant</small>
            </div>
            
            <button class="btn btn-primary" onclick="saveConfig()">
                <i class="fas fa-save"></i> Enregistrer la configuration
            </button>
        </div>
        
        <!-- Section Téléversement -->
        <div class="dashboard-section hidden" id="uploadSection">
            <h2><i class="fas fa-cloud-upload-alt"></i> Téléversement du mémoire</h2>
            
            <div class="thesis-info">
                <h3>Votre configuration</h3>
                <div class="thesis-details" id="thesisDisplay">
                    <!-- Contenu dynamique -->
                </div>
            </div>
            
            <div class="upload-section">
                <h3><i class="fas fa-file-upload"></i> Déposer votre mémoire</h3>
                <p>Formats acceptés : PDF, DOCX (Taille maximale : 20MB)</p>
                
                <div style="margin: 25px 0;">
                    <input type="file" id="thesisFile" class="file-input" accept=".pdf,.docx">
                    <button class="btn btn-accent" onclick="document.getElementById('thesisFile').click()">
                        <i class="fas fa-file-import"></i> Sélectionner un fichier
                    </button>
                    <div class="file-info" id="fileInfo">Aucun fichier sélectionné</div>
                </div>
                
                <div class="form-group" style="text-align: left;">
                    <label for="versionComment">Commentaire de version (optionnel)</label>
                    <input type="text" id="versionComment" class="form-control" 
                           placeholder="Ex: Version préliminaire, Version corrigée chapitre 3...">
                </div>
                
                <button class="btn btn-primary" id="uploadBtn" disabled style="margin-top: 20px;">
                    <i class="fas fa-check-circle"></i> Soumettre pour validation
                </button>
            </div>
            
            <div class="version-history">
                <h3><i class="fas fa-history"></i> Historique des versions</h3>
                <div id="versionList">
                    <!-- Contenu dynamique -->
                </div>
            </div>
        </div>
        
        <!-- Section Validation/Feedback -->
        <div class="dashboard-section hidden" id="validationSection">
            <h2><i class="fas fa-comments"></i> Validation de votre mémoire</h2>
            
            <div class="supervisor-info" id="supervisorDisplay">
                <!-- Contenu dynamique -->
            </div>
            
            <div id="feedbackContainer">
                <!-- Contenu dynamique des feedbacks -->
            </div>
            
            <div class="version-history" style="margin-top: 30px;">
                <h3><i class="fas fa-history"></i> Historique des validations</h3>
                <div id="validationHistory">
                    <!-- Contenu dynamique -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Données factices
        const mockData = {
            currentUser: {
                id: 1,
                name: "Mame Diaratoulah Dieng",
                email: "m.dieng@ucad.edu.sn",
                avatar: "MD"
            },
            
            supervisors: [
                { id: 1, name: "Pr. Aminata Ndiaye", department: "Informatique", email: "a.ndiaye@ucad.edu.sn", avatar: "AN" },
                { id: 2, name: "Dr. Mamadou Fall", department: "Mathématiques Appliquées", email: "m.fall@ucad.edu.sn", avatar: "MF" },
                { id: 3, name: "Dr. Fatou Sarr", department: "Physique", email: "f.sarr@ucad.edu.sn", avatar: "FS" },
                { id: 4, name: "Pr. Jean Diop", department: "Chimie", email: "j.diop@ucad.edu.sn", avatar: "JD" }
            ],
            
            submissions: [
                {
                    id: 1,
                    version: "1.0",
                    fileName: "memoire_v1.pdf",
                    uploadDate: "2024-05-15",
                    comment: "Version préliminaire",
                    status: "rejected",
                    feedback: {
                        date: "2024-05-18",
                        supervisor: "Pr. Aminata Ndiaye",
                        comments: "Bon travail globalement, mais quelques points à améliorer :\n- Le chapitre 2 nécessite plus de développement sur la partie méthodologie\n- Veuillez corriger les références bibliographiques pages 12-15\n- Ajouter une analyse comparative avec les travaux similaires\n\nMerci de me soumettre une version corrigée avant le 25 mai.",
                        needsRevision: true
                    }
                },
                {
                    id: 2,
                    version: "1.1",
                    fileName: "memoire_v1_1.pdf",
                    uploadDate: "2024-05-24",
                    comment: "Version corrigée suite aux recommandations",
                    status: "pending",
                    feedback: null
                }
            ]
        };
        
        // Variables d'état
        let appState = {
            step: 2,
            config: {
                supervisor: null,
                title: '',
                abstract: ''
            },
            hasSubmissions: false,
            isModificationMode: false
        };
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            loadMockSupervisors();
            loadAppState();
            updateUI();
            setupEventListeners();
        });
        
        function loadMockSupervisors() {
            const supervisorSelect = document.getElementById('supervisor');
            mockData.supervisors.forEach(supervisor => {
                const option = document.createElement('option');
                option.value = supervisor.id;
                option.textContent = `${supervisor.name} (${supervisor.department})`;
                supervisorSelect.appendChild(option);
            });
        }
        
        function loadAppState() {
            // Simuler différents états selon l'utilisateur
            const savedState = JSON.parse(window.sessionStorage.getItem('appState') || 'null');
            
            if (savedState) {
                appState = savedState;
            } else {
                // État par défaut : utilisateur avec soumissions existantes
                appState = {
                    step: 4, // Étape validation
                    config: {
                        supervisor: 1,
                        title: "Analyse des systèmes distribués dans les environnements cloud",
                        abstract: "Ce mémoire examine les défis et opportunités des systèmes distribués dans les environnements cloud modernes. L'étude porte sur l'analyse des performances, la scalabilité et la sécurité des architectures distribuées."
                    },
                    hasSubmissions: true,
                    isModificationMode: true
                };
            }
        }
        
        function saveAppState() {
            window.sessionStorage.setItem('appState', JSON.stringify(appState));
        }
        
        function updateUI() {
            updateWorkflowSteps();
            updateAlerts();
            showCurrentSection();
            
            if (appState.config.supervisor) {
                populateConfigFields();
            }
        }
        
        function updateWorkflowSteps() {
            const steps = document.querySelectorAll('.workflow-step');
            
            steps.forEach((step, index) => {
                const stepNumber = index + 1;
                step.classList.remove('step-active', 'step-completed');
                
                if (stepNumber < appState.step) {
                    step.classList.add('step-completed');
                } else if (stepNumber === appState.step) {
                    step.classList.add('step-active');
                }
            });
        }
        
        function updateAlerts() {
            const alertContainer = document.getElementById('alertContainer');
            alertContainer.innerHTML = '';
            
            if (appState.step === 2 && !appState.config.supervisor) {
                showAlert('warning', 'Configuration requise', 
                    'Pour pouvoir téléverser votre mémoire, vous devez d\'abord compléter la configuration.');
            }
            
            if (appState.isModificationMode && appState.step === 4) {
                const lastSubmission = mockData.submissions[mockData.submissions.length - 1];
                if (lastSubmission.status === 'rejected') {
                    showAlert('info', 'Modifications demandées', 
                        'Votre encadrant a demandé des modifications. Vous pouvez téléverser une nouvelle version directement sans refaire la configuration.');
                }
            }
            
            if (appState.step === 4 && mockData.submissions.some(s => s.status === 'pending')) {
                showAlert('info', 'En cours de validation', 
                    'Votre mémoire est en cours de validation par votre encadrant. Vous recevrez une notification dès qu\'il aura donné son avis.');
            }
        }
        
        function showAlert(type, title, message) {
            const alertContainer = document.getElementById('alertContainer');
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type}`;
            
            const icon = type === 'warning' ? 'exclamation-circle' : 
                        type === 'success' ? 'check-circle' : 'info-circle';
            
            alertDiv.innerHTML = `
                <i class="fas fa-${icon}"></i>
                <div>
                    <h3 style="margin-bottom: 10px;">${title}</h3>
                    <p>${message}</p>
                </div>
            `;
            
            alertContainer.appendChild(alertDiv);
        }
        
        function showCurrentSection() {
            // Cacher toutes les sections
            document.getElementById('configSection').classList.add('hidden');
            document.getElementById('uploadSection').classList.add('hidden');
            document.getElementById('validationSection').classList.add('hidden');
            
            // Afficher la section appropriée
            switch(appState.step) {
                case 2:
                    document.getElementById('configSection').classList.remove('hidden');
                    break;
                case 3:
                    document.getElementById('uploadSection').classList.remove('hidden');
                    displayThesisInfo();
                    displayVersionHistory();
                    break;
                case 4:
                    document.getElementById('validationSection').classList.remove('hidden');
                    displaySupervisorInfo();
                    displayFeedbacks();
                    displayValidationHistory();
                    
                    // Si en mode modification, afficher aussi la section upload
                    if (appState.isModificationMode) {
                        document.getElementById('uploadSection').classList.remove('hidden');
                        displayThesisInfo();
                        displayVersionHistory();
                    }
                    break;
            }
        }
        
        function populateConfigFields() {
            if (appState.config.supervisor) {
                document.getElementById('supervisor').value = appState.config.supervisor;
                document.getElementById('thesisTitle').value = appState.config.title;
                document.getElementById('thesisAbstract').value = appState.config.abstract;
            }
        }
        
        function displayThesisInfo() {
            const supervisor = mockData.supervisors.find(s => s.id == appState.config.supervisor);
            const thesisDisplay = document.getElementById('thesisDisplay');
            
            if (supervisor) {
                thesisDisplay.innerHTML = `
                    <p><strong>Encadrant :</strong> ${supervisor.name}</p>
                    <p><strong>Titre :</strong> ${appState.config.title}</p>
                `;
            }
        }
        
        function displaySupervisorInfo() {
            const supervisor = mockData.supervisors.find(s => s.id == appState.config.supervisor);
            const supervisorDisplay = document.getElementById('supervisorDisplay');
            
            if (supervisor) {
                supervisorDisplay.innerHTML = `
                    <div class="supervisor-avatar">${supervisor.avatar}</div>
                    <div class="supervisor-details">
                        <h4>${supervisor.name}</h4>
                        <p>Département de ${supervisor.department}</p>
                        <p>Email: ${supervisor.email}</p>
                    </div>
                `;
            }
        }
        
        function displayVersionHistory() {
            const versionList = document.getElementById('versionList');
            versionList.innerHTML = '';
            
            mockData.submissions.forEach(submission => {
                const statusClass = submission.status === 'approved' ? 'badge-approved' :
                                  submission.status === 'rejected' ? 'badge-rejected' : 'badge-pending';
                
                const statusText = submission.status === 'approved' ? 'Approuvé' :
                                 submission.status === 'rejected' ? 'Modifications requises' : 'En attente';
                
                const statusIcon = submission.status === 'approved' ? 'check-circle' :
                                 submission.status === 'rejected' ? 'times-circle' : 'clock';
                
                const versionDiv = document.createElement('div');
                versionDiv.className = 'version-item';
                versionDiv.innerHTML = `
                    <div>
                        <span class="version-date">${submission.uploadDate}</span>
                        <span class="version-comment"> - ${submission.comment}</span>
                        <br><small>Fichier: ${submission.fileName}</small>
                    </div>
                    <div>
                        <span class="${statusClass} validation-badge">
                            <i class="fas fa-${statusIcon}"></i> ${statusText}
                        </span>
                    </div>
                `;
                
                versionList.appendChild(versionDiv);
            });
        }
        
        function displayFeedbacks() {
            const feedbackContainer = document.getElementById('feedbackContainer');
            feedbackContainer.innerHTML = '';
            
            const feedbacks = mockData.submissions.filter(s => s.feedback);
            
            feedbacks.forEach(submission => {
                const feedbackDiv = document.createElement('div');
                feedbackDiv.className = 'feedback-section';
                
                const statusClass = submission.status === 'approved' ? 'badge-approved' : 'badge-rejected';
                const statusText = submission.status === 'approved' ? 'Approuvé' : 'Nécessite des modifications';
                const statusIcon = submission.status === 'approved' ? 'check-circle' : 'times-circle';
                
                feedbackDiv.innerHTML = `
                    <div class="feedback-content">
                        <div class="feedback-meta">
                            <span><i class="fas fa-calendar-alt"></i> ${submission.feedback.date}</span>
                            <span><i class="fas fa-file-alt"></i> Version ${submission.version}</span>
                        </div>
                        <pre style="white-space: pre-wrap; font-family: inherit;">${submission.feedback.comments}</pre>
                    </div>
                    
                    <div class="validation-badge ${statusClass}">
                        <i class="fas fa-${statusIcon}"></i> ${statusText}
                    </div>
                    
                    ${submission.feedback.needsRevision ? `
                        <div style="margin-top: 25px;">
                            <button class="btn btn-accent" onclick="enableModificationMode()">
                                <i class="fas fa-file-upload"></i> Téléverser une nouvelle version
                            </button>
                        </div>
                    ` : ''}
                `;
                
                feedbackContainer.appendChild(feedbackDiv);
            });
            
            // Si aucun feedback, afficher un message d'attente
            if (feedbacks.length === 0) {
                feedbackContainer.innerHTML = `
                    <div class="feedback-section">
                        <div class="feedback-content">
                            <p><i class="fas fa-clock"></i> En attente du retour de votre encadrant...</p>
                            <p>Vous recevrez une notification dès que votre encadrant aura évalué votre mémoire.</p>
                        </div>
                    </div>
                `;
            }
        }
        
        function displayValidationHistory() {
            const validationHistory = document.getElementById('validationHistory');
            validationHistory.innerHTML = '';
            
            mockData.submissions.forEach(submission => {
                if (submission.feedback) {
                    const statusClass = submission.status === 'approved' ? 'badge-approved' : 'badge-rejected';
                    const statusText = submission.status === 'approved' ? 'Approuvé' : 'Modifications requises';
                    const statusIcon = submission.status === 'approved' ? 'check-circle' : 'times-circle';
                    
                    const historyDiv = document.createElement('div');
                    historyDiv.className = 'version-item';
                    historyDiv.innerHTML = `
                        <div>
                            <span class="version-date">${submission.feedback.date}</span>
                            <span class="version-comment"> - Retour sur version ${submission.version}</span>
                        </div>
                        <div>
                            <span class="${statusClass} validation-badge">
                                <i class="fas fa-${statusIcon}"></i> ${statusText}
                            </span>
                        </div>
                    `;
                    
                    validationHistory.appendChild(historyDiv);
                }
            });
        }
        
        function setupEventListeners() {
            // Gestion du sélecteur de fichier
            document.getElementById('thesisFile').addEventListener('change', function(e) {
                if (e.target.files.length > 0) {
                    const file = e.target.files[0];
                    const maxSize = 20 * 1024 * 1024; // 20MB
                    
                    if (file.size > maxSize) {
                        alert('Le fichier est trop volumineux. Taille maximale : 20MB');
                        e.target.value = '';
                        document.getElementById('fileInfo').textContent = 'Aucun fichier sélectionné';
                        document.getElementById('uploadBtn').disabled = true;
                        return;
                    }
                    
                    document.getElementById('fileInfo').textContent = `Fichier sélectionné : ${file.name} (${formatFileSize(file.size)})`;
                    document.getElementById('uploadBtn').disabled = false;
                }
            });
            
            // Gestion du bouton de soumission
            document.getElementById('uploadBtn').addEventListener('click', function() {
                submitThesis();
            });
            
            // Fermer le dropdown si on clique ailleurs
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.user-menu')) {
                    document.getElementById('dropdownMenu').classList.remove('show');
                }
            });
        }
        
        function saveConfig() {
            const supervisorId = document.getElementById('supervisor').value;
            const title = document.getElementById('thesisTitle').value;
            const abstract = document.getElementById('thesisAbstract').value;
            
            // Validation
            if (!supervisorId || !title || !abstract) {
                alert('Veuillez remplir tous les champs obligatoires');
                return;
            }
            
            if (title.length > 200) {
                alert('Le titre ne doit pas dépasser 200 caractères');
                return;
            }
            
            if (abstract.length < 300) {
                alert('Le résumé doit contenir au moins 300 caractères');
                return;
            }
            
            // Sauvegarder la configuration
            appState.config = {
                supervisor: parseInt(supervisorId),
                title: title,
                abstract: abstract
            };
            
            appState.step = 3;
            saveAppState();
            updateUI();
            
            showAlert('success', 'Configuration sauvegardée', 'Vous pouvez maintenant téléverser votre mémoire.');
        }
        
        function submitThesis() {
            const fileInput = document.getElementById('thesisFile');
            const versionComment = document.getElementById('versionComment').value || 'Nouvelle version';
            
            if (!fileInput.files.length) {
                alert('Veuillez sélectionner un fichier à téléverser');
                return;
            }
            
            const file = fileInput.files[0];
            const newVersion = `${mockData.submissions.length + 1}.0`;
            
            // Ajouter la nouvelle soumission aux données factices
            const newSubmission = {
                id: mockData.submissions.length + 1,
                version: newVersion,
                fileName: file.name,
                uploadDate: new Date().toISOString().split('T')[0],
                comment: versionComment,
                status: 'pending',
                feedback: null
            };
            
            mockData.submissions.push(newSubmission);
            
            // Mettre à jour l'état de l'application
            appState.step = 4;
            appState.hasSubmissions = true;
            appState.isModificationMode = false;
            saveAppState();
            
            // Réinitialiser le formulaire
            fileInput.value = '';
            document.getElementById('versionComment').value = '';
            document.getElementById('fileInfo').textContent = 'Aucun fichier sélectionné';
            document.getElementById('uploadBtn').disabled = true;
            
            updateUI();
            showAlert('success', 'Mémoire soumis', 'Votre mémoire a été soumis avec succès pour validation.');
        }
        
        function enableModificationMode() {
            appState.isModificationMode = true;
            saveAppState();
            updateUI();
            
            // Faire défiler vers la section de téléversement
            document.getElementById('uploadSection').scrollIntoView({ behavior: 'smooth' });
        }
        
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('show');
        }
        
        function logout() {
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                // Effacer les données de session
                window.sessionStorage.clear();
                
                // Simuler la redirection vers la page de connexion
                alert('Vous avez été déconnecté avec succès.');
                
                // Réinitialiser l'état de l'application
                appState = {
                    step: 2,
                    config: {
                        supervisor: null,
                        title: '',
                        abstract: ''
                    },
                    hasSubmissions: false,
                    isModificationMode: false
                };
                
                // Vider les données factices des soumissions
                mockData.submissions.length = 0;
                
                updateUI();
            }
        }
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // Simuler des mises à jour de statut en temps réel (optionnel)
        function simulateStatusUpdates() {
            setInterval(() => {
                // Simuler parfois des changements de statut
                const pendingSubmissions = mockData.submissions.filter(s => s.status === 'pending');
                
                if (pendingSubmissions.length > 0 && Math.random() < 0.1) { // 10% de chance
                    const submission = pendingSubmissions[0];
                    const isApproved = Math.random() < 0.3; // 30% chance d'approbation
                    
                    submission.status = isApproved ? 'approved' : 'rejected';
                    submission.feedback = {
                        date: new Date().toISOString().split('T')[0],
                        supervisor: "Pr. Aminata Ndiaye",
                        comments: isApproved ? 
                            "Excellent travail ! Votre mémoire est approuvé. Félicitations pour la qualité de votre recherche et de votre rédaction." :
                            "Bon travail dans l'ensemble, mais quelques améliorations sont nécessaires :\n- Développer davantage la section méthodologie\n- Corriger les références bibliographiques\n- Ajouter une conclusion plus détaillée",
                        needsRevision: !isApproved
                    };
                    
                    if (!isApproved) {
                        appState.isModificationMode = true;
                    }
                    
                    saveAppState();
                    updateUI();
                    
                    // Notification !!!!!!!!!!
                    showAlert(isApproved ? 'success' : 'info', 
                             isApproved ? 'Mémoire approuvé !' : 'Nouveau feedback disponible',
                             isApproved ? 'Félicitations ! Votre mémoire a été approuvé par votre encadrant.' : 'Votre encadrant a évalué votre mémoire. Consultez ses commentaires ci-dessous.');
                }
            }, 30000); // Vérifier toutes les 30 secondes
        }
        
        // Démarrer les simulations (optionnel)
        // simulateStatusUpdates();
    </script>
</body>
</html>