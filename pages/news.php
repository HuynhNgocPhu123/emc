<link rel="stylesheet" href="assets/css/news.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenNews - Tin Tức Xanh</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #ecfdf5 100%);
            color: #1f2937;
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
           
            align-items: center;
            justify-content: center;
      
            perspective: 2000px;
        }
        .banner-container {
            position: relative;
            width: 100%;
            height: 600px;
            background: linear-gradient(135deg,rgb(2, 47, 15) 0%,rgb(18, 30, 43) 50%,rgb(4, 72, 68) 100%);
            overflow: hidden;
            box-shadow: 
                0 25px 50px rgba(16, 185, 129, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            transform-style: preserve-3d;
        }

        .content-layer {
            position: relative;
            z-index: 10;
            padding: 60px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .text-content {
            flex: 1;
            max-width: 500px;
            animation: slideInLeft 1s ease-out;
        }

        .breaking-news {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 8px 20px;
            margin-bottom: 24px;
            width: fit-content;
            animation: pulse 2s ease-in-out infinite;
        }

        .breaking-dot {
            width: 8px;
            height: 8px;
            background: #ef4444;
            border-radius: 50%;
            margin-right: 8px;
            animation: blink 1.5s ease-in-out infinite;
        }

        .breaking-text {
            color: white;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .main-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            color: white;
            line-height: 1.1;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f0fdf4 50%, #dcfce7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        .subtitle {
            font-size: clamp(1rem, 2vw, 1.2rem);
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            line-height: 1.6;
            margin-bottom: 40px;
            animation: fadeInUp 1s ease-out 0.5s both;
        }

        .cta-buttons1 {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 1s both;
        }

        .btn1 {
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            border: none;
            cursor: pointer;
        }

        .btn-primary1 {
            background: rgba(3, 185, 91, 0.95);
            color:rgb(255, 255, 255);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-primary1:hover {
            background: green;
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: rgba(17, 127, 33, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px) scale(1.05);
        }

        /* 3D Newspaper Scene */
        .newspaper-scene {
            position: relative;
            width: 600px;
            height: 500px;
            transform-style: preserve-3d;
            animation: sceneFloat 12s ease-in-out infinite;
        }

        .newspaper-stack {
            position: absolute;
            width: 400px;
            height: 300px;
            right: 50px;
            top: 50%;
            transform: translateY(-50%) rotateX(10deg) rotateY(-20deg);
            transform-style: preserve-3d;
            animation: stackRotate 20s linear infinite;
        }

        .newspaper-page {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            transform-origin: left center;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.8),
                inset 0 1px 0 rgba(255, 255, 255, 1);
            cursor: pointer;
        }

        .newspaper-page:hover {
            transform: rotateY(-45deg) translateZ(20px);
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.9),
                inset 0 1px 0 rgba(255, 255, 255, 1);
        }

        .page-1 {
            z-index: 5;
            animation: pageFlip1 10s ease-in-out infinite;
        }

        .page-2 {
            z-index: 4;
            transform: translateZ(-8px);
            animation: pageFlip2 10s ease-in-out infinite 2s;
        }

        .page-3 {
            z-index: 3;
            transform: translateZ(-16px);
            animation: pageFlip3 10s ease-in-out infinite 4s;
        }

        .page-4 {
            z-index: 2;
            transform: translateZ(-24px);
            animation: pageFlip4 10s ease-in-out infinite 6s;
        }

        .page-5 {
            z-index: 1;
            transform: translateZ(-32px);
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        }

        /* Newspaper Content */
        .newspaper-header {
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            height: 60px;
            background: linear-gradient(135deg, #047857 0%, #10b981 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.3);
        }

        .newspaper-title {
            color: white;
            font-size: 18px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .newspaper-content {
            position: absolute;
            top: 100px;
            left: 30px;
            right: 30px;
            bottom: 30px;
        }

        .news-column {
            width: 48%;
            height: 100%;
            float: left;
            margin-right: 4%;
        }

        .news-column:last-child {
            margin-right: 0;
        }

        .news-headline {
            width: 100%;
            height: 12px;
            background: linear-gradient(90deg, #1f2937 0%, transparent 100%);
            border-radius: 6px;
            margin-bottom: 8px;
            animation: textShimmer 2s ease-in-out infinite;
        }

        .news-line {
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #6b7280 0%, transparent 80%);
            border-radius: 1.5px;
            margin-bottom: 4px;
            animation: textShimmer 2s ease-in-out infinite;
        }

        .news-line:nth-child(2n) {
            width: 85%;
            animation-delay: 0.5s;
        }

        .news-line:nth-child(3n) {
            width: 92%;
            animation-delay: 1s;
        }

        .news-image1 {
            width: 100%;
            height: 60px;
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            border-radius: 6px;
            margin: 15px 0;
            position: relative;
            overflow: hidden;
        }

        .news-image1::before {
            content: '📰';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            opacity: 0.5;
        }

        /* Flying newspaper pieces */
        .newspaper-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 30px;
            height: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: particleFly 12s linear infinite;
        }

        .particle:nth-child(1) {
            left: 20%;
            animation-delay: 0s;
            animation-duration: 8s;
        }

        .particle:nth-child(2) {
            left: 40%;
            animation-delay: 2s;
            animation-duration: 10s;
        }

        .particle:nth-child(3) {
            left: 60%;
            animation-delay: 4s;
            animation-duration: 9s;
        }

        .particle:nth-child(4) {
            left: 80%;
            animation-delay: 6s;
            animation-duration: 11s;
        }

        .particle:nth-child(5) {
            left: 10%;
            animation-delay: 1s;
            animation-duration: 12s;
        }

        .particle:nth-child(6) {
            left: 70%;
            animation-delay: 3s;
            animation-duration: 7s;
        }

      

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

      
       

        

        @keyframes pageFlip2 {
            0%, 60% { transform: translateZ(-8px) rotateY(0deg); }
            70%, 90% { transform: translateZ(-8px) rotateY(-170deg); }
            100% { transform: translateZ(-8px) rotateY(0deg); }
        }

        @keyframes pageFlip3 {
            0%, 60% { transform: translateZ(-16px) rotateY(0deg); }
            70%, 90% { transform: translateZ(-16px) rotateY(-170deg); }
            100% { transform: translateZ(-16px) rotateY(0deg); }
        }

        @keyframes pageFlip4 {
            0%, 60% { transform: translateZ(-24px) rotateY(0deg); }
            70%, 90% { transform: translateZ(-24px) rotateY(-170deg); }
            100% { transform: translateZ(-24px) rotateY(0deg); }
        }

        @keyframes particleFly {
            0% {
                transform: translateY(120vh) rotateZ(0deg) scale(0.5);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotateZ(720deg) scale(1.2);
                opacity: 0;
            }
        }

        @keyframes lightSweep {
            0% { transform: translateX(-100%) rotateZ(45deg); }
            50% { transform: translateX(100%) rotateZ(45deg); }
            100% { transform: translateX(-100%) rotateZ(45deg); }
        }

        @keyframes textShimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }


        

        /* Responsive */
        @media (max-width: 768px) {
            .banner-container {
                height: 500px;
                border-radius: 24px;
                margin: 20px;
            }
            
            .content-layer {
                flex-direction: column;
                padding: 30px;
                text-align: center;
            }
            
            .newspaper-scene {
                width: 300px;
                height: 250px;
                margin-top: 20px;
            }
            
            .newspaper-stack {
                width: 250px;
                height: 180px;
                right: 25px;
            }
            
            .cta-buttons1 {
                justify-content: center;
            }
        }
        

       
        /* Hero Banner - Asymmetric Design */
        .hero-banner {
            height: 70vh;
            position: relative;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            overflow: hidden;
        }

        .hero-content {
            z-index: 2;
            padding-right: 60px;
        }

        .hero-badge {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 30px;
            color: #1f2937;
            position: relative;
        }

        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 120px;
            height: 6px;
            background: linear-gradient(135deg, #10b981, #34d399);
            border-radius: 3px;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #6b7280;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .hero-cta {
            display: inline-flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        }

        .hero-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.4);
        }

        .hero-visual {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image {
            width: 500px;
            height: 400px;
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border-radius: 30px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(16, 185, 129, 0.2);
            transform: rotate(-5deg);
        }

        .hero-image::before {
            content: '📰';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 120px;
            opacity: 0.7;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #34d399);
            opacity: 0.1;
            animation: float 8s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 5%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 60%;
            right: 30%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
        }

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 40px;
        }

        .section-header1 {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title {
            font-size: 3.5rem;
            font-weight: 900;
            color: #1f2937;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #10b981, #34d399);
            border-radius: 2px;
        }

        /* Filter Tabs - Modern Design */
        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 8px;
            border-radius: 60px;
            border: 1px solid rgba(16, 185, 129, 0.1);
            box-shadow: 0 10px 40px rgba(16, 185, 129, 0.1);
            max-width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .filter-btn {
            padding: 16px 32px;
            background: transparent;
            border: none;
            color: #6b7280;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            white-space: nowrap;
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .filter-btn:hover:not(.active) {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
        }

        /* News Grid - Masonry Style */
        .news-container {
            margin-top: 80px;
        }

        .news-grid {
            display: none;
            columns: 3;
            column-gap: 40px;
            margin-top: 40px;
        }

        .news-grid.active {
            display: block;
        }

        .news-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            margin-bottom: 40px;
            break-inside: avoid;
            box-shadow: 0 8px 30px rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.05);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: pointer;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(16, 185, 129, 0.15);
        }

        .news-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #d1fae5, #a7f3d0, #6ee7b7);
            position: relative;
            overflow: hidden;
        }

        .news-image::before {
            content: attr(data-icon);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 60px;
            opacity: 0.7;
        }

        .news-content {
            padding: 30px;
        }

        .news-category {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #34d399);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }

        .news-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .news-excerpt {
            color: #6b7280;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            border-top: 1px solid rgba(16, 185, 129, 0.1);
        }

        .news-author {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #374151;
            font-weight: 600;
        }

        .news-author::before {
            content: '👤';
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .news-time {
            color: #9ca3af;
            font-size: 0.9rem;
        }

       /* ================================
        Featured Cards Layout
      ================================ */
      .featured-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 40px;
        margin-bottom: 60px;
        align-items: start;
      }

      .featured-main {
        background: #fff;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid #e2f5f0;
      }

      .featured-main .card-body {
        padding: 30px;
      }

      .featured-main .card-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #222;
      }

      .featured-main .card-text {
        font-size: 0.95rem;
        line-height: 1.6;
        color: #555;
      }

      .featured-main .card-img-top {
        height: 250px;
        width: 100%;
        object-fit: cover;
      }

      /* ================================
        Sidebar Popular News
      ================================ */
      .sidebar-news {
        display: flex;
        background:rgb(229, 228, 228);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 128, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-height: 100px;
      }

      .sidebar-news:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 128, 0, 0.12);
      }

      .sidebar-news img.sidebar-thumb {
        width: 110px;
        height: 180px;
        object-fit: cover;
        border-top-left-radius: 16px;
        border-bottom-left-radius: 16px;
        flex-shrink: 0;
      }

      .sidebar-news .p-2 {
        padding: 10px 14px !important;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .sidebar-news h6 {
        font-size: 1rem;
        font-weight: 600;
        color: #222;
        margin-bottom: 4px;
        line-height: 1.3;
      }

      .sidebar-news p {
        font-size: 0.875rem;
        color: #555;
        margin-bottom: 8px;
        line-height: 1.4;
      }

      .sidebar-news .btn-sm {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 20px;
      }
      .sidebar-news {
        display: flex;
        background:rgb(231, 230, 230);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 128, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        align-items: stretch; /* ✅ Giúp ảnh và nội dung cao bằng nhau */
      }

      .sidebar-thumb {
        width: 110px;
        object-fit: cover;
        height: auto; /* ✅ Cho phép ảnh co giãn */
        display: block;
      }
      .sidebar-news {
        display: flex;
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 128, 0, 0.08);
        transition: 0.3s ease;
        align-items: stretch;
      }

      .sidebar-thumb {
        width: 100px;
        height: auto;
        object-fit: cover;
        display: block;
      }

      .sidebar-news .p-2 {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      /* ================================
        Grid News Cards
      ================================ */
      .card.h-100 {
        border-radius: 16px;
        transition: all 0.3s ease;
      }

      .card.h-100:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.05);
      }

      .card-img-top {
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
      }

      /* ================================
        Responsive
      ================================ */
      @media (max-width: 1200px) {
        .featured-grid {
          grid-template-columns: 1fr;
        }

        .featured-sidebar {
          flex-direction: row;
          flex-wrap: wrap;
          gap: 20px;
        }

        .sidebar-card {
          flex: 1 1 calc(50% - 20px);
        }
      }

      @media (max-width: 768px) {
        .featured-sidebar {
          flex-direction: column;
        }

        .sidebar-card {
          flex: 1 1 100%;
        }

        .featured-main .card-body {
          padding: 20px;
        }

        .featured-main .card-title {
          font-size: 1.4rem;
        }
      }

      /* ================================
        Animation (if needed)
      ================================ */
      .news-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s ease forwards;
      }

      .news-card:nth-child(1) { animation-delay: 0.1s; }
      .news-card:nth-child(2) { animation-delay: 0.2s; }
      .news-card:nth-child(3) { animation-delay: 0.3s; }

      @keyframes fadeInUp {
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }
      .pagination .page-link {
        color: #198754; /* Màu xanh lá Bootstrap (green) */
      }

      .pagination .page-link:hover {
        color: #146c43;
        background-color: #e9fbe7;
        border-color: #198754;
      }

      .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #198754; /* màu nền khi active */
        border-color: #198754;
      }

    </style>
