<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class crudController extends Controller
{
    public function index(){
        return view('crud/index',['products'=>Product::get()]);
    }  
    
    public function create(){
        return view('crud/create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'image'=>'required|mimes:jpg,jpeg,png'
            ]
        );
        
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->image=$imageName;

        $product->save();
        return back()->with('success','Product Created Successfully');
        
    }

    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view('crud/edit',['product'=>$product]);
    }
    public function update(Request $request, $id){
        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'image'=>'nullable|mimes:jpg,jpeg,png'
            ]
        );
        $product=Product::where('id',$id)->first();

        if($request->hasFile('image')){
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $product->image = $imageName;
        }

        
        $product->name=$request->name;
        $product->description=$request->description;

        $product->save();
        return back()->with('success','Product updated Successfully');
    }
    public function destroy($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->with('success','Product deleted Successfully');
    }
}
