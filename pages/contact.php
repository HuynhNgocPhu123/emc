<?php
    include_once("controller/getcontact.php");
    $p = new getviewcontact();
    if(isset($_REQUEST["btn_lienhe"])){
    $hoten = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $sdt = $_REQUEST["phone"];
    $noidung = $_REQUEST["message"];
    $ngaytao = date("Y-m-d");  // ✅ Lấy ngày hiện tại
    $con = $p -> getthemLH($hoten, $email, $sdt, $noidung, $ngaytao, 0);
    if($con == true){
        echo '<script>alert("Gửi liên hệ thành công! Chúng tôi sẽ liên hệ bạn sớm nhất.")</script>';
        echo '<script>window.location.href="index.php?contact"</script>';
    } else {
        echo '<script>alert("Gửi liên hệ thất bại!")</script>';
    }
}
?>
<div class="container py-5">
    <div class="row justify-content-center align-items-stretch g-4">
        <div class="col-lg-5 col-md-6 mb-4">
            <div class="bg-white rounded-4 shadow p-4 h-100 d-flex flex-column justify-content-between">
                <h2 class="fw-bold mb-3 text-success">Liên hệ với chúng tôi</h2>
                <ul class="list-unstyled mb-4">
                    <li class="mb-3 d-flex align-items-start">
                        <span class="me-3"><i class="fas fa-map-marker-alt fa-lg text-success"></i></span>
                        <span>
                            <strong>Trụ sở chính:</strong><br>
                            Tòa nhà EMC, Số 12 Duy Tân, Cầu Giấy, Hà Nội, Việt Nam
                        </span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <span class="me-3"><i class="fas fa-phone-alt fa-lg text-success"></i></span>
                        <span><strong>Hotline:</strong> 1900 6789</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <span class="me-3"><i class="fas fa-envelope fa-lg text-success"></i></span>
                        <span><strong>Email:</strong> info@emcgroup.com.vn</span>
                    </li>
                </ul>
                <form class="mt-auto" id="contactForm" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control rounded-3" name="name" placeholder="Họ và tên" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control rounded-3" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control rounded-3" name="phone" placeholder="Số điện thoại" required pattern="[0-9]{10,11}">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control rounded-3" name="message" placeholder="Nội dung" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 rounded-3 fw-bold" name="btn_lienhe">Gửi liên hệ</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 col-md-6 mb-4">
            <div class="bg-white rounded-4 shadow h-100 p-0 overflow-hidden">
                <iframe src="https://www.google.com/maps?q=8+Tôn+Thất+Thuyết,+Mỹ+Đình,+Cầu+Giấy,+Hà+Nội&output=embed" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width:100%;height:100%;min-height:400px;border:0;"></iframe>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="fw-bold text-success mb-4 text-center">Văn phòng của chúng tôi</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="rounded-4 shadow-sm p-4 h-100" style="background: #f4fbf4;">
                        <h5 class="fw-bold text-success mb-2">Hà Nội</h5>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-success"></i>Tòa nhà EMC, Số 12 Duy Tân, Cầu Giấy</p>
                        <p class="mb-1"><i class="fas fa-phone-alt me-2 text-success"></i>(024) 7300 8855</p>
                        <p><i class="fas fa-envelope me-2 text-success"></i>info@emcgroup.com.vn</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rounded-4 shadow-sm p-4 h-100" style="background: #f4fbf4;">
                        <h5 class="fw-bold text-success mb-2">TP Hồ Chí Minh</h5>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-success"></i>68 Phạm Ngọc Thạch, Tây Thạnh, Tân Phú</p>
                        <p class="mb-1"><i class="fas fa-phone-alt me-2 text-success"></i>(028) 7300 8866</p>
                        <p><i class="fas fa-envelope me-2 text-success"></i>emc.aigenx@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="rounded-4 shadow-sm p-4 h-100" style="background: #f4fbf4;">
                        <h5 class="fw-bold text-success mb-2">Đà Nẵng</h5>
                        <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-success"></i>F-Complex, 48 Thái Phiên, Hải Châu</p>
                        <p class="mb-1"><i class="fas fa-phone-alt me-2 text-success"></i>(0236) 7300 8877</p>
                        <p><i class="fas fa-envelope me-2 text-success"></i>danang@emcgroup.com.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Đảm bảo đã include Bootstrap, FontAwesome ở header/footer -->