</head>
<body>

        <!-- Hero Banner -->
<div class="banner-container">
        <div class="content-layer">
            <div class="text-content">
                <div class="breaking-news">
                    <div class="breaking-dot"></div>
                    <span class="breaking-text">Tin Nóng</span>
                </div>
                
                <h1 class="main-title">
                    TIN TỨC<br>
                    HÀNG ĐẦU
                </h1>
                
                <p class="subtitle">
                    Cập nhật những tin tức mới nhất, chính xác và đáng tin cậy từ khắp nơi trên thế giới. 
                    Luôn đồng hành cùng bạn trong mọi thời điểm.
                </p>
                
                <div class="cta-buttons">
                    <a href="#" class="btn1 btn-primary1">Đọc Tin Mới</a>
                    <a href="#" class="btn1 btn-secondary">Khám Phá</a>
                </div>
            </div>
            
            <div class="newspaper-scene">
                <div class="newspaper-stack">
                    <div class="newspaper-page page-1">
                        <div class="newspaper-header">
                            <div class="newspaper-title">TIN TỨC HÀNG ĐẦU</div>
                        </div>
                        <div class="newspaper-content">
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                            </div>
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                            </div>
                        </div>
                        <div class="newspaper-light"></div>
                    </div>
                    
                    <div class="newspaper-page page-2">
                        <div class="newspaper-header">
                            <div class="newspaper-title">KINH TẾ & ĐẦU TƯ</div>
                        </div>
                        <div class="newspaper-content">
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                                <div class="news-line"></div>
                            </div>
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                            </div>
                        </div>
                        <div class="newspaper-light"></div>
                    </div>
                    
                    <div class="newspaper-page page-3">
                        <div class="newspaper-header">
                            <div class="newspaper-title">THỂ THAO & GIẢI TRÍ</div>
                        </div>
                        <div class="newspaper-content">
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                            </div>
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                            </div>
                        </div>
                        <div class="newspaper-light"></div>
                    </div>
                    
                    <div class="newspaper-page page-4">
                        <div class="newspaper-header">
                            <div class="newspaper-title">CÔNG NGHỆ & KHOA HỌC</div>
                        </div>
                        <div class="newspaper-content">
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                            </div>
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                            </div>
                        </div>
                        <div class="newspaper-light"></div>
                    </div>
                    
                    <div class="newspaper-page page-5">
                        <div class="newspaper-header">
                            <div class="newspaper-title">VĂN HÓA & XÃ HỘI</div>
                        </div>
                        <div class="newspaper-content">
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-image1"></div>
                            </div>
                            <div class="news-column">
                                <div class="news-headline"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                                <div class="news-line"></div>
                            </div>
                        </div>
                        <div class="newspaper-light"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="newspaper-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
    </div>

    <?php
