
<header id="header">
    <div class="inner">

        <!-- Logo -->
            <a href="index.html" class="logo">
                <span class="fa fa-briefcase"></span> <span class="title">Job Agency Website</span>
            </a>

        <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

    </div>
    </header>

    <!-- Menu -->
    <nav id="menu">
    <h2>Menu</h2>
    <ul>
        <li>
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-white underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </li>
        <li><a href="index.html" class="active">Home</a></li>
        

        <li><a href="jobs.html">Jobs</a></li>

        <li>
            <a href="#" class="dropdown-toggle">About</a>

            <ul>
                <li><a href="about.html">About Us</a></li>
                <li><a href="team.html">Team</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
                <li><a href="terms.html">Terms</a></li>
            </ul>
        </li>

        <li><a href="contact.html">Contact Us</a></li>
        
    </ul>
    </nav>