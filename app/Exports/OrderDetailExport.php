<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Services\OrderService;

class OrderDetailExport implements FromView {

    protected $a;

    public function __construct($order) {
        $this->a = $order;
        //dd($this->a);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View {
        $orderService = new OrderService;
        $details = $orderService->detail($this->a);
        $info = $orderService->infoDetail($this->a);
        libxml_use_internal_errors(true);
        return view('report.order_detail_excel', [
            'detail' => $details,
            'info' => $info
        ]);
    }

}
