<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSpecification;

class ProductSpecificationController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('Product_specifications.Create', compact('product'));
    }

    // Store the specifications in the database
    public function store(Request $request, $productId)
    {
        $request->validate([
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'display' => 'nullable|string',
            'processor' => 'nullable|string',
            'ram' => 'nullable|string',
            'storage' => 'nullable|string',
            'battery' => 'nullable|string',
            'os' => 'nullable|string',
            'camera' => 'nullable|string',
            'connectivity' => 'nullable|string',
            'weight' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'warranty' => 'nullable|string',
            'included_items' => 'nullable|string',
        ]);

        $specifications = new ProductSpecification($request->all());
        $product = Product::findOrFail($productId);
        $product->specifications()->save($specifications);

        return redirect()->route('showall_product.admin', $productId)->with('success', 'Product specifications added successfully!');
    }

    // Show the form to edit existing specifications for a product
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $specifications = $product->specifications;
        return view('Product_specifications.Edit', compact('product', 'specifications'));
    }

    // Update the specifications in the database
    public function update(Request $request, $productId)
    {
        $request->validate([
            'brand' => 'nullable|string',
            'model' => 'nullable|string',
            'display' => 'nullable|string',
            'processor' => 'nullable|string',
            'ram' => 'nullable|string',
            'storage' => 'nullable|string',
            'battery' => 'nullable|string',
            'os' => 'nullable|string',
            'camera' => 'nullable|string',
            'connectivity' => 'nullable|string',
            'weight' => 'nullable|string',
            'dimensions' => 'nullable|string',
            'warranty' => 'nullable|string',
            'included_items' => 'nullable|string',
        ]);

        $specifications = ProductSpecification::where('product_id', $productId)->first();
        $specifications->update($request->all());

        return redirect()->route('showall_product.admin', $productId)->with('success', 'Product specifications updated successfully!');
    }
}
