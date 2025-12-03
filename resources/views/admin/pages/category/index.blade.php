@extends("admin.layouts.app")

@section("content")
    <x-card-content>
        <x-datatable-header>
            <x-add-btn :route="route('admin.category.create')" :title="__('Add new category')" />

        </x-datatable-header>
        <x-card-body class="pt-0">
            <x-datatable-html>
                <td>{{__("Image")}}</td>
                <td>{{__("Title")}}</td>
                <td>{{__("Status")}}</td>
                <td>{{__("Created At")}}</td>
                <td>{{__("Updated At")}}</td>
            </x-datatable-html>
        </x-card-body>
    </x-card-content>


    <div class="modal fade" id="payment-status" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Choose category type")}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('admin.category.create')}}" method="GET">
                
                <div class="modal-body">

                    <div class="form-group col-12 mt-5">
                        <label class="d-flex align-items-center fs-5 fw-bold mb-2" >{{__("Category Type")}}</label>
                        <select name="type" data-control="select2" class="form-control form-control-lg form-control-solid" required>
                            <option value="parent" selected> {{__("Parent Category")}} </option>
                            <option value="child"> {{__("Sub category")}} </option>
                        </select>
                    </div>
    
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{__("Choose")}}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__("Close")}}</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="order_product_modal" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content rounded">
                <form action="" class="order_product_modal_form" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header py-3">
                        <h3 class="modal-title" id="exampleModalLabel">
                            {{__('Order Product')}}
                        </h3>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="currentColor"></rect>
                            </svg>
                        </span>
                        </div>
                    </div>
                    <div class="modal-body text-center categoryProducts" id="overlay">


                        <div id="data"></div>
                    </div>
                    <div class="modal-footer py-3">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">{{__('Close')}}</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section("scripts")
    <x-datatable-script :route="route('admin.category.index')" :columns="$columns" />
    <script>
        const order_product_modal = document.getElementById('order_product_modal')

        order_product_modal.addEventListener('show.bs.modal', function (e) {
            $("#order_product_modal").find('.order_product_modal_form .categoryProducts').load($(e.relatedTarget).data('get-products'))
        });
        
    </script>
@endsection