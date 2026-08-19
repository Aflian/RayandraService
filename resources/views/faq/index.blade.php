@extends('layouts.landing', ['title' => 'FAQ — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">FAQ</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Pertanyaan Umum</h1>
        <p class="text-lg text-on-surface-variant mt-4">Temukan jawaban atas pertanyaan yang sering diajukan tentang layanan kami.</p>
      </div>

      <div class="max-w-3xl mx-auto">
        @if($faqs->count())
          @foreach($faqs as $category => $items)
            <div class="mb-10">
              @if(!empty($category) && $category !== 'General')
                <h2 class="text-xl font-bold text-on-background mb-4">{{ $category }}</h2>
              @endif
              <div class="space-y-3">
                @foreach($items as $faq)
                  <div class="glass-strong rounded-xl overflow-hidden" x-data="{ open: false }">
                    <button
                      @click="open = !open"
                      class="w-full flex items-center justify-between gap-4 p-5 text-left hover:bg-surface-container/50 transition-colors"
                    >
                      <span class="font-medium text-on-background">{{ $faq->question }}</span>
                      <span class="material-symbols-outlined text-xl text-on-surface-variant transition-transform" :class="open ? 'rotate-180' : ''">expand_more</span>
                    </button>
                    <div
                      x-show="open"
                      x-collapse
                      class="px-5 pb-5 text-sm text-on-surface-variant leading-relaxed border-t border-outline-variant/20 pt-4"
                    >
                      {!! nl2br(e($faq->answer)) !!}
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endforeach
        @else
          <div class="text-center py-20">
            <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">help_outline</span>
            <h3 class="text-xl font-semibold text-on-background mb-2">Belum Ada FAQ</h3>
            <p class="text-on-surface-variant">FAQ akan tersedia segera. Sementara itu, hubungi kami jika ada pertanyaan.</p>
          </div>
        @endif

        <div class="text-center mt-16">
          <div class="glass-strong rounded-2xl p-8">
            <h3 class="text-xl font-semibold text-on-background mb-2">Masih Ada Pertanyaan?</h3>
            <p class="text-on-surface-variant mb-4">Tim kami dengan senang hati membantu menjawab pertanyaan Anda.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-primary text-on-primary font-semibold hover:bg-primary-container transition-all glass">
              Hubungi Kami <span class="material-symbols-outlined">arrow_forward</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection