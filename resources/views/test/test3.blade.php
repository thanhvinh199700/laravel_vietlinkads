<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>VINH TEST LARAVEL</title>
        <meta name="_token" content="{{ csrf_token() }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

        <link href="{{asset('css/style.css')}}" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="{{asset('js/update_cart.js')}}"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    </head>

    <body style="padding:0px;">
        
    

        <style>

            body { padding-top: 50px; }

            #myCarousel .carousel-caption {
                left:0;
                right:0;
                bottom:0;
                text-align:left;
                padding:10px;
                background:rgba(0,0,0,0.6);
                text-shadow:none;
            }

            #myCarousel .list-group {
                position:absolute;
                top:0;
                right:0;
            }
            #myCarousel .list-group-item {
                border-radius:0px;
                cursor:pointer;
            }
            #myCarousel .list-group .active {
                background-color:#eee;	
            }

            @media (min-width: 992px) { 
                #myCarousel {padding-right:33.3333%;}
                #myCarousel .carousel-controls {display:none;} 	
            }
            @media (max-width: 991px) { 
                .carousel-caption p,
                #myCarousel .list-group {display:none;} 
            }
        </style>    
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img src="http://placehold.it/760x400/cccccc/ffffff">
                        <div class="carousel-caption">
                            <h4><a href="#">Lorem ipsum dolor sit amet consetetur sadipscing</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/999999/cccccc">
                        <div class="carousel-caption">
                            <h4><a href="#">consetetur sadipscing elitr, sed diam nonumy eirmod</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/dddddd/333333">
                        <div class="carousel-caption">
                            <h4><a href="#">tempor invidunt ut labore et dolore</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/999999/cccccc">
                        <div class="carousel-caption">
                            <h4><a href="#">magna aliquyam erat, sed diam voluptua</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                    <div class="item">
                        <img src="http://placehold.it/760x400/dddddd/333333">
                        <div class="carousel-caption">
                            <h4><a href="#">tempor invidunt ut labore et dolore magna aliquyam erat</a></h4>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat. <a class="label label-primary" href="http://sevenx.de/demo/bootstrap-carousel/" target="_blank">Free Bootstrap Carousel Collection</a></p>
                        </div>
                    </div><!-- End Item -->

                </div><!-- End Carousel Inner -->


                <ul class="list-group col-sm-4">
                    <li data-target="#myCarousel" data-slide-to="0" class="list-group-item active"><h4>Lorem ipsum dolor sit amet consetetur sadipscing</h4></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="list-group-item"><h4>consetetur sadipscing elitr, sed diam nonumy eirmod</h4></li>
                    <li data-target="#myCarousel" data-slide-to="2" class="list-group-item"><h4>tempor invidunt ut labore et dolore</h4></li>
                    <li data-target="#myCarousel" data-slide-to="3" class="list-group-item"><h4>magna aliquyam erat, sed diam voluptua</h4></li>
                    <li data-target="#myCarousel" data-slide-to="4" class="list-group-item"><h4>tempor invidunt ut labore et dolore magna aliquyam erat</h4></li>
                </ul>

                <!-- Controls -->
                <div class="carousel-controls">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div><!-- End Carousel -->
        </div>
        <script>
            $(document).ready(function () {

                var clickEvent = false;
                $('#myCarousel').carousel({
                    interval: 4000
                }).on('click', '.list-group li', function () {
                    clickEvent = true;
                    $('.list-group li').removeClass('active');
                    $(this).addClass('active');
                }).on('slid.bs.carousel', function (e) {
                    if (!clickEvent) {
                        var count = $('.list-group').children().length - 1;
                        var current = $('.list-group li.active');
                        current.removeClass('active').next().addClass('active');
                        var id = parseInt(current.data('slide-to'));
                        if (count == id) {
                            $('.list-group li').first().addClass('active');
                        }
                    }
                    clickEvent = false;
                });
            })

            $(window).load(function () {
                var boxheight = $('#myCarousel .carousel-inner').innerHeight();
                var itemlength = $('#myCarousel .item').length;
                var triggerheight = Math.round(boxheight / itemlength + 1);
                $('#myCarousel .list-group-item').outerHeight(triggerheight);
            });
        </script>

    </body>
</html>

