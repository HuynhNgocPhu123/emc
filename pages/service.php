<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHÂN TÍCH DỮ LIỆU - AI POWERED</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Poppins:wght@300;400;600;700;800&display=swap');
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body{
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }
    /* Animated Background */
    .bg-animation {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      background: linear-gradient(135deg, #0a0a0a 0%, #001122 50%, #001a0a 100%);
    }

    .bg-animation::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 20% 80%, rgba(34,197,94,0.15) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(16,185,129,0.12) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(74,222,128,0.08) 0%, transparent 50%);
      animation: bgPulse 4s ease-in-out infinite alternate;
    }

    @keyframes bgPulse {
      0% { opacity: 0.3; }
      100% { opacity: 0.7; }
    }

    /* Floating particles */
    .particles {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 1;
    }

    .particle {
      position: absolute;
      width: 2px;
      height: 2px;
      background: #22c55e;
      border-radius: 50%;
      animation: float 20s infinite linear;
      opacity: 0.8;
      box-shadow: 0 0 6px #22c55e;
    }

    @keyframes float {
      0% { transform: translateY(100vh) translateX(0px); }
      100% { transform: translateY(-100px) translateX(100px); }
    }

    .container1 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 80px;
      min-height: 100vh;
      position: relative;
      z-index: 2;
    }

    .left {
      flex: 1;
      z-index: 3;
    }

    .cyber-badge {
      display: inline-block;
      padding: 8px 20px;
      background: linear-gradient(45deg, rgba(34,197,94,0.25), rgba(16,185,129,0.2));
      border: 1px solid #22c55e;
      border-radius: 25px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 20px;
      animation: glow 2s ease-in-out infinite alternate;
      color: white;
    }

    @keyframes glow {
      0% { box-shadow: 0 0 8px #22c55e; }
      100% { box-shadow: 0 0 25px #22c55e, 0 0 35px rgba(34,197,94,0.4); }
    }

    .left h1 {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      font-size: clamp(40px, 8vw, 72px);
      font-weight: 900;
      background: linear-gradient(45deg, #22c55e, #16a34a, #15803d, #4ade80);
      background-size: 300% 300%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin: 0;
      line-height: 1.1;
      animation: gradientShift 3s ease-in-out infinite;
      text-shadow: 0 0 30px rgba(34,197,94,0.6);
      filter: drop-shadow(0 0 20px rgba(34,197,94,0.3));
    }

    @keyframes gradientShift {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .subtitle {
      font-size: 24px;
      font-weight: 300;
      color: #4ade80;
      margin: 10px 0 30px 0;
      opacity: 0;
      animation: fadeInUp 1s ease-out 0.5s forwards;
      text-shadow: 0 0 15px rgba(74,222,128,0.4);
    }

    .left p {
      font-size: 18px;
      color: #cccccc;
      max-width: 520px;
      margin-bottom: 40px;
      line-height: 1.8;
      opacity: 0;
      animation: fadeInUp 1s ease-out 1s forwards;
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

    .button-group1 {
      display: flex;
      gap: 20px;
      margin-top: 40px;
      opacity: 0;
      animation: fadeInUp 1s ease-out 1.5s forwards;
    }

    .btn2 {
      position: relative;
      padding: 16px 32px;
      font-weight: 600;
      font-size: 16px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      overflow: hidden;
    }

    .btn-primary2 {
      background: linear-gradient(45deg, #00ff66, #00ccff);
      color: #000;
      box-shadow: 0 0 20px rgba(0,255,102,0.4);
    }

    .btn-primary2::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s;
    }

    .btn-primary2:hover::before {
      left: 100%;
    }

    .btn-primary2:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,255,102,0.6);
    }

    .btn-secondary2 {
      background: transparent;
      color: #00ff66;
      border: 2px solid #00ff66;
    }

    .btn-secondary2:hover {
      background: #00ff66;
      color: #000;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0,255,102,0.4);
    }

    .right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .chart-container {
      position: relative;
      width: 100%;
      max-width: 600px;
      height: 400px;
      background: rgba(255,255,255,0.05);
      border-radius: 20px;
      padding: 30px;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(0,255,102,0.2);
      box-shadow: 0 20px 40px rgba(0,0,0,0.3);
      animation: float-chart 6s ease-in-out infinite;
    }

    @keyframes float-chart {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(1deg); }
    }

    

    @keyframes borderRotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .stats-overlay {
      position: absolute;
      top: 20px;
      right: 20px;
      background: rgba(0,0,0,0.7);
      padding: 15px;
      border-radius: 10px;
      border: 1px solid #00ff66;
      color: white;
    }

    .stat-item {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .stat-value {
      color: #00ff66;
      font-weight: 700;
      font-family: 'Orbitron', monospace;
    }

    .floating-icons {
      position: absolute;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }

    .floating-icon {
      position: absolute;
      font-size: 20px;
      color: #22c55e;
      opacity: 0.4;
      animation: floatIcon 8s ease-in-out infinite;
      filter: drop-shadow(0 0 8px rgba(34,197,94,0.6));
    }

    .floating-icon:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .floating-icon:nth-child(2) { top: 20%; right: 10%; animation-delay: 1s; }
    .floating-icon:nth-child(3) { bottom: 20%; left: 15%; animation-delay: 2s; }
    .floating-icon:nth-child(4) { bottom: 10%; right: 15%; animation-delay: 3s; }

    @keyframes floatIcon {
      0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
      50% { transform: translateY(-30px) rotate(180deg); opacity: 0.8; }
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .container {
        flex-direction: column;
        padding: 60px 40px;
        text-align: center;
      }
      
      .right {
        margin-top: 60px;
      }
      
      .chart-container {
        max-width: 100%;
        height: 300px;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 40px 20px;
      }
      
      .button-group1 {
        flex-direction: column;
        align-items: center;
      }
      
      .btn {
        width: 100%;
        max-width: 300px;
        justify-content: center;
      }
    }

    /* Scroll indicator */
    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      color: #22c55e;
      font-size: 24px;
      animation: bounce 2s infinite;
      filter: drop-shadow(0 0 10px rgba(34,197,94,0.6));
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
      40% { transform: translateX(-50%) translateY(-10px); }
      60% { transform: translateX(-50%) translateY(-5px); }
    }


    /* Navigation */
        .nav-tabs {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 80px;
            background: rgba(78, 194, 207, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 0, 0, 0.1);
            border-radius: 60px;
            padding: 8px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .nav-tab {
            padding: 16px 32px;
            border: none;
            border-radius: 50px;
            background: transparent;
            color: #000000;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            font-family: inherit;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #00ff87, #00d26a);
            border-radius: 50px;
            transform: scale(0);
            transition: transform 0.4s ease;
            z-index: -1;
        }

        .nav-tab:hover::before,
        .nav-tab.active::before {
            transform: scale(1);
        }

        .nav-tab:hover,
        .nav-tab.active {
            color: #0a0a0a;
            font-weight: 600;
        }

        .nav-tab .icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .nav-tab:hover .icon,
        .nav-tab.active .icon {
            transform: scale(1.1);
        }
        a{
            text-decoration: none;
        }
.cursor {
  display: inline-block;
  color: #00ff87;
  font-weight: bold;
  animation: blink 1s infinite;
}

@keyframes blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}
#particles-js {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0; left: 0;
  z-index: -1;
}
.image-gallery {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 15px;
}

.image-wrapper {
  position: relative;
  overflow: hidden;
  border-radius: 12px;
  transition: transform 0.4s ease;
}

.image-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
  display: block;
  border-radius: 12px;
}

