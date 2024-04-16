<?php

namespace App\Http\Controllers\Api;
use App\discounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function getDiscount($cartValue)
    {
        $discounts = discounts::select('margin_amount','discount_percentage')
        ->where('margin_amount', '>', $cartValue)
        ->orderBy('margin_amount')
        ->first();
        return response()->json($discounts);
    }
}
