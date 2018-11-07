<?php

namespace App\Http\Controllers\Api;

use App\Models\BillPay;
use Illuminate\Http\Request;
use App\Http\Resources\BillPayResource;
use App\Http\Requests\BillPayRequest;
use Illuminate\Routing\Controller;
use App\Http\Resources\BillPayCollection;

class BillPayController extends Controller
{
    public function index()
    {
        //lazy loading (retardado) - this->category
        //eager loading (rapido quanto se tem relacionamento) - select * from categories where id in(2,3,4,5,6  )
        $billPays = BillPay::with('category')->paginate();
        // return BillPayResource::collection($billPays);
        return new BillPayCollection($billPays);
    }

    public function store(BillPayRequest $request)
    {
        $billPays = BillPay::create($request->all());
        return new BillPayResource($billPays);
    }

    public function show(BillPay $bill_pay)
    {
        return new BillPayResource($bill_pay);
    }

    public function update(BillPayRequest $request, BillPay $category)
    {
        $bill_pay->fill($request->all());
        $bill_pay->save();
        return new BillPayResource($bill_pay);
    }

    public function destroy(BillPay $bill_pay)
    {
        $bill_pay->delete();
        return response()->json([], 204); //204 no-content nao tem conteudo
    }
}
