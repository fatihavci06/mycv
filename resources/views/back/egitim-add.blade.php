

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
                            <form action="{{route('back.egitimeklepost')}}" method="POST">
                            @csrf
                            <div class="row"></div>
                              <div class="form-group col-lg-6">
                                <label for="education_date">Eğitim Tarihi (Örneğin 2012-2017)</label>
                                <input type="text" class="form-control" id="education_date" value="{{old('education_date')}}" name="education_date">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="university_name">Üniversite Adı</label>
                                <input type="text" class="form-control" id="university_name" value="{{old('university_name')}}" name="university_name"> 
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="university_branch">Bölüm</label>
                                <input type="text" class="form-control" id="university_branch" value="{{old('university_branch')}}" name="university_branch">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="university_branch">Sıra</label>
                                <input type="number" class="form-control" id="order" value="{{old('order')}}" name="order">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="description">Açıklama</label>
                                <textarea name="description" id="description" value="{{old('description')}}" class="form-control"></textarea>
                              </div>
                              <div class="form-group col-lg-6">
                                <label  for="status">Dil</label>
                                
                                  <select id="language_id" name="language_id" class="form-control">
                                    <option  value="" selected>Seçiniz...</option>
                                    <option value="1" @if(old('status')==1) selected @endif>Türkçe</option>
                                    <option value="2" @if(old('status')==2) selected @endif>English</option>
                                  </select>

                              </div>
                              <div class="form-group col-lg-6">
                                <label  for="status">Durum</label>
                                
                                  <select id="status" name="status" class="form-control">
                                    <option  value="" selected>Seçiniz...</option>
                                    <option value="1" @if(old('status')==1) selected @endif>Aktif</option>
                                    <option value="0" @if(old('status')==0) selected @endif>Pasif</option>
                                  </select>

                              </div>
                              <div class="form-group col-lg-6">
                                <button class="form-control btn btn-primary">Kaydet</button>

                              </div>

                            </form>
                                                   

                         </div>
                    </div>
          
@endsection