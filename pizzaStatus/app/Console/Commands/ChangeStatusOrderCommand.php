<?php

namespace App\Console\Commands;

use App\Events\OrderUpdate;
use App\Models\Order;
use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\select;

class ChangeStatusOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'changestatusorder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        info('Change status order');
        $confirmed = confirm('Vamos a crear un order nuevo');
        if (!$confirmed) {
            return;
        }
        $order = new Order();
        $order->save();
        $status = "pending";
        while ($status != 'exit') {
            $status = select(
                label: 'A que estado cambiamos el order?',
                options: ['pending', 'processing', 'complete', 'cancelled', 'exit']
            );

            if ($status == 'exit') {
                break;
            }
            $order->status =  $status;
            $order->save();
            event(new OrderUpdate());
        }
    }
}