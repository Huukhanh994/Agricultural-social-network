<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use Carbon;
class OrderController extends BaseController
{
    protected $orderRepository;
    protected $payPal;

    public function __construct(PayPalService $payPal)
    {
        $this->payPal = $payPal;
    }
    public function index($id)
    {
        $product = Post::with('categories')->first();
        $dateToday = Carbon\Carbon::now();

        return view('site.orders.index',compact('product', 'dateToday'));
    }
    public function store(Request $request)
    {
        $order = Order::create([
            'order_number'        => 'ORD-' . strtoupper(uniqid()),
            'order_status'        => 'pending',
            'order_grand_total'   => $request->get('price'),
            'order_item_count'    => $request->get('quantity'),
            'order_name'          => $request->get('name'),
            'order_email'         => $request->get('email'),
            'order_address'       => $request->get('address'),
            'order_city'          => $request->get('city'),
            'order_tel'           => $request->get('tel'),
            'order_notes'         => $request->get('note'),
            'user_id'                   => auth()->user()->id,
            'payment_status'            => 0,
            'payment_method'            => null,
        ]);

        if($order){
            switch ($request->get('product_type')) {
                case 'NN':
                    $order_item = OrderItem::create([
                        'order_item_quantity' => $request->get('quantity'),
                        'order_item_price'   => $request->get('price'),
                        'product_id' => $request->get('product_id'),
                        'order_id' => $order->order_id
                    ]);
                    break;
                case 'TS':
                    $order_item = OrderItem::create([
                        'order_item_quantity' => $request->get('quantity'),
                        'order_item_price'   => $request->get('price'),
                        'product_id' => $request->get('product_id'),
                        'order_id' => $order->order_id
                    ]);
                    break;
                case 'LN':
                    $order_item = OrderItem::create([
                        'order_item_quantity' => $request->get('quantity'),
                        'order_item_price'   => $request->get('price'),
                        'product_id' => $request->get('product_id'),
                        'order_id' => $order->order_id
                    ]);
                    break;
                case 'TA':
                    $order_item = OrderItem::create([
                        'order_item_qty_food' => $request->get('quantity'),
                        'order_item_price'   => $request->get('price'),
                        'product_id' => $request->get('product_id'),
                        'order_id' => $order->order_id
                    ]);
                    break;
                case 'TTB':
                    $order_item = OrderItem::create([
                        'order_item_qty_insecticide' => $request->get('quantity'),
                        'order_item_price'   => $request->get('price'),
                        'product_id' => $request->get('product_id'),
                        'order_id' => $order->order_id
                    ]);
                    break;
            }
            $order_item->save();
            $this->payPal->processPayment($order);
        }
        return redirect()->back()->with("success","Order not placed");
    }

    public function processPayment($order)
    {
        // Add shipping amount if you want to charge for shipping
        $shipping = sprintf('%0.2f', 0);
        // Add any tax amount if you want to apply any tax rule
        $tax = sprintf('%0.2f', 0);

        // Create a new instance of Payer class
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        // Adding items to the list
        $items = array();
        foreach ($order->items as $item) {
            $Items[$item->order_item_id] = new Item();
            $orderItems[$item->order_item_id]->setName($item->product->product_name)
                ->setCurrency(config('settings.currency_code'))
                ->setQuantity($item->order_item_quantity)
                ->setPrice(sprintf('%0.2f', $item->order_item_price));

            array_push($items, $orderItems[$item->order_item_id]);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        // Setting Shipping Details
        $details = new Details();
        $details->setShipping($shipping)
            ->setTax($tax)
            ->setSubtotal(sprintf('%0.2f', $order->order_grand_total));

        // Setup currency payment
        // Create chargeable amout
        $amount = new Amount();
        $amount->setCurrency(config('settings.currency_code'))
        ->setTotal(sprintf('%0.2f', $order->order_grand_total))
            ->setDetails($details);


        // Creating a transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($order->user->full_name)
            ->setInvoiceNumber($order->order_number);

        // This class takes two values, return URL (after successful completion where PayPal will redirect the user) and the cancel URL (if the user cancels the payment where he should be redirected).
        // Setting up redirection urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('checkout.orders.complete'))
        ->setCancelUrl(route('site.orders.index'));

        // Creating payment instance
        $payment = new Payment();
        $payment->setIntent("sale")
        ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {

            $payment->create($this->payPal);
        } catch (PayPalConnectionException $exception) {
            echo $exception->getCode(); // Prints the Error Code
            echo $exception->getData(); // Prints the detailed error message
            exit(1);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();

        header("Location: {$approvalUrl}");
        exit;
    }
    public function complete(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->order_status = 'processing';
        $order->order_payment_status = 1;
        $order->order_payment_method = 'PayPal - ' . $status['salesId'];
        $order->save();

        // Cart::clear();
        return view('site.pages.success', compact('order'));
    }
}
