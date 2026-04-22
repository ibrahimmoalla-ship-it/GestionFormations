<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>STREET ROLLERS — BMX & Skateboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=Bebas+Neue&family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --noir: #0a0a0a;
      --blanc: #f5f0e8;
      --jaune: #f5c400;
      --rouge: #e8321a;
      --gris: #1c1c1c;
      --gris2: #2e2e2e;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html { scroll-behavior: smooth; }

    body {
      background: var(--noir);
      color: var(--blanc);
      font-family: 'Inter', sans-serif;
      overflow-x: hidden;
      cursor: none;
    }

    /* CUSTOM CURSOR */
    .cursor {
      position: fixed;
      width: 18px; height: 18px;
      background: var(--jaune);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.1s, width 0.2s, height 0.2s, background 0.2s;
      mix-blend-mode: difference;
    }
    .cursor.big { width: 40px; height: 40px; }

    /* NAV */
    nav {
      position: fixed; top: 0; left: 0; right: 0;
      z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 18px 48px;
      background: rgba(10,10,10,0.92);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid #222;
    }
    .logo {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2rem;
      letter-spacing: 4px;
      color: var(--jaune);
      text-decoration: none;
    }
    .logo span { color: var(--rouge); }
    nav ul { list-style: none; display: flex; gap: 36px; }
    nav ul a {
      color: var(--blanc);
      text-decoration: none;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      opacity: 0.7;
      transition: opacity 0.2s, color 0.2s;
    }
    nav ul a:hover { opacity: 1; color: var(--jaune); }
    .cart-btn {
      background: var(--jaune);
      color: var(--noir);
      border: none;
      padding: 10px 22px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1rem;
      letter-spacing: 2px;
      cursor: none;
      transition: background 0.2s, transform 0.15s;
    }
    .cart-btn:hover { background: var(--rouge); color: var(--blanc); transform: skewX(-4deg); }

    /* HERO */
    .hero {
      min-height: 100vh;
      display: flex; align-items: center;
      padding: 120px 48px 60px;
      position: relative;
      overflow: hidden;
    }
    .hero-bg {
      position: absolute; inset: 0;
      background:
        repeating-linear-gradient(
          90deg,
          transparent,
          transparent 60px,
          rgba(245,196,0,0.03) 60px,
          rgba(245,196,0,0.03) 61px
        ),
        repeating-linear-gradient(
          0deg,
          transparent,
          transparent 60px,
          rgba(245,196,0,0.03) 60px,
          rgba(245,196,0,0.03) 61px
        );
    }
    .hero-noise {
      position: absolute; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
      background-size: 200px;
      opacity: 0.4;
      pointer-events: none;
    }
    .hero-content { position: relative; z-index: 2; max-width: 700px; }
    .hero-tag {
      display: inline-block;
      background: var(--rouge);
      color: var(--blanc);
      font-size: 0.7rem;
      font-weight: 600;
      letter-spacing: 4px;
      text-transform: uppercase;
      padding: 6px 14px;
      margin-bottom: 24px;
      animation: fadeUp 0.6s ease both;
    }
    .hero h1 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(5rem, 12vw, 11rem);
      line-height: 0.9;
      letter-spacing: -2px;
      animation: fadeUp 0.7s 0.1s ease both;
    }
    .hero h1 .yellow { color: var(--jaune); display: block; }
    .hero h1 .outline {
      -webkit-text-stroke: 2px var(--blanc);
      color: transparent;
      display: block;
    }
    .hero-sub {
      margin-top: 24px;
      font-size: 1rem;
      opacity: 0.6;
      max-width: 400px;
      line-height: 1.6;
      animation: fadeUp 0.7s 0.2s ease both;
    }
    .hero-btns {
      margin-top: 40px;
      display: flex; gap: 16px;
      animation: fadeUp 0.7s 0.3s ease both;
    }
    .btn-primary {
      background: var(--jaune);
      color: var(--noir);
      border: none;
      padding: 16px 36px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.2rem;
      letter-spacing: 3px;
      cursor: none;
      clip-path: polygon(8px 0%, 100% 0%, calc(100% - 8px) 100%, 0% 100%);
      transition: background 0.2s, transform 0.15s;
    }
    .btn-primary:hover { background: var(--rouge); color: var(--blanc); transform: translateY(-2px); }
    .btn-outline {
      background: transparent;
      color: var(--blanc);
      border: 2px solid rgba(245,240,232,0.3);
      padding: 16px 36px;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.2rem;
      letter-spacing: 3px;
      cursor: none;
      transition: border-color 0.2s, color 0.2s;
    }
    .btn-outline:hover { border-color: var(--jaune); color: var(--jaune); }
    .hero-visual {
      position: absolute; right: 0; top: 0; bottom: 0;
      width: 45%;
      display: flex; align-items: center; justify-content: center;
      overflow: hidden;
    }
    .hero-circles {
      position: absolute;
      width: 600px; height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle at 40% 40%, rgba(245,196,0,0.18), transparent 60%);
      animation: rotate 20s linear infinite;
    }
    .big-number {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(200px, 22vw, 340px);
      color: transparent;
      -webkit-text-stroke: 1px rgba(245,196,0,0.15);
      line-height: 1;
      user-select: none;
      animation: float 6s ease-in-out infinite;
    }

    /* TICKER */
    .ticker {
      background: var(--jaune);
      color: var(--noir);
      padding: 12px 0;
      overflow: hidden;
      white-space: nowrap;
    }
    .ticker-inner {
      display: inline-block;
      animation: ticker 20s linear infinite;
    }
    .ticker-inner span {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.1rem;
      letter-spacing: 4px;
      margin-right: 60px;
    }
    .ticker-inner .dot { color: var(--rouge); margin-right: 60px; }

    /* SECTION */
    section { padding: 80px 48px; }
    .section-title {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(2.5rem, 6vw, 5rem);
      letter-spacing: 2px;
      margin-bottom: 8px;
    }
    .section-sub {
      font-size: 0.85rem;
      opacity: 0.5;
      letter-spacing: 3px;
      text-transform: uppercase;
      margin-bottom: 50px;
    }

    /* CATEGORIES */
    .categories { background: var(--gris); }
    .cat-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3px;
    }
    .cat-card {
      position: relative;
      height: 300px;
      overflow: hidden;
      cursor: none;
      background: var(--gris2);
    }
    .cat-card:first-child { grid-row: 1 / 3; height: auto; min-height: 603px; }
    .cat-bg {
      position: absolute; inset: 0;
      display: flex; align-items: center; justify-content: center;
      font-size: 200px;
      opacity: 0.06;
      transition: transform 0.5s, opacity 0.3s;
      user-select: none;
    }
    .cat-card:hover .cat-bg { transform: scale(1.1); opacity: 0.1; }
    .cat-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 60%);
    }
    .cat-content {
      position: absolute; bottom: 28px; left: 28px; right: 28px;
    }
    .cat-label {
      font-size: 0.65rem;
      font-weight: 600;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: var(--jaune);
      margin-bottom: 6px;
    }
    .cat-name {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2.6rem;
      letter-spacing: 2px;
      line-height: 1;
    }
    .cat-count { font-size: 0.8rem; opacity: 0.5; margin-top: 4px; }
    .cat-arrow {
      position: absolute; top: 24px; right: 24px;
      width: 40px; height: 40px;
      border: 1px solid rgba(255,255,255,0.2);
      display: flex; align-items: center; justify-content: center;
      transition: background 0.2s, border-color 0.2s;
    }
    .cat-card:hover .cat-arrow { background: var(--jaune); border-color: var(--jaune); color: var(--noir); }
    .cat-stripe {
      position: absolute; top: 0; left: 0;
      width: 4px; height: 100%;
      background: var(--jaune);
      transform: scaleY(0);
      transform-origin: bottom;
      transition: transform 0.4s ease;
    }
    .cat-card:hover .cat-stripe { transform: scaleY(1); }

    /* PRODUCTS */
    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 2px;
    }
    .product-card {
      background: var(--gris);
      padding: 0;
      overflow: hidden;
      position: relative;
      cursor: none;
      transition: transform 0.3s;
    }
    .product-card:hover { transform: translateY(-4px); z-index: 2; }
    .product-img {
      height: 220px;
      background: var(--gris2);
      display: flex; align-items: center; justify-content: center;
      font-size: 90px;
      position: relative;
      overflow: hidden;
    }
    .product-img::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(245,196,0,0.05), transparent);
    }
    .product-badge {
      position: absolute; top: 12px; left: 12px;
      background: var(--rouge);
      color: var(--blanc);
      font-size: 0.6rem;
      font-weight: 600;
      letter-spacing: 2px;
      text-transform: uppercase;
      padding: 4px 10px;
    }
    .product-info { padding: 20px; }
    .product-brand {
      font-size: 0.65rem;
      font-weight: 600;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--jaune);
      opacity: 0.8;
    }
    .product-name {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.4rem;
      letter-spacing: 1px;
      margin: 4px 0 8px;
      line-height: 1.1;
    }
    .product-footer {
      display: flex; align-items: center; justify-content: space-between;
      margin-top: 16px;
      padding-top: 16px;
      border-top: 1px solid rgba(255,255,255,0.07);
    }
    .product-price {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.6rem;
      color: var(--jaune);
      letter-spacing: 1px;
    }
    .product-price .old {
      font-size: 1rem;
      color: rgba(245,240,232,0.3);
      text-decoration: line-through;
      margin-right: 8px;
    }
    .add-btn {
      background: var(--jaune);
      color: var(--noir);
      border: none;
      width: 38px; height: 38px;
      font-size: 1.3rem;
      cursor: none;
      display: flex; align-items: center; justify-content: center;
      transition: background 0.2s, transform 0.15s;
      clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
    }
    .add-btn:hover { background: var(--rouge); color: var(--blanc); transform: scale(1.1); }

    /* PROMO BANNER */
    .promo-banner {
      background: var(--rouge);
      padding: 60px 48px;
      display: flex; align-items: center; justify-content: space-between;
      gap: 32px;
      position: relative;
      overflow: hidden;
    }
    .promo-banner::before {
      content: 'SALE';
      position: absolute;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 300px;
      color: rgba(0,0,0,0.08);
      right: -40px; top: -60px;
      letter-spacing: -10px;
    }
    .promo-text h2 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: clamp(2.5rem, 5vw, 4rem);
      letter-spacing: 2px;
      line-height: 1;
    }
    .promo-text p { opacity: 0.8; margin-top: 8px; font-size: 0.9rem; }
    .promo-code {
      background: rgba(0,0,0,0.2);
      padding: 20px 32px;
      text-align: center;
      min-width: 200px;
    }
    .promo-code small {
      font-size: 0.7rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      opacity: 0.7;
      display: block;
      margin-bottom: 6px;
    }
    .promo-code strong {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 2.2rem;
      letter-spacing: 6px;
      display: block;
    }

    /* BRANDS */
    .brands { background: var(--gris); }
    .brands-row {
      display: flex; gap: 0;
      overflow: hidden;
    }
    .brand-item {
      flex: 1;
      padding: 32px 24px;
      border-right: 1px solid rgba(255,255,255,0.05);
      display: flex; align-items: center; justify-content: center;
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.5rem;
      letter-spacing: 4px;
      opacity: 0.3;
      transition: opacity 0.2s, color 0.2s;
      cursor: none;
    }
    .brand-item:hover { opacity: 1; color: var(--jaune); }

    /* FOOTER */
    footer {
      background: #050505;
      padding: 60px 48px 30px;
      border-top: 1px solid rgba(245,196,0,0.15);
    }
    .footer-top {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr;
      gap: 48px;
      margin-bottom: 48px;
    }
    .footer-brand .logo { display: inline-block; margin-bottom: 16px; }
    .footer-brand p { font-size: 0.85rem; opacity: 0.5; line-height: 1.7; max-width: 260px; }
    .footer-col h4 {
      font-family: 'Bebas Neue', sans-serif;
      font-size: 1.2rem;
      letter-spacing: 3px;
      color: var(--jaune);
      margin-bottom: 16px;
    }
    .footer-col ul { list-style: none; }
    .footer-col ul li { margin-bottom: 10px; }
    .footer-col ul li a {
      color: rgba(245,240,232,0.5);
      text-decoration: none;
      font-size: 0.85rem;
      transition: color 0.2s;
    }
    .footer-col ul li a:hover { color: var(--blanc); }
    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,0.07);
      padding-top: 24px;
      display: flex; align-items: center; justify-content: space-between;
    }
    .footer-bottom p { font-size: 0.75rem; opacity: 0.3; }
    .social-links { display: flex; gap: 16px; }
    .social-links a {
      width: 36px; height: 36px;
      border: 1px solid rgba(255,255,255,0.15);
      display: flex; align-items: center; justify-content: center;
      text-decoration: none;
      font-size: 0.9rem;
      transition: border-color 0.2s, background 0.2s;
    }
    .social-links a:hover { border-color: var(--jaune); background: var(--jaune); color: var(--noir); }

    /* ANIMATIONS */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes ticker {
      from { transform: translateX(0); }
      to { transform: translateX(-50%); }
    }
    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }

    /* SCROLL REVEAL */
    .reveal { opacity: 0; transform: translateY(40px); transition: opacity 0.6s, transform 0.6s; }
    .reveal.visible { opacity: 1; transform: translateY(0); }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      nav { padding: 14px 20px; }
      nav ul { display: none; }
      .hero { padding: 100px 20px 40px; }
      .hero-visual { display: none; }
      section { padding: 60px 20px; }
      .cat-grid { grid-template-columns: 1fr; }
      .cat-card:first-child { min-height: 260px; }
      .footer-top { grid-template-columns: 1fr 1fr; gap: 32px; }
      .promo-banner { flex-direction: column; padding: 40px 20px; }
      .brands-row { flex-wrap: wrap; }
      .brand-item { flex: 0 0 33%; }
    }
  </style>
