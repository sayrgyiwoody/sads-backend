<?php

namespace App\Http\Controllers\Api\Customer;

<<<<<<< HEAD
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
=======
use App\Http\Requests\clientPreorderRequest;
use App\Models\PreorderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\clientPreorderResource;
>>>>>>> 3b66a04d4cff07c5551308e673ceb5f034e412f1

class ClientPreorderController extends Controller
{
    public function index(){
        return clientPreorderResource::collection(
            PreorderItem::where('user_id',Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(clientPreorderRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;
        $preOrder=PreorderItem::create([
            'preorder_id'=>$request->preorder_id,
            'product_id'=>$request->product_Id,
            'product_name'=>$request->product_name,
            'total_price' => $request->price,
            'toal_quantity'=>$request->quantity,
            'user_id'=>$userId,
        ]);

        return new clientPreorderResource($preOrder);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreorderItem $preorderItem){
        return $this->isNotAuthorized($preorderItem) ? $this->isNostAuthorized($preorderItem) : $preorderItem->delete();
    }

    public function isNotAuthorized($preorderItem){
        if(Auth::user()->id!==$preorderItem->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
