<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Log;
use App\Models\egitim;
use App\Models\experience;
use App\Models\personal;
use App\Models\Contact;
use App;

 use Illuminate\Support\Facades\Storage;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dil=App::getlocale();
        if($dil=='tr'){
            $dil=1;
        }
        else if($dil=='en'){
            $dil=2;
        }
        
        $egitim=egitim::where('status',1)->where('language_id',$dil)->orderBy('order', 'asc')->get();
        $personal=personal::where('language_id',$dil)->first();
        
        $deneyim=experience::where('status',1)->where('language_id',$dil)->orderBy('order', 'asc')->get();
        return view('front.index',['egitim'=>$egitim,'deneyim'=>$deneyim,'personal'=>$personal]);
    }

    public static function personal_info(){
        $dil=App::getlocale();
        if($dil=='tr'){
            $dil=1;
        }
        else if($dil=='en'){
            $dil=2;
        }
        $personal=personal::where('language_id',$dil)->first();

        return $personal;
    }
    public function download_cv(){
        $dil=App::getlocale();
        if($dil=='tr'){
            $dil=1;
        }
        else if($dil=='en'){
            $dil=2;
        }
        $personal=personal::select('cv')->where('language_id',$dil)->first();
        if($personal->cv==''){
            return redirect()->back()->with(['status'=>'cv bulunamadı']);
        }
        return Storage::download($personal->cv);
    }




     public function resume()
    {
        return view('front.resume');
    }
    public function portfolio()
    {
        return view('front.portfolio');
    }
     public function blog()
    {
        return view('front.blog');
    }
     public function contact()
    {
        return view('front.contact');
    }
    public function contactpost(Request $request)
    {
        
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'icerik'=>'required',
            'email'=>'required|email',
           
               
           ]);
       if ($validator->fails())
        {
       return response()->json(['errors'=>$validator->errors()->all()]);
       }
       $data = ['name'=>$request->name,'email'=>$request->email,'icerik'=>$request->icerik,'subject'=>'İletişim Formu'];

       try{

       
       Mail::send('mail.offer', $data, function($message) use ($data)
         {
           $message->from($data['email']);
           $message->to('66fatihavci@gmail.com');
           $message->subject($data['subject']);
         });
         return response()->json(['status'=>trans('general.success')]);


       }
       catch(\Exception $e){

           Log::info($e->getText());
           return response()->json(['status'=>trans('general.false')]);
          
       }



        /*$data=new Contact;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->content=$request->content;
        $save=$data->save();
        if(!$save){
            return response()->json(['status'=>'Failed']);
        }
        return response()->json(['status'=>'Success']);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
