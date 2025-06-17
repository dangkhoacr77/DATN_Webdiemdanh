<nav class="…">
  …
  @auth
    <form method="POST" action="{{ route('logout') }}" class="inline">
      @csrf
      <button type="submit" class="text-sm text-red-600 hover:underline">
        Đăng xuất
      </button>
    </form>
  @else
    <a href="{{ route('login.form') }}" class="hover:text-blue-600 mr-4">Đăng nhập</a>
  @endauth
</nav>
@if(session('success'))
  <div class="container mt-4">
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  </div>
@endif