.image-wrapper:hover img {
  transform: scale(1.1);
}

.caption {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.5);
  color: #ffffff;
  text-align: center;
  padding: 8px 12px;
  font-size: 1rem;
  opacity: 0;
  transform: translateY(100%);
  transition: all 0.4s ease;
  font-weight: 500;
  font-family: 'Inter', sans-serif;
}

.image-wrapper:hover .caption {
  opacity: 1;
  transform: translateY(0);
}
.scroll-left, .scroll-right {
  opacity: 0;
  transform: translateX(60px);
  transition: all 2s ease;
}

.scroll-left {
  transform: translateX(-60px);
}

.scroll-left.revealed,
.scroll-right.revealed {
  opacity: 1;
  transform: translateX(0);
}

    /* Ẩn trước khi cuộn tới */
.scroll-reveal {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.8s ease-out, transform 1s ease-out;
}

/* Hiện ra khi đã cuộn tới */
.scroll-reveal.revealed {
  opacity: 1;
  transform: translateY(0);
}

    .blur-background {
  background: rgba(255, 255, 255, 0.08);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 40px 30px;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
  position: relative;
  animation: fadeIn 1s ease-out;
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.section-intro {
  text-align: center;
  margin: 80px auto 60px;
  max-width: 950px;
}

.section-intro h3 {
  font-size: 2.6rem;
  font-weight: 700;
  letter-spacing: 1px;

  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 4px 10px rgba(0, 255, 135, 0.3);
  position: relative;
  margin-bottom: 20px;
}

.section-intro h3::after {
  content: '';
  display: block;
  width: 80px;
  height: 4px;

  margin: 12px auto 0;
  border-radius: 2px;
  animation: glowLine 2s ease-in-out infinite alternate;
}

.section-intro p {
  font-size: 1.3rem;
  line-height: 1.8;
  color: #000000;
  text-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
  animation: popIn 1.2s ease-out;
  max-width: 90%;
  margin: 0 auto;
}

/* Animations */
@keyframes glowLine {
  0% { box-shadow: 0 0 6px rgba(0, 255, 135, 0.2); }
  100% { box-shadow: 0 0 16px rgba(0, 255, 135, 0.6); }
}

@keyframes popIn {
  0% { opacity: 0; transform: scale(0.95); }
  100% { opacity: 1; transform: scale(1); }
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}


:root {
  --green-main: #00c774;
  --green-light: #d8fff0;
  --text-dark: #083c2e;
}

    .sector-section {
  padding: 80px 20px;
}

.container2 {
  max-width: 1200px;
  margin: 0 auto;
  margin-top: -150px;
}

.content-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 60px;
  align-items: center;
}

