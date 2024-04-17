<?php

namespace App\Http\Controllers\Api;
use App\discounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class DiscountController extends BaseController
{
    public function getDiscount($cartValue) //get next offer discount based on cart total
    {
        $discounts = discounts::select('margin_amount','discount_percentage')
        ->where('margin_amount', '>', $cartValue)
        ->orderBy('margin_amount')
        ->first();
        if(is_null($discounts)) {
            $dis = ['margin_amount' => 0,
                    'discount_percentage'=>0,];
            
            return $this->sendResponse($dis,'discount'); 
        }
        else{
            return $this->sendResponse($discounts, 'discount');
        }
        
    }
}
