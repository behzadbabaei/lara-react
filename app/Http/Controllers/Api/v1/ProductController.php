<?php

namespace App\Http\Controllers\Api\v1;

use App\Product;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $response='';
        try{
            $products=Product::all();

            $response=response()->json([
                'data'=>$products,
                'msg'=>'',
                'status'=>200
            ],200);
        }
        catch(Exception $ex){
            $response=response()->json([
                'data'=>'Error code:'.$ex->getCode(),
                'msg'=>$ex->getMessage(),
                'status'=>'error'
            ],500);
        }
        finally{
            return $response;
        }
    }

    public function show($id)
    {
        $response='';
        try{
            $product=Product::findOrFail($id);
            if(is_null($product)){
                $response=response()->json([
                    'data'=>'Not Found',
                    'msg'=>'Provide product info does not exists!!!',
                    'status'=>404
                ],404);
            }
            else{
                $response=response()->json([
                    'data'=>$product,
                    'msg'=>'',
                    'status'=>200
                ],200);
            }


        }
        catch(Exception $ex){
            $response=response()->json([
                'data'=>'Error code:'.$ex->getCode(),
                'msg'=>$ex->getMessage(),
                'status'=>'error'
            ],500);
        }
        finally{
            return $response;
        }
    }

    public function filterByClass($className)
    {
        $response='';
        try{
            $products=Product::where('class','=',$className)->get();
            if(is_null($products)){
                $response=response()->json([
                    'data'=>'Not Found',
                    'msg'=>'Provide product info does not exists!!!',
                    'status'=>404
                ],404);
            }
            else{
                $response=response()->json([
                    'data'=>$products,
                    'msg'=>'',
                    'status'=>200
                ],200);
            }


        }
        catch(Exception $ex){
            $response=response()->json([
                'data'=>'Error code:'.$ex->getCode(),
                'msg'=>$ex->getMessage(),
                'status'=>'error'
            ],500);
        }
        finally{
            return $response;
        }
    }

    public function filterByGroup($groupName)
    {
        $response='';
        try{
            $products=Product::where('group','=',$groupName)->get();
            if(is_null($products)){
                $response=response()->json([
                    'data'=>'Not Found',
                    'msg'=>'Provide product info does not exists!!!',
                    'status'=>404
                ],404);
            }
            else{
                $response=response()->json([
                    'data'=>$products,
                    'msg'=>'',
                    'status'=>200
                ],200);
            }


        }
        catch(Exception $ex){
            $response=response()->json([
                'data'=>'Error code:'.$ex->getCode(),
                'msg'=>$ex->getMessage(),
                'status'=>'error'
            ],500);
        }
        finally{
            return $response;
        }
    }

}
