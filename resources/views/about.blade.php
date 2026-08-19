@extends('layouts.landing', ['title' => 'Tentang Kami — Rayandra'])
@section('content')
<section class="py-20 bg-surface">
    <div class="max-w-[1280px] mx-auto px-6">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="text-xs font-bold uppercase tracking-widest text-primary">Tentang Kami</span>
        <h1 class="text-4xl md:text-5xl font-bold mt-3 text-on-background">Membangun Solusi Digital yang Berdampak</h1>
        <p class="text-lg text-on-surface-variant mt-4">Rayandra hadir untuk menjembatani ide kreatif dengan eksekusi teknis yang solid.</p>
      </div>

      <div class="grid md:grid-cols-2 gap-12 mb-20">
        <div>
          <h2 class="text-2xl font-bold text-on-background mb-6">Visi Kami</h2>
          <p class="text-on-surface-variant leading-relaxed mb-4">
            Menjadi platform orkestrasi layanan digital terdepan yang memberdayakan bisnis dan individu
            untuk mewujudkan ide-ide digital mereka dengan efisien, transparan, dan berkualitas.
          </p>
          <p class="text-on-surface-variant leading-relaxed">
            Kami percaya bahwa setiap ide besar memerlukan fondasi teknis yang kuat. Rayandra menyediakan
            ekosistem lengkap — dari konsultasi awal, perencanaan, eksekusi, hingga pengiriman hasil akhir.
          </p>
        </div>
        <div class="glass-strong rounded-2xl p-8">
          <h3 class="text-xl font-semibold text-on-background mb-6">Nilai-Nilai Kami</h3>
          <div class="space-y-5">
            @foreach([
              ['Transparansi', 'Proses terbuka, pelacakan real-time, tidak ada biaya tersembunyi.'],
              ['Kualitas', 'Standar profesional pada setiap tahap, dari kode hingga desain.'],
              ['Kecepatan', 'Workflow efisien yang mengurangi waktu tanpa mengorbankan hasil.'],
              ['Kolaborasi', 'Komunikasi dua arah yang jelas antara klien dan tim eksekusi.'],
            ] as $value)
              <div class="flex gap-4">
                <span class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary flex-shrink-0">
                  <span class="material-symbols-outlined" style="font-variation-settings:'FILL' 1;">check_circle</span>
                </span>
                <div>
                  <h4 class="font-semibold text-on-background">{{ $value[0] }}</h4>
                  <p class="text-sm text-on-surface-variant">{{ $value[1] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="grid md:grid-cols-3 gap-8 mb-20">
        @foreach([
          ['6+', 'Layanan Utama', 'Dari undangan digital hingga AI & ML'],
          ['100+', 'Proyek Selesai', 'Dikerjakan dengan standar profesional'],
          ['50+', 'Klien Puas', 'Bergabung dalam ekosistem Rayandra'],
        ] as $stat)
          <div class="glass-strong rounded-2xl p-8 text-center">
            <p class="text-4xl font-bold text-primary">{{ $stat[0] }}</p>
            <h4 class="text-lg font-semibold text-on-background mt-2">{{ $stat[1] }}</h4>
            <p class="text-sm text-on-surface-variant">{{ $stat[2] }}</p>
          </div>
        @endforeach
      </div>

      <div class="text-center">
        <a href="{{ route('services') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-primary text-on-primary font-semibold shadow-lg shadow-primary/25 hover:bg-primary-container transition-all glass">
          Mulai Proyek Anda <span class="material-symbols-outlined">arrow_forward</span>
        </a>
      </div>
    </div>
  </section>
@endsection