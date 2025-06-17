@extends('layouts.app')

@section('title', 'Trang cá nhân')

@section('content')
  <div class="container py-5">
    <div class="card mx-auto" style="max-width: 400px;">
      <div class="card-body text-center">
        <img src="{{ $user->avatar_url }}" 
             alt="avatar" 
             class="rounded-circle mb-3" 
             width="100" height="100">

        <h2 class="card-title">{{ $user->name }}</h2>
        <p class="text-muted">{{ $user->email }}</p>
        <p class="text-sm">Thành viên từ: {{ \Carbon\Carbon::parse($user->joined_at)->format('d/m/Y') }}</p>

        <a href="#" class="btn btn-primary mt-3">Chỉnh sửa thông tin</a>
      </div>
    </div>
  </div>
@endsection
