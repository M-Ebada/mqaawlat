<table>
    <thead>
    <tr>
        <td>Id</td>
        <td>Image</td>
        <td>Name</td>
        <td>Description</td>
        <td>Category</td>
        <td>Price</td>
        <td>Status</td>
        <td>Created at</td>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>
                {{ $product->getFirstMediaUrl('images') }}
            </td>
            <td>
                {{$product->title}}
            </td>
            <td>
                {{$product->description}}
            </td>
            <td>
                {{$product->category?->title}}
            </td>
            <td>
                {{\App\Helper\Helper::price($product->totalPrice)}}
            </td>
            
            <td>
                @if($product->status)
                Active
                @else
                Inactive
                @endif
            </td>
            <td>
                {{$product->supplier?->name}}
            </td>
            <td>
                {{\Carbon\Carbon::parse($product->created_at)->toDateString()}} {{\Carbon\Carbon::parse($product->getOriginal('created_at'))->format('h:i A')}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
