<h2 class="text-center my-5">{{__("You can order products by drag and drop")}}</h2>
<div class="row">
    <div class="col-md-6 mx-auto draggable-zone text-center">
        @foreach($products as $product)
            <div class="draggable mb-2">
                <div class="card card-bordered draggable-handle">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                <a href="javascript:;" class="btn btn-icon btn-hover-light-primary">
                                        <span class="svg-icon svg-icon-2x">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </a>
                                <div class='symbol symbol-50px mx-5'>
                                    <img src='{{$product->image}}' alt='image'/>
                                </div>
                                <h2>
                                    {{$product->title}}
                                </h2>
                                <input type="hidden" name="products[]" value="{{$product->id}}" class="products">
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if($products->count() >= 2)
    <script src="{{asset("backend/plugins/custom/draggable/draggable.bundle.js")}}"></script>
    <script>
        @php
            $random = Str::random(5);
        @endphp
        let containers_{{$random}} = document.querySelectorAll(".draggable-zone");

        let droppable_{{$random}} = new Sortable.default(containers_{{$random}}, {
            draggable: ".draggable",
            handle: ".draggable .draggable-handle",
            mirror: {
                appendTo: "draggable-zone",
                constrainDimensions: true
            }
        });

        droppable_{{$random}}.on('drag:stop', (evt) => {
            
           
            setTimeout(function(){

                let products = [];
                let productElements = document.getElementsByClassName('products');
                for (el of productElements) {
                    let value = el.getAttribute("value");
                    if (products.indexOf(value) === -1) {
                        products.push(value);
                    }
                }
                
                axios.post("{{route('admin.save-category-products-ordering', [$category_id])}}", {'products': products}).then((response) => {
                    toastr.success(response.data.message);
                }).catch(error => {
                    console.log(error);
                })
            },100);
            
           
        });
    </script>
@endif
