<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->get('keywords');
        if ($keywords) {
            dd($keywords);
        }

        $productCategory = ProductCategory::latest()->paginate(10);
        return view('backend.product-categories.index', compact('productCategory'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(new ProductCategory());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductCategoryRequest  $productCategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $productCategoryRequest)
    {
        return $this->update($productCategoryRequest, new ProductCategory());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('backend.product-categories.create-or-update', ['item' => $productCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductCategoryRequest  $ProductCategoryRequest
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $ProductCategoryRequest, ProductCategory $productCategory)
    {
        if ($productCategory->exists) {
            $productCategory->update($ProductCategoryRequest->all());
        } else {
            $productCategory = new ProductCategory($ProductCategoryRequest->all());
            $productCategory->save();
        }

        return redirect()->route('backend.product-categories.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('backend.product-categories.index')->with('success', 'Xóa thành công');
    }


}
