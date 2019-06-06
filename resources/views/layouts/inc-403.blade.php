    <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
                <div class="row align-items-center d-flex flex-row">
                  <div class="col-lg-6 text-lg-right pr-lg-4">
                    <h5 class="display-2 mb-0">ขออภัย</h5>
                  </div>
                  <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                    <h3>ไม่สามารถใช้งานส่วนนี้ได้</h3>
                    <h3 class="font-weight-light">เนื่องจากถูกจำกัดสิทธิ์</h3>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-12 text-center mt-xl-2">
                    <a class="text-white font-weight-medium" href="{{route('home')}}">Back to home</a>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-12 mt-xl-2">
                    <p class="text-white font-weight-medium text-center">Copyright &copy; {{ date('Y') }} All rights reserved.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>