</head>
<body>

  <div class="cursor" id="cursor"></div>

  <!-- NAV -->
  <nav>
    <a href="#" class="logo">STREET <span>ROLLERS</span></a>
    <ul>
      <li><a href="#categories">Catégories</a></li>
      <li><a href="#produits">Produits</a></li>
      <li><a href="#marques">Marques</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <button class="cart-btn">🛒 Panier (0)</button>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-noise"></div>
    <div class="hero-content">
      <div class="hero-tag">⚡ Nouvelle collection 2026</div>
      <h1>
        <span class="yellow">BMX</span>
        <span class="outline">&amp; SKATE</span>
      </h1>
      <p class="hero-sub">Roule, saute, slide. Tout le matériel pro pour les riders qui repoussent les limites.</p>
      <div class="hero-btns">
        <button class="btn-primary" onclick="document.getElementById('produits').scrollIntoView()">Voir les produits</button>
        <button class="btn-outline" onclick="document.getElementById('categories').scrollIntoView()">Nos catégories</button>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-circles"></div>
      <div class="big-number">360</div>
    </div>
  </section>

  <!-- TICKER -->
  <div class="ticker">
    <div class="ticker-inner">
      <span>LIVRAISON GRATUITE DÈS 80€</span><span class="dot">★</span>
      <span>NOUVEAUX BMX DISPONIBLES</span><span class="dot">★</span>
      <span>RETOURS GRATUITS 30 JOURS</span><span class="dot">★</span>
      <span>SKATE DECKS EN STOCK</span><span class="dot">★</span>
      <span>LIVRAISON GRATUITE DÈS 80€</span><span class="dot">★</span>
      <span>NOUVEAUX BMX DISPONIBLES</span><span class="dot">★</span>
      <span>RETOURS GRATUITS 30 JOURS</span><span class="dot">★</span>
      <span>SKATE DECKS EN STOCK</span><span class="dot">★</span>
    </div>
  </div>

  <!-- CATEGORIES -->
  <section class="categories" id="categories">
    <p class="section-sub">— Explorer par univers</p>
    <h2 class="section-title reveal">NOS CATÉGORIES</h2>
    <div class="cat-grid reveal">
      <div class="cat-card">
        <div class="cat-bg">🚲</div>
        <div class="cat-overlay"></div>
        <div class="cat-stripe"></div>
        <div class="cat-arrow">→</div>
        <div class="cat-content">
          <div class="cat-label">Catégorie principale</div>
          <div class="cat-name">BMX</div>
          <div class="cat-count">48 produits disponibles</div>
        </div>
      </div>
      <div class="cat-card">
        <div class="cat-bg">🛹</div>
        <div class="cat-overlay"></div>
        <div class="cat-stripe"></div>
        <div class="cat-arrow">→</div>
        <div class="cat-content">
          <div class="cat-label">Street & Park</div>
          <div class="cat-name">SKATEBOARDS</div>
          <div class="cat-count">62 produits disponibles</div>
        </div>
      </div>
      <div class="cat-card">
        <div class="cat-bg">🪖</div>
        <div class="cat-overlay"></div>
        <div class="cat-stripe"></div>
        <div class="cat-arrow">→</div>
        <div class="cat-content">
          <div class="cat-label">Sécurité</div>
          <div class="cat-name">PROTECTIONS</div>
          <div class="cat-count">35 produits disponibles</div>
        </div>
      </div>
    </div>
  </section>

  <!-- PRODUCTS -->
  <section id="produits">
    <p class="section-sub">— Sélection du moment</p>
    <h2 class="section-title reveal">PRODUITS PHARES</h2>
    <div class="products-grid reveal">

      <div class="product-card">
        <div class="product-img">🚲
          <div class="product-badge">Nouveau</div>
        </div>
        <div class="product-info">
          <div class="product-brand">Sunday Bikes</div>
          <div class="product-name">BMX STREET PRIMER 20"</div>
          <div style="font-size:0.8rem;opacity:0.5">Cadre chromoly · Freins U-brake</div>
          <div class="product-footer">
            <div class="product-price">349 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">🛹
          <div class="product-badge" style="background:var(--jaune);color:var(--noir)">-20%</div>
        </div>
        <div class="product-info">
          <div class="product-brand">Element Skateboards</div>
          <div class="product-name">COMPLETE SKATE SECTION 8"</div>
          <div style="font-size:0.8rem;opacity:0.5">Deck érable · Roues 52mm</div>
          <div class="product-footer">
            <div class="product-price"><span class="old">110 €</span>88 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">🔩</div>
        <div class="product-info">
          <div class="product-brand">Bones</div>
          <div class="product-name">ROULEMENTS REDS ABEC 7</div>
          <div style="font-size:0.8rem;opacity:0.5">Pack de 8 · Acier inoxydable</div>
          <div class="product-footer">
            <div class="product-price">18 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">🪖
          <div class="product-badge">Top vente</div>
        </div>
        <div class="product-info">
          <div class="product-brand">Pro-Tec</div>
          <div class="product-name">CASQUE FULL CUT CLASSIC</div>
          <div style="font-size:0.8rem;opacity:0.5">Certifié CE · Tailles XS–XL</div>
          <div class="product-footer">
            <div class="product-price">69 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">⚙️</div>
        <div class="product-info">
          <div class="product-brand">Cult BMX</div>
          <div class="product-name">PÉGS ACIER 14mm x4</div>
          <div style="font-size:0.8rem;opacity:0.5">4.25" de long · Chrome</div>
          <div class="product-footer">
            <div class="product-price">32 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">🛹
          <div class="product-badge" style="background:var(--jaune);color:var(--noir)">Exclu</div>
        </div>
        <div class="product-info">
          <div class="product-brand">Santa Cruz</div>
          <div class="product-name">DECK SCREAMING HAND 8.5"</div>
          <div style="font-size:0.8rem;opacity:0.5">Érable 7 couches · Concave moyen</div>
          <div class="product-footer">
            <div class="product-price">65 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">👟</div>
        <div class="product-info">
          <div class="product-brand">Vans</div>
          <div class="product-name">OLD SKOOL PRO SKATE</div>
          <div style="font-size:0.8rem;opacity:0.5">Waffle sole · Tailles 36–47</div>
          <div class="product-footer">
            <div class="product-price">95 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

      <div class="product-card">
        <div class="product-img">🚲</div>
        <div class="product-info">
          <div class="product-brand">Haro Bikes</div>
          <div class="product-name">BMX DOWNTOWN DLX 20"</div>
          <div style="font-size:0.8rem;opacity:0.5">Hi-ten steel · Cassette 9T</div>
          <div class="product-footer">
            <div class="product-price">299 €</div>
            <button class="add-btn" onclick="addToCart(this)">+</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- PROMO BANNER -->
  <div class="promo-banner reveal">
    <div class="promo-text">
      <h2>SOLDES D'ÉTÉ<br/>JUSQU'À -30%</h2>
      <p>Sur une sélection de BMX, decks et protections. Offre limitée.</p>
    </div>
    <div class="promo-code">
      <small>Code promo</small>
      <strong>ROLLERS30</strong>
    </div>
    <button class="btn-primary">En profiter →</button>
  </div>

  <!-- BRANDS -->
  <section class="brands" id="marques">
    <p class="section-sub">— Ils nous font confiance</p>
    <h2 class="section-title reveal">NOS MARQUES</h2>
    <div class="brands-row reveal">
      <div class="brand-item">ELEMENT</div>
      <div class="brand-item">SANTA CRUZ</div>
      <div class="brand-item">SUNDAY</div>
      <div class="brand-item">CULT BMX</div>
      <div class="brand-item">BONES</div>
      <div class="brand-item">VANS</div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="contact">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#" class="logo">STREET <span>ROLLERS</span></a>
        <p>Votre shop spécialisé BMX & Skateboard. Matériel pro, livraison rapide, conseil d'experts riders.</p>
      </div>
      <div class="footer-col">
        <h4>Boutique</h4>
        <ul>
          <li><a href="#">BMX Complets</a></li>
          <li><a href="#">Skateboards</a></li>
          <li><a href="#">Pièces détachées</a></li>
          <li><a href="#">Protections</a></li>
          <li><a href="#">Vêtements</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Info</h4>
        <ul>
          <li><a href="#">À propos</a></li>
          <li><a href="#">Livraison</a></li>
          <li><a href="#">Retours</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="#">info@streetrollers.fr</a></li>
          <li><a href="#">+33 1 23 45 67 89</a></li>
          <li><a href="#">Paris, France</a></li>
          <li><a href="#">Lun–Sam 9h–19h</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 STREET ROLLERS. Tous droits réservés.</p>
      <div class="social-links">
        <a href="#">IG</a>
        <a href="#">TK</a>
        <a href="#">YT</a>
        <a href="#">FB</a>
      </div>
    </div>
  </footer>

  <script>
    // Custom cursor
    const cursor = document.getElementById('cursor');
    document.addEventListener('mousemove', e => {
      cursor.style.left = e.clientX + 'px';
      cursor.style.top = e.clientY + 'px';
    });
    document.querySelectorAll('button, a, .cat-card, .product-card, .brand-item').forEach(el => {
      el.addEventListener('mouseenter', () => cursor.classList.add('big'));
      el.addEventListener('mouseleave', () => cursor.classList.remove('big'));
    });

    // Cart
    let cartCount = 0;
    const cartBtn = document.querySelector('.cart-btn');
    function addToCart(btn) {
      cartCount++;
      cartBtn.textContent = `🛒 Panier (${cartCount})`;
      btn.textContent = '✓';
      btn.style.background = '#22c55e';
      setTimeout(() => {
        btn.textContent = '+';
        btn.style.background = '';
      }, 1200);
    }

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('visible'), i * 80);
        }
      });
    }, { threshold: 0.12 });
    reveals.forEach(el => observer.observe(el));
  </script>
</body>
</html>