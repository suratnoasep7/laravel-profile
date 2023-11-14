<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'id'                     => 1,
                'nama_produk'            => 'Test 1',
                'deskripsi_produk'       => '<p>tes</p>',
                'harga_produk'           => 10000,
                'gambar_produk'          => '1653382012.jpg',
                'created_at'             => date('Y-m-d H:i:s'),
                'id_kategori_produk'     => 1
            ],
            [
                'id'                     => 2,
                'nama_produk'            => 'Test 2',
                'deskripsi_produk'       => '<p>tes</p>',
                'harga_produk'           => 10000,
                'gambar_produk'          => '1653382012.jpg',
                'created_at'             => date('Y-m-d H:i:s'),
                'id_kategori_produk'     => 1
            ],
            [
                'id'                     => 3,
                'nama_produk'            => 'Test 3',
                'deskripsi_produk'       => '<p>tes</p>',
                'harga_produk'           => 10000,
                'gambar_produk'          => '1653382012.jpg',
                'created_at'             => date('Y-m-d H:i:s'),
                'id_kategori_produk'     => 1
            ],
            [
                'id'                     => 4,
                'nama_produk'            => 'Test 4',
                'deskripsi_produk'       => '<p>tes</p>',
                'harga_produk'           => 10000,
                'gambar_produk'          => '1653382012.jpg',
                'created_at'             => date('Y-m-d H:i:s'),
                'id_kategori_produk'     => 1
            ],
            [
                'id'                     => 5,
                'nama_produk'            => 'Test 5',
                'deskripsi_produk'       => '<p>tes</p>',
                'harga_produk'           => 10000,
                'gambar_produk'          => '1653382012.jpg',
                'created_at'             => date('Y-m-d H:i:s'),
                'id_kategori_produk'     => 1
            ],
        ];

        Product::insert($product);
    }
}
