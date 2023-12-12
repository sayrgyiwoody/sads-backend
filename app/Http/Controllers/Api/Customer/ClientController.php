<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{
    public function index(){
        return ClientResource::collection(
            Customer::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request){
        $request->validated($request->all());
        $userId = Auth::user()->id;
        $preOrder=Customer::create([
            'name'=>$request->name,
            'region'=>$request->region,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
        ]);

        return new ClientResource($preOrder);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer){
        return $this->isNotAuthorized($customer) ? $this->isNostAuthorized($customer) : $customer->delete();
    }

    public function isNotAuthorized($customer){
        if(Auth::user()->id!==$customer->user_id){
            return $this->error('','You are not related to this preorder',403);
        }
}
}
