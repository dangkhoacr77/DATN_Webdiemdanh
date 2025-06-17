@extends('layouts.app')

@section('title', 'Tạo biểu mẫu')

@section('content')
<div class="container py-5">
  <h2 class="mb-4">Tạo Mẫu Điểm Danh Mới</h2>

  <form action="{{ route('forms.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Tiêu đề</label>
      <input type="text" name="title"
             class="form-control @error('title') is-invalid @enderror"
             value="{{ old('title') }}">
      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Mô tả</label>
      <textarea name="description"
                class="form-control @error('description') is-invalid @enderror"
                rows="4">{{ old('description') }}</textarea>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="{{ route('home') }}" class="btn btn-secondary">Hủy</a>
  </form>
</div>
@endsection
