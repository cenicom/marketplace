<?php

namespace App\Http\Livewire\Shop;

use App\Mail\ShopActivated;
use App\Mail\ShopActivationRequest;
use Livewire\Component;
use TCG\Voyager\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterComponent extends Component
{
    public $name, $description;

    public function render()
    {
        return view('livewire.shop.register-component')
        ->extends('layouts.app')
        ->section('content');
    }

    public function registerShop()
    {
        # code...
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];

        $shop = auth()->user()->shop()->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $admin = User::whereHas('role', function($q){
            $q->where('name', 'admin');
        })
        ->get();

        Mail::to($admin)->send(new ShopActivationRequest($shop));

        return redirect()->route('shop.index');
    }
}
