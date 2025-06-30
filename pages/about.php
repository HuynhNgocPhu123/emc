<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMC - Hero Section Animated</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Keyframe animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes glow {
            0%, 100% { 
                box-shadow: 0 0 60px 10px rgba(46, 204, 64, 0.4);
            }
            50% { 
                box-shadow: 0 0 80px 15px rgba(46, 204, 64, 0.6);
            }
        }
        
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideInLeft {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeZoomIn {
          0% { opacity: 0; transform: scale(0.96); }
          100% { opacity: 1; transform: scale(1); }
        }
        
        /* Animated elements */
        .hero-container {
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-text {
            animation: slideInLeft 1s ease-out 0.3s both;
        }
        
        .emc-logo-container {
            animation: float 6s ease-in-out infinite;
        }
        
        .emc-outer-glow {
            animation: glow 4s ease-in-out infinite, pulse 8s ease-in-out infinite;
            transition: all 0.3s ease;
        }
        
        .emc-outer-glow:hover {
            animation-play-state: paused;
            box-shadow: 0 0 100px 20px rgba(46, 204, 64, 0.8) !important;
            transform: scale(1.1);
        }
        
        .emc-inner-circle {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .emc-inner-circle::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(46, 204, 64, 0.1), transparent);
            animation: rotate 10s linear infinite;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .emc-inner-circle:hover::before {
            opacity: 1;
        }
        
        .emc-text {
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }
        
        .emc-inner-circle:hover .emc-text {
            transform: scale(1.1);
            text-shadow: 0 0 20px rgba(46, 204, 64, 0.8);
        }
        
        .stats-card {
            animation: fadeInUp 1s ease-out;
            transition: all 0.3s ease;
        }
        
        .stats-card:nth-child(1) { animation-delay: 0.6s; }
        .stats-card:nth-child(2) { animation-delay: 0.8s; }
        .stats-card:nth-child(3) { animation-delay: 1s; }
        
        .stats-card:hover {
            transform: translateY(-10px) scale(1.05);
            box-shadow: 0 15px 35px rgba(46, 204, 64, 0.3);
        }
        
        .btn-animated {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-animated::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.5s ease;
        }
        
        .btn-animated:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-animated:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        /* Floating particles effect */
        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }
        
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(46, 204, 64, 0.6);
            border-radius: 50%;
            animation: floatParticle 8s linear infinite;
        }
        
        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) translateX(100px);
                opacity: 0;
            }
        }
        
        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 1s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 2s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 3s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 4s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 6s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 7s; }
        .particle:nth-child(9) { left: 90%; animation-delay: 8s; }
        
        .history-section-animate {
          opacity: 0;
          transform: scale(0.96);
          animation: fadeZoomIn 0.9s cubic-bezier(.4,1.4,.6,1) 0.05s forwards;
        }
        
        /* Checkmark draw animation */
        .feature-icon .checkmark {
          width: 38px;
          height: 38px;
          display: block;
          color: #2E7D32;
          font-size: 32px;
          position: relative;
        }
        .feature-icon .checkmark svg {
          width: 38px;
          height: 38px;
          display: block;
        }
        .checkmark-path {
          stroke-dasharray: 40;
          stroke-dashoffset: 40;
          animation: checkmark-draw 1.2s cubic-bezier(.4,2,.6,1) 0.2s infinite;
        }
        @keyframes checkmark-draw {
          0% { stroke-dashoffset: 40; opacity: 0.2; }
          10% { opacity: 1; }
          70% { stroke-dashoffset: 0; opacity: 1; }
          90% { opacity: 1; }
          100% { stroke-dashoffset: 0; opacity: 0; }
        }
        /* Radar rotate animation */
        .feature-icon .radar-rotate {
          transform-origin: 50% 50%;
          animation: radar-spin 2.8s linear infinite;
        }
        @keyframes radar-spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        .timeline-float-particles {
          position: absolute;
          left: 0; right: 0;
          width: 100%;
          pointer-events: none;
          z-index: 0;
        }
        .timeline-float-particles-top {
          top: calc(50% - 180px);
          height: 120px;
          z-index: 1;
        }
        .timeline-float-particles-bottom {
          bottom: calc(50% - 120px);
          height: 120px;
          z-index: 1;
        }
        .timeline-float-particle {
          position: absolute;
          background: radial-gradient(circle, rgba(46,204,64,0.13) 0%, rgba(46,204,64,0.08) 80%, transparent 100%);
          border-radius: 50%;
          filter: blur(0.5px);
          opacity: 0.85;
          animation: bubbleUp 6s linear infinite;
          transition: filter 0.25s, opacity 0.25s, box-shadow 0.25s;
          pointer-events: auto;
        }
        .timeline-float-particle:hover {
          filter: brightness(2) blur(0px);
          opacity: 1;
          box-shadow: 0 0 60px 24px #7ed95780;
          z-index: 3;
        }
        @keyframes bubbleUp {
          0% { opacity: 0; transform: translateY(0) scale(1); }
          10% { opacity: 0.7; }
          80% { opacity: 0.7; }
          100% { opacity: 0; transform: translateY(-120px) scale(1.08); }
        }
    </style>