.text-content h2 {
  font-size: 3rem;
  color: var(--green-main);
  margin-bottom: 20px;
  text-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.subtitle {
  font-size: 1.25rem;
  margin-bottom: 20px;
  color: #000000;
  font-weight: 500;
}

.features {
  list-style: none;
  padding-left: 0;
  margin-bottom: 30px;
}

.features li {
  margin-bottom: 12px;
  position: relative;
  padding-left: 24px;
  color: #2b2b2b;
}

.features li::before {
  content: '✔';
  color: var(--green-main);
  position: absolute;
  left: 0;
  top: 0;
}

.stats {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
  
}

.stat-box {
  background: var(--green-light);
  border-left: 4px solid var(--green-main);
  padding: 20px;
  border-radius: 10px;
  min-width: 120px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
  
}

.stat-box .number {
  font-size: 2rem;
  font-weight: 700;
  color: var(--green-main);
  color: rgb(0, 0, 0);
}

.stat-box .label {
  font-size: 0.95rem;
  color: #333;
  color: rgb(0, 0, 0);
}

.image-gallery {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
}

.image-gallery img {
  width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}
.sector-section {
  display: none;
  padding: 80px 0;
  animation: fadeIn 0.5s ease;
}
.sector-section.active {
  display: block;
}
.content-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 50px;
  align-items: center;
}
.text-content h2 {
  font-size: 2.8rem;
  color: #00b56e;
  margin-bottom: 20px;
}
.subtitle {
  color: #04956f;
  font-size: 1.2rem;
  margin-bottom: 20px;
}
.features {
  list-style: none;
  padding-left: 20px;
  margin-bottom: 20px;
}
.features li {
  margin-bottom: 10px;
  position: relative;
}
.features li::before {
  content: '✔';
  position: absolute;
  left: -20px;
  color: #00cc88;
}
.stats {
  display: flex;
  gap: 30px;
}
.stat-box {
  text-align: center;
  background: rgba(255, 216, 216, 0.05);
  padding: 10px;
  border-radius: 12px;
}
.number {
  font-size: 2rem;
  color: #00ff87;
  font-weight: 700;
}
.label {
  color: #66bfa4;
  font-size: 0.9rem;
  margin-top: 4px;
}
.image-gallery {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
}
.image-gallery img {
  width: 100%;
  border-radius: 12px;
  object-fit: cover;
  aspect-ratio: 4/3;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
@media (max-width: 768px) {
  .content-grid {
    grid-template-columns: 1fr;
  }
  .image-gallery {
    grid-template-columns: 1fr;
  }
}
.text-content h2 {
  color: #034732;
  text-shadow: 1px 1px 3px rgba(255, 255, 255, 0.5);
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
.text-content p,
.text-content li {

  
  font-size: 25px;
  color: #000000;
 
}
#mausac{
    background-color: rgb(227, 230, 228);
}
  </style>
</head>
<body>
  <div class="bg-animation"></div>
  
  <div class="particles" id="particles"></div>

  <div class="container1">
    <div class="left">
      <div class="cyber-badge">
        <i class="fas fa-robot"></i> AI POWERED ANALYTICS
      </div>
      
      <h1>EMC<br>DẪN ĐẦU <br> XU HƯỚNG</h1>
      <div class="subtitle">Thông minh • Nhanh chóng • Chính xác</div>
      
      <p>Biến dòng dữ liệu khô khan thành những insight có giá trị với sức mạnh AI. Khám phá giải pháp Business Intelligence & Machine Learning để đưa ra quyết định nhanh, chính xác và hiệu quả nhất.</p>
      
      <div class="button-group1">
        <button class="btn2 btn-primary2" onclick="startDemo()">
          <i class="fas fa-rocket"></i>
          Khám phá ngay
        </button>
        <button class="btn2 btn-secondary2" onclick="watchDemo()">
          <i class="fas fa-play"></i>
          Xem demo
        </button>
      </div>
    </div>
    
    <div class="right">
      <div class="chart-container">
        <canvas id="myChart"></canvas>
        
        <div class="stats-overlay">
          <div class="stat-item">
            <i class="fas fa-chart-line"></i>
            <span>Độ đo: <span class="stat-value" id="accuracy">98.5%</span></span>
          </div>
          <div class="stat-item">
            <i class="fas fa-clock"></i>
            <span>Tốc độ: <span class="stat-value" id="speed">2.3s</span></span>
          </div>
          <div class="stat-item">
            <i class="fas fa-database"></i>
            <span>Dữ liệu: <span class="stat-value" id="dataPoints">1.2M</span></span>
          </div>
        </div>
      </div>
      
      <div class="floating-icons">
        <div class="floating-icon"><i class="fas fa-brain"></i></div>
        <div class="floating-icon"><i class="fas fa-microscope"></i></div>
        <div class="floating-icon"><i class="fas fa-atom"></i></div>
        <div class="floating-icon"><i class="fas fa-dna"></i></div>
      </div>
    </div>
  </div>

  <div class="scroll-indicator">
    <i class="fas fa-chevron-down"></i>
  </div>

<div id="mausac">
    <br>
    <div class="nav-tabs">
            <button class="nav-tab active" onclick="showContent('ai', this)">
                <span>Công Nghệ</span>
            </button>
            <button class="nav-tab" onclick="showContent('sustainability', this)">
                <span>Thương Mại Dịch Vụ</span>
            </button>
            <button class="nav-tab" onclick="showContent('digital', this)">
                <span>Xã Hội</span>
            </button>
        </div>
        <section class="sector-section active" id="ai">
        <div class="container2">
            <div class="section-intro blur-background scroll-reveal">
                <p>Với lĩnh vực này, chúng tôi đang dẫn đầu đổi mới, phát triển các giải pháp tối ưu hóa và bền vững, đồng hành cùng tương lai.</p>
            </div>
            <div class="content-grid">
                <div class="text-content blur-background scroll-reveal scroll-left">
                    <h2>AI Revolution</h2>
                    <p class="subtitle">Trí tuệ nhân tạo thay đổi cuộc sống</p>
                    <ul class="features">
                    <li>Machine Learning & Deep Learning</li>
                    <li>Trợ lý AI trong y tế, giáo dục</li>
                    <li>Tự động hóa doanh nghiệp</li>
                    <li>AI trong người máy & robot</li>
                    </ul>
                    <div class="stats">
                    <div class="stat-box"><div class="number">500+</div><div class="label">Dự án AI</div></div>
                    <div class="stat-box"><div class="number">80%</div><div class="label">Ứng dụng thực tế</div></div>
                    <div class="stat-box"><div class="number">1M+</div><div class="label">Người dùng AI</div></div>
                    </div>
                </div>
                <div class="image-gallery scroll-right">
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_682564a306712.jpg" alt="AI">
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_6825647b31956.jpg" alt="ML" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    
                </div>
            </div>
        </div>
        </section>

        <!-- Green Future Section -->
        <section class="sector-section" id="sustainability">
        <div class="container2">
            <div class="section-intro blur-background scroll-reveal scroll-reveal">
                <p>Với lĩnh vực này, chúng tôi đang dẫn đầu đổi mới, phát triển các giải pháp tối ưu hóa và bền vững, đồng hành cùng tương lai.</p>
            </div>

            <div class="content-grid">
            <div class="text-content blur-background scroll-reveal">
                <h2>Green Future</h2>
                <p class="subtitle">Hướng đến một hành tinh xanh và bền vững</p>
                <ul class="features">
                <li>Điện mặt trời và gó</li>
                <li>Công nghệ pin lưu trữ</li>
                <li>Giao thông xanh: xe điện & sạc nhanh</li>
                <li>Chống biến đổi khí hậu & kinh tế xanh</li>
                </ul>
                <div class="stats">
                <div class="stat-box"><div class="number">70%</div><div class="label">Nguồn tái tạo</div></div>
                <div class="stat-box"><div class="number">50%</div><div class="label">Giảm CO2</div></div>
                <div class="stat-box"><div class="number">$4.2T</div><div class="label">Đầu tư xanh</div></div>
                </div>
            </div>
                <div class="image-gallery scroll-right">
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_682564a306712.jpg" alt="AI">
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_6825647b31956.jpg" alt="ML" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    
                </div>
            
        </div>
        </section>

        <!-- Digital World Section -->
        <section class="sector-section" id="digital">
        <div class="container2">
            <div class="section-intro blur-background scroll-reveal">
                <p>Với lĩnh vực này, chúng tôi đang dẫn đầu đổi mới, phát triển các giải pháp tối ưu hóa và bền vững, đồng hành cùng tương lai.</p>
            </div>
            <div class="content-grid">
            <div class="text-content blur-background scroll-reveal scroll-reveal">
                <h2>Digital World</h2>
                <p class="subtitle">Chuyển đổi số toàn diện và Internet mới</p>
                <ul class="features">
                <li>Web3 & Blockchain</li>
                <li>IoT & nhà thông minh</li>
                <li>Metaverse & XR (AR/VR)</li>
                <li>Giao dịch phi tập trung</li>
                </ul>
                <div class="stats">
                <div class="stat-box"><div class="number">75B</div><div class="label">Thiết bị IoT</div></div>
                <div class="stat-box"><div class="number">1.7B</div><div class="label">Người dùng XR</div></div>
                <div class="stat-box"><div class="number">85%</div><div class="label">Số hóa DN</div></div>
                </div>
            </div>
             <div class="image-gallery scroll-right">
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_682564a306712.jpg" alt="AI">
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_6825647b31956.jpg" alt="ML" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    <div class="image-wrapper">
                        <img src="assets/images/banners/banner_68256458ed6e7.jpg" alt="Robot" />
                        <div class="caption">Trí tuệ nhân tạo</div>
                    </div>
                    
                </div>
        </div>
        </section>


    </div>
</div>

</body>

</html>
<script>
    const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
}, {
    threshold: 0.2
});

