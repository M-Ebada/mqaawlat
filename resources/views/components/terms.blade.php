<div class="modal fade" id="termsAndCondition" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg modal-xl">
    <div class="modal-content">
        <div class="modal-body p-5 text-center">
            <div class="container text-center">
                <img src="{{ asset('front/dashboard/assets/greenlogo.png') }}" class="img-fluid my-5"
                    alt="logo">
                <h1 class="fw-bold mb-4">شروط وأحكام الإستخدام</h1>
                <div>
                   {!! $terms !!}
                </div>
                <div class="d-flex flex-column flex-sm-row col-lg-6 mx-auto mt-5">
                    <button href="javascript:;" data-bs-dismiss="modal"
                        class="mainbtn me-sm-3 mb-3 mb-sm-0">
                        موافق
                    </button>
                    <button href="javascript:;" data-bs-dismiss="modal"
                        class="mainbtn scond-btn">رفض</button>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
