

@extends('layouts.back.master')
@section('title','Deneyim')
@section('content')


<div class="card shadow mb-4">
                        <div class="mt-3 mx-auto">
                            <a class="btn btn-primary" href="{{route('back.deneyimekle')}}" >Deneyim Ekle </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>id</th>
                                            <th>Görev Adı</th>
                                            <th>Şirket</th>
                                            <th>Tarih</th>
                                            <th>Açıklama</th>
                                            <th>Durum</th>
                                            <th>Şuan Çalışıyormu?</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                            <th>Görev Adı</th>
                                            <th>Şirket</th>
                                            <th>Tarih</th>
                                            <th>Açıklama</th>
                                            <th>Durum</th>
                                            <th>Şuan Çalışıyormu?</th>
                                            <th width="20%">İşlem</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->id}}</td>
                                            <td>{{$d->task_name}}</td>
                                            <td>{{$d->company_name}}</td>
                                            <td>{{$d->date}}</td>
                                            <td>{{$d->description}}</td>
                                            <td> @if($d->status==1) <a data-id="{{$d->id}}"  data-status="{{$d->status}}" class="btn btn-success changeStatus" href="javascript:void(0)"> Aktif <a/>
                                             @else <a class="btn btn-danger changeStatus" data-id="{{$d->id}}" data-status="{{$d->status}}" href="javascript:void(0)"> Pasif </a> @endif</td>
                                             <td> @if($d->active==1) Evet @else Hayır @endif</td>
                                            
                                             <td><a class="btn btn-danger" onclick='silmedenSor("{{route('back.deneyim.sil',['id'=>$d->id])}}"); return false '>Sil</a>
                                            <a class="btn btn-primary" href="{{route('back.deneyim.duzenle',['id'=>$d->id])}}">Düzenle</a></td>
                                            
                                       
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
          
@endsection
@section('js')

 <script type="text/javascript">
function silmedenSor (gidilecekLink) {
	
    swal({
    title: "Silmek istediğine emin misin?",
    text: "Silinen kayıt geri alınamaz.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    buttons: {		
                  cancel: "İptal", //string, true, false
                  confirm: "Evet",
                  
              }
  })
  .then((willDelete) => {
    if (willDelete) {
      swal({title:"Silme başarılı", icon: "success",button: {		
                  text: "Tamam", //string, true, false
                  
                  
              }});
          setTimeout(function(){   
          window.location=gidilecekLink;
          //3 saniye sonra yönlenecek
          }, 1000);
    } else {
      swal({title:"Silme işleminden vazgeçtiniz", icon: "warning",button: {		
                  text: "Tamam", //string, true, false
                  
                  
              },});
    }
  });
      
  }
	</script>
<<script>
  $(document).ready(function(){
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

        });

        $(".changeStatus").click(function() {
           

   

        var id = $(this).data("id");
        var self=$(this);
        var status = $(this).data("status");
        if(status==1){
            status=0;
        }
        else{
            status=1;
        }

       
   

        $.ajax({

           type:'POST',

           url:"{{ route('back.deneyimchangestatus') }}",

           data:{id:id, status:status},

           success:function(data){

              
              if(data.status==0){
                  self.data('status',0);
                  self.removeClass('btn btn-success');  
                  self.addClass( "btn btn-danger" );
                  self.html('Pasif');
              }
              else{
                self.data('status',1);
                self.removeClass('btn btn-danger');  
                self.addClass( "btn btn-success" );
                self.html('Aktif');
              }

           }

        });
            
        });
});
</script>
@endsection