document.querySelectorAll('.fade-left, .fade-right').forEach(el => {
    observer.observe(el);
});
const cards = document.querySelectorAll('.feature-cards .card');
const cardsObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('show');
                }, index * 200); // delay 200ms mỗi card
            });
        }
    });
}, {
    threshold: 0.3
});

cardsObserver.observe(document.querySelector('.feature-cards'));

</script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
  particlesJS("particles-js", {
    "particles": {
      "number": { "value": 60 },
      "color": { "value": "#00ff87" },
      "shape": { "type": "circle" },
      "opacity": { "value": 0.2 },
      "size": { "value": 4 },
      "move": { "enable": true, "speed": 0.5 }
    },
    "interactivity": { "detect_on": "canvas", "events": { "onhover": { "enable": false } } },
    "retina_detect": true
  });
</script>
<script>
function showContent(id, button) {
  document.querySelectorAll('.sector-section').forEach(sec => {
    sec.classList.remove('active');
    sec.style.display = 'none';
  });

  const target = document.getElementById(id);
  if (target) {
    target.classList.add('active');
    target.style.display = 'block';
  }

  document.querySelectorAll('.nav-tab').forEach(tab => tab.classList.remove('active'));
  button.classList.add('active');
}

window.addEventListener('DOMContentLoaded', function () {
  showContent('ai', document.querySelector('.nav-tab.active'));
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const reveals = document.querySelectorAll('.scroll-reveal');

    const revealOnScroll = () => {
      const windowHeight = window.innerHeight;

      reveals.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if (top < windowHeight - 100) {
          el.classList.add('revealed');
        }
      });
    };

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Gọi 1 lần đầu để kích hoạt nếu có sẵn trong khung nhìn
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll('.scroll-left, .scroll-right');

    const revealOnScroll = () => {
      const windowHeight = window.innerHeight;

      elements.forEach(el => {
        const top = el.getBoundingClientRect().top;
        if (top < windowHeight - 100) {
          el.classList.add('revealed');
        }
      });
    };

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // gọi ngay lần đầu
  });
