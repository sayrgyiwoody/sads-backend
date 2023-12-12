<?php

namespace App\Http\Controllers\Api\Sales;
<<<<<<< HEAD

use App\Http\Requests\salePreorderRequest;
=======
use App\Http\Requests\salePreorderRequest;
use App\Http\Resources\salePreorderResource;
>>>>>>> 3b66a04d4cff07c5551308e673ceb5f034e412f1
use App\Models\Preorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use App\Http\Resources\salePreorderResource;
=======
>>>>>>> 3b66a04d4cff07c5551308e673ceb5f034e412f1

class SalePreorderController extends Controller
{
    public function index(){
        return salePreorderResource::collection(
            Preorder::where('user_id',Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(salePreorderRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;

        $preOrder=Preorder::create([
            'customer_id'=>$request->customer_id,
            'preorder_number'=>$request->preorder_number,
            'stauts'=>$request->status,
            'price' => $request->price,
            'user_id'=>$userId,
            'permit_status'=>$request->permit_status
        ]);

        return new salePreorderResource($preOrder);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preorder $preorder){
<<<<<<< HEAD
        return $this->isNotAuthorized($preorder) ? $this->isNostAuthorized($preorder) : $preorder->delete();
=======
        return $this->isNotAuthorized($preorder) ? $this->isNostAuthorized($preorderStatus) : $preorder->delete();
>>>>>>> 3b66a04d4cff07c5551308e673ceb5f034e412f1
    }

    public function isNotAuthorized($preorder){
        if(Auth::user()->id!==$preorder->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
