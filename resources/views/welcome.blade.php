@extends('layouts.landing', ['title' => 'Rayandra — Semua Layanan Digital Profesional dalam Satu Genggaman'])
@section('content')
<!-- Hero -->
<section class="relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-b from-surface-container/50 to-surface/50"></div>
  <div class="relative max-w-[1280px] mx-auto px-6 pt-16 pb-20 md:pt-24 md:pb-28 grid md:grid-cols-2 gap-12 items-center">
    <div class="flex flex-col gap-6">
      <span class="w-fit inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-semibold text-primary border border-primary/20 glass">
        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
        Software House & Layanan Digital Terpadu
      </span>
      <h1 class="text-4xl md:text-5xl xl:text-6xl font-bold tracking-tight leading-[1.1] text-on-background">
        Semua Layanan Digital Profesional dalam Satu Genggaman
      </h1>
      <p class="text-lg text-on-surface-variant leading-relaxed max-w-xl">
        Manajemen layanan end-to-end yang efisien. Pesan, pantau, dan selesaikan proyek digital Anda dengan kecepatan dan presisi tinggi.
      </p>
      <div class="flex flex-wrap gap-4 mt-2">
        <a href="{{ route('services') }}" class="px-7 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all inline-flex items-center gap-2 glass">
          Mulai Pesan Sekarang
          <span class="material-symbols-outlined text-lg">arrow_forward</span>
        </a>
        <a href="{{ route('portfolio') }}" class="px-7 py-3.5 rounded-xl border border-outline-variant/50 text-on-background font-semibold hover:border-primary hover:text-primary transition-all glass">
          Lihat Portofolio
        </a>
      </div>
      <!-- Stats -->
      <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 pt-6 border-t border-outline-variant/30">
        <div class="glass-strong p-4 rounded-xl text-center">
          <p class="text-3xl font-bold text-primary">{{ $stats['services'] }}</p>
          <p class="text-sm text-on-surface-variant">Layanan Aktif</p>
        </div>
        <div class="glass-strong p-4 rounded-xl text-center">
          <p class="text-3xl font-bold text-primary">{{ $stats['categories'] }}</p>
          <p class="text-sm text-on-surface-variant">Kategori</p>
        </div>
        <div class="glass-strong p-4 rounded-xl text-center">
          <p class="text-3xl font-bold text-primary">{{ $stats['portfolios'] }}</p>
          <p class="text-sm text-on-surface-variant">Proyek Selesai</p>
        </div>
        <div class="glass-strong p-4 rounded-xl text-center">
          <p class="text-3xl font-bold text-primary">{{ $stats['blogs'] }}</p>
          <p class="text-sm text-on-surface-variant">Artikel</p>
        </div>
      </div>
    </div>
    <div class="relative hidden md:block">
      <div class="aspect-[4/3] rounded-2xl overflow-hidden glass-strong shadow-2xl shadow-primary/10 relative">
        <div class="w-full h-full bg-cover bg-center" style="background-image:url('https://lh3.googleusercontent.com/aida-public/AB6AXuDH2I42S-0m6FqY7SOJ0tkMxKiEdVRbZDki2H0XSHqF2zu4QWLeTRCbokPK05D6aqJWV2z1dZ2dMvKazGwDtS3nA7yEufrFhsu9D5it3JSwpQg4-bgoo_VKBwHLej_u2-OYXiRRnLTb6cUBzTUIE-uuUDsQYTgI_IEYSU-peXUyIM9nXhL2fxN1f4n8_m94RrHtqgUuAuFQ45EquIi-0kN-JiIyH6Kofmt_3WA_jeQtEHzPxBlIER3e')"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-on-background/10 via-transparent to-transparent"></div>
      </div>
      <div class="absolute -bottom-5 -left-6 glass-strong rounded-xl shadow-lg px-5 py-4 flex items-center gap-3">
        <span class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-primary"><span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">verified</span></span>
        <div>
          <p class="text-sm font-semibold">Proses Transparan</p>
          <p class="text-xs text-on-surface-variant">Lacak order real-time</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Featured Services -->
<section class="py-20 bg-surface/50" id="services">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs font-bold uppercase tracking-widest text-primary">Layanan Kami</span>
      <h2 class="text-3xl md:text-4xl font-bold mt-3 text-on-background">Katalog Layanan</h2>
      <p class="text-on-surface-variant mt-3">Solusi lengkap untuk kebutuhan digital bisnis Anda, dikerjakan oleh tim profesional berpengalaman.</p>
    </div>
    @if($featuredServices->count())
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($featuredServices as $service)
          <a href="{{ route('services.show', $service->slug) }}" class="group glass-card rounded-2xl p-7 flex flex-col gap-4 hover:glass-strong hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 border border-white/20">
            <div class="w-12 h-12 rounded-xl bg-surface-container/50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors glass">
              <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">{{ $service->icon ?: 'workspace_premium' }}</span>
            </div>
            <h3 class="text-xl font-semibold text-on-background">{{ $service->name }}</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed flex-grow">{{ \Illuminate\Support\Str::limit($service->description, 140) }}</p>
            <span class="text-sm font-semibold text-primary inline-flex items-center gap-1.5 group-hover:gap-2.5 transition-all">
              Pesan Sekarang <span class="material-symbols-outlined text-base">arrow_forward</span>
            </span>
          </a>
        @endforeach
      </div>
      <div class="text-center mt-10">
        <a href="{{ route('services') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline">Lihat Semua Layanan <span class="material-symbols-outlined text-lg">arrow_forward</span></a>
      </div>
    @endif
  </div>
