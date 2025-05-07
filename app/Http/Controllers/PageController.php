<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function category() {
        return view('pages.category');
    }

    public function cart() {
        return view('pages.cart');
    }

    public function checkout_payment() {
        return view('pages.checkout-payment');
    }

    public function checkout_shipping() {
        return view('pages.checkout-shipping');
    }

    public function checkout() {
        return view('pages.checkout');
    }

    public function forgotten_password() {
        return view('pages.forgotten-password');
    }

    public function login() {
        return view('pages.login');
    }

    public function product() {
        return view('pages.product');
    }

    public function register() {
        return view('pages.register');
    }
}
