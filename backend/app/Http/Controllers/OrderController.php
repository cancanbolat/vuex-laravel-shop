<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Repositories\Generic\GenericRepository;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $model;
    protected $apiResponseService;

    public function __construct(Order $order, ApiResponseService $apiResponseService)
    {
        $this->model = new GenericRepository($order);
        $this->apiResponseService = $apiResponseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(DB::raw('orders.id as orderId, products.id as productId'), 'orders.*', 'products.*')
            ->get();

        return $this->apiResponseService->apiResponse($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jsonRequest = json_decode(json_encode($request->input('data')), true);

        foreach ($jsonRequest as $value) {

            //$response = $this->model->bulkInsert(
                //$jsonRequest->get($this->model->getModel()->fillable)
            //); //save order

        DB::insert($value);

            Basket::truncate();
            //if ($value->validated()) {
                //Basket::findOrFail($request->basket_id)->delete(); //delete basket
            //} else {
                //return $this->apiResponseService->apiResponse($response);
            //}
        }

        return $this->apiResponseService->apiResponse("ok");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->apiResponseService->apiResponse($this->model->show($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderStoreRequest $request, $id)
    {
        $request->validated();

        $response = $this->model->update(
            $request->only($this->model->getModel()->fillable), $id
        ); //update order

        return $this->apiResponseService->apiResponse($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: write clean code
        $result = $this->model->delete($id);
        return $this->apiResponseService->apiResponse(
            $result, $result == 1 ? $id : $id . " not found"
        );
    }
}
