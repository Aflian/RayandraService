<!DOCTYPE html>
<html class="light" lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>@yield('title', 'Rayandra')</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "on-background": "#0b1c30",
        "on-primary-fixed": "#00174b",
        "on-surface": "#0b1c30",
        "tertiary-container": "#6b6e70",
        "surface-dim": "#cbdbf5",
        "outline": "#737686",
        "error": "#ba1a1a",
        "surface": "#f8f9ff",
        "surface-container-lowest": "#ffffff",
        "primary-fixed-dim": "#b4c5ff",
        "surface-container-highest": "#d3e4fe",
        "on-primary": "#ffffff",
        "primary-container": "#2563eb",
        "surface-tint": "#0053db",
        "surface-variant": "#d3e4fe",
        "on-secondary": "#ffffff",
        "surface-container": "#e5eeff",
        "outline-variant": "#c3c6d7",
        "primary": "#004ac6",
        "on-primary-container": "#eeefff",
        "surface-container-low": "#eff4ff",
        "secondary-container": "#dae2fd",
        "surface-bright": "#f8f9ff",
        "inverse-surface": "#213145",
        "on-surface-variant": "#434655",
        "secondary": "#565e74",
        "background": "#f8f9ff",
        "primary-fixed": "#dbe1ff",
        "on-primary-fixed-variant": "#003ea8"
      },
      fontFamily: { sans: ["Inter", "sans-serif"], display: ["Inter", "sans-serif"] },
      maxWidth: { "container-max": "1280px" },
      spacing: { gutter: "24px", "container-max": "1280px" }
    }
  }
}
</script>
<style>
:root {
  --glass-blur: 15px;
  --glass-opacity: 0.15;
  --glass-border: rgba(255,255,255,0.2);
  --glass-hover-blur: 20px;
  --glass-hover-opacity: 0.25;
}
body { font-family: 'Inter', sans-serif; background-color: #f8f9ff; color: #0b1c30; }
.glass {
  background: rgba(255,255,255,var(--glass-opacity));
  backdrop-filter: blur(var(--glass-blur));
  -webkit-backdrop-filter: blur(var(--glass-blur));
  border: 1px solid var(--glass-border);
  box-shadow: 0 8px 32px rgba(0,0,0,0.04);
}
.glass-strong {
  background: rgba(255,255,255,0.25);
  backdrop-filter: blur(var(--glass-blur));
  -webkit-backdrop-filter: blur(var(--glass-blur));
  border: 1px solid rgba(255,255,255,0.3);
  box-shadow: 0 12px 40px rgba(0,0,0,0.06);
}
@media (prefers-color-scheme: dark) {
  :root {
    --glass-border: rgba(255,255,255,0.1);
    --glass-hover-border: rgba(255,255,255,0.15);
  }
  .glass {
    background: rgba(17,24,39,var(--glass-opacity));
    backdrop-filter: blur(var(--glass-blur));
    -webkit-backdrop-filter: blur(var(--glass-blur));
    border: 1px solid var(--glass-border);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
  }
  .glass-strong {
    background: rgba(17,24,39,0.25);
    backdrop-filter: blur(var(--glass-blur));
    -webkit-backdrop-filter: blur(var(--glass-blur));
    border: 1px solid rgba(255,255,255,0.15);
    box-shadow: 0 12px 40px rgba(0,0,0,0.3);
  }
}
</style>
</head>
<body class="antialiased min-h-screen flex flex-col">
@include('layouts.partials.navbar')

<main class="flex-grow pt-16 flex items-center justify-center px-6 py-12">
@yield('content')
</main>

@include('layouts.partials.footer')
</body>
</html>