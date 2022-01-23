<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use App\Repositories\Generic\GenericRepository;
use App\Services\ApiResponseService;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    protected $product;
    protected $apiResponseService;

    public function __construct(
        Product $product, ApiResponseService $apiResponseService
    ) {
        $this->product = new GenericRepository($product);
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->apiResponseService->apiResponse($this->product->getAll());
    }

    /**
     * Display a listing of the products and orders
     *
     * @return \Illuminate\Http\Response
     */
    public function getProductsWithOrder()
    {
        $products = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.*', DB::raw('orders.id as orderId'))
            ->get();

        return $this->apiResponseService->apiResponse($products, "Total product count: ".$products->count());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $request->validated();

        $response = $this->product->create(
            $request->only($this->product->getModel()->fillable)
        ); //save product

        return $this->apiResponseService->apiResponse($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->apiResponseService->apiResponse($this->product->show($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $request->validated();

        $response = $this->product->update(
            $request->only($this->product->getModel()->fillable), $id
        ); //update product

        return $this->apiResponseService->apiResponse($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->apiResponseService->apiResponse($this->product->delete($id));
    }
}
