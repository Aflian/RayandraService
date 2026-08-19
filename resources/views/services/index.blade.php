@extends('layouts.landing', ['title' => 'Layanan — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Layanan Kami</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Katalog Layanan Digital</h1>
        <p class="text-lg text-on-surface-variant mt-4">Solusi lengkap untuk kebutuhan digital bisnis Anda, dikerjakan oleh tim profesional berpengalaman.</p>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($services as $service)
          <a href="{{ route('services.show', $service->slug) }}" class="group glass-card rounded-2xl p-7 flex flex-col gap-4 hover:glass-strong hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 border border-white/20">
            <div class="w-12 h-12 rounded-xl bg-surface-container/50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors glass">
              <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">{{ $service->icon ?: 'workspace_premium' }}</span>
            </div>
            <h3 class="text-xl font-semibold text-on-background">{{ $service->name }}</h3>
            <p class="text-sm text-on-surface-variant leading-relaxed flex-grow">{{ \Illuminate\Support\Str::limit($service->description, 140) }}</p>
            @if($service->categories->count())
              <div class="flex flex-wrap gap-1.5 mt-2">
                @foreach($service->categories->take(3) as $category)
                  <span class="px-2 py-1 text-xs font-medium text-on-surface-variant bg-surface-container rounded-full">{{ $category->name }}</span>
                @endforeach
                @if($service->categories->count() > 3)
                  <span class="px-2 py-1 text-xs font-medium text-primary bg-primary-fixed/50 rounded-full">+{{ $service->categories->count() - 3 }} lagi</span>
                @endif
              </div>
            @endif
            <span class="text-sm font-semibold text-primary inline-flex items-center gap-1.5 group-hover:gap-2.5 transition-all">
              Pelajari Lebih Lanjut <span class="material-symbols-outlined text-base">arrow_forward</span>
            </span>
          </a>
        @endforeach
      </div>

      <div class="text-center mt-16">
        <div class="glass-strong rounded-2xl p-8 md:p-12 max-w-2xl mx-auto">
          <h2 class="text-2xl md:text-3xl font-bold text-on-background mb-3">Butuh Solusi Kustom?</h2>
          <p class="text-on-surface-variant mb-6">Tidak menemukan layanan yang cocok? Tim kami siap mendiskusikan kebutuhan spesifik Anda.</p>
          <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass">
            Hubungi Kami <span class="material-symbols-outlined">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection