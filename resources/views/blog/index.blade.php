@extends('layouts.landing', ['title' => 'Blog — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Blog</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Artikel & Insight</h1>
        <p class="text-lg text-on-surface-variant mt-4">Tips, tren, dan wawasan seputar layanan digital dari tim Rayandra.</p>
      </div>

      @if($blogs->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group glass-card rounded-2xl overflow-hidden hover:glass-strong hover:shadow-2xl hover:shadow-primary/5 transition-all duration-300 border border-white/20">
              <div class="relative aspect-[16/10] overflow-hidden">
                @if($blog->cover_image)
                  <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"/>
                @else
                  <div class="w-full h-full bg-gradient-to-br from-surface-container to-surface flex items-center justify-center">
                    <span class="material-symbols-outlined text-5xl text-outline">article</span>
                  </div>
                @endif
              </div>
              <div class="p-6">
                <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-2">
                  @if($blog->author)
                    <span>{{ $blog->author->name }}</span>
                    <span>•</span>
                  @endif
                  <span>{{ $blog->published_at?->format('d M Y') }}</span>
                </div>
                <h3 class="text-lg font-semibold text-on-background group-hover:text-primary transition-colors line-clamp-2">{{ $blog->title }}</h3>
                @if($blog->excerpt)
                  <p class="text-sm text-on-surface-variant mt-2 leading-relaxed line-clamp-2">{{ \Illuminate\Support\Str::limit($blog->excerpt, 100) }}</p>
                @endif
              </div>
            </a>
          @endforeach
        </div>
        {{ $blogs->withQueryString()->links() }}
      @else
        <div class="text-center py-20">
          <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">edit_note</span>
          <h3 class="text-xl font-semibold text-on-background mb-2">Belum Ada Artikel</h3>
          <p class="text-on-surface-variant">Artikel blog akan tersedia segera.</p>
        </div>
      @endif
    </div>
  </section>
@endsection