</section>

<!-- How It Works -->
<section class="py-20 bg-surface-container-low/50">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="text-center max-w-2xl mx-auto mb-14">
      <span class="text-xs font-bold uppercase tracking-widest text-primary">Proses</span>
      <h2 class="text-3xl md:text-4xl font-bold mt-3 text-on-background">Alur Kerja Kami</h2>
      <p class="text-on-surface-variant mt-3">Proses transparan dan efisien dari awal hingga akhir.</p>
    </div>
    <div class="grid md:grid-cols-4 gap-10 relative">
      <div class="hidden md:block absolute top-7 left-[12%] right-[12%] h-px bg-outline-variant/30"></div>
      @foreach([
        ['Pilih Layanan', 'Tentukan layanan yang sesuai dengan kebutuhan spesifik Anda.'],
        ['Unggah & Bayar', 'Berikan instruksi detail dan selesaikan pembayaran dengan aman.'],
        ['Pantau Progres', 'Ikuti perkembangan proyek Anda secara real-time melalui dashboard.'],
        ['Revisi & Unduh', 'Berikan masukan, setujui hasil akhir, unduh file proyek Anda.'],
      ] as $i => $step)
        <div class="flex flex-col items-center text-center gap-3">
          <div class="w-14 h-14 rounded-full glass-strong border-2 border-primary/20 flex items-center justify-center text-lg font-bold text-primary relative z-10 shadow-lg">{{ $i + 1 }}</div>
          <div class="glass px-4 py-3 rounded-xl">
            <h4 class="text-lg font-semibold text-on-background">{{ $step[0] }}</h4>
            <p class="text-sm text-on-surface-variant mt-1">{{ $step[1] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Featured Portfolio -->
@if($featuredPortfolios->count())
<section class="py-20 bg-surface/50">
  <div class="max-w-[1280px] mx-auto px-6">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
      <div>
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Portofolio</span>
        <h2 class="text-3xl md:text-4xl font-bold mt-3 text-on-background">Proyek Pilihan Kami</h2>
      </div>
      <a href="{{ route('portfolio') }}" class="text-primary font-semibold inline-flex items-center gap-1.5 hover:underline">Lihat Semua <span class="material-symbols-outlined text-lg">arrow_forward</span></a>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($featuredPortfolios as $portfolio)
        <a href="{{ route('portfolio') }}" class="group relative rounded-2xl overflow-hidden border border-white/20 aspect-[4/3] glass-card">
          @if($portfolio->cover_image)
            <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
          @else
            <div class="absolute inset-0 bg-gradient-to-br from-primary to-primary-container flex items-center justify-center">
              <span class="text-4xl font-bold text-on-primary/90">{{ mb_substr($portfolio->title, 0, 1) }}</span>
            </div>
          @endif
          <div class="absolute inset-0 bg-gradient-to-t from-on-background/90 via-on-background/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
            <div class="p-5 glass-strong m-4 rounded-xl">
              <h4 class="text-white font-semibold">{{ $portfolio->title }}</h4>
              @if($portfolio->service)
                <p class="text-white/70 text-sm">{{ $portfolio->service->name }}</p>
              @endif
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
</section>
@endif

<!-- Final CTA -->
<section class="py-24 bg-primary relative overflow-hidden">
  <div class="absolute inset-0 opacity-5" style="background-image:radial-gradient(circle at 20% 50%, white 1px, transparent 1px);background-size:32px 32px;"></div>
  <div class="absolute inset-0 glass opacity-10"></div>
  <div class="relative max-w-3xl mx-auto px-6 text-center text-on-primary">
    <div class="glass-strong rounded-3xl p-10 md:p-14 mx-4">
      <h2 class="text-3xl md:text-4xl font-bold">Siap Memulai Proyek Anda?</h2>
      <p class="mt-4 text-lg opacity-90">Bergabunglah dengan ribuan bisnis yang telah mempercayakan layanan digital mereka pada Rayandra.</p>
      <a href="{{ route('services') }}" class="mt-8 inline-block px-8 py-4 rounded-xl bg-white text-primary font-semibold shadow-lg hover:bg-surface-container transition-colors glass">Daftar Sekarang Secara Gratis</a>
    </div>
  </div>
</section>
@endsection