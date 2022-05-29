
      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Anasayfa')</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/live-resume.css">
</head>



<body>
    <header>
    @if(Request::segment(1)=='en')
    <a href="http://mycv.test/tr/anasayfa">TR</a>
    @else
    <a href="http://mycv.test/en/index">EN</a>
    @endif
    
        <button class="btn btn-white btn-share ml-auto mr-3 ml-md-0 mr-md-auto"><img src="{{asset('front/')}}/assets/images/share.svg" alt="share" class="btn-img">
            SHARE</button>
        <nav class="collapsible-nav" id="collapsible-nav">
            <a href="{{route('front.index')}}" class="nav-link @if(Request::segment(1)=='') active @endif">HOME</a>
            <a href="{{route('front.resume')}}" class="nav-link @if(Request::segment(1)=='resume') active @endif">RESUME</a>
            <a href="{{route('front.portfolio')}}" class="nav-link @if(Request::segment(1)=='portfolio') active @endif">PORTFOLIO</a>
            <a href="{{route('front.blog')}}" class="nav-link @if(Request::segment(1)=='blog') active @endif">BLOG</a>
            <a href="{{route('front.contact')}}" class="nav-link @if(Request::segment(1)=='contact') active @endif">CONTACT</a>
        </nav>
        <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{asset('front/')}}/assets/images/hamburger.svg" alt="hamburger"></button>
    </header>
    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                <img src="{{asset('front/')}}/assets/images/Profile.png" alt="profile">
            </div>
            <h1 class="profile-name">Daisy Murphy</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">UI / UX Designer</span>
            </div>
            <nav class="social-links">
                <a href="#!" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-behance"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-dribbble"></i></a>
                <a href="#!" class="social-link"><i class="fab fa-github"></i></a>
            </nav>
            <div class="widget">
                <h5 class="widget-title">personal information</h5>
                <div class="widget-content">
                    <p>BIRTHDAY : 15 April 1990</p>
                    <p>WEBSITE : www.example.com</p>
                    <p>PHONE : +1 123 000 4444</p>
                    <p>MAIL : your@example.com</p>
                    <p>Location : California, USA</p>
                    <button class="btn btn-download-cv btn-primary rounded-pill"> <img src="{{asset('front/')}}/assets/images/download.svg" alt="download"
                        class="btn-img">DOWNLOAD CV </button>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">LANGUAGES</h5>
                        <p>English : native</p>
                        <p>Spanish : fluent</p>
                        <p>Italian : fluent</p>
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">INTERESTS</h5>
                        <p>Video games</p>
                        <p>Finance</p>
                        <p>Basketball</p>
                        <p>Theatre</p>
                    </div>
                </div>
            </div>
        </aside>
        <main>