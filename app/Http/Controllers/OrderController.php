<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $total = 0;
        foreach ($cart as $id => $details) {
            if ($product = $products->get($id)) {
                $total += $product->price * $details['quantity'];
            }
        }
        return view('cart', compact('cart', 'products', 'total'));
    }

    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = ['quantity' => 1];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function updateCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = max(1, (int) $request->quantity);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }

    public function removeFromCart(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home');
        }

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $total = 0;
        foreach ($cart as $id => $details) {
            if ($product = $products->get($id)) {
                $total += $product->price * $details['quantity'];
            }
        }

        return view('checkout', compact('cart', 'products', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home');
        }

        $validated = $request->validate([
            'shipping_address' => ['required', 'string', 'max:500'],
            'phone' => ['required', 'string', 'max:20'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'payment_proof' => ['required', 'file', 'image', 'max:2048'],
        ]);

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        $total = 0;
        $items = [];
        foreach ($cart as $id => $details) {
            if ($product = $products->get($id)) {
                $subtotal = $product->price * $details['quantity'];
                $total += $subtotal;
                $items[] = [
                    'product_id' => $product->id,
                    'quantity' => $details['quantity'],
                    'price' => $product->price,
                ];
            }
        }

        $paymentProofPath = $request->file('payment_proof')->store('payment-proofs', 'public');

        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'total' => $total,
            'shipping_address' => $validated['shipping_address'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'],
            'payment_proof' => $paymentProofPath,
        ]);

        $order->items()->createMany($items);

        session()->forget('cart');

        return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat');
    }

    public function index()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}
