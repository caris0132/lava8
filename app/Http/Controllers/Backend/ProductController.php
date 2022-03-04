<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = request()->input('keywords');
        if ($keywords) {
            $products = Product::where('name', 'like', "%$keywords%")->latest()->paginate(10);
        } else {
            $products = Product::latest()->paginate(10);
        }


        return view('backend.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $action = URL::route('backend.products.store');
        return view('backend.products.create_or_update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = new Product($request->all());

        if ($request->image) {
            $imageName = Carbon::now()->timestamp. '-' . $request->image->getClientOriginalName();
            $request->image->move('products', $imageName);
            $product->image = $imageName;
        }

        $product->save();


        return redirect()->route('backend.products.index')->with('success', "Update  thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('backend.products.create_or_update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();
        } catch (\Throwable $th) {
            return redirect()->route('backend.products.index')->with('error', 'Delete fally');
        }
        return redirect()->route('backend.products.index')->with('success', 'Delete successfully');
    }
}
