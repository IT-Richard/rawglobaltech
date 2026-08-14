<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RAW GLOBAL TECH · Team Dashboard</title>
  <!-- Bootstrap 5 + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    /* ----- ROOT (same Cyber Blue) ----- */
    :root {
      --primary-blue: #00b4d8;
      --primary-dark: #0077b6;
      --accent-cyan: #00e5ff;
      --accent-cyan-light: #72f0ff;
      --bg-dark: #0a0e1a;
      --bg-dark-secondary: #0f1a2b;
      --bg-card: #132236;
      --bg-card-hover: #1c304a;
      --text-light: #f0f9ff;
      --text-muted: #90b4d9;
      --gradient-primary: linear-gradient(135deg, #0077b6, #00b4d8, #00e5ff);
      --gradient-cyan: linear-gradient(135deg, #00b4d8, #00e5ff, #72f0ff);
      --shadow-glow: 0 0 35px rgba(0, 180, 216, 0.25);
      --transition-smooth: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
      --transition-bounce: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      font-family: 'Roboto', sans-serif;
      background: var(--bg-dark);
      color: var(--text-light);
      overflow-x: hidden;
      padding-top: 76px;
    }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--bg-dark); }
    ::-webkit-scrollbar-thumb { background: var(--gradient-primary); border-radius: 10px; }

    /* ----- NAVBAR (same) ----- */
    .navbar {
      background: rgba(10, 14, 26, 0.88);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      border-bottom: 1px solid rgba(0, 229, 255, 0.06);
      padding: 12px 0;
      transition: var(--transition-smooth);
    }
    .navbar.scrolled { background: rgba(10, 14, 26, 0.98); box-shadow: 0 5px 30px rgba(0,0,0,0.6); }
    .navbar-brand {
      font-family: 'Orbitron', sans-serif;
      font-weight: 700;
      font-size: 1.8rem;
      color: var(--accent-cyan) !important;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .navbar-brand:hover { transform: scale(1.02); color: var(--accent-cyan-light) !important; }
    .navbar-brand img { height: 50px; }
    .nav-link {
      color: var(--text-light) !important;
      font-weight: 500;
      font-size: 0.95rem;
      padding: 8px 16px !important;
      transition: var(--transition-smooth);
      position: relative;
      letter-spacing: 0.5px;
    }
    .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0; left: 50%;
      width: 0; height: 2px;
      background: var(--gradient-cyan);
      transition: var(--transition-smooth);
      transform: translateX(-50%);
    }
    .nav-link:hover::after, .nav-link.active::after { width: 70%; }
    .nav-link:hover { color: var(--accent-cyan) !important; transform: translateY(-2px); }
    .navbar-toggler { border: 1px solid rgba(0,229,255,0.15); padding: 8px 12px; border-radius: 8px; }
    .navbar-toggler:focus { box-shadow: 0 0 0 3px rgba(0,229,255,0.25); }

    /* ===== DROPDOWN ===== */
    .dropdown-menu {
      background: var(--bg-dark-secondary);
      border: 1px solid rgba(0, 229, 255, 0.08);
      border-radius: 12px;
      padding: 8px 0;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
    }
    .dropdown-item {
      color: var(--text-light);
      padding: 10px 20px;
      transition: var(--transition-smooth);
      font-weight: 400;
    }
    .dropdown-item:hover {
      background: rgba(0, 229, 255, 0.08);
      color: var(--accent-cyan);
      padding-left: 26px;
    }
    .dropdown-divider {
      border-color: rgba(0, 229, 255, 0.06);
    }

    /* ----- HERO (brief, no about) ----- */
    .hero {
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
      overflow: hidden;
      background: var(--bg-dark);
      padding: 40px 0 30px;
    }
    .hero-animation-container {
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background: radial-gradient(ellipse at center, #0a1e30, #0a0e1a);
      z-index: 0;
    }
    .hero-content { position: relative; z-index: 2; animation: fadeInUp 1.2s ease-out; }
    @keyframes fadeInUp { from { opacity:0; transform: translateY(40px); } to { opacity:1; transform: translateY(0); } }
    .hero h1 {
      font-family: 'Orbitron', sans-serif;
      font-weight: 900;
      font-size: 4rem;
      line-height: 1.1;
      margin-bottom: 15px;
    }
    .hero h1 .highlight { background: var(--gradient-cyan); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .hero p { font-size: 1.2rem; color: var(--text-muted); max-width: 600px; margin: 0 auto 25px; }
    .btn-primary-custom {
      display: inline-flex; align-items: center; gap: 10px;
      padding: 14px 35px;
      background: var(--gradient-primary);
      color: #fff; border: none; border-radius: 50px;
      font-weight: 600; font-size: 1rem;
      transition: var(--transition-bounce);
      text-decoration: none;
    }
    .btn-primary-custom:hover { transform: translateY(-4px) scale(1.02); box-shadow: 0 15px 40px rgba(0,180,216,0.4); color: #fff; }

    /* ----- SECTION TITLES ----- */
    .section-title {
      font-family: 'Orbitron', sans-serif;
      font-weight: 700;
      color: var(--accent-cyan);
      position: relative;
      margin-bottom: 1.5rem;
      font-size: 2.5rem;
    }
    .section-title::after {
      content: ''; display: block;
      width: 60px; height: 3px;
      background: var(--gradient-cyan);
      margin: 12px auto 0;
      border-radius: 3px;
    }
    .section-subtitle { color: var(--text-muted); font-size: 1.1rem; max-width: 700px; margin: 0 auto 3rem; }
    .section-darker { background: var(--bg-dark); padding: 80px 0; }
    .section-dark { background: var(--bg-dark-secondary); padding: 80px 0; }

    /* ----- TEAM GRID (about page) ----- */
    .team-card {
      background: var(--bg-card);
      border-radius: 20px;
      padding: 25px 15px 20px;
      border: 1px solid rgba(0,229,255,0.05);
      transition: var(--transition-bounce);
      text-align: center;
      cursor: pointer;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .team-card:hover {
      transform: translateY(-10px);
      border-color: rgba(0,229,255,0.2);
      box-shadow: var(--shadow-glow);
      background: var(--bg-card-hover);
    }
    .team-avatar {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid var(--accent-cyan);
      box-shadow: 0 0 25px rgba(0,229,255,0.15);
      transition: var(--transition-smooth);
      background: var(--gradient-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 4rem;
      color: #fff;
      margin-bottom: 12px;
    }
    .team-card:hover .team-avatar { transform: scale(1.04); box-shadow: 0 0 40px rgba(0,229,255,0.3); }
    .team-name { font-weight: 700; font-size: 1.2rem; color: var(--text-light); margin-bottom: 2px; }
    .team-role { font-size: 0.9rem; color: var(--accent-cyan); font-weight: 500; }

    /* ----- DASHBOARD MODAL (beautiful advanced) ----- */
    .dashboard-modal .modal-content {
      background: var(--bg-dark-secondary);
      border: 1px solid rgba(0,229,255,0.12);
      border-radius: 28px;
      box-shadow: 0 30px 80px rgba(0,0,0,0.8);
      color: var(--text-light);
      overflow: hidden;
    }
    .dashboard-modal .modal-header {
      border-bottom: 1px solid rgba(0,229,255,0.08);
      padding: 20px 28px;
      background: rgba(0,229,255,0.02);
    }
    .dashboard-modal .modal-header .btn-close {
      filter: invert(1) brightness(2);
      opacity: 0.7;
    }
    .dashboard-modal .modal-body { padding: 28px; }
    .dashboard-avatar {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid var(--accent-cyan);
      box-shadow: 0 0 40px rgba(0,229,255,0.15);
      background: var(--gradient-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 5rem;
      color: #fff;
      margin: 0 auto 18px;
    }
    .dashboard-name { font-family: 'Playfair Display', serif; font-size: 2.2rem; color: var(--text-light); }
    .dashboard-role { color: var(--accent-cyan); font-size: 1.1rem; font-weight: 500; }
    .dashboard-badge {
      background: rgba(0,229,255,0.08);
      border: 1px solid rgba(0,229,255,0.1);
      border-radius: 50px;
      padding: 6px 18px;
      font-size: 0.8rem;
      color: var(--accent-cyan-light);
      display: inline-block;
    }
    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-top: 20px;
    }
    .info-item {
      background: rgba(0,229,255,0.03);
      border-radius: 16px;
      padding: 16px 18px;
      border-left: 3px solid var(--accent-cyan);
    }
    .info-item .label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); }
    .info-item .value { font-weight: 600; font-size: 1rem; color: var(--text-light); margin-top: 4px; }
    .skill-tag {
      display: inline-block;
      background: rgba(0,229,255,0.06);
      border: 1px solid rgba(0,229,255,0.06);
      padding: 4px 14px;
      border-radius: 30px;
      font-size: 0.8rem;
      color: var(--text-muted);
      margin: 3px 4px 3px 0;
    }
    .dashboard-social a {
      color: var(--text-muted);
      transition: var(--transition-smooth);
      font-size: 1.4rem;
      margin: 0 8px;
    }
    .dashboard-social a:hover { color: var(--accent-cyan); transform: translateY(-3px); }

    /* ----- FOOTER (same) ----- */
    .footer {
      background: #060a12;
      padding: 40px 0 20px;
      border-top: 1px solid rgba(0,229,255,0.04);
    }
    .footer-brand { font-family: 'Orbitron', sans-serif; font-size: 1.5rem; color: var(--accent-cyan); font-weight: 700; }
    .footer p { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 4px; }
    .social-link {
      display: inline-flex; align-items: center; justify-content: center;
      width: 40px; height: 40px;
      border-radius: 50%;
      background: rgba(0,229,255,0.04);
      color: var(--text-light);
      font-size: 1rem;
      transition: var(--transition-bounce);
      text-decoration: none;
      border: 1px solid rgba(0,229,255,0.06);
      margin: 0 4px;
    }
    .social-link:hover { background: var(--gradient-cyan); color: #0a0e1a; transform: translateY(-4px); box-shadow: 0 10px 30px rgba(0,229,255,0.2); }
    .footer-links a { color: var(--text-muted); text-decoration: none; transition: var(--transition-smooth); font-size: 0.9rem; margin: 0 8px; }
    .footer-links a:hover { color: var(--accent-cyan); }

    /* ----- responsive ----- */
    @media (max-width: 768px) {
      .hero h1 { font-size: 2.8rem; }
      .section-title { font-size: 2rem; }
      .team-avatar { width: 100px; height: 100px; font-size: 3rem; }
      .info-grid { grid-template-columns: 1fr; }
      .dashboard-avatar { width: 110px; height: 110px; font-size: 3.5rem; }
      .dashboard-name { font-size: 1.8rem; }
    }
    @media (max-width: 480px) {
      .hero h1 { font-size: 2.2rem; }
      .navbar-brand { font-size: 1.3rem; }
    }
    /* particles (reused) */
    .particle {
      position: absolute;
      background: var(--gradient-primary);
      border-radius: 50%;
      opacity: 0;
      animation: particleAnimation 25s infinite ease-in-out;
      box-shadow: 0 0 15px rgba(0,180,216,0.3);
    }
    .particle:nth-child(odd) { background: var(--gradient-cyan); box-shadow: 0 0 15px rgba(0,229,255,0.3); }
    @keyframes particleAnimation {
      0% { transform: translate(var(--x-start), var(--y-start)) scale(0) rotate(0deg); opacity: 0; }
      20% { opacity: 0.6; transform: translate(var(--x-mid1), var(--y-mid1)) scale(1) rotate(90deg); }
      40% { opacity: 0.9; transform: translate(var(--x-mid2), var(--y-mid2)) scale(1.3) rotate(180deg); }
      60% { opacity: 0.7; transform: translate(var(--x-mid3), var(--y-mid3)) scale(0.9) rotate(270deg); }
      80% { opacity: 0.4; transform: translate(var(--x-mid4), var(--y-mid4)) scale(0.6) rotate(330deg); }
      100% { transform: translate(var(--x-end), var(--y-end)) scale(0) rotate(360deg); opacity: 0; }
    }
    .floating-shape {
      position: absolute; border-radius: 50%; opacity: 0.03; pointer-events: none;
      border: 2px solid var(--accent-cyan);
    }
    @keyframes floatShape {
      0%, 100% { transform: translate(0,0) rotate(0deg) scale(1); }
      25% { transform: translate(30px,-20px) rotate(90deg) scale(1.1); }
      50% { transform: translate(-20px,30px) rotate(180deg) scale(0.9); }
      75% { transform: translate(20px,-30px) rotate(270deg) scale(1.05); }
    }
  </style>
</head>
<body>

  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="about.php">
        <img src="img/rgt_logo.png" alt="RGT">
        RAW GLOBAL TECH
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link" href="index.html#services">Services</a></li>
          <!-- SOFTWARE DROPDOWN -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSoftware" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Software
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownSoftware">
              <!-- Internal link: scrolls to "Our Software Solutions" section on homepage -->
              <li><a class="dropdown-item" href="index.html#software">Our Software Solutions</a></li>
              <li><hr class="dropdown-divider"></li>
              <!-- External link: School Management System -->
              <li><a class="dropdown-item" href="school-management-features.html" target="_blank">School Management System</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="index.html#contact">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== HERO (no profile/about) ===== -->
  <section id="home" class="hero">
    <div class="hero-animation-container" id="particleContainer"></div>
    <div class="hero-content">
      <span class="badge bg-cyan text-dark mb-3" style="background:var(--accent-cyan); font-weight:600; padding:8px 20px;">Innovation Unleashed</span>
      <h1>RAW GLOBAL <span class="highlight">TECH</span></h1>
      <p>Empowering businesses with cutting‑edge IT solutions, software development, and digital transformation.</p>
      <a href="index.html#services" class="btn-primary-custom"><i class="fas fa-rocket me-2"></i>Explore Services</a>
    </div>
  </section>

  <!-- ===== ABOUT PAGE (separate section) ===== -->
  <section id="about-page" class="section-darker">
    <div class="container">
      <div class="text-center" data-aos="fade-up">
        <h2 class="section-title">Meet the Team</h2>
        <p class="section-subtitle">Click on any developer's picture to view their full dashboard.</p>
      </div>
      <div class="row g-4" id="teamGrid">
        <!-- cards will be injected via JS -->
      </div>
    </div>
  </section>

  <!-- ===== SERVICES (shortened) ===== -->
  <section id="services" class="section-dark">
    <div class="container">
      <div class="text-center" data-aos="fade-up">
        <h2 class="section-title">Our Services</h2>
        <p class="section-subtitle">Comprehensive IT solutions tailored to your business.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up"><div class="team-card" style="cursor:default; padding:25px;"><i class="fas fa-cart-plus" style="font-size:3rem; color:var(--accent-cyan);"></i><h5 class="mt-3">IT Equipment Sales</h5><p style="color:var(--text-muted);">High-quality hardware solutions.</p></div></div>
        <div class="col-md-4" data-aos="fade-up"><div class="team-card" style="cursor:default; padding:25px;"><i class="fas fa-code" style="font-size:3rem; color:var(--accent-cyan);"></i><h5 class="mt-3">Software Development</h5><p style="color:var(--text-muted);">Custom applications &amp; web.</p></div></div>
        <div class="col-md-4" data-aos="fade-up"><div class="team-card" style="cursor:default; padding:25px;"><i class="fas fa-chart-line" style="font-size:3rem; color:var(--accent-cyan);"></i><h5 class="mt-3">IT Consulting</h5><p style="color:var(--text-muted);">Strategic digital guidance.</p></div></div>
      </div>
    </div>
  </section>

  <!-- ===== SOFTWARE (brief) ===== -->
  <section id="software" class="section-darker">
    <div class="container">
      <div class="text-center" data-aos="fade-up">
        <h2 class="section-title">Software Solutions</h2>
        <p class="section-subtitle">Innovative systems for modern organizations.</p>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="software-item d-flex align-items-center gap-3 p-3 mb-2" style="background:var(--bg-card); border-radius:12px; border-left:3px solid var(--accent-cyan);">
            <i class="fas fa-school text-cyan" style="font-size:1.5rem;"></i>
            <div><strong>School Management</strong> <span class="text-muted" style="font-size:0.9rem;">– streamline admin &amp; records</span></div>
          </div>
          <div class="software-item d-flex align-items-center gap-3 p-3 mb-2" style="background:var(--bg-card); border-radius:12px; border-left:3px solid var(--accent-cyan);">
            <i class="fas fa-hospital text-cyan" style="font-size:1.5rem;"></i>
            <div><strong>Hospital Management</strong> <span class="text-muted" style="font-size:0.9rem;">– patient care &amp; billing</span></div>
          </div>
          <div class="software-item d-flex align-items-center gap-3 p-3 mb-2" style="background:var(--bg-card); border-radius:12px; border-left:3px solid var(--accent-cyan);">
            <i class="fas fa-boxes text-cyan" style="font-size:1.5rem;"></i>
            <div><strong>Inventory Management</strong> <span class="text-muted" style="font-size:0.9rem;">– track stock &amp; orders</span></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== CONTACT ===== -->
  <section id="contact" class="section-dark">
    <div class="container">
      <div class="text-center" data-aos="fade-up">
        <h2 class="section-title">Get In Touch</h2>
        <p class="section-subtitle">Reach out for any project or inquiry.</p>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-6">
          <div class="bg-card p-4 rounded-4" style="background:var(--bg-card); border:1px solid rgba(0,229,255,0.05);">
            <h4 class="text-cyan mb-3"><i class="fas fa-envelope me-2"></i>Send a Message</h4>
            <form id="contactForm" onsubmit="return handleContact(event)">
              <div class="mb-3"><input type="text" class="form-control bg-dark text-light border-0" id="cName" placeholder="Full Name" required style="background:rgba(0,229,255,0.04); border:1px solid rgba(0,229,255,0.06);"></div>
              <div class="mb-3"><input type="email" class="form-control bg-dark text-light border-0" id="cEmail" placeholder="Email" required style="background:rgba(0,229,255,0.04); border:1px solid rgba(0,229,255,0.06);"></div>
              <div class="mb-3"><textarea class="form-control bg-dark text-light border-0" rows="4" id="cMsg" placeholder="Message" required style="background:rgba(0,229,255,0.04); border:1px solid rgba(0,229,255,0.06);"></textarea></div>
              <button type="submit" class="btn-cyan w-100" style="padding:12px; border:none; border-radius:50px; background:var(--gradient-cyan); color:#0a0e1a; font-weight:700;"><i class="fas fa-paper-plane me-2"></i>Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 text-center text-lg-start">
          <div class="footer-brand">RAW GLOBAL TECH</div>
          <p>Innovation Unleashed</p>
          <p><i class="fas fa-phone me-2"></i>+231 555 806 349</p>
          <p><i class="fas fa-envelope me-2"></i>rawglobalt@gmail.com</p>
        </div>
        <div class="col-lg-4 text-center">
          <div class="footer-links">
            <a href="index.html">Home</a>
            <a href="richard_about.php">About</a>
            <a href="index.html#services">Services</a>
            <a href="index.html#contact">Contact</a>
          </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
          <div>
            <a href="https://www.facebook.com/richardarchemedeswilliamsjr" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <p style="font-size:0.8rem;margin-top:12px;color:var(--text-muted);">&copy; 2025 RAW GLOBAL TECH</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- ===== DASHBOARD MODAL ===== -->
  <div class="modal fade dashboard-modal" id="dashboardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-cyan"><i class="fas fa-user-astronaut me-2"></i>Developer Dashboard</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" id="dashboardBody">
          <!-- dynamic content -->
        </div>
      </div>
    </div>
  </div>

  <!-- ===== SCRIPTS ===== -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 700, once: true });

    // ===== TEAM DATA (emails updated to rawglobalt@gmail.com) =====
    const teamMembers = [
      { name: "Richard", role: "Founder & CEO", bio: "Visionary leader with 15+ years in IT. Passionate about AI and digital transformation.", email: "rawglobalt@gmail.com", phone: "+231 555 100 001", skills: ["AI/ML", "Cloud Architecture", "Leadership"], avatar: "👨‍💻", bg: "linear-gradient(135deg,#0077b6,#00e5ff)" },
      { name: "Edmond Dennis", role: "Lead Developer", bio: "Full‑stack architect specializing in scalable web applications and microservices.", email: "rawglobalt@gmail.com", phone: "+231 555 806 349", skills: ["React", "Node.js", "Python", "Laravel"], avatar: "🧑‍💻", bg: "linear-gradient(135deg,#00b4d8,#72f0ff)" },
      { name: "Sarah K.", role: "UI/UX Director", bio: "Design thinker crafting intuitive experiences that bridge technology and human needs.", email: "rawglobalt@gmail.com", phone: "+231 555 200 002", skills: ["Figma", "Design Systems", "User Research"], avatar: "🎨", bg: "linear-gradient(135deg,#00e5ff,#0077b6)" },
      { name: "Michael T.", role: "Security Engineer", bio: "Cybersecurity expert with focus on zero‑trust architectures and threat intelligence.", email: "rawglobalt@gmail.com", phone: "+231 555 300 003", skills: ["Pen Testing", "SIEM", "Cloud Security"], avatar: "🔐", bg: "linear-gradient(135deg,#0a1e30,#00b4d8)" },
      { name: "Grace M.", role: "Project Manager", bio: "Agile coach and PMP certified, delivering complex IT projects on time and within budget.", email: "rawglobalt@gmail.com", phone: "+231 555 400 004", skills: ["Agile", "Scrum", "Risk Management"], avatar: "📊", bg: "linear-gradient(135deg,#132236,#00e5ff)" },
      { name: "David L.", role: "Data Scientist", bio: "Turning data into actionable insights using machine learning and advanced analytics.", email: "rawglobalt@gmail.com", phone: "+231 555 500 005", skills: ["Python", "SQL", "TensorFlow", "Tableau"], avatar: "📈", bg: "linear-gradient(135deg,#0077b6,#72f0ff)" }
    ];

    // ===== RENDER TEAM GRID =====
    const grid = document.getElementById('teamGrid');
    teamMembers.forEach((m, idx) => {
      const col = document.createElement('div');
      col.className = 'col-6 col-md-4 col-lg-3';
      col.setAttribute('data-aos', 'fade-up');
      col.setAttribute('data-aos-delay', (idx * 50));
      col.innerHTML = `
        <div class="team-card" onclick="openDashboard(${idx})">
          <div class="team-avatar" style="background:${m.bg};">${m.avatar}</div>
          <div class="team-name">${m.name}</div>
          <div class="team-role">${m.role}</div>
        </div>
      `;
      grid.appendChild(col);
    });

    // ===== OPEN DASHBOARD =====
    function openDashboard(index) {
      const m = teamMembers[index];
      if (!m) return;
      const body = document.getElementById('dashboardBody');
      body.innerHTML = `
        <div class="text-center">
          <div class="dashboard-avatar" style="background:${m.bg};">${m.avatar}</div>
          <div class="dashboard-name">${m.name}</div>
          <div class="dashboard-role">${m.role}</div>
          <span class="dashboard-badge mt-2"><i class="fas fa-bolt me-1"></i>Active</span>
        </div>
        <div class="info-grid">
          <div class="info-item"><div class="label"><i class="fas fa-envelope me-1"></i>Email</div><div class="value">${m.email}</div></div>
          <div class="info-item"><div class="label"><i class="fas fa-phone me-1"></i>Phone</div><div class="value">${m.phone}</div></div>
          <div class="info-item" style="grid-column: span 2;"><div class="label"><i class="fas fa-quote-left me-1"></i>Bio</div><div class="value" style="font-weight:400; color:var(--text-muted);">${m.bio}</div></div>
          <div class="info-item" style="grid-column: span 2;"><div class="label"><i class="fas fa-cogs me-1"></i>Skills</div><div class="value">${m.skills.map(s => `<span class="skill-tag">${s}</span>`).join(' ')}</div></div>
        </div>
        <div class="dashboard-social text-center mt-4">
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fas fa-globe"></i></a>
        </div>
      `;
      const modal = new bootstrap.Modal(document.getElementById('dashboardModal'));
      modal.show();
    }

    // ===== PARTICLES (reuse) =====
    (function generateParticles() {
      const container = document.getElementById('particleContainer');
      if (!container) return;
      const count = 40;
      for (let i = 0; i < count; i++) {
        const p = document.createElement('div');
        p.classList.add('particle');
        const size = Math.random() * 5 + 2;
        p.style.width = size + 'px'; p.style.height = size + 'px';
        const vw = Math.random() * 100 + 'vw';
        const vh = Math.random() * 100 + 'vh';
        p.style.setProperty('--x-start', vw); p.style.setProperty('--y-start', vh);
        p.style.setProperty('--x-mid1', Math.random() * 100 + 'vw'); p.style.setProperty('--y-mid1', Math.random() * 100 + 'vh');
        p.style.setProperty('--x-mid2', Math.random() * 100 + 'vw'); p.style.setProperty('--y-mid2', Math.random() * 100 + 'vh');
        p.style.setProperty('--x-mid3', Math.random() * 100 + 'vw'); p.style.setProperty('--y-mid3', Math.random() * 100 + 'vh');
        p.style.setProperty('--x-mid4', Math.random() * 100 + 'vw'); p.style.setProperty('--y-mid4', Math.random() * 100 + 'vh');
        p.style.setProperty('--x-end', Math.random() * 100 + 'vw'); p.style.setProperty('--y-end', Math.random() * 100 + 'vh');
        p.style.animationDelay = Math.random() * 20 + 's';
        p.style.animationDuration = (Math.random() * 15 + 20) + 's';
        container.appendChild(p);
      }
    })();

    // ===== floating shapes =====
    (function addShapes() {
      const hero = document.querySelector('.hero');
      if (!hero) return;
      const chars = ['✦','◆','▲','●','★'];
      for (let i = 0; i < 5; i++) {
        const s = document.createElement('div');
        s.className = 'floating-shape';
        s.textContent = chars[i % chars.length];
        s.style.fontSize = (Math.random() * 25 + 20) + 'px';
        s.style.left = (Math.random() * 90 + 5) + '%';
        s.style.top = (Math.random() * 90 + 5) + '%';
        s.style.animation = `floatShape ${Math.random() * 15 + 20}s ease-in-out infinite`;
        s.style.animationDelay = Math.random() * 10 + 's';
        hero.appendChild(s);
      }
    })();

    // ===== contact form =====
    function handleContact(e) {
      e.preventDefault();
      alert('Thank you! Your message has been sent (demo).');
      document.getElementById('cName').value = '';
      document.getElementById('cEmail').value = '';
      document.getElementById('cMsg').value = '';
      return false;
    }

    // ===== navbar scroll =====
    window.addEventListener('scroll', function() {
      const nav = document.getElementById('mainNav');
      if (window.scrollY > 50) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
    });
  </script>
</body>
</html>
