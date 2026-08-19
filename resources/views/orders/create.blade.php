@extends('layouts.landing', ['title' => $service->name . ' — Pesan Sekarang'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      {{-- Breadcrumb --}}
      <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-8">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <a href="{{ route('services') }}" class="hover:text-primary transition-colors">Layanan</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <a href="{{ route('services.show', $service->slug) }}" class="hover:text-primary transition-colors">{{ $service->name }}</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <span class="text-on-background font-medium">{{ $category->name }}</span>
      </nav>

      <div class="glass-strong rounded-2xl p-8 md:p-10 max-w-3xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-on-background mb-6">Buat Pesanan Baru</h2>
        <p class="text-lg text-on-surface-variant mb-8">Silakan isi formulir di bawah ini untuk memesan layanan {{ $service->name }}.</p>

        <form method="POST" action="{{ route('order.store', [$service->slug, $category->slug]) }}" enctype="multipart/form-data">
          @csrf

          <div class="space-y-6">
            <div>
              <label class="block text-sm font-medium text-on-background mb-1.5">Judul Pesanan</label>
              <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm" placeholder="Contoh: Undangan Pernikahan Ahmad & Siti">
            </div>

            <div>
              <label class="block text-sm font-medium text-on-background mb-1.5">Deskripsi Detail</label>
              <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm resize-none" placeholder="Berikan instruksi detail tentang apa yang Anda inginkan, spesifikasi teknis, preferensi desain, dan tanggal target penyelesaian..."></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-on-background mb-1.5">Unggah File (opsional)</label>
              <p class="text-sm text-on-surface-variant mb-2">Anda dapat mengunggah file-file terkait seperti brief, logo, contoh desain, atau dokumen referensi.</p>
              <div class="flex flex-wrap gap-3">
                <input type="file" name="files[]" multiple class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.svg,.zip,.rar,.ai,.psd,.sket,.fig,.mp4,.mov,.mp3,.wav">
                <span class="text-xs text-on-surface-variant mt-2 flex items-center gap-1">
                  <span class="material-symbols-outlined">info</span>
                  Maksimal 10 file, masing-masing maksimal 10MB
                </span>
              </div>
            </div>
          </div>

          <div class="mt-8 pt-6 border-t border-outline-variant/30">
            <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
              Lanjutkan ke Pembayaran <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection