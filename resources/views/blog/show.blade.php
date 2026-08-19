@extends('layouts.landing', ['title' => $blog->title . ' — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      {{-- Breadcrumb --}}
      <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-8">
        <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Beranda</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <a href="{{ route('blog') }}" class="hover:text-primary transition-colors">Blog</a>
        <span class="material-symbols-outlined text-base">chevron_right</span>
        <span class="text-on-background font-medium truncate max-w-[200px]">{{ $blog->title }}</span>
      </nav>

      <article class="max-w-3xl mx-auto">
        <header class="mb-8">
          @if($blog->cover_image)
            <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="{{ $blog->title }}" class="w-full rounded-2xl object-cover aspect-[16/9] mb-6"/>
          @else
            <div class="w-full rounded-2xl bg-gradient-to-br from-surface-container to-surface h-48 mb-6 flex items-center justify-center">
              <span class="material-symbols-outlined text-6xl text-outline">article</span>
            </div>
          @endif
          <div class="flex items-center gap-3 text-sm text-on-surface-variant mb-3">
            @if($blog->author)
              <span class="font-medium">{{ $blog->author->name }}</span>
              <span>•</span>
            @endif
            <span>{{ $blog->published_at?->format('d M Y') }}</span>
          </div>
          <h1 class="text-3xl md:text-4xl font-bold text-on-background leading-tight">{{ $blog->title }}</h1>
        </header>

        <div class="glass-strong rounded-2xl p-8 md:p-10">
          <div class="prose prose-slate max-w-none text-on-surface-variant leading-relaxed">
            {!! $blog->content !!}
          </div>
        </div>

        <div class="mt-12 text-center">
          <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-primary font-semibold hover:underline">
            <span class="material-symbols-outlined text-lg">arrow_back</span> Kembali ke Blog
          </a>
        </div>
      </article>
    </div>
  </section>
@endsection