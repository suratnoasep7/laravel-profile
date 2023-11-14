<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'nama_produk' => [
                'string',
                'required',
                'unique:product'
            ],
            'harga_produk' => [
                'integer',
                'required',
            ],
            'deskripsi_produk' => [
                'required',
            ],
            'file' => [
                'file',
                'required',
                'mimes:jpg,jpeg,bmp,png'
            ],
            'id_kategori_produk' => [
                'integer',
                'exists:category,id',
                'required',
            ],
        ];
    }
}
