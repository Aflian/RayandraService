@extends('layouts.auth', ['title' => 'Konfirmasi Password — Rayandra'])
@section('content')
<div class="w-full max-w-md glass-strong rounded-2xl p-8">
  <div class="text-center mb-8">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
      <span class="text-2xl font-bold text-primary">Ray<span class="text-on-background">andra</span></span>
    </a>
    <h1 class="text-2xl font-bold text-on-background mt-4">Konfirmasi Password</h1>
    <p class="text-on-surface-variant mt-2">Ini adalah area aman. Masukkan password Anda sebelum melanjutkan.</p>
  </div>

  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    {{-- Password --}}
    <div>
      <label for="password" class="block text-sm font-medium text-on-background mb-1.5">Password</label>
      <input id="password" type="password" name="password" required autocomplete="current-password"
        class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm"
        placeholder="Masukkan password Anda">
      @error('password')
        <p class="mt-1.5 text-sm text-error">{{ $message }}</p>
      @enderror
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full mt-6 px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
      Konfirmasi <span class="material-symbols-outlined text-lg">check_circle</span>
    </button>
  </form>
</div>
@endsection