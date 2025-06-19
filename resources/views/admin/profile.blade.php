<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thông tin cá nhân</title>
</head>
<body style="margin: 0; font-family: 'Segoe UI', sans-serif; background-color: #f5f7fa;">
  <div style="display: flex; min-height: 100vh;">
    <!-- Sidebar -->
    <div style="width: 220px; background: white; padding: 30px 0; border-right: 1px solid #e0e0e0; display: flex; flex-direction: column;">
  <div style="text-align: center; font-weight: bold; font-size: 22px; margin-bottom: 40px;">Logo</div>
  <div style="display: flex; flex-direction: column;">
    <div onclick="window.location.href='{{ route('admin.dashboard') }}'"
         style="padding: 12px 24px; display: flex; align-items: center; gap: 10px; font-size: 14px; color: #333; cursor: pointer;">🏠 Thống kê</div>
    <div onclick="window.location.href='{{ route('admin.forms') }}'"
         style="padding: 12px 24px; display: flex; align-items: center; gap: 10px; font-size: 14px; color: #333; cursor: pointer;">📄 Biểu mẫu</div>
    <div onclick="window.location.href='{{ route('admin.accounts') }}'"
         style="padding: 12px 24px; display: flex; align-items: center; gap: 10px; font-size: 14px; color: #333; cursor: pointer;">👤 Tài khoản</div>
    <div onclick="window.location.href='{{ route('admin.profile') }}'"
         style="padding: 12px 24px; display: flex; align-items: center; gap: 10px; font-size: 14px; color: #333; cursor: pointer;">⚙️ Thông tin cá nhân</div>
  </div>
</div>

    <!-- Main -->
    <div style="flex: 1; display: flex; flex-direction: column; background: #f9fafc;">
      <!-- Header -->
      <div style="background: #7da4ff; height: 72px; padding: 0 40px; color: white; font-weight: bold; display: flex; justify-content: space-between; align-items: center;">
        <span>Thông tin cá nhân</span>
        <div style="width: 50px; height: 50px; background: #ccc; border-radius: 50%;"></div>
      </div>

      <!-- Content -->
      <div style="padding: 40px;">
        <div style="background: white; border-radius: 16px; padding: 40px; max-width: 100%; width: 95%; margin: auto;">
          <div style="width: 100px; height: 100px; background: #ccc; border-radius: 50%; margin-bottom: 30px;"></div>
          <form style="display: flex; flex-direction: column; gap: 24px;">
            <div style="display: flex; gap: 40px;">
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label style="margin-bottom: 8px; font-weight: 500; font-size: 14px;">Họ tên</label>
                <input type="text" value="Lý Thanh Duy" readonly style="padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; font-size: 14px; color: #111;">
              </div>
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label style="margin-bottom: 8px; font-weight: 500; font-size: 14px;">Số điện thoại</label>
                <input type="text" value="0312546971" readonly style="padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; font-size: 14px; color: #111;">
              </div>
            </div>

            <div style="display: flex; gap: 40px;">
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label style="margin-bottom: 8px; font-weight: 500; font-size: 14px;">Email</label>
                <input type="email" value="lythanhduy@gmail.com" readonly style="padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; font-size: 14px; color: #111;">
              </div>
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label style="margin-bottom: 8px; font-weight: 500; font-size: 14px;">Ngày tạo</label>
                <input type="text" value="01/01/2025" readonly style="padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; font-size: 14px; color: #111;">
              </div>
            </div>

            <div style="display: flex; gap: 40px;">
              <div style="flex: 1; display: flex; flex-direction: column;">
                <label style="margin-bottom: 8px; font-weight: 500; font-size: 14px;">Ngày sinh</label>
                <input type="text" value="01/01/2004" readonly style="padding: 10px 14px; border: 1.5px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; font-size: 14px; color: #111;">
              </div>
              <div style="flex: 1;"></div>
            </div>

            <button type="button" style="align-self: flex-end; margin-top: 20px; background-color: #0047ff; color: white; padding: 12px 24px; border: none; border-radius: 10px; font-weight: bold; font-size: 14px; cursor: pointer;">Chỉnh sửa</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
