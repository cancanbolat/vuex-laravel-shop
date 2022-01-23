<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Create product
     *
     * @param  mixed $data
     * @return void
     */
    public function save($data)
    {
        $product = new $this->product;

        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->photo_url = $data["photo_url"];
        $product->price = $data["price"];

        $product->save();
        return $product->fresh();
    }

    /**
     * Get all products
     *
     * @return Product
     */
    public function getAll()
    {
        return $this->product->get();
    }

    /**
     * Get product by id
     *
     * @param  mixed $id
     * @return Product
     */
    public function getById($id)
    {
        return $this->product->whereId($id)->get();
    }

    /**
     * Update product
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return Product
     */
    public function update($data, $id)
    {
        $product = $this->product->find($id);

        $product->name = $data["name"];
        $product->description = $data["description"];
        $product->photo_url = $data["photo_url"];
        $product->price = $data["price"];

        $product->update();
        return $product;
    }

    /**
     * Delete product
     *
     * @param  mixed $id
     * @return bool
     */
    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return true;
    }
}