</script>




  <script>
    // Create floating particles
    function createParticles() {
      const particlesContainer = document.getElementById('particles');
      const particleCount = 50;

      for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
        particlesContainer.appendChild(particle);
      }
    }

    // Initialize Chart with Enhanced Effects
    const ctx = document.getElementById('myChart').getContext('2d');

    // Create multiple gradients for ultra wow effect
    const mainGradient = ctx.createLinearGradient(0, 0, 0, 400);
    mainGradient.addColorStop(0, 'rgba(34, 197, 94, 0.6)');
    mainGradient.addColorStop(0.3, 'rgba(16, 185, 129, 0.4)');
    mainGradient.addColorStop(0.7, 'rgba(74, 222, 128, 0.2)');
    mainGradient.addColorStop(1, 'rgba(34, 197, 94, 0.05)');

    const borderGradient = ctx.createLinearGradient(0, 0, 0, 400);
    borderGradient.addColorStop(0, '#22c55e');
    borderGradient.addColorStop(0.5, '#16a34a');
    borderGradient.addColorStop(1, '#4ade80');

    // Secondary dataset for comparison
    const secondaryGradient = ctx.createLinearGradient(0, 0, 0, 400);
    secondaryGradient.addColorStop(0, 'rgba(74, 222, 128, 0.3)');
    secondaryGradient.addColorStop(1, 'rgba(74, 222, 128, 0.05)');

    let chart;
    let animationIndex = 0;

    function initChart() {
      chart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
          datasets: [
            {
              label: 'AI Performance',
              data: [65, 78, 82, 89, 92, 88, 95, 91, 97, 94, 98, 96],
              fill: true,
              backgroundColor: mainGradient,
              borderColor: '#22c55e',
              borderWidth: 4,
              tension: 0.4,
              pointRadius: 8,
              pointHoverRadius: 12,
              pointBackgroundColor: '#22c55e',
              pointBorderColor: '#ffffff',
              pointBorderWidth: 3,
              pointHoverBackgroundColor: '#4ade80',
              pointHoverBorderColor: '#ffffff',
              pointHoverBorderWidth: 4,
              pointStyle: 'circle',
              order: 1
            },
            {
              label: 'Previous Period',
              data: [45, 58, 62, 69, 72, 68, 75, 71, 77, 74, 78, 76],
              fill: true,
              backgroundColor: secondaryGradient,
              borderColor: '#4ade80',
              borderWidth: 2,
              borderDash: [5, 5],
              tension: 0.4,
              pointRadius: 4,
              pointHoverRadius: 8,
              pointBackgroundColor: '#4ade80',
              pointBorderColor: '#ffffff',
              pointBorderWidth: 2,
              order: 2
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          interaction: {
            intersect: false,
            mode: 'index'
          },
          plugins: {
            legend: { 
              display: true,
              position: 'top',
              align: 'end',
              labels: {
                color: '#22c55e',
                font: {
                  family: 'Orbitron',
                  size: 11,
                  weight: 'bold'
                },
                usePointStyle: true,
                pointStyle: 'circle',
                padding: 20
              }
            },
            tooltip: {
              backgroundColor: 'rgba(0,0,0,0.9)',
              titleColor: '#22c55e',
              bodyColor: '#ffffff',
              borderColor: '#22c55e',
              borderWidth: 2,
              cornerRadius: 15,
              displayColors: true,
              titleFont: {
                family: 'Orbitron',
                size: 14,
                weight: 'bold'
              },
              bodyFont: {
                family: 'Poppins',
                size: 12
              },
              callbacks: {
                afterBody: function(context) {
                  return 'Powered by AI Analytics';
                }
              }
            }
          },
          scales: {
            x: {
              ticks: { 
                color: '#22c55e',
                font: {
                  family: 'Orbitron',
                  size: 12,
                  weight: 'bold'
                }
              },
              grid: {
                color: 'rgba(34,197,94,0.15)',
                drawBorder: false,
                lineWidth: 1
              }
            },
            y: {
              beginAtZero: true,
              max: 100,
              ticks: { 
                color: '#22c55e',
                font: {
                  family: 'Orbitron',
                  size: 12,
                  weight: 'bold'
                },
                callback: function(value) {
                  return value + '%';
                }
              },
              grid: {
                color: 'rgba(34,197,94,0.15)',
                drawBorder: false,
                lineWidth: 1
              }
            }
          },
          animation: {
            duration: 3000,
            easing: 'easeOutQuart',
            onProgress: function(animation) {
              // Add sparkle effect during animation
              if (Math.random() > 0.95) {
                createSparkle();
              }
            }
          },
          elements: {
            point: {
              hoverBackgroundColor: '#22c55e',
              hoverBorderColor: '#ffffff',
              hoverBorderWidth: 4
            }
          }
        }
      });

      // Add real-time data updates
      setInterval(() => {
        const currentData = chart.data.datasets[0].data;
        const newData = currentData.map(value => {
          const change = (Math.random() - 0.5) * 4;
          return Math.max(60, Math.min(100, value + change));
        });
        
        chart.data.datasets[0].data = newData;
        chart.update('none'); // Smooth update without animation
      }, 5000);
    }

    // Create sparkle effect
    function createSparkle() {
      const chartContainer = document.querySelector('.chart-container');
      const sparkle = document.createElement('div');
      sparkle.style.position = 'absolute';
      sparkle.style.width = '4px';
      sparkle.style.height = '4px';
      sparkle.style.background = '#4ade80';
      sparkle.style.borderRadius = '50%';
      sparkle.style.left = Math.random() * 100 + '%';
      sparkle.style.top = Math.random() * 100 + '%';
      sparkle.style.pointerEvents = 'none';
      sparkle.style.zIndex = '10';
      sparkle.style.boxShadow = '0 0 10px #4ade80';
      
      chartContainer.appendChild(sparkle);
      
      setTimeout(() => {
        sparkle.style.transition = 'all 1s ease-out';
        sparkle.style.transform = 'scale(0)';
        sparkle.style.opacity = '0';
        setTimeout(() => {
          if (chartContainer.contains(sparkle)) {
            chartContainer.removeChild(sparkle);
          }
        }, 1000);
      }, 100);
    }

    // Animate stats
    function animateStats() {
      const accuracy = document.getElementById('accuracy');
      const speed = document.getElementById('speed');
      const dataPoints = document.getElementById('dataPoints');

      setInterval(() => {
        accuracy.textContent = (98 + Math.random() * 2).toFixed(1) + '%';
        speed.textContent = (2 + Math.random()).toFixed(1) + 's';
        dataPoints.textContent = (1.2 + Math.random() * 0.8).toFixed(1) + 'M';
      }, 3000);
    }

    // Button interactions
    function startDemo() {
      // Add pulse effect
      const btn = event.target;
      btn.style.transform = 'scale(0.95)';
      setTimeout(() => {
        btn.style.transform = 'scale(1)';
      }, 150);
      
      // Animate chart with new data
      if (chart) {
        const newData = Array.from({length: 12}, () => Math.floor(Math.random() * 40) + 60);
        chart.data.datasets[0].data = newData;
        chart.update('active');
      }
    }

    function watchDemo() {
      const btn = event.target;
      btn.style.transform = 'scale(0.95)';
      setTimeout(() => {
        btn.style.transform = 'scale(1)';
      }, 150);
      
      alert('Demo video sẽ được phát triển trong phiên bản tiếp theo!');
    }

    // Initialize everything
    document.addEventListener('DOMContentLoaded', function() {
      createParticles();
      initChart();
      animateStats();
    });

    // Add scroll parallax effect
    window.addEventListener('scroll', function() {
      const scrollY = window.scrollY;
      const particles = document.querySelectorAll('.particle');
      
      particles.forEach((particle, index) => {
        const speed = (index % 3 + 1) * 0.5;
        particle.style.transform = `translateY(${scrollY * speed}px)`;
      });
    });

    // Add cursor trail effect
    document.addEventListener('mousemove', function(e) {
      const trail = document.createElement('div');
      trail.style.position = 'fixed';
      trail.style.left = e.clientX + 'px';
      trail.style.top = e.clientY + 'px';
      trail.style.width = '4px';
      trail.style.height = '4px';
      trail.style.background = '#00ff66';
      trail.style.borderRadius = '50%';
      trail.style.pointerEvents = 'none';
      trail.style.zIndex = '9999';
      trail.style.opacity = '0.7';
      
      document.body.appendChild(trail);
      
      setTimeout(() => {
        trail.style.transition = 'all 0.5s ease-out';
        trail.style.transform = 'scale(0)';
        trail.style.opacity = '0';
        setTimeout(() => {
          document.body.removeChild(trail);
        }, 500);
      }, 50);
    });
  </script>
</body>
</html>