
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*social media*/
        .social-fixed {
          position: fixed;
          right: 20px;
          bottom: 100px;
          display: flex;
          flex-direction: column;
          gap: 12px;
          z-index: 999;
        }

        .social-icon {
          width: 48px;
          height: 48px;
          background-color: transparent; /* <-- Nền trong suốt */
          border-radius: 50%;
          box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
          display: flex;
          align-items: center;
          justify-content: center;
          animation: pulse 2s infinite;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .social-icon img {
          width: 46px;
          height: 46px;
          object-fit: contain;
          transition: transform 0.3s ease;
        }
        /* Hover effect */
        .social-icon:hover {
          transform: scale(1.2) rotate(8deg);
          background-color: #f0fff0;
          box-shadow: 0 12px 30px rgba(46, 139, 87, 0.3);
        }
        .social-icon:hover img {
          transform: scale(1.1);
        }
        /* Pulse animation */
        @keyframes pulse {
          0% {
            box-shadow: 0 0 0 0 rgba(46, 139, 87, 0.4);
          }
          70% {
            box-shadow: 0 0 0 12px rgba(46, 139, 87, 0);
          }
          100% {
            box-shadow: 0 0 0 0 rgba(46, 139, 87, 0);
          }
        }
        /* Popup thư cảm ơn */
        .thankyou-letter {
          position: fixed;
          top: 0;
          left: 0;
          width: 100vw;
          height: 100vh;
          background: rgba(0,0,0,0.5);
          display: none;
          justify-content: center;
          align-items: center;
          z-index: 1000;
        }

        .letter-content {
          background: #fff9e6;
          padding: 30px 40px;
          border-radius: 15px;
          max-width: 400px;
          text-align: center;
          position: relative;
          box-shadow: 0 10px 30px rgba(0,0,0,0.3);
          animation: popupFadeIn 0.5s ease;
        }

        .letter-content h3 {
          color: #a35e00;
          margin-bottom: 15px;
        }

        .letter-content p {
          font-size: 16px;
          color: #333;
          line-height: 1.5;
        }

        .close-letter {
          position: absolute;
          top: 10px;
          right: 15px;
          font-size: 24px;
          color: #888;
          cursor: pointer;
        }

        @keyframes popupFadeIn {
          from {
            transform: translateY(-30px);
            opacity: 0;
          }
          to {
            transform: translateY(0);
            opacity: 1;
          }
        }

    </style>
</head>
<body>
    <div class="social-fixed">
  <a href="javascript:void(0);" class="social-icon" id="open-letter" title="Lá thư cảm ơn">
    <img src="assets/images/logothu1.png" alt="Lá thư" />
  </a>
  <a href="https://www.facebook.com/" target="_blank" class="social-icon" title="Facebook">
    <img src="assets/images/logofb.png" alt="Facebook">
  </a>
  <a href="https://zalo.me/" target="_blank" class="social-icon" title="Zalo">
    <img src="assets/images/logozalo.png" alt="Zalo">
  </a>
  <a href="https://www.instagram.com/" target="_blank" class="social-icon" title="Instagram">
    <img src="assets/images/logoinstaram.png" alt="Instagram">
  </a>
  <a href="https://www.youtube.com/" target="_blank" class="social-icon" title="YouTube">
    <img src="https://1.bp.blogspot.com/-W3R9CzV2AWk/YCo9Ev2CcVI/AAAAAAAAD88/qymHYkY-wUwHrClgIXxaZVL_echTZbD0ACLcBGAsYHQ/w1200-h630-p-k-no-nu/Logo%2BYoutube.png" alt="YouTube">
  </a>
</div>

<!-- Popup Lá Thư -->
<div class="thankyou-letter" id="thankyou-letter">
  <div class="letter-content">
    <span class="close-letter" id="close-letter">&times;</span>
    <h3>🌟 Cảm Ơn Quý Khách 🌟</h3>
    <p>Chúng tôi trân trọng từng lượt ghé thăm và theo dõi Quý Khách.</p>
    <p>Hy vọng chúng tôi sẽ đem lại trải nghiệm tuyệt vời đến cho bạn!</p>
    <p><b>Trân trọng,<br>Đội ngũ EMC</b></p>
  </div>
</div>
</body>
</html>
  <script>
  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight;
  }

  function revealSteps() {
    document.querySelectorAll('.fade-step').forEach(el => {
      if (!el.classList.contains('visible') && isElementInViewport(el)) {
        const delay = el.dataset.delay ? parseInt(el.dataset.delay) : 0;
        setTimeout(() => {
          el.classList.add('visible');
        }, delay);
      }
    });
  }

  window.addEventListener('scroll', revealSteps);
  window.addEventListener('load', revealSteps);
</script>
<script>
  function isInView(el) {
    const rect = el.getBoundingClientRect();
    return rect.top < window.innerHeight - 50;
  }

  function revealPolicies() {
    document.querySelectorAll('.fade-policy').forEach(el => {
      if (!el.classList.contains('visible') && isInView(el)) {
        const delay = parseInt(el.dataset.delay || 0);
        setTimeout(() => {
          el.classList.add('visible');
        }, delay);
      }
    });
  }

  window.addEventListener('scroll', revealPolicies);
  window.addEventListener('load', revealPolicies);
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const delay = el.dataset.delay || 0;
        setTimeout(() => {
          el.classList.add("visible");
        }, delay * 1000);
        observer.unobserve(el);
      }
    });
  }, {
    threshold: 0.2
  });

  document.querySelectorAll(".fade-slide").forEach(el => {
    observer.observe(el);
  });
});
</script>
<script>
  const openLetter = document.getElementById('open-letter');
  const letterBox = document.getElementById('thankyou-letter');
  const closeLetter = document.getElementById('close-letter');

  openLetter.addEventListener('click', () => {
    letterBox.style.display = 'flex';
  });

  closeLetter.addEventListener('click', () => {
    letterBox.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target === letterBox) {
      letterBox.style.display = 'none';
    }
  });
</script>
<?php
    //header
    include_once("includes/header.php");
    if(isset($_REQUEST["news"])){
        if(isset($_REQUEST["btn_search"])){
            include_once("pages/news.php");
        }else if(isset($_REQUEST["detailid"])){
            include_once("pages/newsdetail.php");
        }
        else{
            include_once("pages/news.php");
        }
        

    }else if(isset($_REQUEST["service"])){
        include_once("pages/service.php");
    }
    else if(isset($_REQUEST["about"])){
        include_once("pages/about.php");
    }
    else if(isset($_REQUEST["contact"])){
        include_once("pages/contact.php");
    }else{
        include_once("pages/home.php");
    } 
    //footer
    include_once("includes/footer.php");
?>