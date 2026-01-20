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
                <a href="{{ route('home') }}" class="logo">Miles<span>Memories</span></a>
                <div class="nav-links">
                    <a href="{{ route('home') }}" class="active">Home</a>
                    <a href="">Blog</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="dashboard-link">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section with Search -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Miles & Memories</h1>
            <p>Travel Stories That Inspire Your Next Adventure.</p>

            <!-- Search Form -->
<form action="{{ url('my_search') }}" method="get" class="search-form">
    <input 
        type="search" 
        name="search" 
        placeholder="Search posts, destinations, tips..." 
        value="{{ request('search') }}"
    >
    <button type="submit"><i class="fas fa-search"></i></button>
</form>


    <!-- Posts Section -->
<div class="container">
    <h2 class="section-title">All Posts</h2>
    <div class="featured-posts">

        @if($posts->count())
            @foreach($posts as $post)
            <div class="post-card">
                <!-- Post Image -->
                @if($post->image)
                    <div class="post-image">
                        <img src="{{ asset('img/' . $post->image) }}" alt="{{ $post->title }}">
                    </div>
                @endif

                <!-- Post Content -->
                <div class="post-content">
                    <div class="post-meta">
                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                    </div>

                    <h3 class="post-title">{{ $post->title }}</h3>

                    <p class="post-excerpt">
                        {{ Str::limit($post->description, 100) }}...
                    </p>

                    <a href="{{ route('fullpost', $post->id) }}" class="read-more">
                        Read More →
                    </a>
                </div>
            </div>
            @endforeach
        @else
            <p>No posts found.</p>
        @endif

    </div> <!-- end featured-posts -->
</div> <!-- end container -->



    <!-- Newsletter Section -->
    <div class="newsletter">
        <h3>Subscribe to our Newsletter</h3>
        <p>Get Weekly Travel Inspiration</p>
        <form class="newsletter-form">
            <input type="email" placeholder="Your email address" required>
            <button type="submit">Subscribe</button>
        </form>
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
            </div>
            <div class="copyright">
                <p>&copy; 2025 Miles & Memories. All rights reserved. Built with Laravel.</p>
            </div>
        </div>
    </footer>

</body>
</html>
