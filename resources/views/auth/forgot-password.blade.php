<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quên mật khẩu</title>
</head>
<body style="margin: 0; padding: 0; background: #f5f5f5; font-family: 'Segoe UI', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh;">
  <div style="background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); width: 420px;">
    <h2 style="font-size: 24px; margin-bottom: 30px; font-weight: bold;">Quên mật khẩu</h2>

    {{-- Hiển thị thông báo --}}
    @if(session('status'))
      <div style="color: green; margin-bottom: 15px;">{{ session('status') }}</div>
    @endif
    @if($errors->any())
      <div style="color: red; margin-bottom: 15px;">{{ $errors->first() }}</div>
    @endif

    {{-- Form gửi mã --}}
    <form method="POST" action="{{ route('forgot.sendCode') }}">
      @csrf
      <div style="margin-bottom: 20px;">
        <label for="email" style="display: block; margin-bottom: 8px; font-weight: 500;">Email</label>
        <div style="display: flex; gap: 10px;">
          <input type="email" name="email" id="email" placeholder="@gmail.com" required style="flex: 1; padding: 12px 16px; border-radius: 10px; border: 1.5px solid #ccc;">
          <button type="submit" style="background-color: #1976f2; color: white; padding: 12px 20px; border: none; border-radius: 10px; cursor: pointer;">Lấy mã</button>
        </div>
      </div>
    </form>

    {{-- Form xác nhận mã --}}
    <form method="POST" action="{{ route('forgot.verifyCode') }}">
      @csrf
      <div style="margin-bottom: 20px;">
        <label for="code" style="display: block; margin-bottom: 8px; font-weight: 500;">Mã Xác Nhận</label>
        <input type="text" name="code" id="code" placeholder="Nhập mã" required style="width: 100%; padding: 12px 16px; border-radius: 10px; border: 1.5px solid #ccc;">
      </div>
      <button type="submit" style="width: 100%; background-color: #1976f2; color: white; padding: 12px; border: none; border-radius: 10px; cursor: pointer;">Xác nhận</button>
    </form>
  </div>
</body>
</html>
