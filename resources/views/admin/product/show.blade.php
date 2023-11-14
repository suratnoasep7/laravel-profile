@extends('layouts.admin')

@section('styles')
<style type="text/css">
    .img-responsive {
        width: 64px;
        height: 64px;
    }
    .table td, .table th {
        width: 50%;
    }
</style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.id') }}
                        </td>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.kategori_produk') }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.nama_produk') }}
                        </td>
                        <td>
                            {{ $product->nama_produk }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.deskripsi_produk') }}
                        </td>
                        <td>
                            {!! $product->deskripsi_produk !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.harga_produk') }}
                        </td>
                        <td>
                            Rp. {{ number_format($product->harga_produk,0,'.',',') }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ trans('cruds.product.fields.gambar_produk') }}
                        </td>
                        <td>
                            <img src="{{ asset("upload/".$product->gambar_produk) }}" class="img-responsive" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection