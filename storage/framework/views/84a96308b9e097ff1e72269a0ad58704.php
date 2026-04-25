
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masavu Investment Club - Build Wealth Through Collective Investment</title>
    <meta name="description" content="Join Masavu Investment Club to pool resources, access larger investments, and grow wealth safely through professional management.">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">  
    
    <style>
        /* ============================================
           CSS RESET & BASE STYLES
        ============================================ */
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #f59e0b;
            --primary-dark: #b45309;
            --primary-light: #fbbf24;
            --accent: #fcd34d;
            --bg-light: #ffffff;
            --bg-warm: #fffbeb;
            --bg-warm-dark: #fef3c7;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --text-light: #f9fafb;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --green-400: #34d399;
            --green-500: #10b981;
            --green-600: #059669;
            --green-100: #d1fae5;
            --blue-400: #60a5fa;
            --blue-500: #3b82f6;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, var(--bg-warm) 0%, var(--bg-light) 50%, #fef3c7 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ============================================
           UTILITY CLASSES
        ============================================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .section {
            padding: 5rem 0;
        }

        .section--white {
            background: var(--bg-light);
        }

        .section--warm {
            background: linear-gradient(180deg, var(--bg-warm) 0%, var(--bg-light) 100%);
        }

        .section--cta {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--text-light);
        }

        .text-center {
            text-align: center;
        }

        .text-gradient {
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .grid {
            display: grid;
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .grid-4 {
            grid-template-columns: repeat(4, 1fr);
            display: flex;
        }

        @media (max-width: 768px) {
            .grid-2, .grid-3, .grid-4 {
                grid-template-columns: 1fr;
            }
        }

        .hidden {
            display: none;
        }

        @media (min-width: 768px) {
            .hidden {
                display: block;
            }
            .hidden-mobile {
                display: none;
            }
        }

        /* ============================================
           TYPOGRAPHY
        ============================================ */
        .hero-title {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
        }

        .section-title {
            font-size: clamp(1.75rem, 4vw, 2.5rem);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.125rem;
            color: var(--text-muted);
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .text-muted {
            color: var(--text-muted);
        }

        .text-primary {
            color: var(--primary-dark);
        }

        .text-success {
            color: var(--green-600);
        }

        .font-bold {
            font-weight: 700;
        }

        .font-semibold {
            font-weight: 600;
        }

        /* ============================================
           NAVIGATION
        ============================================ */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--gray-100);
            padding: 0.75rem 0;
        }

        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-logo-icon svg {
            color: white;
        }

        .navbar-brand {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-800);
        }

        .navbar-links {
            display: none;
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .navbar-links {
                display: flex;
            }
        }

        .navbar-links a {
            color: var(--text-muted);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-links a:hover {
            color: var(--primary);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-link {
            color: var(--primary);
            font-weight: 500;
            display: none;
        }

        @media (min-width: 640px) {
            .navbar-link {
                display: block;
            }
        }

        /* ============================================
           BUTTONS
        ============================================ */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.9375rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary-dark);
        }

        .btn-outline:hover {
            background: rgba(245, 158, 11, 0.1);
        }

        .btn-white {
            background: white;
            color: var(--primary-dark);
        }

        .btn-white:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-ghost {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* ============================================
           BADGES
        ============================================ */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(245, 158, 11, 0.1);
            color: var(--primary-dark);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .badge-dot {
            width: 8px;
            height: 8px;
            background: var(--primary);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(0.9); }
        }

        /* ============================================
           CARDS
        ============================================ */
        .card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-100);
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .card-icon svg {
            color: white;
            width: 28px;
            height: 28px;
        }

        .card p {
            color: var(--text-muted);
            line-height: 1.7;
        }

        /* ============================================
           PORTFOLIO CARD (Hero)
        ============================================ */
        .portfolio-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--gray-100);
            position: relative;
        }

        .portfolio-card::before {
            content: '';
            position: absolute;
            inset: -12px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 2rem;
            opacity: 0.15;
            z-index: -1;
            transform: rotate(3deg);
        }

        .portfolio-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .portfolio-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--green-400) 0%, var(--green-600) 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portfolio-label {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .portfolio-value {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .portfolio-item {
            margin-bottom: 1rem;
        }

        .portfolio-item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .progress-bar {
            height: 12px;
            background: var(--gray-100);
            border-radius: 9999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            width: 0;
            transition: width 1.5s ease;
        }

        .progress-fill--amber {
            background: linear-gradient(90deg, var(--primary-light), var(--primary));
        }

        .progress-fill--green {
            background: linear-gradient(90deg, var(--green-400), var(--green-600));
        }

        .progress-fill--blue {
            background: linear-gradient(90deg, var(--blue-400), var(--blue-500));
        }

        .portfolio-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-200);
            margin-top: 1.5rem;
        }

        .returns-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.5rem 1rem;
            background: var(--green-100);
            color: var(--green-600);
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* ============================================
           STATS
        ============================================ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        /* ============================================
           PROJECT CARDS
        ============================================ */
        .project-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--gray-100);
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .project-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }

        .project-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .project-card:hover .project-image {
            transform: scale(1.05);
        }

        .project-badge {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            padding: 0.375rem 0.875rem;
            background: var(--primary);
            color: white;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .project-body {
            padding: 1.5rem;
        }

        /* ============================================
           STEPS
        ============================================ */
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            position: relative;
        }

        @media (max-width: 768px) {
            .steps-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .step-card {
            background: linear-gradient(135deg, var(--bg-warm) 0%, var(--bg-warm-dark) 100%);
            border-radius: 1.5rem;
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 800;
            margin: 0 auto 1.5rem;
        }

        .step-arrow {
            position: absolute;
            right: -1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent);
            display: none;
        }

        @media (min-width: 992px) {
            .step-arrow {
                display: block;
            }
        }

        /* ============================================
           FAQ
        ============================================ */
        .faq-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            border-radius: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border: 1px solid var(--gray-100);
            overflow: hidden;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.25rem 1.5rem;
            cursor: pointer;
            font-weight: 600;
        }

        .faq-icon {
            color: var(--primary);
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 200px;
            padding: 0 1.5rem 1.25rem;
        }

        .faq-answer p {
            color: var(--text-muted);
        }

        /* ============================================
           CONTACT
        ============================================ */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 4rem;
        }

        @media (min-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        .contact-form-wrapper {
            background: linear-gradient(135deg, var(--bg-warm) 0%, var(--bg-warm-dark) 100%);
            border-radius: 1.5rem;
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--gray-800);
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        textarea.form-input {
            resize: vertical;
            min-height: 120px;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            background: rgba(245, 158, 11, 0.1);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            flex-shrink: 0;
        }

        .contact-label {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .contact-value {
            font-weight: 600;
        }

        /* Success Message */
        .success-message {
            text-align: center;
            padding: 3rem;
            display: none;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: var(--green-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--green-600);
        }

        /* ============================================
           CTA SECTION
        ============================================ */
        .cta-title {
            color: white;
        }

        .cta-subtitle {
            color: rgba(255, 255, 255, 0.9);
        }

        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 3rem;
            flex-wrap: wrap;
        }

        .trust-badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
        }

        /* ============================================
           FOOTER
        ============================================ */
        .footer {
            background: var(--gray-900);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .footer-logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-brand {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .footer-description {
            color: #9ca3af;
            max-width: 400px;
            margin-bottom: 2rem;
        }

        .footer-links h4 {
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #374151;
            text-align: center;
            color: #6b7280;
        }

        /* ============================================
           TESTIMONIAL / AVATARS
        ============================================ */
        .testimonial-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .avatars {
            display: flex;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.75rem;
            margin-left: -0.75rem;
        }

        .avatar:first-child {
            margin-left: 0;
        }

        .stars {
            display: flex;
            gap: 0.125rem;
            color: var(--primary);
        }

        .rating-text {
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        /* ============================================
           HERO GRID
        ============================================ */
        .hero-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 4rem;
            align-items: center;
            padding-top: 6rem;
        }

        @media (min-width: 992px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* ============================================
           ANIMATIONS
        ============================================ */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ============================================
           SCROLLBAR
        ============================================ */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body>
    <!-- ============================================
         NAVIGATION
    ============================================ -->
    <nav class="navbar">
        <div class="container navbar-inner">
            <a href="#" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                        <polyline points="16 7 22 7 22 13"></polyline>
                    </svg>
                </div>
                <span class="navbar-brand">Masavu</span>
            </a>

            <div class="navbar-links">
                <a href="#features">Features</a>
                <a href="#projects">Projects</a>
                <a href="#faq">FAQ</a>
                <a href="#contact">Contact</a>
            </div>

            <div class="navbar-actions">
                <a href="/app/login" class="navbar-link">Member Login</a>
                <a href="#join" class="btn btn-primary">Join Now</a>
            </div>
        </div>
    </nav>

    <!-- ============================================
         HERO SECTION
    ============================================ -->
    <section class="section">
        <div class="container">
            <div class="hero-grid">
                <!-- Hero Content -->
                <div class="animate-on-scroll">
                    <div class="badge">
                        <span class="badge-dot"></span>
                        Trusted by 1,200+ Members
                    </div>

                    <h1 class="hero-title">
                        Build Wealth Faster Through
                        <span class="text-gradient"> Trusted Collective Investment</span>
                    </h1>

                    <p class="subtitle">
                        Masavu Investment Club empowers disciplined savers to pool resources, access larger investments, and grow wealth safely through professional management.
                    </p>

                    <div class="flex gap-4" style="flex-wrap: wrap;">
                        <a href="#join" class="btn btn-primary">
                            Become a Member
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        <a href="/app/login" class="btn btn-outline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                            </svg>
                            Member Login
                        </a>
                    </div>

                    <!-- Testimonials -->
                    <div class="testimonial-wrapper">
                        <div class="avatars">
                            <div class="avatar">A</div>
                            <div class="avatar">B</div>
                            <div class="avatar">C</div>
                            <div class="avatar">D</div>
                            <div class="avatar">E</div>
                        </div>
                        <div>
                            <div class="stars">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            </div>
                            <p class="rating-text">4.9/5 from 500+ reviews</p>
                        </div>
                    </div>
                </div>

                <!-- Portfolio Card -->
                <div class="hidden">
                    <div class="portfolio-card">
                        <div class="portfolio-header">
                            <div class="portfolio-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                    <polyline points="16 7 22 7 22 13"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="portfolio-label">Your Portfolio</p>
                                <p class="portfolio-value">UGX 2,450,000</p>
                            </div>
                        </div>

                        <div class="portfolio-item">
                            <div class="portfolio-item-header">
                                <span class="text-muted">Real Estate</span>
                                <span class="font-semibold">45%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill progress-fill--amber" data-width="45"></div>
                            </div>
                        </div>

                        <div class="portfolio-item">
                            <div class="portfolio-item-header">
                                <span class="text-muted">Agriculture</span>
                                <span class="font-semibold">30%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill progress-fill--green" data-width="30"></div>
                            </div>
                        </div>

                        <div class="portfolio-item">
                            <div class="portfolio-item-header">
                                <span class="text-muted">Bonds</span>
                                <span class="font-semibold">25%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill progress-fill--blue" data-width="25"></div>
                            </div>
                        </div>

                        <div class="portfolio-footer">
                            <div>
                                <p class="portfolio-label">Total Returns</p>
                                <p class="portfolio-value text-success">+18.5%</p>
                            </div>
                            <div class="returns-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                </svg>
                                This Year
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         STATS SECTION
    ============================================ -->
    <section class="section section--white">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item animate-on-scroll">
                    <div class="card-icon" style="margin: 0 auto 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="stat-number" data-count="1200" data-suffix="+">0</div>
                    <p class="text-muted">Active Members</p>
                </div>

                <div class="stat-item animate-on-scroll">
                    <div class="card-icon" style="margin: 0 auto 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="stat-number" data-count="4800000000" data-prefix="UGX " data-format="compact">0</div>
                    <p class="text-muted">Pooled Investments</p>
                </div>

                <div class="stat-item animate-on-scroll">
                    <div class="card-icon" style="margin: 0 auto 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                            <polyline points="16 7 22 7 22 13"></polyline>
                        </svg>
                    </div>
                    <div class="stat-number" data-count="18" data-suffix="%">0</div>
                    <p class="text-muted">Average Returns</p>
                </div>

                <div class="stat-item animate-on-scroll">
                    <div class="card-icon" style="margin: 0 auto 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <div class="stat-number" data-count="100" data-suffix="%">0</div>
                    <p class="text-muted">Transparency</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FEATURES SECTION
    ============================================ -->
    <section id="features" class="section">
        <div class="container">
            <div class="text-center animate-on-scroll">
                <span class="badge">Why Choose Us</span>
                <h2 class="section-title">Why Join Masavu Investment Club</h2>
                <p class="subtitle">A professional, secure and growth-focused investment community designed for disciplined savers</p>
            </div>

            <div class="grid-3" style="margin-top: 3rem;">
                <div class="card animate-on-scroll">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">Pooled Capital Power</h3>
                    <p>Access high-value investments normally reserved for institutions. Our collective strength opens doors to opportunities.</p>
                </div>

                <div class="card animate-on-scroll">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                    <h3 class="card-title">Professional Management</h3>
                    <p>Licensed fund managers handle your investments with expertise, managing diversified portfolios across multiple asset classes.</p>
                </div>

                <div class="card animate-on-scroll">
                    <div class="card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">Secure & Transparent</h3>
                    <p>All processes are audited regularly with full visibility. Your money is protected by institutional-grade security.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         PROJECTS SECTION
    ============================================ -->
    <section id="projects" class="section section--warm">
        <div class="container">
            <div class="text-center animate-on-scroll">
                <span class="badge">Investment Opportunities</span>
                <h2 class="section-title">Current Projects</h2>
                <p class="subtitle">Explore our carefully selected investment opportunities across various sectors</p>
            </div>

            <div class="grid-3" style="margin-top: 3rem;">
                <div class="project-card animate-on-scroll">
                    <div class="project-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=400&fit=crop" alt="Real Estate Development" class="project-image">
                        <span class="project-badge">Active Investment</span>
                    </div>
                    <div class="project-body">
                        <h3 class="card-title">Real Estate Development</h3>
                        <p class="text-muted">Prime commercial and residential properties across East Africa</p>
                    </div>
                </div>

                <div class="project-card animate-on-scroll">
                    <div class="project-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=800&h=400&fit=crop" alt="Agricultural Ventures" class="project-image">
                        <span class="project-badge">Active Investment</span>
                    </div>
                    <div class="project-body">
                        <h3 class="card-title">Agricultural Ventures</h3>
                        <p class="text-muted">Sustainable farming projects with guaranteed returns</p>
                    </div>
                </div>

                <div class="project-card animate-on-scroll">
                    <div class="project-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1579532537598-459ecdaf39cc?w=800&h=400&fit=crop" alt="Government Bonds" class="project-image">
                        <span class="project-badge">Active Investment</span>
                    </div>
                    <div class="project-body">
                        <h3 class="card-title">Government Bonds</h3>
                        <p class="text-muted">Low-risk fixed income securities for steady growth</p>
                    </div>
                </div>
            </div>

            <div class="text-center" style="margin-top: 3rem;" class="animate-on-scroll">
                <a href="#join" class="btn btn-outline">
                    View All Projects
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================
         HOW IT WORKS SECTION
    ============================================ -->
    <section class="section section--white">
        <div class="container">
            <div class="text-center animate-on-scroll">
                <span class="badge">Getting Started</span>
                <h2 class="section-title">How It Works</h2>
                <p class="subtitle">Start your wealth building journey in four simple steps</p>
            </div>

            <div class="steps-grid" style="margin-top: 3rem;">
                <div class="step-card animate-on-scroll">
                    <div class="step-number">01</div>
                    <h3 class="card-title">Sign Up</h3>
                    <p class="text-muted">Create your account and complete verification</p>
                    <div class="step-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>

                <div class="step-card animate-on-scroll">
                    <div class="step-number">02</div>
                    <h3 class="card-title">Choose Plan</h3>
                    <p class="text-muted">Select your monthly contribution amount</p>
                    <div class="step-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>

                <div class="step-card animate-on-scroll">
                    <div class="step-number">03</div>
                    <h3 class="card-title">Invest</h3>
                    <p class="text-muted">Your money gets invested professionally</p>
                    <div class="step-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>

                <div class="step-card animate-on-scroll">
                    <div class="step-number">04</div>
                    <h3 class="card-title">Grow</h3>
                    <p class="text-muted">Watch your wealth grow over time</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         FAQ SECTION
    ============================================ -->
    <section id="faq" class="section section--warm">
        <div class="container">
            <div class="text-center animate-on-scroll">
                <span class="badge">Got Questions?</span>
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="subtitle">Everything you need to know about joining Masavu</p>
            </div>

            <div class="faq-list" style="margin-top: 3rem;">
                <div class="faq-item animate-on-scroll">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>How much is the monthly contribution?</span>
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                    <div class="faq-answer">
                        <p>Our flexible membership starts at just UGX 100,000 per month. You can increase your contribution as your financial capacity grows.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Can I withdraw my investment?</span>
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer flexible exit options. You can withdraw partial amounts after a minimum holding period, or exit completely with reasonable notice.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Who manages the funds?</span>
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                    <div class="faq-answer">
                        <p>All funds are managed by licensed professional fund managers with decades of experience in investment management and regulatory compliance.</p>
                    </div>
                </div>

                <div class="faq-item animate-on-scroll">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>What makes Masavu different from other investment options?</span>
                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                    <div class="faq-answer">
                        <p>We combine the power of collective investment with professional management, creating opportunities normally reserved for institutional investors.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CONTACT SECTION
    ============================================ -->
    <section id="contact" class="section section--white">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Info -->
                <div class="animate-on-scroll">
                    <span class="badge">Get In Touch</span>
                    <h2 class="section-title" style="text-align: left; margin-left: 0;">Contact Us</h2>
                    <p class="subtitle" style="text-align: left; margin-left: 0;">
                        Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                    </p>

                    <div style="margin-top: 2rem;">
                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-label">Phone</p>
                                <p class="contact-value">+256 700 123 456</p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-label">Email</p>
                                <p class="contact-value"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bed6dbd2d2d1fed3dfcddfc8cb90ddd190cbd9">[email&#160;protected]</a></p>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <div class="contact-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="contact-label">Address</p>
                                <p class="contact-value">Kampala, Uganda</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-wrapper animate-on-scroll">
                    <form id="contactForm" onsubmit="handleSubmit(event)">
                        <div class="form-group">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-input" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Message</label>
                            <textarea class="form-input" rows="4" placeholder="How can we help you?" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Send Message
                        </button>
                    </form>

                    <div class="success-message" id="successMessage">
                        <div class="success-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <h3 class="card-title">Message Sent!</h3>
                        <p class="text-muted">We'll get back to you shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================
         CTA SECTION
    ============================================ -->
    <section id="join" class="section section--cta">
        <div class="container text-center animate-on-scroll">
            <h2 class="hero-title cta-title">Start Your Wealth Journey Today</h2>
            <p class="cta-subtitle" style="font-size: 1.125rem; max-width: 600px; margin: 0 auto;">
                Join hundreds of disciplined investors building financial freedom together. Your future self will thank you.
            </p>

            <div class="flex gap-4 justify-center" style="margin-top: 2.5rem; flex-wrap: wrap;">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('start-onboarding', []);

$__keyOuter = $__key ?? null;

$__key = null;
$__componentSlots = [];

$__key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-1948031877-0', $__key);

$__html = app('livewire')->mount($__name, $__params, $__key, $__componentSlots);

echo $__html;

unset($__html);
unset($__key);
$__key = $__keyOuter;
unset($__keyOuter);
unset($__name);
unset($__params);
unset($__componentSlots);
unset($__split);
?>
            </div>

    
        </div>
    </section>

    <!-- ============================================
         FOOTER
    ============================================ -->
    <footer class="footer">
        <div class="container">
            <div class="grid-4" style="gap: 3rem;">
                <div style="grid-column: span 2;">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                <polyline points="16 7 22 7 22 13"></polyline>
                            </svg>
                        </div>
                        <span class="footer-brand">Masavu Investment Club</span>
                    </div>
                    <p class="footer-description">
                        Building wealth together through trusted collective investment. Join our community of disciplined savers and grow your financial future.
                    </p>
                </div>

                <div class="footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-links">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2026 Masavu Investment Club. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- ============================================
         JAVASCRIPT
    ============================================ -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
        // ============================================
        // FAQ Toggle
        // ============================================
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const allItems = document.querySelectorAll('.faq-item');

            // Close all other items
            allItems.forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                }
            });

            // Toggle current item
            faqItem.classList.toggle('active');
        }

        // ============================================
        // Contact Form Handler
        // ============================================
        function handleSubmit(event) {
            event.preventDefault();

            const form = document.getElementById('contactForm');
            const successMessage = document.getElementById('successMessage');

            // Hide form, show success
            form.style.display = 'none';
            successMessage.style.display = 'block';

            // Reset after 3 seconds
            setTimeout(() => {
                form.style.display = 'block';
                successMessage.style.display = 'none';
                form.reset();
            }, 3000);
        }

        // ============================================
        // Animated Counter
        // ============================================
        function animateCounter(element) {
            const target = parseInt(element.dataset.count);
            const prefix = element.dataset.prefix || '';
            const suffix = element.dataset.suffix || '';
            const format = element.dataset.format;
            const duration = 2000;
            const startTime = performance.now();

            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(easeOutQuart * target);

                if (format === 'compact') {
                    if (current >= 1000000000) {
                        element.textContent = prefix + (current / 1000000000).toFixed(1) + 'B' + suffix;
                    } else if (current >= 1000000) {
                        element.textContent = prefix + (current / 1000000).toFixed(0) + 'M' + suffix;
                    } else if (current >= 1000) {
                        element.textContent = prefix + (current / 1000).toFixed(0) + 'K' + suffix;
                    } else {
                        element.textContent = prefix + current.toLocaleString() + suffix;
                    }
                } else {
                    element.textContent = prefix + current.toLocaleString() + suffix;
                }

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                }
            }

            requestAnimationFrame(updateCounter);
        }

        // ============================================
        // Progress Bar Animation
        // ============================================
        function animateProgressBar(element) {
            const targetWidth = element.dataset.width;
            setTimeout(() => {
                element.style.width = targetWidth + '%';
            }, 500);
        }

        // ============================================
        // Scroll Animation (Intersection Observer)
        // ============================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');

                    // Trigger counter animation
                    if (entry.target.classList.contains('stat-number')) {
                        animateCounter(entry.target);
                    }

                    // Trigger progress bar animation
                    if (entry.target.classList.contains('progress-fill')) {
                        animateProgressBar(entry.target);
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll('.animate-on-scroll, .stat-number, .progress-fill').forEach(el => {
            observer.observe(el);
        });

        // ============================================
        // Smooth Scroll for Anchor Links
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // ============================================
        // Initialize Progress Bars on Load
        // ============================================
        window.addEventListener('load', () => {
            document.querySelectorAll('.progress-fill').forEach(bar => {
                if (bar.getBoundingClientRect().top < window.innerHeight) {
                    animateProgressBar(bar);
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/welcome.blade.php ENDPATH**/ ?>