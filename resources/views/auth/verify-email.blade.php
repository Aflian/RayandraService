@extends('layouts.auth', ['title' => 'Verifikasi Email — Rayandra'])
@section('content')
<div class="w-full max-w-md glass-strong rounded-2xl p-8">
  <div class="text-center mb-8">
    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
      <span class="text-2xl font-bold text-primary">Ray<span class="text-on-background">andra</span></span>
    </a>
    <h1 class="text-2xl font-bold text-on-background mt-4">Verifikasi Email</h1>
    <p class="text-on-surface-variant mt-2">Sebelum memulai, silakan verifikasi email Anda dengan mengklik tautan yang telah kami kirim.</p>
  </div>

  {{-- Session Status --}}
  @if (session('status') == 'verification-link-sent')
    <div class="mb-6 p-4 rounded-xl bg-primary-fixed/50 border border-primary/20 text-primary text-sm">
      Tautan verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.
    </div>
  @endif

  <div class="flex flex-col gap-4">
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
        Kirim Ulang Email Verifikasi <span class="material-symbols-outlined text-lg">mark_email_read</span>
      </button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="w-full px-6 py-3.5 rounded-xl border border-outline-variant/50 text-on-background font-semibold hover:border-primary hover:text-primary transition-all glass flex items-center justify-center gap-2">
        Keluar <span class="material-symbols-outlined text-lg">logout</span>
      </button>
    </form>
  </div>
</div>
@endsection