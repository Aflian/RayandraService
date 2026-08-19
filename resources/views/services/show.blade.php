@extends('layouts.landing', ['title' => $service->name . ' — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      {{-- Breadcrumb --}}
      <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-8">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <a href="{{ route('services') }}" class="hover:text-primary transition-colors">Layanan</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <span class="text-on-background font-medium">{{ $service->name }}</span>
      </nav>

      <div class="grid lg:grid-cols-3 gap-12">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
          <div class="glass-strong rounded-2xl p-8 md:p-10 mb-8">
            <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary mb-6">
              <span class="material-symbols-outlined text-3xl" style="font-variation-settings:'FILL' 1;">{{ $service->icon ?: 'workspace_premium' }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-on-background mb-4">{{ $service->name }}</h1>
            <p class="text-lg text-on-surface-variant leading-relaxed">{{ $service->description }}</p>
          </div>

          {{-- Categories --}}
          @if($service->categories->count())
            <div class="mb-8">
              <h2 class="text-2xl font-bold text-on-background mb-6">Pilih Kategori</h2>
              <div class="grid sm:grid-cols-2 gap-4">
                @foreach($service->categories as $category)
                  <a href="{{ route('order.create', [$service->slug, $category->slug]) }}" class="group glass-card rounded-xl p-6 hover:glass-strong hover:border-primary transition-all duration-300 border border-white/20">
                    <div class="flex items-start justify-between">
                      <div>
                        <h3 class="font-semibold text-on-background text-lg group-hover:text-primary transition-colors">{{ $category->name }}</h3>
                        @if($category->description)
                          <p class="text-sm text-on-surface-variant mt-2">{{ \Illuminate\Support\Str::limit($category->description, 100) }}</p>
                        @endif
                      </div>
                      <span class="w-8 h-8 rounded-lg bg-surface-container flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-on-primary transition-colors">
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                      </span>
                    </div>
                    {{-- Subcategories --}}
                    @if($category->children && $category->children->count())
                      <div class="flex flex-wrap gap-1.5 mt-3">
                        @foreach($category->children->take(4) as $child)
                          <span class="px-2 py-0.5 text-xs font-medium text-on-surface-variant bg-surface-container rounded-full">{{ $child->name }}</span>
                        @endforeach
                      </div>
                    @endif
                  </a>
                @endforeach
              </div>
            </div>
          @endif
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1">
          <div class="glass-strong rounded-2xl p-6 mb-6">
            <h3 class="font-semibold text-on-background mb-4">Tentang Layanan Ini</h3>
            <ul class="space-y-3 text-sm text-on-surface-variant">
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                Dikerjakan oleh tim profesional
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                Proses transparan & real-time
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                Revisi hingga sesuai keinginan
              </li>
              <li class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                File siap pakai & download
              </li>
            </ul>
          </div>

          <div class="glass-strong rounded-2xl p-6">
            <h3 class="font-semibold text-on-background mb-4">Butuh Bantuan?</h3>
            <p class="text-sm text-on-surface-variant mb-4">Tim kami siap menjawab pertanyaan Anda tentang layanan ini.</p>
            <a href="{{ route('contact') }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-primary text-on-primary font-semibold hover:bg-primary-container transition-all glass text-sm">
              Hubungi Kami <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection