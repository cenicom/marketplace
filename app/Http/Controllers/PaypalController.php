<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use App\Mail\OrderPaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    //
    public function getExpressCheckout($orderId)
    {
        # code...

        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
    }

    public function getExpressCheckoutSuccsss(Request $request, $orderId)
    {
        # code...
        $provider = new ExpressCheckout;
        $token = $request->token;
        $payerId = $request->PayerID;
        $checkoutData = $this->checkoutData($orderId);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper(
            $response['ACK']),
            ['SUCCESS','SUCCESSWITHWARINIG'])) {
            # code...
            $payment_status = $provider->doExpressCheckoutPayment(
                $checkoutData,
                $token,
                $payerId
            );

            $status = $payment_status[
                'PAYMENTINFO_0_PAYMENTSTATUS'
            ];

            if (in_array($status,[
                'Completed', 'Processed'
            ])) {
                # code...
                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();

                Mail::to($order->user->email)->send(new OrderPaid($order));

                Cart::session(auth()->id())->clear();

                return redirect()->route('shop.index')->withMessage('Pago Exitoso');
            }
        }

        return redirect()->route('shop.index')->withErrors('Pago Fallido');
    }

    public function CancelPage()
    {
        # code...
    }

    public function checkoutData($orderId)
    {
        # code...
        $cart = Cart::session(auth()->id());

        $cartItems = array_map(function($item){
                return [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'qty' => $item['quantity']
                ];
            },
            $cart->getContent()->toarray()
        );

        $checkoutData = [
            'items' => $cartItems,
            'invoice_id' => uniqid(),
            'invoice_description' => "descripción de la Orden de Compra",
            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'total' => $cart()->getTotal()
        ];

        return $checkoutData;

    }
}
