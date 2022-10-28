<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Successfully Inserted']);
        // return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function enable(Product $product)
    {
        $product->withTrashed()->restore();
        return redirect()->route('products.index');
    }
    // add datatable method
    public function productDatatable()
    {
        return Datatables()->of(Product::allWithTrashed())
            ->addColumn('action', function ($product) {
                $button = '<a href="' . route('products.edit', $product->id) . '" class="text-muted"><i class="fa fa-edit text-muted"></i></a>';

                if ($product->deleted_at) {
                    $button .= '<form action="' . url('products/enable', $product->id) . '" method="post" style="display:inline-block">
                        ' . csrf_field() . '
                        <button type="submit" style="background-color: transparent;"><i class="fa fa-check text-success"></i></button>
                    </form>';
                } else {
                    $button .= '<form action="' . url('products', $product->id) . '" method="post" style="display:inline-block">
                        ' . csrf_field() . '
                        ' . method_field('delete') . '
                        <button type="submit" style="background-color: transparent;"><i class="fa fa-trash text-danger"></i></button>
                    </form>';
                }
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
