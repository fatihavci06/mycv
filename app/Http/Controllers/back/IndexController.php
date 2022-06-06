<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\egitim;
use App\Models\personal;
use App\Models\User;
use App\Models\experience;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function test()
    {
        //
        return view('back.index');
    }
    public function login()
    {
        //
        return view('back.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profilimedit(){
        $data=User::find(1);
        return view('back.profilim',['data'=>$data]);
    }
    public function profilimupdate(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            
           
            
           ]);
           $data=User::findOrFail(1);
           $data->name=$request->name;
           $data->email=$request->email;
           if($request->password!=''){
             $data->password=Hash::make($request->password);
           }
           $data->save();
           if(!$data->save()){
               return redirect()->back()->with(['status'=>'Hata var']);
           }
           else{
               return redirect()->back()->with(['status'=>'Başarılı']);
           }
    }
    public function egitimbilgileri()
    {
        $data=egitim::all();
        
        return view('back.egitim',['data'=>$data]);
    }
    public function changestatus(Request $request)
    {
        $data=egitim::find($request->id);
        $data->status=$request->status;
        $data->save();
        return response()->json(['success'=>'degisti','status'=>$data->status]);
    }
    public function anasayfaicerik(){
        $data=personal::with('language_name')->get();
       // return $data;
        return view('back.anasayfaicerik',['data'=>$data]);
    }
    public function anasayfaiceriksil($id){
        
        $data=personal::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function anasayfaicerikduzenle($id){
        $data=personal::find($id);
        return view('back.anasayfaicerik-edit',['data'=>$data]);
    }
    public function anasayfaicerikupdate(Request $request,$id)
    {

        $request->validate([
            'main_title'=>'required',
            'about_text'=>'required',
            'btn_contact_text'=>'required',
            'full_name'=>'required',
            'small_title_left'=>'required',
            'small_title_right'=>'required',
            'task_name'=>'required',
            'birthday'=>'required',
            'website'=>'required',
            'phone'=>'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'cv' => 'mimes:pdf|max:10000',
            'mail'=>'required|email',
            'address'=>'required',
             'languages'=>'required',
            'interests'=>'required',
           ]);

           $data=personal::find($id);
           $data->main_title=$request->main_title;
           $data->about_text=$request->about_text;
           $data->btn_contact_text=$request->btn_contact_text;
           $data->full_name=$request->full_name;
           $data->small_title_right=$request->small_title_right;
           $data->small_title_left=$request->small_title_left;
           $data->task_name=$request->task_name;
           $data->birthday=$request->birthday;
           $data->website=$request->website;
           $data->phone=$request->phone;
           $data->mail=$request->mail;
           $data->address=$request->address;
           $data->languages=$request->languages;
           $data->interests=$request->interests;
           if(!empty($request->file('image'))){
            Storage::delete($data->image);
            $data->image=Storage::putFile('images', $request->file('image'));  //storage burda
            
            }
            if(!empty($request->file('cv'))){
                Storage::delete($data->cv);
                $data->cv=Storage::putFile('cv', $request->file('cv'));  //storage burda
                
            }
            $data->save();
            return redirect()->back()->with('status','düzenlendi');
    }
    public function egitimekle()
    {
        return view('back.egitim-add');
    }
    public function egitimduzenle($id)
    {
        $data=egitim::find($id);
        return view('back.egitim-edit',['data'=>$data]);
    }
    public function egitimupdate(Request $request,$id)
    {
        $request->validate([
            'education_date'=>'required',
            'university_name'=>'required',
            'university_branch'=>'required',
            'status'=>'required',
            'order'=>'required',
            'language_id'=>'required',
           ]);
        $data=  egitim::find($id);
        $data->education_date=$request->education_date;
        $data->university_name=$request->university_name;
        $data->education_date=$request->education_date;
        $data->university_branch=$request->university_branch;
        $data->order=$request->order;
        $data->language_id=$request->language_id;
        $data->description=$request->description;
        $data->status=$request->status;
        $saved=$data->save();
        if(!$saved){
            return response()->json(['status'=>'başarısız']);
        }
        else{
            return response()->json(['status'=>'başarılı']);
        }

        
    }
    public function egitimsil($id)
    {
        $data=egitim::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function egitimeklepost(Request $request)
    {
        
        $request->validate([
            'education_date'=>'required',
            'university_name'=>'required',
            'university_branch'=>'required',
            'status'=>'required',
            'order'=>'required',
            'language_id'=>'required',
           ]);
        $data=new egitim;
        $data->education_date=$request->education_date;
        $data->university_name=$request->university_name;
        $data->university_branch=$request->university_branch;
        $data->order=$request->order;
        $data->language_id=$request->language_id;
        $data->description=$request->description;
        $data->status=$request->status;
        $saved=$data->save();

        if(!$saved){
            App::abort(500, 'Error');
        }
        
        return redirect()->back()->with('status','Kayıt başarılı');
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

    public function deneyimbilgileri()
    {
        //
        $data=experience::all();
        return view('back.deneyimlistesi',['data'=>$data]);
    }
    public function deneyimekle()
    {
        return view('back.deneyim-add');
    }
    public function deneyimeklepost(Request $request)
    {
        $request->validate([
            'task_name'=>'required',
            'company_name'=>'required',
            'date'=>'required',
            'status'=>'required',
            'active'=>'required',
            'order'=>'required',
            'language_id'=>'required',
           ]);
        $data=new experience;
        $data->task_name=$request->task_name;
        $data->company_name=$request->company_name;
        $data->date=$request->date;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->order=$request->order;
        $data->language_id=$request->language_id;
        $data->active=$request->active;
        $save=$data->save();
        if(!$save){
            return redirect()->back()->with(['status'=>'Başarısız']);
        }
        else{
            return redirect()->back()->with(['status'=>'Başarılı']);
        }
        
    }
    public function deneyimchangestatus(Request $request)
    {
        //
        $data=experience::find($request->id);
        $data->status=$request->status;
        $data->save();
        return response()->json(['success'=>'degisti','status'=>$data->status]);
    }
    public function deneyimsil(Request $request,$id)
    {
        $data=experience::find($request->id);
        $data->delete();
        return redirect()->back()->with(['status'=>'silindi']);
    }
    public function deneyimduzenle($id)
    {
        //
        $data=experience::find($id);
        return view('back.deneyim-edit',['data'=>$data]);
    }
    public function deneyimupdate(Request $request,$id)
    {
        //
        
        $request->validate([
            'task_name'=>'required',
            'company_name'=>'required',
            'date'=>'required',
            'status'=>'required',
            'active'=>'required',
            'order'=>'required',
            'language_id'=>'required',
           ]);
        $data=experience::find($id);
        $data->task_name=$request->task_name;
        $data->company_name=$request->company_name;
        $data->date=$request->date;
        $data->description=$request->description;
        $data->order=$request->order;
        $data->language_id=$request->language_id;
        $data->status=$request->status;
        $data->active=$request->active;
        $save=$data->save();
        if(!$save){
            return redirect()->back()->with(['status'=>'Başarısız']);
        }
        else{
            return redirect()->back()->with(['status'=>'Başarılı']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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
