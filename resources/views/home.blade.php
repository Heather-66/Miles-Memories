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
                    <a href="">About</a>
                    <a href="">Contact</a>
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
            <p>Travel Stories That Inspire Your Next Adventure.</p>
            <a href="/blog" class="btn btn-primary">Browse Articles</a>
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title">Featured Posts</h2>
        <div class="featured-posts">
            <!-- All Post -->
            @foreach($post as $posts)
            <div class="post-card">
                <div class="post-image">
                    <img src="img/{{$posts->image}}" alt="Laravel Tips">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>{{$posts->created_at}}</span>
                    </div>
                    <h3 class="post-title">{{$posts->title}}</h3>
                    <p class="post-excerpt"></p>{{Str::limit($posts->description,100)}}...</p>
                    <a href="{{route('fullpost', $posts->id)}}" class="read-more">Read More →</a>
                </div>
            </div>
            @endforeach


        

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