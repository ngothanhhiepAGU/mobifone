<!-- File: resources/views/ten_file.blade.php -->

<!-- CSS tiện ích -->
<style>
    .utilities-content {
        padding: 20px 0;
        background-color: #f9f9f9;
    }

    .content-header h2.title {
        font-size: 28px;
        margin-bottom: 20px;
        color: #004d99;
        font-weight: bold;
    }

    .utilities-slider {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        justify-content: flex-start;
    }

    .utility-card {
        background: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        width: 272px;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
    }

    .utility-card:hover {
        transform: translateY(-5px);
    }

    .utility-image img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        display: block;
    }

    .utility-info {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .utility-title {
        font-size: 18px;
        color: #333;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .utility-desc {
        font-size: 14px;
        color: #555;
        margin-bottom: 12px;
        flex-grow: 1;
    }

    .utility-detail {
        font-weight: bold;
        color: #0066cc;
        text-decoration: none;
        align-self: flex-start;
    }

    .utility-detail:hover {
        text-decoration: underline;
    }
</style>

<!-- HTML tiện ích -->
<div class="utilities-content clearfix">
    <div class="inner container">
        <div class="content-header">
            <h2 class="title">Tiện ích</h2>
        </div>
        <div class="utilities-slider">
            <!-- Card 1 -->
            <div class="utility-card">
                <div class="utility-image">
                    <img src="{{ asset('images/banner/banner-nap-tien.png') }}" alt="Nạp tiền">
                </div>
                <div class="utility-info">
                    <h3 class="utility-title">Nạp tiền, thanh toán</h3>
                    <p class="utility-desc">Thanh toán cước và nạp tiền trực tuyến đơn giản, tiện lợi và tiết kiệm</p>
                    <a href="/tien-ich?hinh-thuc=thanh-toan-truc-tuyen" class="utility-detail">Chi tiết &rsaquo;</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="utility-card">
                <div class="utility-image">
                    <img src="{{ asset('images/banner/banner-kndl.png') }}" alt="Kết nối dài lâu">
                </div>
                <div class="utility-info">
                    <h3 class="utility-title">Kết nối dài lâu</h3>
                    <p class="utility-desc">Chương trình ưu đãi hấp dẫn cho các hội viên KNDL của MobiFone</p>
                    <a href="/ho-tro-khach-hang/ket-noi-dai-lau" class="utility-detail">Chi tiết &rsaquo;</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="utility-card">
                <div class="utility-image">
                    <img src="{{ asset('images/banner/banner-mypoint.png') }}" alt="MyPoint">
                </div>
                <div class="utility-info">
                    <h3 class="utility-title">MyPoint</h3>
                    <p class="utility-desc">Ứng dụng tích tiêu muôn nơi do MobiFone đồng sáng lập</p>
                    <a href="https://www.mobifone.vn/dich-vu-di-dong/dich-vu/mypoint-MyPoint" class="utility-detail">Chi tiết &rsaquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>
