<table>
    <thead>
    <tr>
        <td>Order Number</td>
        <td>Customer name</td>
        <td>Customer Number</td>
        <td>Address</td>
        <td>Payment Method</td>
        <td>Sub Total</td>
        <td>Discount</td>
        <td>Total Amount</td>
        <td>Total Qty</td>
        <td>Ordered at</td>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>#ORDER000{{$order->id}}</td>
            <td>
                {{$order->user?->first_name . " " . $order->user?->last_name}}
            </td>
            <td>
                {{$order->phone1}}
            </td>
            <td>
               {{$order->address}}
            </td>
            <td>
                 {{__($order->payment_method)}}
            </td>
            <td>
                {!! \App\Helper\Helper::price($order->sub_total) !!}
            </td>
            <td>
                {!! \App\Helper\Helper::price($order->discount) !!}
            </td>
            <td>
                {!! \App\Helper\Helper::price($order->total_price - $order->discount) !!}
            </td>
            <td>
                {{$order->total_qty}}
            </td>
            <td>
                {{\Carbon\Carbon::parse($order->created_at)->toDateString()}} {{\Carbon\Carbon::parse($order->getOriginal('created_at'))->format('h:i A')}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
