@extends('layouts.app')

@section('content')
@if (session('success_message') || session('message'))
<div class="alert alert-success">
    @if(session('success_message'))
    {{ session('success_message')}}
    @else
    {{session('message')}}
    @endif
</div>
@endif
<div class="container-fluid">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-md-12 col-lg-12" style="background:white;margin-bottom: 50px">
                <div class="col-md-4 col-lg-4">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2330.108531637443!2d106.77224783614665!3d10.829683370623096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527003404296d%3A0xda14c6391b1f8c82!2zMTAzIMSQxrDhu51uZyBUxINuZyBOaMahbiBQaMO6LCBQaMaw4bubYyBMb25nIEIsIFF14bqtbiA5LCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1545916690501" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
                <div class="col-md-4 col-lg-4">
                    <h2 style="color: red;border-bottom: 1px solid blue">Liên Hệ</h2>
                    <div class="space20">&nbsp;</div>

                    <div class="space20">&nbsp;</div>
                    <h3 style="color: black">Thông tin liên hệ</h3>
                    <p style="font-size: 12px;">Quý khách vui lòng điền thông tin theo mẫu form dưới đây để liên hệ với chúng tôi:</p>
                    <form name="lienhe" action="" method="post" style="margin-bottom: 50px;">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="fullname" placeholder="Name *" class="form-control required" style="border-radius: 15px;">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-mail *" class="form-control required" style="border-radius: 15px;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone *" class="form-control" style="border-radius: 15px;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="tittle" placeholder="Title *" class="form-control" style="border-radius: 15px;">
                        </div>
                        <div class="form-group">
                            <textarea name="detail" placeholder="Message *" class="form-control required" rows="5" style="border-radius: 15px;"></textarea>
                        </div>
                        <div>
                            <button class="submit" style="border-radius: 15px; background: black;width: 50px;height: 50px;" >
                                <a class="beta-btn primary" style="text-decoration: none; color: white">Gửi
                                </a>
                            </button>
                        </div>
                    </form>
                </div>



                <div class="col-md-4 col-lg-4">
                    <h2 style="color: red;float: center;border-bottom: 1px solid blue">
                        Địa chỉ
                    </h2>
                    <div class="space20">&nbsp;</div>

                    <div class="space20">&nbsp;</div>
                    <p><strong>Cửa hàng 1:</strong> 103 tăng nhơn phú phước long B quận 9, Tp.HCM</p>
                    <p><strong>Cửa hàng 2:</strong> tân kim cần giuộc,LONG AN</p>
                    <p><strong>Phone</strong>: 0336650716<br />
                        <strong>Email</strong>:thanhvinh199700@gmail.com</p>
                    <p><strong>Tài khoản ngân hàng:</strong><br />
                        Agibank chi nhánh Quận 9<br /> 
                        nguyễn thành vinh<br />
                        0929506569</p>
                </div>

            </div>
        </div>
    </div> 
</div> 
@endsection