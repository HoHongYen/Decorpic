<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy("created_at", "desc")->paginate(3);
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            "name" => "required|min:1|max:50",
            "description" => "nullable|min:1|max:250",
            "price" => "required",
            "quantity" => "required",
            "image" => "image"
        ]);

        $slug = strtolower(str_replace(" ", "-", $validated["name"]));
        $validated["slug"] = $slug;

        if (request()->has("image")) {
            $imagePath = request()->file("image")->store("products", "public");
            $validated["image"] = $imagePath;
        }

        Product::create($validated);

        return redirect()->route("products.index")->with("success", "Product created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product)
    {
        $validated = request()->validate([
            "name" => "required|min:1|max:50",
            "description" => "nullable|min:1|max:250",
            "price" => "required",
            "quantity" => "required",
            "image" => "image"
        ]);

        $slug = strtolower(str_replace(" ","-", $validated["name"]));
        $validated["slug"] = $slug;

        if (request()->has("image")) {
            $imagePath = request()->file("image")->store("products", "public");
            $validated["image"] = $imagePath;

            Storage::disk('public')->delete($$product->image ?? ''); // xoa anh cu neu co
        }

        Storage::delete("public/" . $product->image);

        $product->update($validated);

        return redirect()->route("products.index")->with("success","Cập nhật sản phẩm thành công.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Storage::disk('public')->delete($product->image ?? ''); // xoa anh neu co
        return redirect()->route("products.index")->with("success","Xóa sản phẩm thành công.");
    }
}
