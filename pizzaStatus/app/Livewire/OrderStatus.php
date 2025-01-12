<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\OrderUpdate;


class OrderStatus extends Component
{
    public $order;
    public function mount(){
        $this->order = Order::orderBy('id', 'desc')->first();
    }
    public function render() {
        return view('livewire.order-status');
    }
    #[On('echo:my-channel,OrderUpdate')]

    public function updateOrder(){
        $this->order = Order::orderBy('id', 'desc')->first();
    }
}
