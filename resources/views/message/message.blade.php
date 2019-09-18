<!DOCTYPE html>
<html>
    <head>
        <title>Chat</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $('#action_menu_btn').click(function () {
                    $('.action_menu').toggle();
                });
            });
        </script>
        <style>
            body,html{
                height: 100%;
                margin: 0;
                background: #7F7FD5;
                background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
                background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
            }

            .chat{
                margin-top: auto;
                margin-bottom: auto;
            }
            .card{
                height: 500px;
                border-radius: 15px !important;
                background-color: rgba(0,0,0,0.4) !important;
            }
            .contacts_body{
                padding:  0.75rem 0 !important;
                overflow-y: auto;
                white-space: nowrap;
            }
            .msg_card_body{
                overflow-y: auto;
            }
            .card-header{
                border-radius: 15px 15px 0 0 !important;
                border-bottom: 0 !important;
            }
            .card-footer{
                border-radius: 0 0 15px 15px !important;
                border-top: 0 !important;
            }
            .container{
                align-content: center;
            }
            .search{
                border-radius: 15px 0 0 15px !important;
                background-color: rgba(0,0,0,0.3) !important;
                border:0 !important;
                color:white !important;
            }
            .search:focus{
                box-shadow:none !important;
                outline:0px !important;
            }
            .type_msg{
                background-color: rgba(0,0,0,0.3) !important;
                border:0 !important;
                color:white !important;
                height: 60px !important;
                overflow-y: auto;
            }
            .type_msg:focus{
                box-shadow:none !important;
                outline:0px !important;
            }
            .attach_btn{
                border-radius: 15px 0 0 15px !important;
                background-color: rgba(0,0,0,0.3) !important;
                border:0 !important;
                color: white !important;
                cursor: pointer;
            }
            .send_btn{
                border-radius: 0 15px 15px 0 !important;
                background-color: rgba(0,0,0,0.3) !important;
                border:0 !important;
                color: white !important;
                cursor: pointer;
            }
            .search_btn{
                border-radius: 0 15px 15px 0 !important;
                background-color: rgba(0,0,0,0.3) !important;
                border:0 !important;
                color: white !important;
                cursor: pointer;
            }
            .contacts{
                list-style: none;
                padding: 0;
            }
            .contacts li{
                width: 100% !important;
                padding: 5px 10px;
                margin-bottom: 15px !important;
            }
            .active{
                background-color: rgba(0,0,0,0.3);
            }
            .user_img{
                height: 70px;
                width: 70px;
                border:1.5px solid #f5f6fa;

            }
            .user_img_msg{
                height: 40px;
                width: 40px;
                border:1.5px solid #f5f6fa;

            }
            .img_cont{
                position: relative;
                height: 70px;
                width: 70px;
            }
            .img_cont_msg{
                height: 40px;
                width: 40px;
            }
            .online_icon{
                position: absolute;
                height: 15px;
                width:15px;
                background-color: #4cd137;
                border-radius: 50%;
                bottom: 0.2em;
                right: 0.4em;
                border:1.5px solid white;
            }
            .offline{
                background-color: #c23616 !important;
            }
            .user_info{
                margin-top: auto;
                margin-bottom: auto;
                margin-left: 15px;
            }
            .user_info span{
                font-size: 20px;
                color: white;
            }
            .user_info p{
                font-size: 10px;
                color: rgba(255,255,255,0.6);
            }
            .video_cam{
                margin-left: 50px;
                margin-top: 5px;
            }
            .video_cam span{
                color: white;
                font-size: 20px;
                cursor: pointer;
                margin-right: 20px;
            }
            .msg_cotainer{
                margin-top: auto;
                margin-bottom: auto;
                margin-left: 10px;
                border-radius: 25px;
                background-color: #82ccdd;
                padding: 10px;
                position: relative;
            }
            .msg_cotainer_send{
                margin-top: auto;
                margin-bottom: auto;
                margin-right: 10px;
                border-radius: 25px;
                background-color: #78e08f;
                padding: 10px;
                position: relative;
            }
            .msg_time{
                position: absolute;
                left: 0;
                bottom: -15px;
                color: rgba(255,255,255,0.5);
                font-size: 10px;
            }
            .msg_time_send{
                position: absolute;
                right:0;
                bottom: -15px;
                color: rgba(255,255,255,0.5);
                font-size: 10px;
            }
            .msg_head{
                position: relative;
            }
            #action_menu_btn{
                position: absolute;
                right: 10px;
                top: 10px;
                color: white;
                cursor: pointer;
                font-size: 20px;
            }
            .action_menu{
                z-index: 1;
                position: absolute;
                padding: 15px 0;
                background-color: rgba(0,0,0,0.5);
                color: white;
                border-radius: 15px;
                top: 30px;
                right: 15px;
                display: none;
            }
            .action_menu ul{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .action_menu ul li{
                width: 100%;
                padding: 10px 15px;
                margin-bottom: 5px;
            }
            .action_menu ul li i{
                padding-right: 10px;

            }
            .action_menu ul li:hover{
                cursor: pointer;
                background-color: rgba(0,0,0,0.2);
            }
            @media(max-width: 576px){
                .contacts_card{
                    margin-bottom: 15px !important;
                }
            } 
        </style>

        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100">
                <div class="col-md-8 col-xl-6 chat">
                    <div class="card">
                        <div class="card-body msg_card_body">
                            @foreach($message as $messages)
                            <div class="d-flex justify-content-start mb-4 message-user" user-id="{{$messages->user->id}}">
                                <div class="img_cont_msg">
                                    <img src="{{$messages->user->avatar}}" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    {{$messages->message}}
                                    <span class="msg_time" message-id="{{$messages->user->id}}">8:40 AM, Today</span>
                                </div>
                            </div>



                            @foreach($adminSendMessage as $adminSendMessages)
                            @if(($messages->created_at < $adminSendMessages->created_at && $messages->id+1==$adminSendMessages->id))
                            <div class="d-flex justify-content-end mb-4" admin-id="{{$adminSendMessages->user->id}}">

                                <div class="msg_cotainer_send">
                                    {{$adminSendMessages->message}}
                                    <span class="msg_time_send">{{$adminSendMessages->created_at}}</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="{{$adminSendMessages->user->avatar}}" class="rounded-circle user_img_msg">
                                </div>
                            </div>
                            @endif
                            @endforeach


                            @endforeach
                        </div>
                        <div class="card-footer">
                            <div class="input-group">       
                                <div class="input-group-append" style="width:100%;">
                                    <textarea name="contents" class="form-control type_msg contents" placeholder="Type your message..."></textarea>
                                    <button type="button" class="admin-send"><i class="fas fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>
                        <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('8d25770dd3cc594ee287', {
                cluster: 'ap1'
                        //encrypted: true
                        //forceTLS: true
            });
            var channel = pusher.subscribe('test');
            channel.bind('my_event', function (data) {

                event.preventDefault();
                var id = $("div.justify-content-end").attr("admin-id");
                var user_id = $("div.message-user").attr("user-id");
                //console.log(user_id === data.user.id);
                if (id != data.user.id && user_id == data.user.id) {
                    $('div.msg_card_body').append("<div class='d-flex justify-content-start mb-4 message-user'>\n\
                                                                    <div class='img_cont_msg'>\n\
                                                                         <img src=" + data.user.avatar + " class='rounded-circle user_img_msg'>\n\
                                                                    </div>\n\
                                                                     <div class='msg_cotainer'>\n\
                                                                        " + data.message + "\
                                                                         <span class='msg_time' message-id='" + data.user.id + "'>" + data.user.created_at + "</span>\n\
                                                                    </div>\n\
                                                               </div>");
                }

            });
                        </script>
                        <script>
                            $(document).ready(function () {
                                $("button.admin-send").on('click', function () {
                                    //alert('zo day');
                                    event.preventDefault();
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                        }
                                    });
                                    var contents = $("textarea.contents").val();
                                    var id = $("span.msg_time").attr('message-id');
                                    console.log(id);
                                    $.ajax({
                                        url: "/pusher_admin",
                                        type: "POST",
                                        dateType: "JSON",
                                        cache: false,
                                        data: {
                                            "contents": contents,
                                            "id": id
                                        },
                                        success: function () {

                                        }
                                    }).done(function (data) {
                                        $('div.msg_card_body').append("<div class='d-flex justify-content-end mb-4'>\n\
                                                                            <div class='msg_cotainer_send'>\n\
                                                                            " + data[1] + "\
                                                                            </div>\n\
                                                                            <div class='img_cont_msg'>\n\
                                                                                <img src=" + data[0].avatar + " class='rounded-circle user_img_msg'>\n\
                                                                            </div>\n\
                                                                        </div>");
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

