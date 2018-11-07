<?php

namespace App\Http\Controllers\Api;

use App\Models\BillPay;
use Illuminate\Http\Request;
use App\Http\Resources\BillPayResource;
use App\Http\Requests\BillPayRequest;
use Illuminate\Routing\Controller;
use App\Http\Resources\BillPayCollection;
use App\Models\Category;
use App\Http\Resources\CategoryBillPayCollection;

class CategoryBillPayController extends Controller
{
    public function index(Category $category)
    {
        $billPays = $category->billPays()->paginate();
        return new CategoryBillPayCollection($billPays, $category);
    }
}
/*
* about
* category
* data
* meta
* link
*/