include_once("controller/getnews.php");
$p = new getnews();

$limit = 6;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $limit;

$category = isset($_GET['category']) ? intval($_GET['category']) : null;

$latest_hot_news = $p->gethotnews();
$top_view_news = $p->getviewnews();
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $all_news = $p->getallnewsbyname($limit, $offset, $search);
    $total_news = $all_news ? $all_news->num_rows : 0; // hoặc bạn có thể tạo thêm hàm đếm nếu cần phân trang chính xác
}else if ($category) {
  $all_news = $p->getallnewsbyiddanhmuc($category, $limit, $offset);
  $total_news = $p->totalNews(); // Bạn có thể thay bằng hàm đếm theo category nếu có
} else {
  $all_news = $p->getallnews($limit, $offset);
  $total_news = $p->totalNews();
}

$total_pages = ceil($total_news / $limit);

?>

<main class="main-content" id="news">
  <div class="section-header1 mb-4">
    <h2 class="section-title">Tin tức & Sự kiện</h2>
    <!-- Filter Tabs -->
            <div class="filter-tabs">
                <button class="filter-btn active" onclick="showNews('all')">Tất Cả Tin</button>
                <button class="filter-btn" onclick="showNews('company')">Tin Tức Công Ty</button>
                <button class="filter-btn" onclick="showNews('press')">Thông Cáo Báo Chí</button>
            </div>
  </div>
