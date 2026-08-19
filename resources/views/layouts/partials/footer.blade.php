<footer class="bg-inverse-surface text-surface-variant relative">
  <div class="absolute inset-0 glass opacity-5"></div>
  <div class="relative max-w-[1280px] mx-auto px-6 py-14 grid grid-cols-2 md:grid-cols-4 gap-10">
    <div class="col-span-2 md:col-span-1">
      <a href="{{ route('home') }}" class="text-2xl font-bold text-white glass-strong inline-block px-4 py-2 rounded-xl">Ray<span class="text-primary-fixed-dim">andra</span></a>
      <p class="mt-3 text-sm leading-relaxed">Orkestrasi layanan digital terdepan. Undangan digital, pemrograman, desain, hingga AI & machine learning.</p>
    </div>
    <div>
      <h5 class="text-white font-semibold mb-4">Perusahaan</h5>
      <ul class="space-y-2.5 text-sm">
        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Tentang Kami</a></li>
        <li><a href="{{ route('portfolio') }}" class="hover:text-white transition-colors">Portofolio</a></li>
        <li><a href="{{ route('blog') }}" class="hover:text-white transition-colors">Blog</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Hubungi Kami</a></li>
      </ul>
    </div>
    <div>
      <h5 class="text-white font-semibold mb-4">Layanan</h5>
      <ul class="space-y-2.5 text-sm">
        @foreach($footerServices ?? [] as $service)
          <li><a href="{{ route('services.show', $service->slug) }}" class="hover:text-white transition-colors">{{ $service->name }}</a></li>
        @endforeach
      </ul>
    </div>
    <div>
      <h5 class="text-white font-semibold mb-4">Bantuan</h5>
      <ul class="space-y-2.5 text-sm">
        <li><a href="{{ route('faq') }}" class="hover:text-white transition-colors">FAQ</a></li>
        <li><a href="{{ route('dashboard') }}" class="hover:text-white transition-colors">Cek Status Pesanan</a></li>
      </ul>
    </div>
  </div>
  <div class="border-t border-white/10 text-center py-6 text-sm text-surface-variant/70 relative">
    <div class="absolute inset-0 glass opacity-5"></div>
    <div class="relative">&copy; {{ date('Y') }} Rayandra. Semua hak dilindungi.</div>
  </div>
</footer>