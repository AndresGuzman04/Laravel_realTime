<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeStatusOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ChangeStatusOrder';

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
        info ('Change status order');
        $confirmed = confirm('Vamos a crear un order nuevo');
        if (!$confirmed) {
            return;
        }
        $order = new Order();
        $order->save();
        $status = 'pending';
        while ($status != 'exit') {
            $status = select(
                label: 'A que estado cambiamos el order',
                options: ['pending', 'processing', 'completed', 'declined', 'exit'] 
        );

        if ($status === 'exit') {
            return;
        }

        $order ->status = $status;
        $order ->save();
        event(new OrderUpdated());
        }
    }
}
