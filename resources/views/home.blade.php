<!-- File: resources/views/portal.blade.php -->
<!-- Description: Main Blade template for the PJ-Track web portal, now using Bootstrap. -->
<!-- This file combines HTML, Bootstrap CSS, and JavaScript for the frontend. -->

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PJ-Track | Provincial Justice Tracker</title>
    <!-- CSRF Token for AJAX requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    <!-- Vite Assets: CSS หลักของแอปพลิเคชัน (รวม Bootstrap CSS ที่ import ไว้ใน app.css) -->
        @vite(['resources/css/app.css'])
    @else
        {{-- Fallback CSS: ถ้า Vite ไม่ทำงาน ให้โหลด Bootstrap จาก CDN หรือ CSS แบบเก่า --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif
</head>
<body>
    <header class="header py-3">
        <div class="container-fluid px-md-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo d-flex align-items-center me-auto">
                    {{-- เปลี่ยนจากรูป placeholder เป็นรูปจาก public/assets/img/icon.png --}}
                    {{-- และทำให้โลโก้เป็นลิงก์กลับไปหน้าแรก (Home) --}}
                    <a href="" class="d-flex align-items-center text-decoration-none">
                        <img src="{{ asset('icon.png') }}" alt="PJ-Track Logo" class="rounded-circle me-1" style="width: 40px; height: 40px;">
                        <h1 class="h4 mb-0 fw-semibold text-success">-Track</h1>
                    </a>
                </div>
                <nav class="main-nav d-none d-lg-block">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link active" href="#">หน้าแรก</a></li>
                        <li class="nav-item"><a class="nav-link" href="#systems">ระบบงาน</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">เกี่ยวกับ PJ-Track</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">ติดต่อ</a></li>
                    </ul>
                </nav>
                <div class="d-flex align-items-center ms-auto">
                    <div id="user-status-area">
                        <!-- JavaScript จะนำปุ่ม Login หรือข้อความต้อนรับมาใส่ในนี้ -->
                    </div>
                    <button class="btn btn-danger rounded-pill px-4 ms-2 d-none" id="logout-button">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i> ออกจากระบบ
                    </button>
                </div>
                <!-- Toggle button for mobile (optional, if implementing responsive nav) -->
                <button class="navbar-toggler d-block d-lg-none ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Collapsible Nav for smaller screens -->
            <div class="collapse navbar-collapse d-lg-none mt-2" id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item"><a class="nav-link py-2" href="#">หน้าแรก</a></li>
                    <li class="nav-item"><a class="nav-link py-2" href="#systems">ระบบงาน</a></li>
                    <li class="nav-item"><a class="nav-link py-2" href="#about">เกี่ยวกับ PJ-Track</a></li>
                    <li class="nav-item"><a class="nav-link py-2" href="#contact">ติดต่อ</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-login ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="avatar">
                        <i class="fa fa-user text-light fa-5x"  aria-hidden="true"></i>
                    </div>				
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="title pb-3">Login With <b>MOJ E-mail</b></h4>	
                    <form id="loginForm" action="{{ route('login.attempt') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">		
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">	
                        </div>        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-btn w-100">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    กรณีลืมรหัสผ่าน กรุณาติดต่อ LineOpenChat ห้องระบบอีเมล์ 
                </div>
            </div>
        </div>
    </div>
    <section class="hero text-white py-5 text-center mb-5">
        <!-- Canvas for animated background in the hero section -->
        <canvas id="heroCanvas"></canvas>
        <div class="container position-relative z-2">
            <div id="div-status-area">
            <h2 class="display-4 fw-semibold mb-3">ยินดีต้อนรับสู่ PJ-Track</h2>
            </div>
            <p class="lead mb-4">ระบบติดตามและสนับสนุนการดำเนินงานของสำนักงานยุติธรรมจังหวัด</p>
            <div class="search-bar d-flex justify-content-center mt-4">
                <input type="text" class="form-control rounded-pill px-4 py-2" placeholder="ค้นหาระบบงานหรือข้อมูล..." style="max-width: 500px;">
                <button class="btn btn-warning rounded-pill px-4 py-2 ms-2 fw-semibold">
                    <i class="fas fa-search me-2"></i> ค้นหา
                </button>
            </div>
        </div>
    </section>

    <section id="systems" class="systems-section py-5 mb-5 mx-auto container">
        <h3 class="text-center mb-5 fw-semibold fs-1">ระบบงานหลัก</h3>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <div class="col">
                <div class="system-card p-4 text-center"  data-system="budget">
                    <i class="fas fa-chart-pie"></i>
                    <h4 class="mb-2">ระบบติดตามงบประมาณ</h4>
                    <p class="mb-3">ติดตามสถานะการใช้งบประมาณและวางแผนการเงิน</p>
                    <a href="#" id="btn-budget" class="btn-custom" data-system="budget" data-sso-url="{{ route('sso.budget.link') }}">PJ-Budget</a>
                </div>
            </div>
            <div class="col">
                <div class="system-card p-4 text-center" data-system="performance">
                    <i class="fas fa-chart-line"></i>
                    <h4 class="mb-2">ระบบรายงานผลการดำเนินงาน</h4>
                    <p class="mb-3">โครงการขับเคลื่อนศูนย์ยุติธรรมชุมชน</p>
                    <a href="#" class="btn-custom" data-system="performance">เข้าสู่ระบบ</a>
                </div>
            </div>
            <div class="col">
                <div class="system-card p-4 text-center" data-system="documents">
                    <i class="fas fa-folder-open"></i>
                    <h4 class="mb-2">ระบบรายงานผลการดำเนินงาน</h4>
                    <p class="mb-3">โครงการขับเคลื่อนการบริหารงานแบบกลุ่มจังหวัด </p>
                    <a href="#" class="btn-custom" data-system="documents">เข้าสู่ระบบ</a>
                </div>
            </div>
            <div class="col">
                <div class="system-card p-4 text-center" data-system="jm">
                    <i class="fas fa-file-alt"></i>
                    <h4 class="mb-2">ระบบรายงานผลการดำเนินงาน</h4>
                    <p class="mb-3">โครงการยุติธรรมเคลื่อนที่</p>
                    <a href="#" class="btn-custom" data-system="website">เข้าสู่ระบบ</a>
                </div>
            </div>
            <div class="col">
                <div class="system-card p-4 text-center" data-system="reports">
                    <i class="fa-solid fa-globe"></i>
                    <h4 class="mb-2">ระบบบริหารจัดการเว็บไซต์</h4>
                    <p class="mb-3">สำนักงานยุติธรรมจังหวัด</p>
                    <a href="#" class="btn-custom" data-system="reports">เข้าสู่ระบบ</a>
                </div>
            </div>
            <!-- Add more system cards as needed 
            <div class="col">
                <div class="system-card add-system-card p-4 text-center">
                    <i class="fas fa-plus-circle"></i>
                    <h4 class="mb-1">เพิ่มระบบงานใหม่</h4>
                    <p class="mb-0">คลิกเพื่อเพิ่มระบบงาน</p>
              
                </div>
            </div> -->
        </div>
    </section>

    <section id="about" class="about-section py-5 mb-5 mx-auto container">
        <h3 class="text-center mb-4 fw-semibold fs-1">เกี่ยวกับ PJ-Track</h3>
        <p class="lead text-center mb-3 mx-auto" style="max-width: 800px;">PJ-Track ถูกออกแบบมาเพื่อเป็นศูนย์กลางในการบริหารจัดการและสนับสนุนการดำเนินงานของสำนักงานยุติธรรมจังหวัด ให้มีประสิทธิภาพมากยิ่งขึ้น ด้วยการรวบรวมระบบงานที่สำคัญไว้ในที่เดียว ทำให้ผู้ใช้งานสามารถเข้าถึงข้อมูลและเครื่องมือต่างๆ ได้อย่างสะดวก รวดเร็ว และเป็นระบบ</p>
        <p class="lead text-center mx-auto" style="max-width: 800px;">เรามุ่งมั่นที่จะพัฒนา PJ-Track ให้เป็นแพลตฟอร์มที่ตอบโจทย์ความต้องการของผู้ใช้งานอย่างแท้จริง เพื่อส่งเสริมการทำงานที่โปร่งใส ตรวจสอบได้ และสามารถนำข้อมูลไปใช้ในการตัดสินใจได้อย่างมีประสิทธิภาพ</p>
    </section>

    <section id="contact" class="contact-section py-5 mb-5 mx-auto container">
        <h3 class="text-center mb-4 fw-semibold fs-1">ติดต่อเรา</h3>
        <p class="lead text-center mb-4 mx-auto" style="max-width: 800px;">หากมีข้อสงสัย หรือต้องการสอบถามข้อมูลเพิ่มเติม สามารถติดต่อเราได้ที่:</p>
        <ul class="list-unstyled text-center pt-3">
            <li class="d-flex justify-content-center align-items-center mb-2">
                <i class="fas fa-envelope me-2 fs-5"></i> Email: info@pjtrack.go.th
            </li>
            <li class="d-flex justify-content-center align-items-center mb-2">
                <i class="fas fa-phone-alt me-2 fs-5"></i> โทรศัพท์: 0-xxxx-xxxx
            </li>
            <li class="d-flex justify-content-center align-items-center mb-2">
                <i class="fas fa-map-marker-alt me-2 fs-5"></i> ที่อยู่: สำนักงานยุติธรรมจังหวัด [ชื่อจังหวัด]
            </li>
        </ul>
    </section>

    <footer class="footer text-white text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0 fs-6">&copy; 2025 PJ-Track. All rights reserved.</p>
        </div>
    </footer>

    <!-- Custom Message Modal HTML Structure -->
    <div id="customMessageBox" class="custom-modal-overlay">
        <div class="custom-modal-content">
            <p id="modalMessage" class="custom-modal-message"></p>
            <button id="closeMessageBox" class="custom-modal-button">ตกลง</button>
        </div>
    </div>

  {{-- ตรวจสอบว่า Vite กำลังทำงานอยู่ (hot file) หรือ Asset ถูก Build แล้ว (manifest.json) --}}
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  <!-- Vite Assets: JavaScript Files -->
    @vite([
        // JavaScript หลักของแอปพลิเคชัน (รวม SweetAlert2, Iconify และ Logic Login Popup)
        'resources/js/app.js'
    ])
    @else
    {{-- Fallback JS: ถ้า Vite ไม่ทำงาน ให้โหลด Bootstrap JS จาก CDN หรือ JS แบบเก่า --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- คุณอาจจะต้องเพิ่ม jQuery และ SweetAlert2 CDN ด้วย ถ้าต้องการให้ฟังก์ชัน Login Popup ทำงานในโหมด Fallback --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script> --}}
    {{-- และโค้ด app.js ของคุณเอง --}}
    @endif
</body>
</html>