<!-- Thanh tìm kiếm nằm bên trái -->
  <form action="index.php?news=1" method="GET" class="search-bar d-flex" style="gap: 6px; margin-bottom:15px; padding:5px">
    <input type="hidden" name="news" value="1">
    <input
      type="text"
      name="search"
      placeholder=" Tìm theo tiêu đề..."
      class="form-control rounded-pill px-3"
      style="max-width: 250px;"
    >
    <button type="submit" class="btn rounded-pill px-3" style="background: linear-gradient(135deg, #10b981, #059669); color:white">Tìm kiếm</button>
  </form>



  <!-- Featured Section -->
  <?php if ($all_news && $all_news != false): ?>
<!-- Featured Section -->
<div class="featured-grid d-flex flex-wrap gap-4 mb-lg-5">
  <div class="featured-main flex-grow-1">
    <?php if ($latest_hot_news && $latest_hot_news != false): ?>
      <?php $row = $latest_hot_news->fetch_assoc(); ?>
      <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <img src="assets/images/<?php echo htmlspecialchars($row['hinhanh']); ?>" class="card-img-top" style="height: 320px; object-fit: cover;">
        <div class="card-body">
          <span class="badge bg-success mb-2">Nổi bật</span>
          <h3 class="card-title fw-bold"><?php echo htmlspecialchars($row['tieude']); ?></h3>
          <p class="card-text text-muted"><?php echo mb_substr(strip_tags($row['tomtat']), 0, 100); ?>...</p>
          <div class="d-flex justify-content-between text-muted small">
            <div><i class="bi bi-person-circle me-1"></i><?php echo htmlspecialchars($row['tacgia'] ?? 'Admin'); ?></div>
            <div><i class="bi bi-eye me-1"></i><?php echo $row['luotxem']; ?> lượt xem</div>
            <div><?php echo date("d/m/Y", strtotime($row['ngaydang'])); ?></div>
          </div>
          <a href="javascript:void(0);" onclick="increaseViewAndRedirect(<?php echo $row['id_tintuc']; ?>)" class="btn btn-sm btn-outline-success mt-2 align-self-start">Xem chi tiết</a>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="featured-sidebar" style="width: 320px;">
    <h5 class="fw-bold text-success mb-3">Tin đọc nhiều</h5>
    <?php if ($top_view_news && $top_view_news != false): ?>
      <?php while ($row = $top_view_news->fetch_assoc()): ?>
        <div class="sidebar-news d-flex border rounded-4 shadow-sm overflow-hidden mb-3 bg-white">
          <img src="assets/images/<?php echo htmlspecialchars($row['hinhanh']); ?>" class="sidebar-thumb" alt="ảnh" style="width: 100px; height: 80px; object-fit: cover;">
          <div class="p-2 d-flex flex-column justify-content-between h-100">
            <div>
              <h6 class="fw-semibold mb-1 text-dark"><?php echo mb_substr(strip_tags($row['tieude']), 0, 16);  ?>...</h6>
              <p class="text-muted small mb-2"><?php echo mb_substr(strip_tags($row['tomtat']), 0, 20); ?>...</p>
              <small class="text-muted"><i class="bi bi-eye me-1"></i><?php echo $row['luotxem']; ?> lượt xem</small>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-auto small text-muted">
              <span><i class="bi bi-person-circle me-1"></i><?php echo htmlspecialchars($row['tacgia'] ?? 'Admin'); ?></span>
              <span><?php echo date("d/m/Y", strtotime($row['ngaydang'])); ?></span>
            </div>
            <a href="javascript:void(0);" 
                  onclick="increaseViewAndRedirect(<?php echo $row['id_tintuc']; ?>)" 
                  class="btn btn-sm btn-outline-success mt-2 align-self-start">Xem chi tiết
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>

  <!-- News Grid -->
  <div class="row g-4">
    <?php if ($all_news && $all_news != false): ?>
      <?php while ($row = $all_news->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm border-0 d-flex flex-column">
            <img src="assets/images/<?php echo htmlspecialchars($row['hinhanh']); ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title mb-2"><?php echo htmlspecialchars($row['tieude']); ?></h5>
              <p class="card-text text-muted mb-4"><?php echo mb_substr(strip_tags($row['tomtat']), 0, 100); ?>...</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <small class="text-muted"><i class="bi bi-eye me-1"></i><?php echo $row['luotxem']; ?> lượt xem</small>
                <span class="small text-muted"><?php echo date("d/m/Y", strtotime($row['ngaydang'])); ?></span>
                <a href="javascript:void(0);" 
                  onclick="increaseViewAndRedirect(<?php echo $row['id_tintuc']; ?>)" 
                  class="btn btn-sm btn-outline-success">Xem chi tiết
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
  <div class="text-center my-5">
    <p class="fs-5 text-danger mb-3">Không có bài viết nào.</p>
    <a href="index.php?news=1" class="btn btn-outline-primary">
      <i class="bi bi-arrow-left"></i> Quay lại danh sách bài viết
    </a>
  </div>
<?php endif; ?>

  </div>

  <!-- Phân trang -->
  <nav class="mt-5" aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php if ($page > 1): ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo buildPageUrl($page - 1); ?>">Trước</a>
        </li>
      <?php endif; ?>

      <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
          <a class="page-link" href="<?php echo buildPageUrl($i); ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($page < $total_pages): ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo buildPageUrl($page + 1); ?>">Tiếp</a>
        </li>
      <?php endif; ?>
    </ul>
  </nav>
</main>

<script>
function showNews(type) {
  const url = new URL(window.location.href);
  if (type === 'all') {
    url.searchParams.delete('category');
  } else if (type === 'company') {
    url.searchParams.set('category', 1);
  } else if (type === 'press') {
    url.searchParams.set('category', 2);
  }
  url.searchParams.set('page', 1);
  window.location.href = url.toString();
}

// Tô đậm nút đang active
document.addEventListener("DOMContentLoaded", function () {
  const currentCategory = new URLSearchParams(window.location.search).get("category");
  document.querySelectorAll(".filter-btn").forEach(btn => btn.classList.remove("active"));
  if (!currentCategory) {
    document.querySelector(".filter-btn[onclick*='all']")?.classList.add("active");
  } else if (currentCategory == 1) {
    document.querySelector(".filter-btn[onclick*='company']")?.classList.add("active");
  } else if (currentCategory == 2) {
    document.querySelector(".filter-btn[onclick*='press']")?.classList.add("active");
  }
});
</script>


<?php
function buildPageUrl($pageNum) {
  $query = $_GET;
  $query['page'] = $pageNum;
  return 'index.php?' . http_build_query($query);
}
?>

  </body>
</html>
<script>
async function increaseViewAndRedirect(id) {
    const formData = new URLSearchParams();
    formData.append('detailid', id);

    try {
        const res = await fetch('increase_view.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: formData.toString()
        });
        const data = await res.json();

        // Dù thành công hay thất bại, vẫn chuyển trang
        if (!data.success) {
            console.warn('Tăng view thất bại:', data.error);
        }

        window.location.href = 'index.php?news=1&detailid=' + id;
    } catch (err) {
        console.error('Lỗi fetch:', err);
        window.location.href = 'index.php?news=1&detailid=' + id;
    }
}
</script>

<script>
window.addEventListener("pageshow", function (event) {
  // Nếu trang được hiển thị từ bộ nhớ cache
  if (event.persisted) {
    window.location.reload();
  }
});
</script>
