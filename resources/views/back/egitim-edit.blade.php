

@extends('layouts.back.master')
@section('title','Eğitim Düzenle')
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
                            <form >
                            
                            <div class="row"></div>
                              <div class="form-group col-lg-6">
                                <label for="education_date">Eğitim Tarihi (Örneğin 2012-2017)</label>
                                <input type="text" class="form-control" id="education_date" value="{{$data->education_date}}" name="education_date">
                                <input type="hidden" name="id" value="{{$data->id}}">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="university_name">Üniversite Adı</label>
                                <input type="text" class="form-control" id="university_name" value="{{$data->university_name}}" name="university_name"> 
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="university_branch">Bölüm</label>
                                <input type="text" class="form-control" id="university_branch" value="{{$data->university_branch}}" name="university_branch">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="order">Sıra</label>
                                <input type="number" class="form-control" id="order" value="{{$data->order}}" name="order">
                              </div>
                              <div class="form-group col-lg-6">
                                <label for="description">Açıklama</label>
                                <textarea name="description" id="description"class="form-control">{{$data->description}}</textarea>
                              </div>
                              
                              <div class="form-group col-lg-6">
                                <label  for="status">Durum</label>
                                
                                  <select id="status" name="status" class="form-control">
                                    <option  value="" selected>Seçiniz...</option>
                                    <option value="1" @if($data->status==1) selected @endif>Aktif</option>
                                    <option value="0" @if($data->status==0) selected @endif>Pasif</option>
                                  </select>

                              </div>
                              <div class="form-group col-lg-6">
                                <label  for="status">Dil</label>
                                
                                  <select id="language_id" name="language_id" class="form-control">
                                    <option  value="" selected>Seçiniz...</option>
                                    <option value="1" @if($data->language_id==1) selected @endif>Türkçe</option>
                                    <option value="2" @if($data->language_id==2) selected @endif>English</option>
                                  </select>

                              </div>
                              <div class="form-group col-lg-6">
                                <a class="form-control btn btn-primary" id="dznleEgtm">Kaydet</a>

                              </div>

                            </form>
                                                   

                         </div>
                    </div>
          
@endsection
@section('js')
<script>
  $(document).ready(function(){
   
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

        });

        $("#dznleEgtm").click(function() {
           
        var id= $("input[name=id]").val();
        var url = "{{ route('back.egitimupdate', ":id") }}";
        url = url.replace(':id', id);
        var education_date=$("input[name=education_date]").val();
        var university_name= $("input[name=university_name]").val();
        var university_branch=$("input[name=university_branch]").val();
        var order=$("input[name=order]").val();
        var description=$("#description").val();
        var language_id=$("#language_id").val();
       
        var status=$("#status").val();
        
        
        $.ajax({

           type:'POST',

          
            url:url,

           data:{education_date:education_date,university_name:university_name,university_branch:university_branch,description:description,status:status,order:order,language_id:language_id},

           success:function(data){

              
              swal(data.status);

           }

        });

       
       
   

      
            
        });
});
</script>
@endsection