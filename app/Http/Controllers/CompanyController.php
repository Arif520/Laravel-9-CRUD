<?php

namespace App\Http\Controllers;
use App\Models\Company;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $allData = Company::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->get();
        $dataPaginate = Company::paginate(3);        
        return view('index',compact('allData','dataPaginate'));
    }

    public function add_company(){
        return view('create');
    }

    public function store_company(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies',
            'address' => 'required',
            'mobile' => 'required|min:11|max:11',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/company',$imageName);
        }

        Company::create([
            'name'    =>$request->name,
            'email'   =>$request->email,
            'mobile'  =>$request->mobile,
            'address' =>$request->address,
            'image'   =>$imageName,
        ]);
        Session::flash('message','Add Company Info Successfully');
        return redirect()->back();
    }

    public function edit_company($id){
        $allData = Company::findOrFail($id);
        return view('edit',compact('allData'));
    }

    public function update_company(Request $request,$id){
        $allData = Company::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile' => 'required|min:11|max:11',
        ]);

        $imageName = '';
        $deleteOldImage = 'image/company/'.$allData->image;
        if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('image/company',$imageName);
        }else{
            $imageName = $allData->image;
        }

        Company::where('id',$id)->update([
            'name'    =>$request->name,
            'email'   =>$request->email,
            'mobile'  =>$request->mobile,
            'address' =>$request->address,
            'image'   =>$imageName,
        ]);
        Session::flash('message','Update Company Info Successfully');
        return redirect()->back();
    }

    public function delete_company($id){
        $allData = Company::findOrFail($id);
        $deleteOldImage = 'image/company/'.$allData->image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $allData->delete();
        Session::flash('message','Delete Company Info Successfully');
        return redirect()->back();
    }
}
