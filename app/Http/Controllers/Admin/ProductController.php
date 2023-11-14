<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::with('category')->get();

        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::get();

        $category = Category::get();

        return view('admin.product.create', compact('product','category'));
    }

    public function store(StoreProductRequest $request)
    {

        if ($request->validated()) {
            $fileName = time().'.'.$request->file->extension();  
     
            $request->file->move(public_path('upload'), $fileName);

            $product = Product::create(
                [
                    'gambar_produk' => $fileName, 
                    'nama_produk' => $request->nama_produk, 
                    'deskripsi_produk' => $request->deskripsi_produk,
                    'harga_produk' => $request->harga_produk,
                    'id_kategori_produk' => $request->id_kategori_produk
                ]
            );
        }

        return redirect()->route('admin.product.index')->with('message','Data Added Successfully');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product = Product::get();

        $data = Product::findOrFail($id);

        $category = Category::get();

        return view('admin.product.edit', compact('product', 'id', 'data', 'category'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {

        if ($request->validated()) { 
            if (empty($request->file)) {
            
                $product->update(
                    [
                        'nama_produk' => $request->nama_produk, 
                        'deskripsi_produk' => $request->deskripsi_produk,
                        'harga_produk' => $request->harga_produk,
                        'id_kategori_produk' => $request->id_kategori_produk
                    ]
                );
            } else {
                $fileName = time().'.'.$request->file->extension();  
     
                $request->file->move(public_path('upload'), $fileName);
                $product->update(
                    [
                        'gambar_produk' => $fileName, 
                        'nama_produk' => $request->nama_produk, 
                        'deskripsi_produk' => $request->deskripsi_produk,
                        'harga_produk' => $request->harga_produk,
                        'id_kategori_produk' => $request->id_kategori_produk
                    ]
                );
            }
        }
        return redirect()->route('admin.product.index')->with('message','Data Updated Successfully');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category');

        return view('admin.product.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return redirect()->route('admin.product.index')->with('message','Data Deleted Successfully');
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
