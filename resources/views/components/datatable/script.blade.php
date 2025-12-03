<script>

    $.extend(true, $.fn.dataTable.defaults, {
        "ajax": {
            url: "{!! $route !!}",
            data: function (d) {
                return $.extend({}, d, {
                    @if(request()->routeIs('admin.order.index'))
                        order_number: $('#order_number').val(),
                        customer_name: $('#customer_name').val(),
                        customer_phone: $('#customer_phone').val(),
                        total_cost: $('#total_cost').val(),
                        date_range: $('#date_range').val(),
                        payment_method: $('#payment_method').val(),
                    @endif

                    @if(request()->routeIs('admin.product.index'))
                        category_id: $('#category_id').val(),
                        brand_id: $('#brand_id').val(),
                        status: $('#status').val(),
                    @endif

                    @if(request()->routeIs("admin.accounting.index"))
                        is_expenses: $('[name="is_expenses"] option:selected').val(),
                        category: $('[name="category"]').val(),
                        date_range: $('#date_range').val(),
                    @endif

                });
            }
        },
        columns: [
                @foreach($columns as $key => $column)
                @if(is_array($column))
            {
                data: '{{$key}}',
                name: '{!! $column[0] !!}',
                @if(in_array($key, ['image', 'icon', "status", "profile_image"])) searchable: false,
                orderable: false, @endif },
                @else
            {
                data: '{!! $column !!}',
                name: '{!! $column !!}',
                @if(in_array($column, ['image', 'icon', "status", "profile_image"])) searchable: false,
                    orderable: false, @endif },
                @endif
                @endforeach
            {
                data: 'action', searchable: false, orderable: false
            }
        ]
    });
</script>
