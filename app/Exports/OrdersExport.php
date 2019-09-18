<?php

namespace App\Exports;

use App\Models\Order;
//use App\Models\OrderDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView {

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View {
        libxml_use_internal_errors(true);
        return view('report.order_excel', [
            'order' => Order::all()
        ]);
    }

}
