<nav class="fixed top-0 w-full z-50">
  <div class="max-w-[1280px] mx-auto px-6 h-16 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-2xl font-bold text-primary tracking-tight glass-strong px-4 py-2 rounded-xl">
      Ray<span class="text-on-background">andra</span>
    </a>
    <div class="hidden md:flex items-center gap-7 text-sm font-medium text-on-surface-variant">
      <a href="{{ route('services') }}" class="hover:text-primary transition-colors @if(request()->routeIs('services*')) text-primary @endif">Layanan</a>
      <a href="{{ route('portfolio') }}" class="hover:text-primary transition-colors @if(request()->routeIs('portfolio*')) text-primary @endif">Portofolio</a>
      <a href="{{ route('about') }}" class="hover:text-primary transition-colors @if(request()->routeIs('about')) text-primary @endif">Tentang</a>
      <a href="{{ route('blog') }}" class="hover:text-primary transition-colors @if(request()->routeIs('blog*')) text-primary @endif">Blog</a>
      <a href="{{ route('contact') }}" class="hover:text-primary transition-colors @if(request()->routeIs('contact')) text-primary @endif">Kontak</a>
    </div>
    <div class="flex items-center gap-3">
      @auth
        <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-xl text-sm font-semibold text-on-primary bg-primary hover:bg-primary-container transition-colors glass">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl text-sm font-semibold text-primary bg-surface-container/60 hover:bg-surface-container-high/60 transition-colors glass">Masuk</a>
        <a href="{{ route('register') }}" class="px-4 py-2 rounded-xl text-sm font-semibold text-on-primary bg-primary hover:bg-primary-container transition-colors glass">Daftar</a>
      @endauth
    </div>
  </div>
</nav>