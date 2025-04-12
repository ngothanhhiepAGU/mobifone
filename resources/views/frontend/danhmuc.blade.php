<section id="company-services" class="py-5">
  <div class="container">
    <h2 class="mb-4">Dịch vụ di động</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="serviceTabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="data-tab" data-bs-toggle="tab" href="#data" role="tab">Gói data</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="charge-tab" data-bs-toggle="tab" href="#charge" role="tab">Gói cước</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="service-tab" data-bs-toggle="tab" href="#service" role="tab">Dịch vụ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="subscription-tab" data-bs-toggle="tab" href="#subscription" role="tab">Loại thuê bao</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://simso.mobifone.vn/?rf=mobifone" target="_blank">Đăng ký thuê bao</a>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="serviceTabsContent">
      <!-- Tab Gói data -->
      <div class="tab-pane fade show active" id="data" role="tabpanel">
        <div class="row">
          <!-- Gói dịch vụ mẫu -->
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="card-title mb-0">D5</h5>
                  <img src="./images/slide/title.svg" alt="icon" width="32">
                </div>
                <p class="mb-2">
                  <img src="./images/slide/wallet.svg" alt="" width="20" class="me-2">
                  5.000 đ / 1 Ngày
                </p>
                <p class="mb-3">
                  <img src="./images/slide/box-time.svg" alt="" width="20" class="me-2">
                  1.00GB
                </p>
                <a href="#" class="btn btn-primary w-100">Đăng ký</a>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-3">
          <a href="https://www.mobifone.vn/dich-vu-di-dong/loai-thue-bao" class="btn btn-link">Xem tất cả</a>
        </div>
      </div>

      <!-- Tab Gói cước -->
      <div class="tab-pane fade" id="charge" role="tabpanel">Đang cập nhật...</div>

      <!-- Tab Dịch vụ -->
      <div class="tab-pane fade" id="service" role="tabpanel">
        <style>
          .utilities-slider {
              display: flex;
              flex-wrap: wrap;
              gap: 32px;
              justify-content: start;
          }

          .utility-card {
              background: #ffffff;
              border-radius: 12px;
              overflow: hidden;
              box-shadow: 0 4px 12px rgba(0,0,0,0.08);
              width: 272px;
              transition: transform 0.3s ease;
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
              height: 180px;
              display: flex;
              flex-direction: column;
              justify-content: space-between;
          }

          .utility-title {
              font-size: 18px;
              color: #333;
              margin-bottom: 10px;
          }

          .utility-desc {
              font-size: 14px;
              color: #555;
              flex-grow: 1;
          }

          .utility-detail {
              font-weight: bold;
              color: #0066cc;
              text-decoration: none;
          }

          .utility-detail:hover {
              text-decoration: underline;
          }
        </style>

        <div class="utilities-slider">
          <!-- Card 1 -->
          <div class="utility-card">
            <div class="utility-image">
              <img src="https://api.mobifone.vn/images/banner/1689238809879_Web-01.png" alt="Nạp tiền">
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
              <img src="https://api.mobifone.vn/images/banner/1689238836229_Web-02.png" alt="Kết nối dài lâu">
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
              <img src="https://api.mobifone.vn/images/banner/1700021663745_ảnh trên trăng web copy.png" alt="MyPoint">
            </div>
            <div class="utility-info">
              <h3 class="utility-title">MyPoint</h3>
              <p class="utility-desc">Ứng dụng tích tiêu muôn nơi do MobiFone đồng sáng lập</p>
              <a href="https://www.mobifone.vn/dich-vu-di-dong/dich-vu/mypoint-MyPoint" class="utility-detail">Chi tiết &rsaquo;</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab Loại thuê bao -->
      <div class="tab-pane fade" id="subscription" role="tabpanel">Đang cập nhật...</div>
    </div>
  </div>
</section>
