<?php

namespace App\Repositories;

use Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Contracts\OrderContract;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
class OrderRepository extends BaseRepository implements OrderContract
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function storeOrderDetails($params)
    {
        $order = new Order();
        $order->order_number            =  'ORD-' . strtoupper(uniqid());
        $order->order_status            =  'pending';
        $order->order_grand_total       =  Cart::getSubTotal();
        $order->order_item_count        =  Cart::getTotalQuantity();
        $order->order_name              =  $params['name'];
        $order->order_address           =  $params['address'];
        $order->order_email             =  $params['email'];
        $order->order_city              =  $params['city'];
        $order->order_post_code         =  $params['post_code'];
        $order->order_tel               =  $params['phone_number'];
        $order->order_notes             =  $params['notes'];
        $order->order_payment_status    =  0;
        $order->order_payment_method    =  null;
        $order->user_id                 = auth()->user()->id;
        $order->order_shipping          = $params['shipping'];

        $order->save();

        if ($order) {

            $items = Cart::getContent();

            // loop earch item in array items
            foreach ($items as $item) {
                // A better way will be to bring the product id with the cart items
                // you can explore the package documentation to send product id with the cart
                $product = Product::where('product_name', $item->name)->first();

                $orderItem = new OrderItem([
                    'order_item_quantity'      => $item->quantity,
                    'product_id'               => $product->product_id,
                    'order_item_price'         => $item->price,
                    'order_id'                 => $order->id
                ]);
                
                $order->items()->save($orderItem);
            }
            // TODO: SEND EMAIL
            if (isset($order->order_email)) {
                Mail::to($order->order_email)->send(new OrderMail(
                    $order,$items,$product
                ));
            }
        }

        return $order;
    }
}