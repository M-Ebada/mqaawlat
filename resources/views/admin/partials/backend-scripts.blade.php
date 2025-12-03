<script src="{{asset("backend/plugins/global/plugins.bundle.js")}}"></script>
<script src="{{asset("backend/js/scripts.bundle.js")}}"></script>
<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/l10n/ar.min.js"></script>
@auth()
    {{-- @include("admin.partials.firebase") --}}
    <script src="{{asset("backend/plugins/custom/datatables/datatables.bundle.js")}}"></script>
    <script>

        
        function reinitalizeSelect2(modalClass) {
            $(modalClass + " select").each(function() {
                var $select = $(this);
                $select.select2('destroy');
                $select.select2({
                    dropdownParent: $select.closest(modalClass)
                });
            });
        }

        $('[data-bs-target="#create-modal"]').on("click", function(){
            setTimeout(() => {
                reinitalizeSelect2('.create-modal');
            }, 500);
        })

        $(".accept-numbers-only").each(function(){
            $(this).find("input").addClass("accept-numbers-only");
        })

        $("body").on("keyup" , ".accept-numbers-only", function(){
            var inputValue = $(this).val();
            // Regular expression to match any numerals (including Arabic numerals)
            var numerals = /^[0-9٠-٩]*$/;

            if (!numerals.test(inputValue)) {
                // Remove non-numeric characters and limit to 8 characters
                $(this).val(inputValue.replace(/[^0-9٠-٩]/g, '').substring(0, 8));

            }
        });


        $(".slideUp").slideUp(0);
        
        $('.logout_btn').on('click', function () {
            $('#logout_form').submit();
        })

        function showSpinner(el) {
            el.find('#overlay').addClass("overlay overlay-block");
            el.find('#data').html('<div class="overlay-layer bg-dark-o-10"><div class="spinner-border"></div></div>');
            el.find('button[type="submit"]').attr('data-kt-indicator', 'on');
        }

        function hideSpinner(el) {
            el.find('#overlay').removeClass("overlay overlay-block");
            el.find('#data').html('');
            el.find('button[type="submit"]').attr('data-kt-indicator', 'off');
            el.find('button[type="submit"]').attr('disabled', false);
        }

        
        $("body").on("click", '[data-bs-toggle="modal"]' , function(){
            let modalId = $(this).attr("data-bs-target");
            reinitalizeSelect2(modalId);
        })

        let table;

        $(function () {

            if($("#datatables").length > 0){
                table = $('#datatables').DataTable({
                    ordering: true,
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    searchDelay: 1000,
                    @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() == "ar")
                    language: {
                        url: "{{asset("backend/datatables-ar.json")}}"
                    }
                    @endif
                });
                
                $('#datatables_search_input').keyup(function () {
                    table.search($(this).val()).draw();
                });
            }
            

            const DeleteModel = document.getElementById('delete')

            DeleteModel.addEventListener('show.bs.modal', function (e) {
                $("#delete").find('.delete_form').attr('action', $(e.relatedTarget).data('href'));
            });

            $('#delete .delete_form').submit(function (e) {
                e.preventDefault();
                let form = $(this);
                let action = form.attr('action');
                $.ajax({
                    url: action,
                    type: 'POST',
                    data: form.serialize(),
                    beforeSend: function () {
                        showSpinner(form)
                    },
                    success: function success(result) {
                        hideSpinner(form);
                        $('#delete').modal('hide');
                        $(".datatable-parent-table").DataTable().ajax.reload();
                        if (result.success) {
                            toastr.success(result.message);
                        } else {
                            toastr.error(result.message);
                        }
                        if (result.data.hasOwnProperty("redirect_to") && result.data.redirect_to !== "") {
                            window.location.href = result.data.redirect_to;
                        }
                    },
                    error: function error(response) {
                        $('#delete').modal('hide');
                        toastr.error(response.responseJSON.message);
                        hideSpinner(form);
                    }
                });
            });

            $(document).on("change", '.switcher', function (e) {
                e.preventDefault();
                let element = $('#kt_app_content_container .card');
                let that = $(this);
                let action = "{{route("admin.update-status")}}";
                $.ajax({
                    url: action,
                    type: 'POST',
                    data: {
                        model: that.data('model'),
                        model_id: parseInt(that.data('modelid')),
                        column_name: that.data('columnname'),
                        _token: "{{csrf_token()}}"
                    },
                    beforeSend: function () {
                        element.find('#overlay').addClass("overlay overlay-block");
                        element.find('#data').html('<div class="overlay-layer bg-dark-o-10"><div class="spinner-border"></div></div>');
                    },
                    success: function success(result) {
                        setTimeout(() => {
                            hideSpinner(element);
                        }, 200)
                        if (result.success) {
                            toastr.success(result.message);
                            return;
                        }
                        toastr.error(result.message);
                        that.prop("checked", true);
                    },
                    error: function error(response) {
                        let errors = response.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            toastr.error(value);
                        });
                        setTimeout(() => {
                            hideSpinner(element);
                        }, 200)
                    }
                });
            });

            $('#notification').load("{{route("admin.notification.index")}}");

            $(document).on("click", ".notification_record", function () {
                let that = $(this);
                $.post({
                    url: that.data("action"),
                    method: "POST",
                    data: {
                        _token: "{{csrf_token()}}",
                        _method: "PUT"
                    },
                    success: function (response) {
                        that.removeClass("fw-bolder");
                        that.removeClass("notification_record");
                        $('#notification_count').html(response.data.remaining_notification);
                        if (response.data.remaining_notification === 0) {
                            $('#notification_dots').remove();
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            });

            if ($('.tinymcTextareaEditor').length) {
                tinymce.init({
                    selector: '.tinymcTextareaEditor',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
                    height: 600,
                    @if(LaravelLocalization::getCurrentLocaleDirection() == "rtl")
                    directionality: 'rtl',
                    language: "ar",
                    language_url: "{{asset("backend/tinymc-ar.js")}}"
                    @endif
                })
            }

        });


        // for filtering

        $('#filter-form select').on("change", function(){
           $(".reset-filters").removeClass("hideFilter");
        });

        $('#searchBtn').on('click', function () {
            table.draw();
        });

        $('.reset-filters').on('click', function () {
            
            $("#filter-form select").each(function(){
                $(this).prop('selectedIndex', 0);
            });

            $("#filter-form input").each(function(){
                $(this).prop('value', '');
            });

            $('#filter-form select[data-control="select2"]').select2('destroy').select2();
            
            $(".reset-filters").addClass("hideFilter");
            table.draw();
        });

        $(".openFilterBox").on("click" , function(){
            if(!$(this).hasClass("active")){
                $(this).addClass("active");
                $(".filter-box").slideDown();
                $(this).find("span").html(`<i class="bi bi-dash"></i>`);
                return;
            }
            $(this).removeClass("active");
            $(".filter-box").slideUp();
            $(this).find("span").html(`<i class="bi bi-plus"></i>`);
        })
        
    </script>

@endauth
@vite(["resources/js/app.js"])
@include("admin.partials.flashes")

