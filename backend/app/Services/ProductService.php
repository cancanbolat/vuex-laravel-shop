<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Validations\ProductCreateValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class ProductService
{
    protected $productRepository;
    protected $product;

    public function __construct(ProductRepository $productRepository, Product $product)
    {
        $this->productRepository = $productRepository;
        $this->product = $product;
    }


    /**
     * Create product
     *
     * @param  mixed $data
     * @return Product
     */
    public function saveProduct($data)
    {
        $product = $this->product->where("name")->first();
        if ($product) {
            throw new InvalidArgumentException("Product already exists");
        }

        $validator = new ProductCreateValidator($data);
        if ($response = $validator->validate()) {
            return $response;
        }

        $result = $this->productRepository->save($data);

        return $result;
    }

    /**
     * Update product
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return Product
     */
    public function updateProduct($data, $id)
    {
        $validator = new ProductCreateValidator($data);
        if ($response = $validator->validate()) {
            return $response;
        }

        DB::beginTransaction();

        try {
            $product = $this->productRepository->update($data, $id);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::info($ex->getMessage());

            throw new InvalidArgumentException('Update error');
        }

        DB::commit();

        return $product;
    }

    /**
     * Delete product by id
     *
     * @param  mixed $id
     * @return bool
     */
    public function deleteProduct($id)
    {
        DB::beginTransaction();

        try {
            $product = $this->productRepository->delete($id);
        } catch (Exception $ex) {
            DB::rollBack();
            Log::info($ex->getMessage());

            throw new InvalidArgumentException('Delete error');
        }

        DB::commit();

        return true;
    }

    /**
     * Get product by id
     *
     * @param  mixed $id
     * @return Product
     */
    public function findProduct($id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * Get all products
     *
     * @return Product
     */
    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductsWithOrder()
    {
        $products = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.*', DB::raw('orders.id as orderId'))
            ->get();
        
        return $products;
    }
}
