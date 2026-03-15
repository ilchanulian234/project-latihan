<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - <?= $nama ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --bg-light: #f8f9fc;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .profile-card:hover {
            transform: translateY(-5px);
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #224abe 100%);
            padding: 40px 20px;
            text-align: center;
            position: relative;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 60px;
            color: white;
            position: relative;
            z-index: 1;
        }
        
        .profile-body {
            padding: 30px;
        }
        
        .profile-name {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        
        .profile-status {
            font-size: 16px;
            color: var(--primary-color);
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .status-indicator {
            width: 10px;
            height: 10px;
            background: var(--success-color);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title i {
            color: var(--primary-color);
        }
        
        .bio-text {
            color: var(--secondary-color);
            line-height: 1.8;
            font-size: 15px;
        }
        
        .skill-badge {
            display: inline-block;
            padding: 8px 16px;
            margin: 5px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: default;
        }
        
        .skill-badge:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Skill Colors */
        .skill-0 { background: #777bb3; color: white; }
        .skill-1 { background: #f05032; color: white; }
        .skill-2 { background: #3f5942; color: white; }
        .skill-3 { background: #dd4814; color: white; }
        .skill-4 { background: #306998; color: white; }
        .skill-5 { background: #f7df1e; color: #333; }
        .skill-6 { background: #e34c26; color: white; }
        .skill-7 { background: #264de4; color: white; }
        .skill-8 { background: #339933; color: white; }
        .skill-9 { background: #7f52ff; color: white; }
        .skill-10 { background: #ff6f61; color: white; }
        .skill-11 { background: #00d2ff; color: white; }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 18px;
        }
        
        .social-link:hover {
            transform: translateY(-3px);
        }
        
        .social-github { background: #333; }
        .social-linkedin { background: #0077b5; }
        .social-twitter { background: #1da1f2; }
        .social-instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: var(--bg-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
        }
        
        .info-text {
            flex: 1;
        }
        
        .info-label {
            font-size: 12px;
            color: var(--secondary-color);
        }
        
        .info-value {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }
        
        .footer-copyright {
            text-align: center;
            padding: 20px;
            color: var(--secondary-color);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="profile-card">
                    <!-- Profile Header -->
                    <div class="profile-header">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    
                    <!-- Profile Body -->
                    <div class="profile-body text-center">
                        <h1 class="profile-name"><?= $nama ?></h1>
                        <div class="profile-status">
                            <span class="status-indicator"></span>
                            <?= $status ?>
                        </div>
                        
                        <!-- Bio Section -->
                        <div class="mt-4">
                            <div class="section-title justify-content-center">
                                <i class="fas fa-user-circle"></i>
                                Tentang Saya
                            </div>
                            <p class="bio-text">
                                Halo! Saya seorang <?= $status ?> dengan passion dalam membangun aplikasi web yang modern dan efisien. 
                                Saya senang belajar teknologi baru dan berbagi pengetahuan dengan komunitas developer.<br><br>
                                Berikut beberapa peran yang saya tekuni:
                                <?php foreach ($roles as $role): ?>
                                    <strong><?= $role ?></strong><?= ($role !== end($roles)) ? ', ' : '' ?>
                                <?php endforeach; ?>
                            </p>
                        </div>
                        
                        <!-- Roles Section -->
                        <div class="mt-4">
                            <div class="section-title justify-content-center">
                                <i class="fas fa-briefcase"></i>
                                Peran & Fokus
                            </div>
                            <div class="skills-container">
                                <?php 
                                $roleColors = ['skill-0', 'skill-1', 'skill-2', 'skill-3', 'skill-4'];
                                $colorIndex = 0;
                                foreach ($roles as $r): 
                                ?>
                                    <span class="skill-badge <?= $roleColors[$colorIndex % count($roleColors)] ?>">
                                        <i class="fas fa-star me-1"></i>
                                        <?= $r ?>
                                    </span>
                                <?php 
                                $colorIndex++;
                                endforeach; 
                                ?>
                            </div>
                        </div>
                        
                        <!-- Skills Section -->
                        <div class="mt-4">
                            <div class="section-title justify-content-center">
                                <i class="fas fa-code"></i>
                                Bahasa Pemrograman
                            </div>
                            <div class="skills-container">
                                <?php 
                                $skillColors = ['skill-5', 'skill-6', 'skill-7', 'skill-8', 'skill-9', 'skill-10'];
                                $colorIndex = 0;
                                foreach ($skill as $s): 
                                ?>
                                    <span class="skill-badge <?= $skillColors[$colorIndex % count($skillColors)] ?>">
                                        <i class="fas fa-check-circle me-1"></i>
                                        <?= $s ?>
                                    </span>
                                <?php 
                                $colorIndex++;
                                endforeach; 
                                ?>
                            </div>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="mt-4 text-start">
                            <div class="section-title">
                                <i class="fas fa-address-card"></i>
                                Informasi Kontak
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-text">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">ian@developer.com</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-text">
                                    <div class="info-label">Lokasi</div>
                                    <div class="info-value">Indonesia</div>
                                </div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div class="info-text">
                                    <div class="info-label">Pengalaman</div>
                                    <div class="info-value">3+ Tahun</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Links -->
                        <div class="mt-4">
                            <div class="section-title justify-content-center">
                                <i class="fas fa-link"></i>
                                Sosial Media
                            </div>
                            <div class="social-links">
                                <a href="#" class="social-link social-github" title="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="social-link social-linkedin" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link social-twitter" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link social-instagram" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="footer-copyright">
                        <i class="fas fa-heart text-danger"></i>
                        Dibuat dengan cinta © <?= date('Y') ?> - <?= $nama ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

