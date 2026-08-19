@extends('layouts.auth', ['title' => 'Masuk — Rayandra'])
@section('content')
<div class="w-full max-w-md glass-strong rounded-2xl p-8">
  <div class="text-center mb-8">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
      <span class="text-2xl font-bold text-primary">Ray<span class="text-on-background">andra</span></span>
    </a>
    <h1 class="text-2xl font-bold text-on-background mt-4">Selamat Datang Kembali</h1>
    <p class="text-on-surface-variant mt-2">Masuk ke akun Anda untuk melanjutkan</p>
  </div>

  <form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email Address --}}
    <div>
      <label for="email" class="block text-sm font-medium text-on-background mb-1.5">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
        class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm"
        placeholder="Masukkan email Anda">
      @error('email')
        <p class="mt-1.5 text-sm text-error">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div class="mt-4">
      <label for="password" class="block text-sm font-medium text-on-background mb-1.5">Password</label>
      <input id="password" type="password" name="password" required autocomplete="current-password"
        class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm"
        placeholder="Masukkan password">
      @error('password')
        <p class="mt-1.5 text-sm text-error">{{ $message }}</p>
      @enderror
    </div>

    {{-- Remember Me & Forgot Password --}}
    <div class="flex items-center justify-between mt-4">
      <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
        <input id="remember_me" type="checkbox" name="remember"
          class="w-4 h-4 rounded border-outline-variant/50 text-primary focus:ring-primary/30 focus:ring-2 bg-surface border transition-colors">
        <span class="text-sm text-on-surface-variant">Ingat saya</span>
      </label>
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Lupa password?</a>
      @endif
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full mt-6 px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
      Masuk <span class="material-symbols-outlined text-lg">login</span>
    </button>
  </form>

  {{-- Register Link --}}
  <div class="mt-6 text-center">
    <p class="text-on-surface-variant">Belum punya akun?
      <a href="{{ route('register') }}" class="ml-2 text-primary font-semibold hover:underline">Daftar</a>
    </p>
  </div>

  {{-- Session Status --}}
  @if (session('status'))
    <div class="mt-6 p-4 rounded-xl bg-primary-fixed/50 border border-primary/20 text-primary text-sm">
      {{ session('status') }}
    </div>
  @endif
</div>
@endsection