
      <!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',trans('general.index'))</title>
    <link href="https://fonts.googleapis.com/css?family=Mukta:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/vendors/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front/')}}/assets/css/live-resume.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>



<body>
    <header>
    <div class="mr-4">
    @if(Request::segment(1)=='en')
    <a href="http://mycv.test/tr/" style="color:#000;"><img src="{{asset('front/')}}/assets/images/tr.png" style="width: 40px;height:30px;">&nbspTurkish</a>
    @else
    <a href="http://mycv.test/en/" style="color:#000;"><img src="{{asset('front/')}}/assets/images/en.png" style="width: 40px;height:30px;">&nbspİngilizce</a>
    
    @endif
    </div>
    @php

        
        $pers_info= \App\Http\Controllers\front\IndexController::personal_info();

    @endphp

        <div class=" ml-auto mr-3 ml-md-0 mr-md-auto">
            </div>
        <nav class="collapsible-nav" id="collapsible-nav">
            <a href="{{route('front.index')}}" class="nav-link @if(Request::segment(1)=='') active @endif">@lang('general.index')</a>    
            <a href="{{route('front.contact')}}" class="nav-link @if(Request::segment(1)=='contact') active @endif">@lang('general.contact')</a>
        </nav>
        <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{asset('front/')}}/assets/images/hamburger.svg" alt="hamburger"></button>
    </header>
    <div class="content-wrapper">
        <aside>
            <div class="profile-img-wrapper">
                <img src="{{Storage::url($pers_info->image)}}" alt="profile">
            </div>
            <h1 class="profile-name">Fatih AVCI</h1>
            <div class="text-center">
                <span class="badge badge-white badge-pill profile-designation">{{$pers_info->task_name}}</span>
            </div>
            
            <div class="widget">
                <h5 class="widget-title">@lang('general.personal_information')</h5>
                <div class="widget-content">
                    <p><b>@lang('general.birthday') :</b> {{$pers_info->birthday}}</p>
                    <p><b>@lang('general.website') :</b><a href="{{$pers_info->website}}" target="_blank"> {{$pers_info->website}} </a>  </p>
                    <p><b>@lang('general.phone') :</b> {{$pers_info->phone}} </p>
                    <p><b>@lang('general.mail') :</b> {{$pers_info->mail}}</p>
                    <p><b>@lang('general.location') :</b> {{$pers_info->address}}</p>
                    <a href="{{route('front.download_cv')}}" class="btn btn-download-cv btn-primary rounded-pill"> <img src="{{asset('front/')}}/assets/images/download.svg" alt="download"
                        class="btn-img">@lang('general.downloadcv')  </a>
                </div>
                @if(session('status'))
                    <div class="alert alert-success mt-2">{{session('status')}}</div>
                    @endif
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">@lang('general.languages')</h5>
                        <p>{{$pers_info->languages}}</p>
                        
                    </div>
                </div>
            </div>
            <div class="widget card">
                <div class="card-body">
                    <div class="widget-content">
                        <h5 class="widget-title card-title">@lang('general.interests')</h5>
                    
                        
                            
                           @php 

                            $dizi = explode (",",$pers_info->interests);
                            @endphp
                            @foreach($dizi as $dz)
                            <p>{{$dz}}</p>
                            @endforeach
                            

                      
                    
                </div>
            </div>
        </aside>
        <main>