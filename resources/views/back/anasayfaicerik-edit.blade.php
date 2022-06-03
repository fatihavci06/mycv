

@extends('layouts.back.master')
@section('title','Anasayfa İçerik Düzenle')
@section('content')


                <div class="card shadow mb-4">
                        
                        <div class="card-body">
                             @if(session('status'))
                              <div class="alert alert-success col-lg-12">{{session('status')}}</div>
                              @endif
                              @if($errors->any())
                              <div class="alert alert-danger col-lg-6">
                                    @foreach($errors->all() as $e)
                                    <li>{{$e}}</li>
                                    @endforeach
                                </div>
                                @endif
                            <form action="{{route('back.anasayfaicerik.update',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="form-group col-lg-6">
                                <label for="main_title">Main Title</label>
                                <input type="text" class="form-control" id="main_title" value="{{$data->main_title}}" name="main_title">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="about_text">About Text</label>
                                  <textarea rows="3" class="form-control" name="about_text" id="about_text">{{$data->about_text}}</textarea>
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="btn_contact_text">Btn Contact Text</label>
                                <input type="text" class="form-control" id="btn_contact_text" value="{{$data->btn_contact_text}}" name="btn_contact_text">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="full_name">Fullname</label>
                                <input type="text" class="form-control" id="full_name" value="{{$data->full_name}}" name="full_name">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="small_title_left">Small Title Left</label>
                                <input type="text" class="form-control" id="small_title_left" value="{{$data->small_title_left}}" name="small_title_left">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="small_title_right">Small Title Right</label>
                                <input type="text" class="form-control" id="small_title_right" value="{{$data->small_title_right}}" name="small_title_right">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image"  name="image">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="task_name">Task Name</label>
                                <input type="text" class="form-control" id="task_name" value="{{$data->task_name}}" name="task_name">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="birthday">Birthday</label>
                                <input type="date" class="form-control" id="birthday" value="{{$data->birthday}}" name="birthday">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" value="{{$data->website}}" name="website">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" value="{{$data->phone}}" name="phone">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="mail">Mail</label>
                                <input type="text" class="form-control" id="mail" value="{{$data->mail}}" name="mail">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="address">Adress</label>
                                <input type="text" class="form-control" id="address" value="{{$data->address}}" name="address">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="cv">Cv</label>
                                <input type="file" class="form-control" id="cv"  name="cv">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="languages">Languages (virgül ekleyerek ikinci dili girebilirsiniz)</label>
                                  <textarea rows="3" class="form-control" name="languages" id="languages">{{$data->languages}}</textarea>
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="interests">Interests (virgül ekleyerek ikinci intesti girebilirsiniz)</label>
                                  <textarea rows="3" class="form-control" name="interests" id="interests">{{$data->interests}}</textarea>
                              </div>
                              



                              
                            </div>
                              <div class="form-group row text-center">
                                <button class="form-control btn btn-primary">Kaydet</button>

                              </div>

                            </form>
                                                   

                         </div>
                    </div>
          
@endsection