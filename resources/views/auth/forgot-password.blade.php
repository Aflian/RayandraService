@extends('layouts.auth', ['title' => 'Lupa Password — Rayandra'])
@section('content')
<div class="w-full max-w-md glass-strong rounded-2xl p-8">
  <div class="text-center mb-8">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
      <span class="text-2xl font-bold text-primary">Ray<span class="text-on-background">andra</span></span>
    </a>
    <h1 class="text-2xl font-bold text-on-background mt-4">Lupa Password?</h1>
    <p class="text-on-surface-variant mt-2">Masukkan email Anda, kami akan kirim tautan reset password.</p>
  </div>

  <form method="POST" action="{{ route('password.email') }}">
    @csrf

    {{-- Email --}}
    <div>
      <label for="email" class="block text-sm font-medium text-on-background mb-1.5">Email</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
        class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm"
        placeholder="Masukkan email Anda">
      @error('email')
        <p class="mt-1.5 text-sm text-error">{{ $message }}</p>
      @enderror
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full mt-6 px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
      Kirim Tautan Reset <span class="material-symbols-outlined text-lg">send</span>
    </button>
  </form>

  {{-- Back to Login --}}
  <div class="mt-6 text-center">
    <p class="text-on-surface-variant">Ingat password?
      <a href="{{ route('login') }}" class="ml-2 text-primary font-semibold hover:underline">Masuk</a>
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