<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faq;
use App\Models\Order;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::where('is_active', true)->count(),
            'categories' => ServiceCategory::where('is_active', true)->count(),
            'portfolios' => Portfolio::where('is_published', true)->count(),
            'blogs' => Blog::where('is_published', true)->count(),
        ];

        $featuredServices = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $featuredPortfolios = Portfolio::where('is_published', true)
            ->latest()
            ->take(4)
            ->get();

        return view('welcome', compact('stats', 'featuredServices', 'featuredPortfolios'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)
            ->with(['categories' => fn ($q) => $q->where('is_active', true)->whereNull('parent_id')->with('children')])
            ->orderBy('sort_order')
            ->get();

        return view('services.index', compact('services'));
    }

    public function serviceShow($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('is_active', true)
            ->with(['categories' => fn ($q) => $q->where('is_active', true)->whereNull('parent_id')->with('children')])
            ->firstOrFail();

        return view('services.show', compact('service'));
    }

    public function orderCreate($slug, $categorySlug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $category = ServiceCategory::where('slug', $categorySlug)
            ->where('service_id', $service->id)
            ->where('is_active', true)
            ->firstOrFail();

        return view('orders.create', compact('service', 'category'));
    }

    public function orderStore(Request $request, $slug, $categorySlug)
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $category = ServiceCategory::where('slug', $categorySlug)
            ->where('service_id', $service->id)
            ->where('is_active', true)
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'files.*' => 'nullable|file|max:10240',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'service_category_id' => $category->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('orders/' . $order->id, 'public');
                $order->files()->create([
                    'user_id' => Auth::id(),
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'type' => 'customer_upload',
                ]);
            }
        }

        return redirect()->route('customer.orders.index')
            ->with('success', 'Order berhasil dibuat! Silakan upload bukti pembayaran.');
    }

    public function portfolio()
    {
        $portfolios = Portfolio::where('is_published', true)
            ->with('service')
            ->latest()
            ->paginate(12);

        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('portfolio.index', compact('portfolios', 'services'));
    }

    public function blog()
    {
        $blogs = Blog::where('is_published', true)
            ->with('author')
            ->latest('published_at')
            ->paginate(10);

        return view('blog.index', compact('blogs'));
    }

    public function blogShow($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->with('author')
            ->firstOrFail();

        return view('blog.show', compact('blog'));
    }

    public function faq()
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy(fn ($faq) => 'General');

        return view('faq.index', compact('faqs'));
    }

    public function contact()
    {
        return view('contact');
    }
}