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
            
           

       
@endsection
        
