<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    public function index()
    {
        return view('Admin.Products.index');
    }

    public function list()
    {
        $data = Product::get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $edit = '<a href="' . route('products.edit', $data->id) . '" class="btn btn-primary"><i class="fe fe-edit-2"></i></a>';
                $delete = '<a href="' . route('products.destroy', $data->id) . '" class="btn btn-primary" onclick="return confirm(\'Are you sure you want to delete this user?\')"><i class="fe fe-trash-2"></i></a>';

                return $edit . ' ' . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('Admin.Products.create');
    }

    public function store(ProductsStoreRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('Admin.Products.edit', compact('product'));
    }

    public function update(ProductsStoreRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock_quantity = $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
