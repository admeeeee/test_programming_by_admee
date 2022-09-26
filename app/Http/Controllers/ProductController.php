<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product.index')->with(['data' => $data]);
    }

    public function create()
    {
        
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }

         //GET TASK DETAILS
         public function getProductDetails(Request $request){
            $id = $request->id;
            $details = Product::find($id);
            return response()->json(['details'=>$details]);
        }
    
        //UPDATE TASK DETAILS
    public function updateProductDetails(Request $request){
        $id = $request->id;
        $validator = $request->validate([
            'id' => 'required',
            'title' => 'required',
        ]);

        if(!$validator){
               return response()->json(['code'=>0,'msg'=>'validator error!']);
        }else{

            $task = Product::find($id);
            $task->title = $request->title;
            $task->desc = $request->desc;
            $task->price = $request->price;
            $query = $task->save();

            if($query){
                return redirect()->route('product.index')
                        ->with('success','Product updated successfully.');
            }else{
                return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
            }
        }
    }

    
    // DELETE TASK RECORD
    public function deleteProduct(Request $request){
        $id = $request->id;
        $query = Product::find($id)->delete();

        if($query){
            return response()->json(['code'=>1, 'msg'=>'Task has been deleted from database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }

}
