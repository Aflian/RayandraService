@extends('layouts.landing', ['title' => 'Kontak — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Kontak</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Hubungi Kami</h1>
        <p class="text-lg text-on-surface-variant mt-4">Ada pertanyaan atau ingin mendiskusikan proyek? Kami siap membantu.</p>
      </div>

      <div class="grid lg:grid-cols-5 gap-12 max-w-5xl mx-auto">
        {{-- Contact Info --}}
        <div class="lg:col-span-2 space-y-6">
          <div class="glass-strong rounded-2xl p-6">
            <h3 class="font-semibold text-on-background mb-4">Informasi Kontak</h3>
            <div class="space-y-4">
              <div class="flex items-start gap-3">
                <span class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                  <span class="material-symbols-outlined">mail</span>
                </span>
                <div>
                  <p class="text-sm text-on-surface-variant">Email</p>
                  <p class="text-on-background font-medium">info@rayandra.id</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <span class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                  <span class="material-symbols-outlined">phone</span>
                </span>
                <div>
                  <p class="text-sm text-on-surface-variant">Telepon</p>
                  <p class="text-on-background font-medium">+62 812-3456-7890</p>
                </div>
              </div>
              <div class="flex items-start gap-3">
                <span class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                  <span class="material-symbols-outlined">location_on</span>
                </span>
                <div>
                  <p class="text-sm text-on-surface-variant">Lokasi</p>
                  <p class="text-on-background font-medium">Indonesia</p>
                </div>
              </div>
            </div>
          </div>

          <div class="glass-strong rounded-2xl p-6">
            <h3 class="font-semibold text-on-background mb-3">Jam Operasional</h3>
            <ul class="text-sm text-on-surface-variant space-y-2">
              <li class="flex justify-between"><span>Senin - Jumat</span><span class="font-medium text-on-background">09:00 - 17:00</span></li>
              <li class="flex justify-between"><span>Sabtu</span><span class="font-medium text-on-background">09:00 - 14:00</span></li>
              <li class="flex justify-between"><span>Minggu & Libur</span><span class="font-medium text-outline">Tutup</span></li>
            </ul>
          </div>
        </div>

        {{-- Contact Form --}}
        <div class="lg:col-span-3">
          <form class="glass-strong rounded-2xl p-8" method="POST" action="#">
            @csrf
            <h3 class="text-xl font-semibold text-on-background mb-6">Kirim Pesan</h3>
            <div class="grid sm:grid-cols-2 gap-4 mb-4">
              <div>
                <label class="block text-sm font-medium text-on-background mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm" placeholder="Masukkan nama Anda">
              </div>
              <div>
                <label class="block text-sm font-medium text-on-background mb-1.5">Email</label>
                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm" placeholder="Masukkan email Anda">
              </div>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-on-background mb-1.5">Subjek</label>
              <input type="text" name="subject" required class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm" placeholder="Perihal pesan Anda">
            </div>
            <div class="mb-6">
              <label class="block text-sm font-medium text-on-background mb-1.5">Pesan</label>
              <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl bg-surface border border-outline-variant/50 text-on-background placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all text-sm resize-none" placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="w-full px-6 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass flex items-center justify-center gap-2">
              Kirim Pesan <span class="material-symbols-outlined text-lg">send</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection