<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\egitim;
use App\Models\experience;

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
           ]);
        $data=  egitim::find($id);
        $data->education_date=$request->education_date;
        $data->university_name=$request->university_name;
        $data->education_date=$request->education_date;
        $data->university_branch=$request->university_branch;
        $data->order=$request->order;
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
           ]);
        $data=new egitim;
        $data->education_date=$request->education_date;
        $data->university_name=$request->university_name;
        $data->university_branch=$request->university_branch;
        $data->order=$request->order;
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
           ]);
        $data=new experience;
        $data->task_name=$request->task_name;
        $data->company_name=$request->company_name;
        $data->date=$request->date;
        $data->description=$request->description;
        $data->status=$request->status;
        $data->order=$request->order;
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
           ]);
        $data=experience::find($id);
        $data->task_name=$request->task_name;
        $data->company_name=$request->company_name;
        $data->date=$request->date;
        $data->description=$request->description;
        $data->order=$request->order;
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
