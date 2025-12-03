<?php

use App\Helper\Helper;
use App\Models\Coupon;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;

function AuthUser()
{
    if (Auth::user()) {
        return Auth::user();
    }

    return null;
}

function price($price)
{

    $price = floatval(str_replace(',', '', $price)); // Remove commas before conversion

    return number_format($price, 2, '.', ',') . " " . __('EGP');
}

function getDiscountAmount($code)
{
    $amount = 0;
    $coupon = Coupon::query()->where('code', $code)->where('status', 1)->first();

    if($coupon){
        $totalAmount = getCartPrice();
        if (is_null($coupon) || !(Carbon::now()->gte($coupon->start_at)) || !(Carbon::now()->lte($coupon->end_at))) {
            return 0;
        }

        if (!$coupon->is_unlimited && $coupon->usage >= $coupon->quantity) {
            return 0;
        }

        if(!$coupon->is_percentage){
            $amount = ($coupon->amount > $totalAmount) ? $totalAmount : $coupon->amount;
        }else{
            $amount = ($coupon->amount/100) * $totalAmount;
        }
    }
    return $amount;
}

function getCartPrice()
{
    $totalPrice = 0;

    foreach(Cart::content() as $item)
    {
        $totalPrice += $item->price*$item->qty;
    }
    return $totalPrice;
}

function calcVatAmount($code)
{
    return 0;
    $gs = Helper::getGeneral();
    $vat = $gs->vat;

    $vatAmount = 0;
    $discount = getDiscountAmount($code);

    $totalPrice = getCartPrice() - $discount;

    if ($vat != 0) {
        if (!$gs->is_tax_included) {
            $vatAmount = ($vat * $totalPrice) / 100;
        } else {
            $vatAmount = $totalPrice * (1 - (1 / (1 + $vat / 100)));
        }
    }
    return $vatAmount;
}

function isItemAddedToWishList($id)
{
    if (Auth::check()) {
        return Wishlist::query()->where('user_id', Auth::user()->id)->where('product_id', $id)->exists() ? true : false;
    }
    return false;
}