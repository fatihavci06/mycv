    @extends('layouts.front.master')
   
    @section('content')

     <section class="intro-section">
                <h2 class="section-title">{{$personal->main_title}}</h2>
                <p>{{$personal->about_text}}</p>
                <a href="#!" class="btn btn-primary btn-hire-me">@lang('general.test')</a>
            </section>
            <section class="resume-section">
                <div class="row">
                    <div class="col-lg-6">
                       
                        <h2 class="section-title">@lang('general.education')</h2>
                        <ul class="time-line">
                            @foreach($egitim as $e)
                            <li class="time-line-item">
                                <span class="badge badge-primary">{{$e->education_date}}</span>
                                <h6 class="time-line-item-title">{{$e->university_branch}}</h6>
                                <p class="time-line-item-subtitle">{{$e->university_name}}</p>
                                <p class="time-line-item-content">{{$e->description}}</p>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <div class="col-lg-6">
                       
                        <h2 class="section-title">@lang('general.experience')</h2>
                        <ul class="time-line">
                            @foreach($deneyim as $d)
                            <li class="time-line-item">
                                <span class="badge badge-primary">{{$d->date}}</span>
                                <h6 class="time-line-item-title">{{$d->task_name}}</h6>
                                <p class="time-line-item-subtitle">{{$d->company_name}}</p>
                                <p class="time-line-item-content">{{$d->description}}</p>
                            </li>
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </div>
            </section>
            
            <section class="testimonial-section">
                <div id="testimonialCarousel" class="testimonial-carousel carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="{{asset('front/')}}/assets/images/Profile.png" alt="profile" class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="{{asset('front/')}}/assets/images/Profile.png" alt="profile" class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial-content">Mauris magna sapien, pharetra consectetur fringilla vitae,
                                interdum sed tortor.</p>
                            <img src="{{asset('front/')}}/assets/images/Profile.png" alt="profile" class="testimonial-img">
                            <p class="testimonial-name">Nout Golstein</p>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                        <li data-target="#testimonialCarousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </section>

       
@endsection
        
