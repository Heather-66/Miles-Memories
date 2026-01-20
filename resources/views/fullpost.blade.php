<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miles & Memories - Home</title>
    <link rel="stylesheet" href="{{asset('homestyle.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="/" class="logo">Miles<span>Memories</span></a>
                <div class="nav-links">
                    <a href="{{route('home')}}" class="active">Home</a>
                    <a href="">Blog</a>
                    @if (Route::has('login'))
                    @auth
                        <a
                            href="{{route('dashboard')}}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                    <a href="{{route('login')}}">Login</a>
                    @endauth

                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Miles & Memories</h1>
            <p>Travel Stories That Inspire Your Next Adventure.”</p>
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title">All Posts</h2>
        <div class="featured-posts">
            <!-- single Post  -->

            <div class="max-w-4xl mx-auto px-4 py-8">
                <!-- Post Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $post->title }}</h1>
                    <div class="flex items-center text-gray-500 text-sm">
                        <span>Published on {{ $post->created_at->format('F j, Y') }}</span>
                        <span class="mx-2">•</span>
                    </div>
                </div>

                <!-- Featured Image -->
                @if($post->image)
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img style="width: 800px;" src="{{ asset('img/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                </div>
                @endif

                <!-- Post Content -->
                <div class="prose max-w-none mb-12">
                    {!! $post->description !!}
                </div>
            </div>
        </div>

        <!-- Categories -->
        <h2 class="section-title">Browse Categories</h2>
        <div class="categories">
            <a href="/category/laravel" class="category-tag">Adventure</a>
            <a href="/category/php" class="category-tag">Food & Culture</a>
            <a href="/category/javascript" class="category-tag">Beach & Islands</a>
            <a href="/category/vue" class="category-tag">City Guides</a>
            <a href="/category/tailwind" class="category-tag">Budget Travel</a>
            <a href="/category/testing" class="category-tag">Solo Travel</a>
            <a href="/category/deployment" class="category-tag">Nature & Wildlife</a>
            <a href="/category/performance" class="category-tag">Road Trips</a>
        </div>

        <!-- Newsletter -->
        <div class="newsletter">
            <h3>Subscribe to our Newsletter</h3>
            <p>Get Weekly Travel Inspiration</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About Miles & Memories</h3>
                    <p>Welcome to Miles & Memories! Here, I share travel stories, tips, and guides to help you explore the world, discover hidden gems, and make every journey unforgettable.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/privacy">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Categories</h3>
                    <ul class="footer-links">
                        <li><a href="/category/">Adventure</a></li>
                        <li><a href="/category/">Food & Culture</a></li>
                        <li><a href="/category/">Beach & Islands</a></li>
                        <li><a href="/category/">City Guides</a></li>
                        <li><a href="/category/">Budget Travel</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Miles & Memories. All rights reserved. Built with Laravel.</p>
            </div>
        </div>
    </footer>
</body>
</html>