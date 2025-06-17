<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt lại mật khẩu</title>
</head>
<body style="background: #f3f3f3; font-family: 'Segoe UI', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
  <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); width: 400px;">

    <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 30px;">Đặt lại mật khẩu</h2>

    {{-- ✅ Thông báo thành công --}}
    @if(session('status'))
      <div style="color: green; margin-bottom: 15px;">{{ session('status') }}</div>
    @endif

    {{-- ✅ Hiển thị lỗi --}}
    @if($errors->any())
      <div style="color: red; margin-bottom: 15px;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('reset.password') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="hidden" name="email" value="{{ $email }}">

      <div style="margin-bottom: 20px;">
        <label for="password" style="display: block; font-weight: 500; margin-bottom: 8px;">Mật Khẩu</label>
        <div style="position: relative;">
          <input type="password" name="password" id="password" placeholder="nhập mật khẩu" required style="width: 100%; padding: 12px 40px 12px 16px; border-radius: 10px; border: 1.5px solid #ccc;">
          <span onclick="togglePassword('password', this)" style="position: absolute; top: 50%; right: 12px; transform: translateY(-50%); cursor: pointer;">👁️</span>
        </div>
      </div>

      <div style="margin-bottom: 20px;">
        <label for="password_confirmation" style="display: block; font-weight: 500; margin-bottom: 8px;">Nhập Lại Mật Khẩu</label>
        <div style="position: relative;">
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="nhập lại mật khẩu" required style="width: 100%; padding: 12px 40px 12px 16px; border-radius: 10px; border: 1.5px solid #ccc;">
          <span onclick="togglePassword('password_confirmation', this)" style="position: absolute; top: 50%; right: 12px; transform: translateY(-50%); cursor: pointer;">👁️</span>
        </div>
      </div>

      <button type="submit" style="width: 100%; padding: 12px; background-color: #1976f2; border: none; color: white; border-radius: 10px; font-weight: bold; font-size: 15px; cursor: pointer;">
        Xác nhận
      </button>
    </form>
  </div>

  <script>
    function togglePassword(id, el) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        el.textContent = "🙈";
      } else {
        input.type = "password";
        el.textContent = "👁️";
      }
    }
  </script>
</body>
</html>
