<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use Stripe\Charge;
use App\Models\Cart;
use App\Models\User;
use Stripe\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('home.userpage', compact('product'));
    }


    public function redirect()
    {
        $userType = Auth::user()->usertype;
        if ($userType == '1') {

            return redirect()->route('dashboard.home');
        } else {
            return redirect()->route('homepage');
        }
    }

    public function product_details($id)
    {
        if (Auth::id()) {
            $product = Product::find($id);
            return view('home.product.productDetails', compact('product'));
        } else {
            return redirect('/login');
        }
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart();
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = $request->quantity;
            if (!empty($product->discount_price)) {
                $cart->price = ($product->price - ($product->price * $product->discount_price) / 100) * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            // return $cart->price;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->user_id = $user->id;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $user = Auth::user()->id;
            $CartOfUser = Cart::where('user_id', '=', $user)->get();
            return view('home.product.showCart', compact('CartOfUser'));
        } else {
            return redirect('/login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/show_cart')->with('message', 'Product Deleted Successfully');
    }

    public function order()
    {
        $user = Auth::user()->id;
        $order = Order::where('user_id', '=', $user)->get();
        return view('home.product.order', compact('order'));
    }

    public function product()
    {
        $product = Product::all();
        return view('home.product.all-product', compact('product'));
    }

    public function contact()
    {
        return view('home.contact');
    }


    public function cash_order()
    {
        $user = Auth::user()->id;
        $CartOfUser = Cart::where('user_id', '=', $user)->get();
        foreach ($CartOfUser as $data) {
            $product = Product::find($data->product_id);
            if ($product->quantity < $data->quantity) {
                return redirect()->back()->with('warning', 'product' . $data->product_title . ' is not available in stock');
            }
            $product->quantity -= $data->quantity;
            $product->save();

            // create order
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->user_id = $data->user_id;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $data->delete();
        }
        if ($CartOfUser->count() == 0) {
            return redirect()->back()->with('warning', 'There is no products to order');
        }
        return redirect()->back()->with('message', 'We Received Your Order And We Will Connect With You Soon');
    }

    public function card($totalPrice)
    {
        $user = Auth::user()->id;
        $CartOfUser = Cart::where('user_id', '=', $user)->get();
        if ($CartOfUser->count() == 0) {
            return redirect()->back()->with('warning', 'There is no products to order');
        }
        return view('home.product.card', compact('totalPrice'));
    }

    public function payWithCard(Request $request, $totalPrice)
    {

        $user = Auth::user()->id;
        $CartOfUser = Cart::where('user_id', '=', $user)->get();
        foreach ($CartOfUser as $data) {
            $product = Product::find($data->product_id);
            if ($product->quantity < $data->quantity) {
                return redirect()->back()->with('warning', 'product' . $data->product_title . ' is not available in stock');
            }
            $product->quantity -= $data->quantity;
            $product->save();

            // create order
            $order = new Order();
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->user_id = $data->user_id;
            $order->product_id = $data->product_id;
            $order->payment_status = 'paid';
            $order->delivery_status = 'processing';
            $order->save();
            $data->delete();
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalPrice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks For Payment"
        ]);

        return redirect()->back()->with('message', 'Payment Successfully');
    }
}
