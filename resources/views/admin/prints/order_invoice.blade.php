<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <title>{{__("#ORDER000")}}-{{$order->id}}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <style>
            .dashed-hr{
                border-bottom: 2px dashed #dddddd;
                display: block;
                margin: 10px 0;
            }
            @page {
                size: auto;
                margin: 0 15px !important;
            }
            @media print {
                * {
                    color: #000000 !important;
                    font-weight: 500 !important;
                }
                h2,h3,h4,h5,h6{
                    font-weight: 700 !important;
                }
                h1{
                    font-size:180px
                }
                h3{
                    font-size:160px
                }
                h4{
                    font-size:100px
                }
                h5{
                    font-size:50px
                }
                h6{
                    font-size:40px
                }
                .table {
                    width: 100%;
                    margin-bottom: 1rem;
                    color: #000000;
                    border-collapse: collapse;
                }

                .table td, .table th {
                    padding: .75rem;
                    vertical-align: top;
                    border-top: 1px solid #000000
                }
                td{
                    font-size:40px
                }
                .table thead th {
                    font-size:50px;
                    vertical-align: bottom;
                    border-bottom: 1px solid #000000
                }

                .table tbody + tbody {
                    border-top: 1px solid #000000
                }

                .table-sm td, .table-sm th {
                    padding: .3rem
                }

                .table-bordered {
                    border: 1px solid #000000
                }

                .table-bordered td, .table-bordered th {
                    border: 1px solid #000000
                }

                .table-bordered thead td, .table-bordered thead th {
                    border-bottom-width: 1px,
                }
                .text-left {
                    text-align: left !important;
                }
                . {
                    text-align: right !important;
                }
                .pl--0 {
                    padding-left: 0 !important;
                }
                .pr--0 {
                    padding-right: 0 !important;
                }
                .col-6{
                    text-align: center;
                }
            }
            .table-summary{
                text-align: left !important
            }
        </style>
        @if (app()->getLocale() == 'ar')
            <style>
                body{
                    direction: rtl !important
                }
                .table-summary{
                    text-align: right !important
                }
            </style>
        @endif
    </head>
    <body>
        <div style="width:1100px">
            <div class="text-center pt-4 mb-3">
                <img src="{{$gs->siteLogo}}" alt="image" style="width: 250px;filter: invert(1);">


                <h4 style="font-size:50px; font-weight: bold" class="mb-3">
                    <strong>#ORDER000{{$order->id}}</strong>
                </h4>

            </div>

            <span class="dashed-hr"></span>
            <div class="row mt-3 mb-3">
                <div class="col-12">
                    <h6 class="text-center">
                        {{$gs->title}}
                    </h6>
                </div>
                <div class="col-12">
                    <h6 class="text-center">
                        {{$gs->address}}
                    </h6>
                </div>


                @if ($gs->first_phone)
                <div class="col-12">
                    <h6 class="text-center">
                        {{__("Phone")}}: {{$gs->first_phone}}
                    </h6>
                </div>
                @endif

                @if ($gs->first_email)
                <div class="col-12">
                    <h6 class="text-center">
                        {{__("Email")}}: {{$gs->first_email}}
                    </h6>
                </div>
                @endif
               

            </div>

            <span class="dashed-hr"></span>

            <div class="row mt-3 mb-3">
                <div class="col-6">
                    <h6>
                        <strong>{{__("Date")}}</strong> :
                        {{\Carbon\Carbon::parse($order->created_at)->toDateString()}} {{\Carbon\Carbon::parse($order->getOriginal('created_at'))->format('h:i A')}}
                    </h6>
                </div>
            </div>


                <span class="dashed-hr"></span>
                <div class="row mt-3 mb-3">
                    <div class="col-6 mb-3">
                    @if ($order->user)
                        <h6 class="mb-3"> 
                            <strong>{{__("Client")}}</strong> :
                            {{$order->user->name}}
                        </h6>
                        <div class="col-6 mb-3">
                            <h6 class="mb-3">
                                <strong>{{__("Phone")}}</strong> :
                                {{$order->phone1}}</h6>
                        </div>
                    @endif
                    </div>
                    
                    <div class="col-6 mb-3">
                        <h6>
                            <strong>{{__("Payment Method")}}</strong> :
                            {{\App\Enums\OrderEnum::getStatuses()[$order->payment_method]}}</h6>
                    </div>

                    <div class="col-6 mb-3">
                        <h6>
                            <strong>{{__("Delivery Type")}}</strong> :
                            {{\App\Enums\OrderEnum::getStatuses()[$order->delivery_type]}}</h6>
                    </div>
                    @if ($order->notes)
                        <div class="col-12 mb-3">
                        <h6>
                            <strong>{{__("Notes")}}</strong> :
                            {{$order->notes}}</h6>
                    </div>
                    @endif
                    
                </div>

            </div>
            <h5 class="text-uppercase"></h5>
            <span class="dashed-hr"></span>

            <table class="table table-bordered mt-3 text-left" style="width: calc(100% - 1px) !important">
                <thead>
                <tr>
                    <th class="text-center pl--0">{{__("Product")}}</th>
                    <th class="text-center">{{__("Price")}}</th>
                    <th class="text-center">{{__("Qty")}}</th>
                    <th class="text-center pr--0">{{__("Total")}}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($order->items as $item)
                        <tr>
                            <td class="text-center pl--0">
                               {{$item->title}}
                               @if($item->description)
                                    {{$item->description}}
                               @endif
                            </td>
                            <td class="text-center"> {{price($item->price/$item->qty)}} </td>
                            <td class="text-center"> ×{{$item->qty}} </td>
                           <td class="text-center"> {{price($item->price)}} </td>

                        </tr>


                @endforeach
                </tbody>
            </table>
            <span class="dashed-hr"></span>

            <table class="table-summary mr-5" style="color: black!important; width: 100%!important">
                @if ($order->points_used == 0)
                    <tr class="mb-3">
                        <td colspan="2"></td>
                        <td class=""> {{__("Sub Total")}}</td>
                        <td class="">{!! price($order->sub_total) !!}</td>
                    </tr>

                    @if ($order->delivery_type == 'delivery')
                    <tr class="mb-3">
                        <td colspan="2"></td>
                        <td class="">{{__("Shipping Price")}}</td>
                        <td class="">{!! price($order->shipping) !!}</td>

                    </tr>
                    @endif
                    <tr class="mb-3">
                        <td colspan="2"></td>
                        <td class="">{{__("VAT")}}</td>
                        <td class="">{!! price($order->vat) !!}</td>
                    </tr>

                    <tr class="mb-3">
                        <td colspan="2"></td>
                        <td class="">{{__("Discount")}}</td>
                        <td class="">-{{price($order->discount)}}</td>
                    </tr>

                    <tr class="mb-3">
                        <td colspan="2"></td>
                        <td class="">{{__("FINAL TOTAL")}}</td>
                        <td class="">
                            {{price($order->total_price)}}
                        </td>
                    </tr>
                @endif

            </table>

        </div>
        <script>        
            window.print();
        </script>
    </body>
</html>