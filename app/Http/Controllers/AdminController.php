<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.home', [
            'categoryCount' => Category::count(),
            'productCount' => Product::count(),
            'orderCount' => Order::count(),
            'userCount' => User::where('usertype', '0')->count()
        ]);
    }

    public function view_category()
    {

        return view('admin.category.addCategory');
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('message', 'Category added successfully');
    }

    public function show_category()
    {
        $allCategory = Category::all();
        return view('admin.category.showCategory', compact('allCategory'));
    }

    public function edit_category($id)
    {

        $category = Category::find($id);
        return view('admin.category.editCategory', compact('category'));
    }

    public function update_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('message', 'Category updated successfully');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/show_category')->with('message', 'Category deleted successfully');
    }


    /////////////////////////////////////////

    public function view_product()
    {
        $allcategory = Category::all();
        return view('admin.product.addProduct', compact('allcategory'));
    }

    public function add_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->discount_price = $request->discount_price;
        if ($request->hasFile('image')) {
            $imageName = time() .'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/product', $imageName);
            $product->image = 'product/' . $imageName;
        }
        $product->save();
        return redirect()->back()->with('message', 'Product added successfully');
    }

    public function show_product()
    {
        $allproduct = Product::all();
        return view('admin.product.showProduct', compact('allproduct'));
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $allcategory = Category::all();
        return view('admin.product.editProduct', compact('product', 'allcategory'));
    }

    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->discount_price = $request->discount_price;
        $image = $product->image;
        if (!empty($request->file('image'))) {
            Storage::delete($image);
            $image = $request->file('image')->store('public/productImg');
        }
        $product->image = $image;
        $product->save();
        return redirect()->back()->with('message', 'Product Updated successfully');
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect('/show_product')->with('message', 'Product Deleted successfully');
    }


    public function order()
    {
        $order = Order::all();
        return view('admin.product.order', compact('order'));
    }

    public function delivered($id)
    {

        $order = Order::find($id);
        if ($order->delivery_status != "delivered") {
            $order->delivery_status = "delivered";
        }
        if ($order->payment_status != "paid") {
            $order->payment_status = "paid";
        }
        $order->save();
        return redirect()->back()->with('message', 'Product Delivered Successfully');
    }

    public function search_order(Request $request)
    {
        $search = $request->search;
        $order = Order::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->orWhere('phone', 'LIKE', "%$search%")->orWhere('product_title', 'LIKE', "%$search%")->orWhere('payment_status', 'LIKE', "%$search%")->orWhere('delivery_status', 'LIKE', "%$search%")->get();

        return view('admin.product.order', compact('order'));
    }
}
