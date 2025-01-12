<div>
    <div class="mt-6 grow sm:mt-8 lg:mt-0">
        <div
            class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Order Status</h3>

            <ol class="relative ms-3 border-s border-gray-200 dark:border-gray-700">
                <li class="mb-10 ms-6">
                    @if ($order->status === 'cancelled')
                        <span
                            class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full
                            bg-red-100 ring-8 ring-white dark:bg-red-700 dark:ring-red-800">
                            <svg class="h-4 w-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </span>
                    @elseif ($order->status === 'pending')
                        <span
                            class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full
                            bg-yellow-100 ring-8 ring-white dark:bg-yellow-700 dark:ring-yellow-800">
                            <svg class="h-4 w-4 text-yellow-600 dark:text-yellow-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </span>
                    @elseif($order->status === 'processing')
                        <span
                            class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full
                            bg-blue-100 ring-8 ring-white dark:bg-blue-700 dark:ring-blue-800">
                            <svg class="h-4 w-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </span>
                    @elseif ($order->status === 'complete')
                        <span
                            class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full
                            bg-green-100 ring-8 ring-white dark:bg-green-700 dark:ring-green-800">
                            <svg class="h-4 w-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </span>
                    @else
                        <span
                            class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full
                            bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">

                        </span>
                    @endif
                    <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">
                        {{ ucfirst($order->status) }} el
                        {{ \Carbon\Carbon::parse($order->created_at)->translatedFormat('j \\de F \\de Y') }}</h4>
                </li>





            </ol>


        </div>
    </div>
</div>