</head>
<body>
    <!-- HERO MODERN START -->
    <section class="container-fluid py-3 position-relative" style="background: radial-gradient(ellipse at 70% 40%, rgba(46,204,64,0.18) 0%, rgba(24,31,38,0.95) 60%), radial-gradient(ellipse at 20% 20%, rgba(46,204,64,0.10) 0%, rgba(24,31,38,0.95) 80%), #181f26; min-height: 90vh; margin-bottom: 3rem;">
        <!-- Floating particles -->
        <div class="floating-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        
        <div class="hero-container" style="padding-top: 6rem;">
            <div class="row align-items-center mb-5" style="min-height: 40vh;">
                <div class="col-lg-5 mb-4 mb-lg-0 offset-lg-1">
                    <div class="hero-text">
                        <h1 class="display-3 fw-bold mb-2" style="line-height:1.1;">
                            <span class="text-light">Xây Dựng</span><br>
                            <span class="text-success">Tương Lai</span>
                        </h1>
                        <h2 class="h4 fw-normal text-light mb-4">Dẫn Đầu Chuyển Đổi Số</h2>
                        <p class="lead mb-4 text-light">
                            <b class="text-light">EMC</b> là tập đoàn <span class="text-success">công nghệ</span> hàng đầu Việt Nam, tiên phong kiến tạo <span class="text-success">hệ sinh thái số</span> toàn diện cho doanh nghiệp hiện đại.
                        </p>
                        <div class="d-flex gap-3 mb-4">
                            <a href="#" class="btn btn-success btn-lg px-4 fw-bold shadow btn-animated rounded-pill">Bắt đầu ngay</a>
                            <a href="#" class="btn btn-outline-light btn-lg px-4 fw-bold btn-animated rounded-pill">TÌM HIỂU THÊM</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="emc-logo-container position-relative" style="width:320px; height:320px;">
                        <div class="emc-outer-glow" style="width:100%;height:100%;border-radius:50%;background:rgba(40,255,80,0.12);position:absolute;"></div>
                        <div class="emc-inner-circle d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle" style="width:200px;height:200px;border-radius:50%;background:#181f26;border:8px solid #2ecc40;">
                            <span class="emc-text fw-bold display-4 text-success">EMC</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center mt-5" style="margin-bottom: 5rem;">
                <div class="col-md-10">
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        <div class="stats-card bg-dark rounded-pill shadow p-4 text-center flex-fill" style="min-width:180px;">
                            <div id="counter-projects" class="display-6 fw-bold text-success mb-2">0+</div>
                            <div class="text-light">Dự án thành công</div>
                        </div>
                        <div class="stats-card bg-dark rounded-pill shadow p-4 text-center flex-fill" style="min-width:180px;">
                            <div id="counter-years" class="display-6 fw-bold text-success mb-2">0+</div>
                            <div class="text-light">Năm kinh nghiệm</div>
                        </div>
                        <div class="stats-card bg-dark rounded-pill shadow p-4 text-center flex-fill" style="min-width:180px;">
                            <div id="counter-customers" class="display-6 fw-bold text-success mb-2">0+</div>
                            <div class="text-light">Khách hàng tin tưởng</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- HERO MODERN END -->

    <!-- Giới thiệu tổng quan -->
    <section class="container py-5" style="max-width:1200px;margin:0 auto; padding-top:5rem; padding-bottom:5rem;">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-2" style="font-size:2.8rem;color: #2E7D32;line-height:1.1;">Giới Thiệu Tổng Quan</h2>
                <div style="width:120px;height:7px;background: #2E7D32;border-radius:4px;margin-bottom:2.5rem;"></div>
                <div style="font-size:1.15rem;line-height:2;color:#222;">
                    TechVision là công ty công nghệ hàng đầu với hơn 15 năm kinh nghiệm trong lĩnh vực phát triển phần mềm và giải pháp số. Chúng tôi chuyên cung cấp các sản phẩm và dịch vụ công nghệ tiên tiến, giúp doanh nghiệp chuyển đổi số thành công.
                </div>
                <div style="font-size:1.15rem;line-height:2;color:#222;margin-top:2rem;">
                    Với đội ngũ hơn 500 chuyên gia công nghệ tài năng, chúng tôi đã phục vụ hơn 1000 khách hàng trên toàn thế giới, từ các startup đến các tập đoàn đa quốc gia.
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-center">
                <div style="background:rgba(110,231,124,0.10);border-radius:32px;padding:4.5rem 2.5rem;min-width:420px;max-width:520px;box-shadow:0 4px 32px rgba(110,231,124,0.10);display:flex;flex-direction:column;align-items:center;">
                    <div style="width:130px;height:130px;border-radius:50%;background:#fff url('https://i.pinimg.com/736x/26/1d/a2/261da237cefade1b17f09ae8f0f1c7c3.jpg') center/cover no-repeat; border:6px solid #fff; box-shadow:0 0 0 6px #e6fbe9,0 8px 32px rgba(110,231,124,0.10);display:flex;align-items:center;justify-content:center;margin-bottom:1.2rem;overflow:hidden;"></div>
                    <div class="fw-bold" style="font-size:1.3rem;color: #2E7D32;">Văn phòng hiện đại</div>
                    <div style="color:#b0b0b0;font-size:1rem;margin-top:0.4rem;">Công nghệ tiên tiến</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sứ mệnh - Tầm nhìn - Giá trị -->
    <section class="container py-5 my-5" style="padding-top:10rem;padding-bottom:10rem;position:relative;overflow:hidden;">
        <div class="vision-section" style="max-width:1200px;margin:0 auto;background:rgba(255,255,255,0.95);border-radius:30px;padding:60px 40px;box-shadow:0 20px 60px rgba(0,0,0,0.1);position:relative;overflow:hidden;">
            <!-- Radar SVG background -->
            <svg class="radar-bg" width="520" height="520" viewBox="0 0 520 520" fill="none" style="position:absolute;top:-90px;right:-120px;z-index:0;pointer-events:none;" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="radar-glow" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#2E7D32" stop-opacity="0.18"/>
                        <stop offset="100%" stop-color="#2E7D32" stop-opacity="0"/>
                    </radialGradient>
                    <linearGradient id="radar-needle" x1="260" y1="260" x2="260" y2="110" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#2E7D32" stop-opacity="0.85"/>
                        <stop offset="70%" stop-color="#2E7D32" stop-opacity="0.25"/>
                        <stop offset="100%" stop-color="#2E7D32" stop-opacity="0"/>
                    </linearGradient>
                    <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur stdDeviation="6" result="coloredBlur"/>
                        <feMerge>
                            <feMergeNode in="coloredBlur"/>
                            <feMergeNode in="SourceGraphic"/>
                        </feMerge>
                    </filter>
                </defs>
                <circle cx="260" cy="260" r="150" stroke="#2E7D32" stroke-width="1.2" opacity="0.18" filter="url(#glow)" />
                <circle cx="260" cy="260" r="100" stroke="#2E7D32" stroke-width="1.2" opacity="0.13" />
                <circle cx="260" cy="260" r="60" stroke="#2E7D32" stroke-width="1.2" opacity="0.13" />
                <circle cx="260" cy="260" r="20" stroke="#2E7D32" stroke-width="1.2" opacity="0.13" />
                <circle cx="260" cy="260" r="12" fill="url(#radar-glow)" />
                <circle cx="260" cy="260" r="12" fill="#2E7D32" opacity="0.13" />
                <g id="radar-sweep">
                    <path id="sweep" d="M260 260 L410 260 A150 150 0 0 0 260 110 Z" fill="url(#radar-glow)" opacity="0.7">
                        <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite" />
                    </path>
                </g>
                <!-- Kim radar mới: line mảnh, ngắn, bo tròn đầu, glow + chấm tròn ở đầu kim và các vòng nhỏ -->
                <g>
                  <line x1="260" y1="260" x2="260" y2="110" stroke="url(#radar-needle)" stroke-width="3" stroke-linecap="round" filter="url(#glow)" opacity="0.8">
                    <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite"/>
                  </line>
                  <circle cx="260" cy="110" r="10" fill="#2E7D32" opacity="0.85" filter="url(#glow)">
                    <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite"/>
                  </circle>
                  <circle cx="260" cy="160" r="7" fill="#2E7D32" opacity="0.7" filter="url(#glow)">
                    <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite"/>
                  </circle>
                  <circle cx="260" cy="200" r="5" fill="#2E7D32" opacity="0.6" filter="url(#glow)">
                    <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite"/>
                  </circle>
                  <circle cx="260" cy="240" r="3.5" fill="#2E7D32" opacity="0.5" filter="url(#glow)">
                    <animateTransform attributeName="transform" type="rotate" from="0 260 260" to="360 260 260" dur="3.5s" repeatCount="indefinite"/>
                  </circle>
                </g>
            </svg>
            <div class="vision-section::after" style="content:'';position:absolute;top:20%;right:-10%;width:20px;height:20px;background:#2E7D32;border-radius:50%;animation:pulse 2s ease-in-out infinite;"></div>
            
            <h1 class="section-title" style="font-size:3.5rem;font-weight:700;color:#2E7D32;text-align:center;margin-bottom:20px;letter-spacing:-1px;animation:slideInDown 1s ease-out;">Tầm nhìn & Sứ mệnh</h1>
            <p class="section-subtitle" style="text-align:center;font-size:1.2rem;color:#666;margin-bottom:0px;line-height:1.6;animation:fadeInUp 1s ease-out 0.3s both;">
                Đội ngũ chuyên gia của chúng tôi luôn nỗ lực hết mình, <span class="highlight" style="color:#2E7D32;font-weight:600;">tầm nhìn và sứ mệnh</span> vì tương lai.
            </p>
            
            <div class="features-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:40px;margin-top:40px;">
                <div class="feature-card" style="text-align:center;padding:40px 30px;border-radius:20px;background:rgba(255,255,255,0.8);backdrop-filter:blur(10px);border:1px solid rgba(46,125,50,0.1);transition:all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);position:relative;overflow:hidden;animation:fadeInUp 0.8s ease-out 0.2s both;">
                    <div class="feature-icon" style="width:80px;height:80px;margin:0 auto 25px;background:linear-gradient(135deg,rgba(46,125,50,0.1) 0%,rgba(46,125,50,0.2) 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;position:relative;transition:all 0.3s ease;">
                        <span class="checkmark">
                            <svg viewBox="0 0 48 48" fill="none">
                                <path class="checkmark-path" d="M12 26 L22 36 L36 14" stroke="#2E7D32" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                    <h3 class="feature-title" style="font-size:1.5rem;font-weight:600;color:#333;margin-bottom:15px;transition:color 0.3s ease;">Định hướng tổng thể</h3>
                    <p class="feature-description" style="font-size:1rem;color:#666;line-height:1.6;transition:color 0.3s ease;">
                        Xây dựng nền tảng phát triển bền vững, lấy công nghệ và con người làm trung tâm.
                    </p>
                </div>
                
                <div class="feature-card" style="text-align:center;padding:40px 30px;border-radius:20px;background:rgba(255,255,255,0.8);backdrop-filter:blur(10px);border:1px solid rgba(46,125,50,0.1);transition:all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);position:relative;overflow:hidden;animation:fadeInUp 0.8s ease-out 0.4s both;">
                    <div class="feature-icon" style="width:80px;height:80px;margin:0 auto 25px;background:linear-gradient(135deg,rgba(46,125,50,0.1) 0%,rgba(46,125,50,0.2) 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;position:relative;transition:all 0.3s ease;">
                        <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g class="radar-rotate">
                                <circle cx="28" cy="28" r="13" stroke="#2E7D32" stroke-width="2.5" fill="none"/>
                                <line x1="28" y1="13" x2="28" y2="19" stroke="#2E7D32" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="28" y1="37" x2="28" y2="43" stroke="#2E7D32" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="43" y1="28" x2="37" y2="28" stroke="#2E7D32" stroke-width="2.5" stroke-linecap="round"/>
                                <line x1="13" y1="28" x2="19" y2="28" stroke="#2E7D32" stroke-width="2.5" stroke-linecap="round"/>
                            </g>
                            <circle cx="28" cy="28" r="3.2" fill="#2E7D32"/>
                        </svg>
                    </div>
                    <h3 class="feature-title" style="font-size:1.5rem;font-weight:600;color:#333;margin-bottom:15px;transition:color 0.3s ease;">Triển khai sản phẩm</h3>
                    <p class="feature-description" style="font-size:1rem;color:#666;line-height:1.6;transition:color 0.3s ease;">
                        Đổi mới sáng tạo, phát triển các giải pháp số hóa phù hợp với nhu cầu thị trường.
                    </p>
                </div>
                
                <div class="feature-card" style="text-align:center;padding:40px 30px;border-radius:20px;background:rgba(255,255,255,0.8);backdrop-filter:blur(10px);border:1px solid rgba(46,125,50,0.1);transition:all 0.4s cubic-bezier(0.175,0.885,0.32,1.275);position:relative;overflow:hidden;animation:fadeInUp 0.8s ease-out 0.6s both;">
                    <div class="feature-icon" style="width:80px;height:80px;margin:0 auto 25px;background:linear-gradient(135deg,rgba(46,125,50,0.1) 0%,rgba(46,125,50,0.2) 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;position:relative;transition:all 0.3s ease;">
                        <div class="dots" style="display:flex;gap:6px;justify-content:center;align-items:center;">
                            <div class="dot" style="width:8px;height:8px;background:#2E7D32;border-radius:50%;animation:bounce 1.4s ease-in-out infinite;"></div>
                            <div class="dot" style="width:8px;height:8px;background:#2E7D32;border-radius:50%;animation:bounce 1.4s ease-in-out infinite 0.16s;"></div>
                            <div class="dot" style="width:8px;height:8px;background:#2E7D32;border-radius:50%;animation:bounce 1.4s ease-in-out infinite 0.32s;"></div>
                        </div>
                    </div>
                    <h3 class="feature-title" style="font-size:1.5rem;font-weight:600;color:#333;margin-bottom:15px;transition:color 0.3s ease;">Quy trình thiết kế</h3>
                    <p class="feature-description" style="font-size:1rem;color:#666;line-height:1.6;transition:color 0.3s ease;">
                        Chuẩn hóa quy trình, tối ưu vận hành, hướng tới hiệu quả và chất lượng vượt trội.
                    </p>
                </div>
            </div>
        </div>
        
        <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
        }
        
        @keyframes slideInDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
            40% { transform: scale(1.2); opacity: 1; }
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(46,125,50,0.1), transparent);
            transition: left 0.5s;
        }
        
        .feature-card:hover::before {
            left: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(46,125,50,0.2);
            border-color: rgba(46,125,50,0.3);
        }
        
        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, rgba(46,125,50,0.2) 0%, rgba(46,125,50,0.3) 100%);
            transform: scale(1.1);
        }
        
        .feature-card:hover .feature-title {
            color: #2E7D32;
        }
        
        .feature-card:hover .feature-description {
            color: #555;
        }
        
        @media (max-width: 768px) {
            .vision-section {
                padding: 40px 20px;
                border-radius: 20px;
            }
            
            .section-title {
                font-size: 2.5rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .feature-card {
                padding: 30px 20px;
            }
        }
        </style>
    </section>

    <!-- SECTION LỊCH SỬ MỚI BẮT ĐẦU -->
    <div class="timeline-container">
        <!-- Bóng động phía trên timeline -->
        <div class="timeline-float-particles timeline-float-particles-top">
            <div class="timeline-float-particle" style="left:6%;top:18%;width:32px;height:32px;animation-delay:0.1s;animation-duration:3.2s;"></div>
            <div class="timeline-float-particle" style="left:15%;top:8%;width:38px;height:38px;animation-delay:0.3s;animation-duration:3.8s;"></div>
            <div class="timeline-float-particle" style="left:23%;top:22%;width:54px;height:54px;animation-delay:1.1s;animation-duration:4.1s;"></div>
            <div class="timeline-float-particle" style="left:33%;top:12%;width:28px;height:28px;animation-delay:0.7s;animation-duration:3.5s;"></div>
            <div class="timeline-float-particle" style="left:47%;top:19%;width:40px;height:40px;animation-delay:1.5s;animation-duration:4.3s;"></div>
            <div class="timeline-float-particle" style="left:59%;top:7%;width:36px;height:36px;animation-delay:2.3s;animation-duration:3.1s;"></div>
            <div class="timeline-float-particle" style="left:68%;top:25%;width:30px;height:30px;animation-delay:1.9s;animation-duration:3.7s;"></div>
            <div class="timeline-float-particle" style="left:81%;top:13%;width:44px;height:44px;animation-delay:2.7s;animation-duration:4.7s;"></div>
        </div>
        <!-- Bóng động phía dưới timeline -->
        <div class="timeline-float-particles timeline-float-particles-bottom">
            <div class="timeline-float-particle" style="left:12%;bottom:13%;width:34px;height:34px;animation-delay:0.5s;animation-duration:3.3s;"></div>
            <div class="timeline-float-particle" style="left:19%;bottom:6%;width:44px;height:44px;animation-delay:0.7s;animation-duration:4.2s;"></div>
            <div class="timeline-float-particle" style="left:31%;bottom:18%;width:28px;height:28px;animation-delay:1.1s;animation-duration:3.6s;"></div>
            <div class="timeline-float-particle" style="left:44%;bottom:9%;width:38px;height:38px;animation-delay:1.5s;animation-duration:4.1s;"></div>
            <div class="timeline-float-particle" style="left:57%;bottom:15%;width:32px;height:32px;animation-delay:2.1s;animation-duration:3.2s;"></div>
            <div class="timeline-float-particle" style="left:69%;bottom:8%;width:40px;height:40px;animation-delay:1.8s;animation-duration:3.9s;"></div>
            <div class="timeline-float-particle" style="left:84%;bottom:17%;width:36px;height:36px;animation-delay:2.5s;animation-duration:4.5s;"></div>
        </div>
        <div class="section-header">
            <h2 class="section-title">Lịch Sử Phát Triển</h2>
            <p class="section-subtitle">Hành trình xây dựng và phát triển qua các thời kỳ</p>
        </div>
        <div class="timeline-wrapper">
            <button class="nav-button" onclick="previousSlide()">‹</button>
            <div class="timeline-content">
                <div class="timeline-line"></div>
                <div class="timeline-items" id="timelineItems">
                    <div class="timeline-item" data-year="1945" data-title="Thành lập ban đầu" data-desc="Được thành lập với sứ mệnh phục vụ nhân dân và đất nước. Những ngày đầu khó khăn nhưng đầy quyết tâm.">
                        <div class="item-circle">
                            <img src="https://images.unsplash.com/photo-1461360228754-6e81c478b882?w=200&h=200&fit=crop" alt="1945">
                        </div>
                        <div class="year-label">1945</div>
                    </div>
                    <div class="timeline-item" data-year="1975" data-title="Thống nhất đất nước" data-desc="Đất nước thống nhất, mở ra kỷ nguyên mới. Tập trung vào tái thiết và phát triển kinh tế - xã hội.">
                        <div class="item-circle">
                            <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=200&h=200&fit=crop" alt="1975">
                        </div>
                        <div class="year-label">1975</div>
                    </div>
                    <div class="timeline-item main-item" data-year="1986" data-title="Đổi Mới" data-desc="Khởi xướng chính sách Đổi Mới, mở ra thời kỳ phát triển mạnh mẽ. Chuyển đổi từ nền kinh tế kế hoạch hóa tập trung sang nền kinh tế thị trường định hướng xã hội chủ nghĩa.">
                        <div class="item-circle">
                            <img src="https://images.unsplash.com/photo-1553729459-efe14ef6055d?w=200&h=200&fit=crop" alt="1986">
                        </div>
                        <div class="year-label">1986</div>
                    </div>
                    <div class="timeline-item" data-year="2007" data-title="Gia nhập WTO" data-desc="Chính thức trở thành thành viên Tổ chức Thương mại Thế giới, đánh dấu sự hội nhập sâu rộng với thế giới.">
                        <div class="item-circle">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=200&h=200&fit=crop" alt="2007">
                        </div>
                        <div class="year-label">2007</div>
                    </div>
                    <div class="timeline-item" data-year="2020" data-title="Thời đại số" data-desc="Bước vào kỷ nguyên chuyển đổi số, phát triển công nghệ cao và nền kinh tế số hiện đại.">
                        <div class="item-circle">
                            <img src="https://images.unsplash.com/photo-1518186285589-2f7649de83e0?w=200&h=200&fit=crop" alt="2020">
                        </div>
                        <div class="year-label">2020</div>
                    </div>
                </div>
            </div>
            <button class="nav-button" onclick="nextSlide()">›</button>
        </div>
        <div class="timeline-dots">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
            <div class="dot" onclick="goToSlide(3)"></div>
            <div class="dot" onclick="goToSlide(4)"></div>
        </div>
        <div class="content-info" id="contentInfo">
            <h3 id="infoTitle">Đổi Mới</h3>
            <p id="infoDesc">Khởi xướng chính sách Đổi Mới, mở ra thời kỳ phát triển mạnh mẽ. Chuyển đổi từ nền kinh tế kế hoạch hóa tập trung sang nền kinh tế thị trường định hướng xã hội chủ nghĩa.</p>
        </div>
    </div>
    <div class="timeline-bg-particles">
      <div class="timeline-bg-particle" style="left:12%;top:82%;width:48px;height:48px;animation-delay:0s;"></div>
      <div class="timeline-bg-particle" style="left:28%;top:90%;width:32px;height:32px;animation-delay:1.2s;"></div>
      <div class="timeline-bg-particle" style="left:52%;top:85%;width:64px;height:64px;animation-delay:2.1s;"></div>
      <div class="timeline-bg-particle" style="left:70%;top:92%;width:38px;height:38px;animation-delay:0.7s;"></div>
      <div class="timeline-bg-particle" style="left:88%;top:87%;width:54px;height:54px;animation-delay:1.7s;"></div>
    </div>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .timeline-container {
        width: 100%;
        max-width: 1200px;
        padding: 40px 20px 0px 20px;
        position: relative;
        background: #fff;
        border-radius: 2rem;
        box-shadow: 0 2px 24px 0 rgba(0,0,0,0.04);
        margin: 0 auto 0 auto;
    }
    .section-header {
        text-align: center;
        margin-bottom: 10px;
    }
    .section-title {
        font-size: 42px;
        font-weight: bold;
        color: #2E7D32;
        margin-bottom: 15px;
        position: relative;
        display: inline-block;
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #2E7D32, #1B5E20);
        border-radius: 2px;
    }
    .section-subtitle {
        font-size: 18px;
        color: #7f8c8d;
        margin-top: 20px;
        font-style: italic;
        margin-bottom: 0px;
    }
    .timeline-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin: 0 0 0 0;
    }
    .nav-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #666;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .nav-button:hover {
        border-color: #2E7D32;
        color: #2E7D32;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    .timeline-content {
        flex: 1;
        position: relative;
        height: 400px;
        overflow: hidden;
    }
    .timeline-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #A5D6A7 0%, #2E7D32 50%, #A5D6A7 100%);
        transform: translateY(-50%);
        z-index: 1;
    }
    .timeline-items {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100%;
        position: relative;
        z-index: 2;
        padding: 0 50px;
    }
    .timeline-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .item-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid white;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        background: #f8f9fa;
    }
    .item-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    .item-circle::before {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        background: linear-gradient(45deg, transparent, rgba(46,125,50,0.3), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .main-item {
        transform: translateY(-20px);
    }
    .main-item .item-circle {
        width: 120px;
        height: 120px;
        border: 6px solid #2E7D32;
        box-shadow: 0 12px 35px rgba(46,125,50,0.3);
    }
    .main-item .item-circle::before {
        background: linear-gradient(45deg, transparent, rgba(46,125,50,0.4), transparent);
        opacity: 1;
    }
    .year-label {
        margin-top: 15px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    .main-item .year-label {
        opacity: 1;
        transform: translateY(0);
        color: #2E7D32;
        font-size: 24px;
    }
    .timeline-item:hover .item-circle {
        transform: scale(1.1) translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    .timeline-item:hover .item-circle::before {
        opacity: 1;
    }
    .timeline-item:hover .year-label {
        opacity: 1;
        transform: translateY(0);
    }
    .timeline-item:hover .item-circle img {
        transform: scale(1.05);
    }
    .timeline-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 8px;
    }
    .dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #ddd;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .dot.active {
        background: #2E7D32;
        transform: scale(1.3);
    }
    .content-info {
        text-align: center;
        margin-top: 8px;
        padding: 20px 32px;
        background: rgba(110, 231, 124, 0.10);
        border-radius: 32px;
        box-shadow: 0 4px 24px rgba(46,125,50,0.08);
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.5s cubic-bezier(.4,2,.6,1);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        border-top: 6px solid #2E7D32;
    }
    .content-info.show {
        opacity: 1;
        transform: translateY(0);
    }
    .content-info h3 {
        color: #222;
        margin-bottom: 18px;
        font-size: 2.1rem;
        font-weight: 800;
        letter-spacing: 0.5px;
    }
    .content-info p {
        color: #555;
        line-height: 1.7;
        font-size: 1.18rem;
        font-weight: 400;
    }
    @media (max-width: 768px) {
        .timeline-items {
            padding: 0 20px;
        }
        .item-circle {
            width: 60px;
            height: 60px;
        }
        .main-item .item-circle {
            width: 90px;
            height: 90px;
        }
        .year-label {
            font-size: 14px;
        }
        .main-item .year-label {
            font-size: 18px;
        }
    }
    .timeline-bg-particles {
      position: absolute;
      left: 0; right: 0; bottom: 0; top: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 0;
    }
    .timeline-bg-particle {
      position: absolute;
      background: radial-gradient(circle, rgba(46,204,64,0.16) 0%, rgba(46,204,64,0.08) 80%, transparent 100%);
      border-radius: 50%;
      filter: blur(0.5px);
      opacity: 0.85;
      animation: timeline-bg-float 7s ease-in-out infinite alternate;
      pointer-events: auto;
      z-index: 10;
      transition: filter 0.25s, opacity 0.25s, box-shadow 0.25s;
    }
    .timeline-bg-particle:hover {
      filter: brightness(2) blur(0px);
      opacity: 1;
      box-shadow: 0 0 60px 24px #7ed95780;
      z-index: 20;
    }
    @keyframes timeline-bg-float {
      0% { transform: translateY(0) scale(1); opacity: 0.7; }
      50% { transform: translateY(-18px) scale(1.08); opacity: 1; }
      100% { transform: translateY(0) scale(1); opacity: 0.7; }
    }
    </style>
    <script>
    let currentSlide = 2; // Start with 1986 (Đổi Mới) as main
    const items = document.querySelectorAll('.timeline-item');
    const dots = document.querySelectorAll('.dot');
    const infoTitle = document.getElementById('infoTitle');
    const infoDesc = document.getElementById('infoDesc');
    const contentInfo = document.getElementById('contentInfo');
    function updateTimeline() {
        items.forEach((item, index) => {
            item.classList.toggle('main-item', index === currentSlide);
        });
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
        const currentItem = items[currentSlide];
        const title = currentItem.dataset.title;
        const desc = currentItem.dataset.desc;
        contentInfo.classList.remove('show');
        setTimeout(() => {
            infoTitle.textContent = title;
            infoDesc.textContent = desc;
            contentInfo.classList.add('show');
        }, 200);
    }
    function nextSlide() {
        currentSlide = (currentSlide + 1) % items.length;
        updateTimeline();
    }
    function previousSlide() {
        currentSlide = (currentSlide - 1 + items.length) % items.length;
        updateTimeline();
    }
    function goToSlide(index) {
        currentSlide = index;
        updateTimeline();
    }
    // Add click events to timeline items
    items.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentSlide = index;
            updateTimeline();
        });
    });
    // Initialize
    updateTimeline();
    // Auto slide (optional)
    let autoSlideInterval = setInterval(() => {
        nextSlide();
    }, 3000);
    // Pause auto slide on hover
    document.querySelector('.timeline-container').addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });
    document.querySelector('.timeline-container').addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(() => {
            nextSlide();
        }, 3000);
    });
    </script>
    <!-- SECTION LỊCH SỬ MỚI KẾT THÚC -->

    <!-- Lợi ích của văn hóa doanh nghiệp (bố cục mô tả xung quanh vòng tròn, mảnh màu to dày) -->
    <section class="container py-5 my-5" id="culture-benefits-section" style="position:relative;overflow:visible;min-height:700px;">
      <div style="text-align:center;margin-bottom:40px;">
        <div style="font-size:3.5rem;font-weight:700;color:#2E7D32;font-family:Montserrat,Arial,sans-serif;line-height:1.08;letter-spacing:-1px;margin-bottom:20px;">
          Lợi ích của Văn hóa Doanh nghiệp
        </div>
        <div style="font-size:1.2rem;color:#666;margin-bottom:60px;line-height:1.6;font-family:Montserrat,Arial,sans-serif;max-width:800px;margin-left:auto;margin-right:auto;font-weight:400;">
          Xây dựng văn hóa doanh nghiệp mạnh mẽ mang lại những giá trị bền vững<br>
          và thúc đẩy sự phát triển toàn diện
        </div>
      </div>
      <div style="position:absolute;inset:0;z-index:0;pointer-events:none;opacity:0.13;background:url('https://upload.wikimedia.org/wikipedia/commons/8/83/World_map_blank_without_borders.svg') center/cover no-repeat;"></div>
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height:600px;position:relative;z-index:1;">
        <div class="culture-benefits-circle mx-auto position-relative" style="width:480px;height:480px;border-radius:50%;transition:box-shadow 0.32s cubic-bezier(.4,2,.6,1),filter 0.32s,transform 0.32s;background: #f3fff7;box-shadow: 0 0 0 8px #e6fbe9, 0 4px 24px rgba(46,125,50,0.08);">
          <!-- SVG vòng tròn 4 mảnh bo góc lớn, có đường chia góc, mảnh màu to dày -->
          <svg class="rotating-circle" width="480" height="480" viewBox="0 0 480 480" style="position:absolute;top:0;left:0;z-index:1;">
            <!-- Đường chia góc -->
            <line x1="240" y1="40" x2="240" y2="440" stroke="#bcd2e6" stroke-width="3" opacity="0.5"/>
            <line x1="40" y1="240" x2="440" y2="240" stroke="#bcd2e6" stroke-width="3" opacity="0.5"/>
            <!-- 4 mảnh bo góc lớn, stroke-width 100, bán kính 140 -->
            <path d="M240,100 A140,140 0 0,1 380,240" stroke="#7ed957" stroke-width="100" fill="none" stroke-linecap="round"/>
            <path d="M380,240 A140,140 0 0,1 240,380" stroke="#2ad2c9" stroke-width="100" fill="none" stroke-linecap="round"/>
            <path d="M240,380 A140,140 0 0,1 100,240" stroke="#00b6f0" stroke-width="100" fill="none" stroke-linecap="round"/>
            <path d="M100,240 A140,140 0 0,1 240,100" stroke="#3d50b7" stroke-width="100" fill="none" stroke-linecap="round"/>
          </svg>
          <!-- Icon + tiêu đề ở giữa (khôi phục code cũ) -->
          <div class="d-flex flex-column align-items-center justify-content-center position-absolute top-50 start-50 translate-middle" style="z-index:3;">
            <div style="background:#eafaf1;border-radius:50%;width:70px;height:70px;display:flex;align-items:center;justify-content:center;margin-bottom:0.5rem;">
              <svg width="38" height="38" fill="none" viewBox="0 0 38 38">
                <circle cx="19" cy="19" r="19" fill="#eafaf1"/>
                <g>
                  <circle cx="19" cy="16" r="5" fill="#2E7D32"/>
                  <ellipse cx="19" cy="28" rx="9" ry="5" fill="#2E7D32" opacity="0.18"/>
                  <circle cx="10" cy="21" r="3" fill="#2E7D32" opacity="0.7"/>
                  <circle cx="28" cy="21" r="3" fill="#2E7D32" opacity="0.7"/>
                </g>
              </svg>
            </div>
            <div style="font-size:2.6rem;font-weight:900;color:#2E7D32;text-align:center;line-height:1.1;font-family:Montserrat,Arial,sans-serif;letter-spacing:1px;">
              EMC<br><span style="color:#7ed957;"></span>
            </div>
          </div>
          <!-- 4 mô tả ở 4 góc ngoài, position absolute, kiểu infographic -->
          <div class="culture-benefit-desc" style="position:absolute;top:-90px;left:-200px;width:240px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;color:#7ed957 !important;line-height:1;font-family:Montserrat,Arial,sans-serif;">01</div>
            <div style="font-size:1.15rem;font-weight:700;color:#444;margin-top:2px;">Xuất sắc</div>
            <div style="font-size:1.05rem;color:#555;">Quy định hình<br>ảnh thương hiệu</div>
          </div>
          <div class="culture-benefit-desc" style="position:absolute;top:-90px;right:-200px;width:240px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;color:#2ad2c9 !important;line-height:1;font-family:Montserrat,Arial,sans-serif;">02</div>
            <div style="font-size:1.15rem;font-weight:700;color:#444;margin-top:2px;">Tôn trọng</div>
            <div style="font-size:1.05rem;color:#555;">Gắn kết nội bộ và thu<br>hút ứng viên tiềm năng</div>
          </div>
          <div class="culture-benefit-desc" style="position:absolute;bottom:-90px;left:-200px;width:240px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;color:#6a7be7 !important;line-height:1;font-family:Montserrat,Arial,sans-serif;">04</div>
            <div style="font-size:1.15rem;font-weight:700;color:#444;margin-top:2px;">Sáng tạo</div>
            <div style="font-size:1.05rem;color:#555;">Quy định thái<br>độ làm việc</div>
          </div>
          <div class="culture-benefit-desc" style="position:absolute;bottom:-90px;right:-200px;width:240px;text-align:center;">
            <div style="font-size:2.8rem;font-weight:800;color:#5ca8fa !important;line-height:1;font-family:Montserrat,Arial,sans-serif;">03</div>
            <div style="font-size:1.15rem;font-weight:700;color:#444;margin-top:2px;">Cam kết</div>
            <div style="font-size:1.05rem;color:#555;">Phân định các<br>giá trị cốt lõi</div>
          </div>
        </div>
      </div>
      <style>
        #culture-benefits-section {
          background: #fff;
          border-radius: 2rem;
          box-shadow: 0 2px 24px 0 rgba(0,0,0,0.04);
          max-width: 1200px;
          margin: 0 auto 1.5rem auto;
          padding: 40px 20px;
        }
        .culture-benefits-circle {
          margin-top: 2rem;
          margin-bottom: 2rem;
          width: 480px;
          height: 480px;
          border-radius: 50%;
          transition: box-shadow 0.32s cubic-bezier(.4,2,.6,1), filter 0.32s, transform 0.32s;
          background: #f3fff7;
          box-shadow: 0 0 0 8px #e6fbe9, 0 4px 24px rgba(46,125,50,0.08);
          position: relative;
        }
        .culture-benefits-circle:hover {
          box-shadow: 0 12px 48px 0 rgba(46,125,50,0.18), 0 0 0 12px #eafaf1;
          filter: drop-shadow(0 0 32px #7ed95755);
          transform: scale(1.035);
          z-index: 5;
        }
        .rotating-circle {
          animation: rotateCircle 8s linear infinite;
          transform-origin: 50% 50%;
        }
        @keyframes rotateCircle {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        .culture-benefit-desc {
          transition: transform 0.28s cubic-bezier(.4,2,.6,1), box-shadow 0.28s, filter 0.28s, background 0.28s, border 0.28s;
          cursor: pointer;
          border-radius: 2.2rem;
          background: transparent;
          box-shadow: none;
          border: none;
          padding: 0.7rem 1.2rem 0.7rem 1.2rem;
          position: relative;
        }
        .culture-benefit-desc:hover {
          background: #fff;
          box-shadow: 0 8px 40px 0 rgba(80,80,160,0.13), 0 0 0 6px rgba(46,125,50,0.07);
          border: 2.5px solid #7ed957;
          transform: scale(1.11) translateY(-6px);
          filter: brightness(1.08);
          z-index: 3;
        }
        .culture-benefit-desc:hover div:first-child {
          filter: brightness(1.2) drop-shadow(0 2px 12px #7ed95799);
          text-shadow: 0 2px 16px #7ed95755;
        }
        .culture-benefit-desc:hover div:nth-child(2) {
          color: #2E7D32;
          text-decoration: underline solid #2E7D32 2.5px;
          text-underline-offset: 6px;
        }
        .culture-benefit-desc div:first-child {
          font-size: 3.2rem !important;
          font-weight: 900 !important;
          line-height: 1 !important;
          font-family: Montserrat, Arial, sans-serif !important;
          margin-bottom: 0.1em;
        }
        .culture-benefit-desc:nth-child(3) div:first-child { color: #6a7be7 !important; } /* 04 - tím xanh */
        .culture-benefit-desc:nth-child(4) div:first-child { color: #5ca8fa !important; } /* 03 - xanh dương */
        .culture-benefit-desc:nth-child(2) div:first-child { color: #2ad2c9 !important; } /* 02 - xanh ngọc */
        .culture-benefit-desc:nth-child(1) div:first-child { color: #7ed957 !important; } /* 01 - xanh lá */
        @media (max-width: 900px) {
          .culture-benefits-circle { width: 98vw; height: 98vw; min-width: 0; min-height: 0; }
          .culture-benefit-desc { position:static!important; width:100%!important; text-align:center!important; margin-bottom:1.5rem; }
        }
      </style>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    // Counter animation for stats
    function animateCounter(element, target, duration, suffix = '+') {
        let start = 0;
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * target);
            element.textContent = value.toLocaleString() + suffix;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            } else {
                element.textContent = target.toLocaleString() + suffix;
            }
        };
        window.requestAnimationFrame(step);
    }

    document.addEventListener('DOMContentLoaded', function() {
        animateCounter(document.getElementById('counter-projects'), 500, 1200, '+');
        animateCounter(document.getElementById('counter-years'), 10, 1000, '+');
        animateCounter(document.getElementById('counter-customers'), 1000, 1400, '+');
    });

    // ... hiệu ứng xuất hiện nhẹ nhàng cho section Lịch Sử ...
    window.addEventListener('DOMContentLoaded', function() {
      document.querySelector('.history-section-animate').style.opacity = 1;
      document.querySelector('.history-animate-title').style.opacity = 1;
      document.querySelector('.history-animate-phases').style.opacity = 1;
      document.querySelector('.history-animate-desc').style.opacity = 1;
      // Nếu muốn delay từng nút phase:
      const phaseBtns = document.querySelectorAll('.history-phase-btn');
      phaseBtns.forEach((btn, idx) => {
        btn.classList.add('animated');
        btn.style.animationDelay = (0.45 + idx*0.08) + 's';
      });
      setTimeout(()=>{
        phaseBtns.forEach(btn=>btn.style.opacity=1);
      }, 1200);
    });
    </script>
</body>
</html>