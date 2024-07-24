<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Cart;
class OrderController extends Controller
{

    public function generateRandomString($length = 10)
    {
        return rand(100000, 999999);
    }


    public function confirmOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'product_ids' => 'required|array',
            'quantity' => 'required|array',
            'product_id' => 'exists:products,id',
        ]);

        // Vérification du stock
        $items = Cart::getContent();
        foreach ($items as $row) {
            $product = Product::findOrFail($row->id);
            if ($product->quantity < $row->quantity) {
                $request->session()->flash('message', 'Nous sommes désolés mais le produit "' . $row->name . '" ne dispose pas d\'un stock suffisant pour satisfaire votre demande. Il ne nous reste plus que ' . $product->quantity . ' exemplaires disponibles.');
                return back();
            }
        }
        $user = Auth::user();

        $total = 0;
        $orderDetails = [];

        $orderRefId = $this->generateRandomString(8);
     //  $product = Product::findOrFail($request->id);

        $order = new Order([
            'order_ref_id' => $orderRefId,
            // 'reference' => $orderRefId,
            'reference' => strtoupper(Str::random(8)),
            'user_id' => auth()->user()->id,
           'product_id' => $request->product_id,
            'order_at' => now(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'pick' => $request->expedition === 'retrait',
            'order_amount' => $total,
            'total' => $total,
        ]);

        //  $order->save();
        $user->products()->save($order);




        // Mise à jour du stock
     //  $product = Product::findOrFail($request->id);
     //   $product->quantity -= $request->quantity;
     //  $product->save();



     //   $order->orderItems()->createMany($orderDetails);

        $orderDetails['total'] = $total;
        session()->forget('cart');

        return redirect()->route('thank-you', ['orderRefId' => $orderRefId]);
    }


}