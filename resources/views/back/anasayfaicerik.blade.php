

@extends('layouts.back.master')
@section('title','Liste')
@section('content')


<div class="card shadow mb-4">
                        <div class="mt-3 mx-auto">
                            <a class="btn btn-primary" href="{{route('back.egitimekle')}}" >Eğitim Ekle </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Dil</th>
                                         <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Dil</th>
                                         <th>İşlem</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->language_name->name}}</td>
                                            
                                            <td><a class="btn btn-danger" onclick='silmedenSor("{{route('back.anasayfaicerik.sil',['id'=>$d->id])}}"); return false '>Sil</a>
                                            <a class="ml-2 btn btn-primary" href="{{route('back.anasayfaicerik.duzenle',['id'=>$d->id])}}">Düzenle</a></td>
                                            
                                       
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

           url:"{{ route('back.changestatus') }}",

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