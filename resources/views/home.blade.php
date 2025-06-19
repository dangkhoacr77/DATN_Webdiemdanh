<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang điểm danh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .form-card {
            width: 160px; height: 260px;
            background-color: #ccc;
            border-radius: 10px;
            margin: 10px;
            padding: 8px;
            text-align: left;
            font-size: 13px;
        }
        .avatar-menu { position: relative; display: flex; align-items: center; gap: 10px; cursor: pointer; }
        .dropdown-menu-custom {
            position: absolute; right: 0; top: 50px;
            display: none; background: white;
            border: 1px solid #ccc; border-radius: 5px;
            z-index: 100; min-width: 120px;
        }
        .dropdown-menu-custom a {
            display: block; padding: 10px 15px;
            text-decoration: none; color: black;
        }
        .dropdown-menu-custom a:hover { background-color: #eee; }
        .footer-logo {
            width: 40px; height: 40px;
            background-color: #2dc5c5; color: white;
            border-radius: 50%;
            font-weight: bold;
            display: flex; align-items: center; justify-content: center;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-light bg-primary text-white px-3 d-flex justify-content-between">
    <div class="navbar-brand mb-0 h1 text-white">Logo</div>
    <div class="d-flex align-items-center gap-3">
      <!-- QR icon (giữ nguyên SVG) -->
      <!-- … SVG code … -->

      <!-- Avatar & menu -->
      <div class="avatar-menu" onclick="toggleMenu()">
        @guest
          <img src="{{ asset('images/default-avatar.png') }}" alt="avatar" class="rounded-circle" width="32">
          <span><a href="{{ route('login.form') }}" class="text-white text-decoration-none">Đăng nhập</a></span>
        @else
          <img src="{{ Auth::user()->avatar_url ?? asset('images/default-avatar.png') }}"
               alt="avatar" class="rounded-circle" width="32">
          <span class="text-white">{{ Auth::user()->name }}</span>
        @endguest

        <div id="avatarDropdown" class="dropdown-menu-custom">
          @guest
            <a href="{{ route('login.form') }}">Đăng nhập</a>
            <a href="{{ route('register.form') }}">Đăng ký</a>
            <a href="{{ route('admin.dashboard') }}">Admin</a>
             <a href="{{ route('login.form') }}">Thông tin người dùng</a>
          @else
            <a href="{{ route('profile') }}">Cài đặt</a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="dropdown-item">Đăng xuất</button>
            </form>
          @endguest
        </div>
      </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container py-5">
  <a href="{{ route('forms.create') }}" class="btn btn-primary mb-4">Tạo biểu mẫu</a>

  <h5 class="fw-bold">Các mẫu điểm danh</h5>
  <div class="d-flex flex-wrap">
    @foreach($forms as $form)
      <div class="form-card">
        <h6>{{ $form->title }}</h6>
        <p class="text-truncate">{{ Str::limit($form->description, 100) }}</p>
        <small>Ngày tạo: {{ $form->created_at->format('d/m/Y') }}</small>
      </div>
    @endforeach
  </div>
</div>

<!-- Footer -->
<footer class="text-white text-center py-5" style="background: #1c1f3c;">
  <div class="d-flex flex-column align-items-center">
    <div class="d-flex align-items-center mb-2">
      <div class="footer-logo">LOGO</div>
      <span class="text-white">Dự án lập trình web</span>
    </div>
    <p class="mt-2">Bạn có hài lòng khi sử dụng trang web?</p>
    <form method="POST" action="{{ route('feedback.submit') }}"
          class="d-flex justify-content-center gap-2 mb-3">
      @csrf
      <input type="text" name="feedback" class="form-control w-200" placeholder="Đánh giá" required>
      <button type="submit" class="btn btn-info text-white">Gửi</button>
    </form>
    <small>Lý Thanh Duy | Võ Thành Đăng Khoa</small><br>
    <small>Khóa học 2022 – 2025.</small>
  </div>
</footer>

<script>
  function toggleMenu() {
    const menu = document.getElementById("avatarDropdown");
    menu.style.display = menu.style.display === "block" ? "none" : "block";
  }
  window.onclick = function(event) {
    if (!event.target.closest('.avatar-menu')) {
      document.getElementById("avatarDropdown").style.display = 'none';
    }
  }
</script>

</body>
</html>
