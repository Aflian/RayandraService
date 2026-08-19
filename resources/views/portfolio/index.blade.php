@extends('layouts.landing', ['title' => 'Portofolio — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Portofolio</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Proyek Pilihan Kami</h1>
        <p class="text-lg text-on-surface-variant mt-4">Lihat hasil kerja terbaik kami dari berbagai industri dan kategori layanan.</p>
      </div>

      {{-- Filter --}}
      <div class="flex flex-wrap justify-center gap-2 mb-10">
        <button class="px-4 py-2 rounded-full text-sm font-medium glass transition-all {{ empty(request('category')) ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container' }}">Semua</button>
        @foreach($services as $service)
          <button class="px-4 py-2 rounded-full text-sm font-medium glass transition-all {{ request('category') == $service->slug ? 'bg-primary text-on-primary' : 'text-on-surface-variant hover:bg-surface-container' }}">{{ $service->name }}</button>
        @endforeach
      </div>

      @if($portfolios->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($portfolios as $portfolio)
            <div class="group glass-card rounded-2xl overflow-hidden hover:glass-strong hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 border border-white/20">
              <div class="relative aspect-[16/10] overflow-hidden">
                @if($portfolio->cover_image)
                  <img src="{{ asset('storage/' . $portfolio->cover_image) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                @else
                  <div class="w-full h-full bg-gradient-to-br from-primary to-primary-container flex items-center justify-center">
                    <span class="text-5xl font-bold text-on-primary/90">{{ mb_substr($portfolio->title, 0, 1) }}</span>
                  </div>
                @endif
              </div>
              <div class="p-6">
                <h3 class="text-lg font-semibold text-on-background group-hover:text-primary transition-colors">{{ $portfolio->title }}</h3>
                @if($portfolio->description)
                  <p class="text-sm text-on-surface-variant mt-2 leading-relaxed">{{ \Illuminate\Support\Str::limit($portfolio->description, 100) }}</p>
                @endif
                @if($portfolio->service)
                  <span class="inline-block mt-3 px-3 py-1 text-xs font-medium text-primary bg-primary-fixed/50 rounded-full">{{ $portfolio->service->name }}</span>
                @endif
              </div>
            </div>
          @endforeach
        </div>
        {{ $portfolios->withQueryString()->links() }}
      @else
        <div class="text-center py-20">
          <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">folder_off</span>
          <h3 class="text-xl font-semibold text-on-background mb-2">Belum Ada Portofolio</h3>
          <p class="text-on-surface-variant">Portofolio proyek akan muncul di sini setelah tersedia.</p>
        </div>
      @endif
    </div>
  </section>
@endsection