
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Generate Notification</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">
    <!-- Select2 -->
<link rel="stylesheet" href="../adminfiles/plugins/select2/select2.min.css">
    <style>
        .card-header
        {
            background-color:#6c9ecf;
        }
    </style>
</head>

<body>


    <div class="wrapper">

        <div id="body" class="active">

            <div class="content">
                <div class="container">
                    <div class="page-title">

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">

                                <div class="card-header" >
                                    <span style="color:white;"><b>+ Generate Notification</b></span>
                                </div>
                                <div class="card-body">

                                <form method="post" id="add_notify" enctype="multipart/form-data">
                                    @csrf


                                        <div class="form-group">



                                            <input type="text" id="title" name="title" placeholder="Title" class="form-control" >

                                        </div>


                                        <div class="form-group">
                                        <label>Content<span style="color:red;font-size:10px;">*</span></label>
                                            <textarea rows="3" type="text" id="txtbody" name="body" placeholder="Content" class="form-control" value="Please click here to view the content"></textarea>
                                        </div>

                                        <!--<div class="form-group">



                                            <input type="text" id="test_token" name="test_token" placeholder="test token" class="form-control" >

                                        </div>-->
                                        <div class="form-group">
                                            <label>Business List<span id="count_message" style="color:red;font-size:10px;"> * Keep empty for sending to all out of </span></label>
                                            <select class="form-control select2" id="token_list" multiple="multiple"  name="token_list[]">


                                            </select>

                                        </div>
                                        <div class="form-group">

                                                <select name="notification_type" class="form-control" id="notification_type">

                                                <option value="home">General</option>
                                               <!-- <option value="home">Home Page</option> -->
                                                <option value="livefeeds">Live Feeds Page</option>
                                                <option value="productlist">Product Page</option>
                                                    <option value="myplaces">Near By Location Business</option>
                                                    <option value="mychatlist">Chat Page</option>
                                                <!--<option value="businesslist">Business Page</option>

                                                <option value="membercategory">Member Category</option>
                                                <option value="productcategory">Product Category</option>

                                                <option value="memberproducts">Member Products</option>
                                                <option value="memberneeds">Member Needs</option>
                                                <option value="memberprofile">Member Profile</option>
                                                <option value="viewlivefeeds">View Livefeed</option>
                                                <option value="viewproducts">View Product</option>



                                                <option value="chatlist">Chat Page</option>  -->
                                                </select>

                                        </div>

                                        <div class="form-group">

                                                <select name="store_type" class="form-control" id="store_type">

                                                    <option value="sendonly">Send Only</option>
                                                <option value="savesend">Save and Send</option>

                                                <option value="saveonly">save only</option>
                                                <option value="chat_message">Broadcast Chat Message</option>

                                                </select>

                                        </div>
                                        <div class="form-group">



                                          <input type="text" id="notification_value" name="notification_value" placeholder="Notification Value" class="form-control" value="0">

                                      </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>

                                        <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<script src="../adminfiles/vendor/jquery/jquery.min.js"></script>-->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="../adminfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminfiles/vendor/datatables/datatables.min.js"></script>
    <script src="../adminfiles/js/initiate-datatables.js"></script>
    <script src="../adminfiles/js/script.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
<!-- Select2 -->
<script src="../adminfiles/plugins/select2/select2.full.min.js"></script>
    <script>


 /* var firebaseConfig = {
    apiKey: "AIzaSyDSiN2f2pjaEqvGSlvAulRL-IYEYmwj9wA",
    authDomain: "pristine-nebula-260112.firebaseapp.com",
    projectId: "pristine-nebula-260112",
    storageBucket: "pristine-nebula-260112.appspot.com",
    messagingSenderId: "715104917088",
    appId: "1:715104917088:web:79b6da646fec8226bf5505"
  };

  firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken({ vapidKey: 'AAAAp9H3UpA:APA91bFFtuO2naxNjnXQ9k6Q5L7AmOnukc88aHkLKnDBVs3FwjBy-IV0OrsEOZQG5aedAfuHVJMYxruKOWCReRii09F3C5Q4gr6PBManZKu-kTh3GJyPQ0dzIjaXkq43csLs-X7A1Hyi' })
            })
            .then(function(token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/dashboard/save-token',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert(response);
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });

            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	$( document ).ready(function() {
        //initFirebaseMessagingRegistration();

	});


   $('#add_notify').submit(function(e)
    {
       e.preventDefault();
       let formData = new FormData(this);
       // alert("API under Process"+JSON.stringify(formData));
       //return;

       $('#image-input-error').text('');


  });*/

</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://192.168.0.105:3000/socket.io/socket.io.js"></script>
    <script src="https://chatapp.bewithcollab.com/socket.io/socket.io.js"></script>-->
    <script>
        /*var ip = "http://192.168.0.105:3000";
        //var ip = "https://chatapp.bewithcollab.com/";
        var socket = io.connect(ip, {
            query: "userId=2"
        });*/
        $(document).ready(function() {

            $.ajaxSetup({

        headers: {
               // 'noBody': tkn
               'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'

                }
            });
            // Emit your login event
            /* socket.emit('getMessages', {
                 fromUserId: '2',
                 toUserId: '1'
             });
             // When you retrieve the login response
             socket.on('getMessagesResponse', function(data) {
                 alert(JSON.stringify(data));
             });

             /*socket.emit('add-message', {
                 fromUserId: 2,
                 toUserId: 1,
                 message: 'test from browser',
                 date: '3 pm',
                 time: '2021-05-05'
             });
             // When you retrieve the login response
             socket.on('add-message-response', function(data) {
                 alert(JSON.stringify(data));
             });*/



     get_data_search("");
        });
        function gen_notifcation()
        {
            /*socket.emit('gen-notification', {
                message:$('#txtbody').val()

            });

            socket.on('notification', function(data) {
                alert(JSON.stringify(data));
            });*/

        }
        function submit_fcm_notification(formData)
  {
    $.ajax({
          type:'POST',
          url: '/dashboard/sendNotification',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             alert(JSON.stringify(response));

           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  }
        $('#add_notify').submit(function(e)
    {
       e.preventDefault();
       let formData = new FormData(this);
       // alert("API under Process"+JSON.stringify(formData));
       //return;
       //alert("generate notification");
       submit_fcm_notification(formData);
       //gen_notifcation();

  });
  function get_data_search(formData)
            {
            $("#business_table").html('');

            $.ajax({
            type:'POST',
            url: '/search/getBusiness_With_Token',
		    dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                //alert(JSON.stringify(response));
                var cnt=0;
                $.each(response.data, function (key, val)
                {
                    if(val.fcm_token!="")
                    {
                        cnt++;
                        $("#token_list").append("<option value="+val.fcm_token+">"+val.business_name+"</option>");
                    }

               });
               $("#count_message").append("<span style='color:green'><b> ("+cnt+")</b></span> with device tokens");
              },
              error: function(response){
                 alert(JSON.stringify(response));
              }
        });
    }
    $(".select2").select2({
                tags: true
                });
    </script>
</body>

</html>
