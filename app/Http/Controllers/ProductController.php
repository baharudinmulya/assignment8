<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request){

       $a =  Product::create($request->all());
       return response()->json($a,200);
    }

    public function show(){
        $a = Product::all();
        return response()->json($a,200);
    }

    public function tampil($id){
        $a = Product::where('id',$id)->first();
        return response()->json($a,200);
    }

    public function update(Request $request, $id){
        $a = Product::where('id',$id)->update($request->all());
        $b = Product::where('id',$id)->first();
        return response()->json($b,200);
    }

    public function delete($id){
        $a = Product::where('id',$id)->first();
        if($a){
            $b = Product::where('id',$id)->delete();
            if($b)
            {
                return response()->json([
                    'status' => 'success',
                    'message2'=>'Data berhasil dihapus'
                ],200);
            }
            else
            {
                return response()->json([
                    'status' => 'error',
                    'message2'=>'Data gagal dihapus'
                ],200);
            }
        }
        else
        {
            return response()->json(['message1'=>'Data tidak ditemukan'],404);
        }
        
        
    }
}
