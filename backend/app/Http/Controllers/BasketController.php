<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    //TODO: use generic repository

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basketItems = DB::table('basket')
            ->join('products', 'basket.product_id', '=', 'products.id')
            ->select('basket.*', 'products.*', DB::raw('basket.id as basketId'))
            ->get();

        $totalCount = 0;
        foreach ($basketItems as $basketItem) {
            $totalCount += ($basketItem->price * $basketItem->quantity);
        }

        $data = [
            "basket" => $basketItems,
            "count" => Basket::count(),
            "totalCount" => $totalCount
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $basket = new Basket();
        $existBasket = Basket::where('product_id', $request->product_id);
        //dd("xx: ". $existBasket->count());

        if ($existBasket->count() > 0) {
            $basket->quantity = $request->quantity;
            $basket->update();
            return response()->json(Basket::count(), 200);
        }

        $basket->product_id = $request->product_id;
        $basket->quantity = $request->quantity;
        $basket->save();

        $basketItems = DB::table('basket')
            ->join('products', 'basket.product_id', '=', 'products.id')
            ->where('product_id', $request->product_id)
            ->first();

        $data = [
            "basket" => $basketItems,
            "count" => Basket::count()
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Basket::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existBasket = Basket::find($id);

        if ($existBasket->count() > 0) {
            $existBasket->quantity = $request->qty;
            $existBasket->save();

            $basketItems = DB::table('basket')
                ->join('products', 'basket.product_id', '=', 'products.id')
                ->where('product_id', $existBasket->product_id)
                ->first();



            $data = [
                "basket" => $basketItems,
                "count" => Basket::count()
            ];
        }

        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Basket::find($id)->delete();

        $data = [
            "id" => $id
        ];

        return response()->json($data, 200);
    }
}
