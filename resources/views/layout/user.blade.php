<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100"
    style="background: #f8f9fa; font-family: 'Times New Roman', sans-serif; font-size: 18px;">
    @php
        $user = session('nguoi_dung');
    @endphp

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-primary text-white px-3 d-flex justify-content-between">
        <div onclick="window.location.href='{{ route('trangchu') }}'" class="navbar-brand mb-0 h1 text-white">
            QR Điểm Danh
        </div>
        <div class="d-flex align-items-center gap-3">
            <!-- Avatar & menu -->
            <div class="avatar-menu" onclick="toggleMenu()"
                style="position: relative; display: flex; align-items: center; gap: 10px; cursor: pointer;">
                @if ($user)
                    <span class="text-white">{{ $user->ho_ten }}</span>
                @endif

                <div id="avatarDropdown"
                    style="position: absolute; right: 0; top: 50px; display: none; background: white; border: 1px solid #ccc; border-radius: 5px; z-index: 100; min-width: 120px;">
                    @if ($user)
                        @if ($user->loai_tai_khoan !== 'admin')
                            <a href="{{ route('nguoidung.tt-canhan') }}"
                                style="display: block; padding: 10px 15px; text-decoration: none; color: black;">
                                Người dùng
                            </a>
                        @endif
                        <a href="{{ route('dang-xuat') }}"
                            style="display: block; padding: 10px 15px; text-decoration: none; color: black;">
                            Đăng xuất
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Main layout -->
    <div class="container-fluid mt-4 flex-grow-1">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-sm-12 mb-4">
                <div class="bg-white rounded shadow-sm p-2">
                    <nav class="nav flex-column">
                        <a href="{{ route('nguoidung.tt-canhan') }}"
                            style="display:block; padding:12px 16px; text-decoration:none;
                                color:{{ request()->routeIs('nguoidung.tt-canhan') ? '#0d6efd' : '#333' }};
                                font-weight:{{ request()->routeIs('nguoidung.tt-canhan') ? 'bold' : '500' }};
                                border-left:4px solid {{ request()->routeIs('nguoidung.tt-canhan') ? '#0d6efd' : 'transparent' }};
                                background-color: {{ request()->routeIs('nguoidung.tt-canhan') ? '#e9f1ff' : 'transparent' }};">
                            Thông tin cá nhân
                        </a>

                        <a href="{{ route('nguoidung.ql-bieumau') }}"
                            style="display:block; padding:12px 16px; text-decoration:none;
                                color:{{ request()->routeIs('nguoidung.ql-bieumau') ? '#0d6efd' : '#333' }};
                                font-weight:{{ request()->routeIs('nguoidung.ql-bieumau') ? 'bold' : '500' }};
                                border-left:4px solid {{ request()->routeIs('nguoidung.ql-bieumau') ? '#0d6efd' : 'transparent' }};
                                background-color: {{ request()->routeIs('nguoidung.ql-bieumau') ? '#e9f1ff' : 'transparent' }};">
                            Danh sách biểu mẫu
                        </a>

                        <a href="{{ route('nguoidung.ql-danhsach') }}"
                            style="display:block; padding:12px 16px; text-decoration:none;
                                color:{{ request()->routeIs('nguoidung.ql-danhsach') ? '#0d6efd' : '#333' }};
                                font-weight:{{ request()->routeIs('nguoidung.ql-danhsach') ? 'bold' : '500' }};
                                border-left:4px solid {{ request()->routeIs('nguoidung.ql-danhsach') ? '#0d6efd' : 'transparent' }};
                                background-color: {{ request()->routeIs('nguoidung.ql-danhsach') ? '#e9f1ff' : 'transparent' }};">
                            Danh sách điểm danh
                        </a>

                        <a href="{{ route('nguoidung.ls-diemdanh') }}"
                            style="display:block; padding:12px 16px; text-decoration:none;
                                color:{{ request()->routeIs('nguoidung.ls-diemdanh') ? '#0d6efd' : '#333' }};
                                font-weight:{{ request()->routeIs('nguoidung.ls-diemdanh') ? 'bold' : '500' }};
                                border-left:4px solid {{ request()->routeIs('nguoidung.ls-diemdanh') ? '#0d6efd' : 'transparent' }};
                                background-color: {{ request()->routeIs('nguoidung.ls-diemdanh') ? '#e9f1ff' : 'transparent' }};">
                            Lịch sử điểm danh
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main content -->
            <div class="col-md-9 col-sm-12">
                <div class="bg-white rounded p-4 shadow-sm">
                    <h4 class="mb-3" style="font-weight: bold;">@yield('page-title')</h4>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto py-4" style="background: linear-gradient(90deg, #1c1f3c, #2c3e50); color: white;">
        <div class="container d-flex flex-column align-items-center">
            <!-- Logo + Tên dự án -->
            <div class="d-flex align-items-center mb-2">
                <div
                    style="width: 45px; height: 45px; background-color: #00bcd4; color: white; border-radius: 50%; font-weight: bold; font-size: 18px; display: flex; align-items: center; justify-content: center; margin-right: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                    QR
                </div>
                <h5 class="mb-0 fw-semibold">Hệ thống điểm danh QR</h5>
            </div>

            <!-- Thông tin nhóm -->
            <div class="text-center" style="font-size: 15px;">
                <div>Lý Thanh Duy &nbsp;|&nbsp; Võ Thành Đăng Khoa</div>
                <div>Khóa học: <span style="font-weight: 500;">2022 – 2025</span></div>
            </div>

            <!-- Đường kẻ chia -->
            <div class="w-100 my-3" style="height: 1px; background-color: rgba(255,255,255,0.2);"></div>

            <!-- Bản quyền -->
            <small style="opacity: 0.8;">&copy; {{ date('Y') }} QR Điểm Danh</small>
        </div>
    </footer>


    <!-- Scripts -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('avatarDropdown');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        window.onclick = function(event) {
            if (!event.target.closest('.avatar-menu')) {
                const menu = document.getElementById('avatarDropdown');
                if (menu) menu.style.display = 'none';
            }
        };
    </script>

    @stack('scripts')

    <!-- ✅ Bootstrap JS để Modal hoạt động -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
