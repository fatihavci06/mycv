    @extends('layouts.front.master')
    @section('title',trans('general.contact'))
    @section('content')

     <section class="contact-section">
                <h2 class="section-title">@lang('general.getintouch')</h2>
                <p class="mb-4">@lang('general.contact_text')</p>
                
                <form  class="contact-form">
                    <div class="form-group form-group-name">
                      <label for="name" class="sr-only">@lang('general.name')</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="@lang('general.name')">
                    </div>
                    <div class="form-group form-group-email">
                        <label for="email" class="sr-only">@lang('general.email')</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="@lang('general.email')">
                    </div>
                    <div class="form-group">
                        <label for="message" class="sr-only">@lang('general.content')</label>
                        <textarea name="icerik" id="icerik" class="form-control" placeholder="@lang('general.content')" rows="5"></textarea>
                    </div>
                    <a   class="btn btn-primary form-submit-btn" id="send">@lang('general.send')</a>
                    <button id="sendAfter" class="btn btn-primary" type="button" style="display:none;" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        @lang('general.loading')
                        </button>
                    <div class="form-group mt-2">
                        <div id="er" class="alert alert-danger" style="display:none;"></div>
                        <div id="success" class="alert alert-success" style="display:none;"></div>
                    </div>

                </form>

            </section>
            <section class="location-section">
                <h5 class="section-title">@lang('general.mylocation')</h5>

                <div class="map-wrapper embed-responsive embed-responsive-16by9"">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060.969993778887!2d32.919011314615226!3d39.897304094990616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d3503589e49215%3A0xd343a650a81dc7d4!2sCengizhan%20Mahallesi!5e0!3m2!1str!2str!4v1654418310660!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </section>
       
@endsection
@section('js')
<script type="text/javascript">

   

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

   

    $(document).on('click', '#send', function() {  
        var err='';
        var name=$("input[name=name]").val();
        var email=$("input[name=email]").val();
        var icerik=$("#icerik").val();
        $( "#send" ).hide();
        $( "#sendAfter" ).show();
        
        $.ajax({

            type:'POST',

            url:"{{ route('front.contactpost') }}",

            data:{name:name, email:email, icerik:icerik},

            success:function(data){
           	console.log(data.errors);
           	if(data.errors){
           		$('#success').hide();
           		$('#er').show();
           		$.each( data.errors, function( key, value ) {
				  err+='<p>'+value+'</p>';

				});
				$('#er').html(err);
           	}
           	else{
           		$('#er').hide();
	           	$('#success').show();
	             $('#success').html(data.status);
                 $('.contact-form').trigger("reset");
                 window.setTimeout(function(){location.reload()},3000)
                 
             }
             $( "#send" ).show();
             $( "#sendAfter" ).hide();
           }

        });
        

   

        
  

    });

</script>


@endsection
        
