

@extends('layouts.back.master')
@section('title','Eğitim Ekle')
@section('content')


                <div class="card shadow mb-4">
                        
                        <div class="card-body">
                             @if(session('status'))
                              <div class="alert alert-success col-lg-6">{{session('status')}}</div>
                              @endif
                              @if($errors->any())
                              <div class="alert alert-danger col-lg-6">
                                    @foreach($errors->all() as $e)
                                    <li>{{$e}}</li>
                                    @endforeach
                                </div>
                                @endif
                            <form action="{{route('back.profilim.update')}}" method="POST">
                            @csrf
                            <div class="row"></div>
                              <div class="form-group col-lg-6">
                                <label for="name">Name </label>
                                <input type="text" class="form-control" id="name" value="{{$data->name}}" name="name">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" value="{{$data->email}}" name="email"> 
                              </div>
                            
                              <div class="form-group col-lg-6">
                                <label for="password">Change Password</label>
                                <input type="password" class="form-control" id="password"  name="password">
                              </div>
                              
                              <div class="form-group col-lg-6">
                                <button class="form-control btn btn-primary">Kaydet</button>

                              </div>

                            </form>
                                                   

                         </div>
                    </div>
          
@endsection