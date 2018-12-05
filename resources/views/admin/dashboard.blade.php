<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('font-awesome-4.2.0/css/font-awesome.css')}}" type="text/css" /><!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" media="all" href={{asset("css/daterangepicker-bs3.css")}} /><!-- Date Range Picker -->
    <link rel="stylesheet" href={{asset("css/bootstrap1.css")}} type="text/css" /><!-- Bootstrap -->
    <link rel="stylesheet" href={{asset("css/jquery-jvectormap.css")}} type="text/css" /><!-- Vector Map -->
    <link rel="stylesheet" href={{asset("css/owl.carousel.css")}} type="text/css" /><!-- Carousal -->
    <link rel="stylesheet" href={{asset("css/style1.css")}} type="text/css" /><!-- Style -->
    <link rel="stylesheet" href={{asset("css/responsive.css")}} type="text/css" /><!-- Responsive -->

</head>
<body>

<div class="main">
    <div id="live-chat">
        <div class="chat" style="display:none;">
            <div class="chat-history">
                <div class="chat-message">
                    <img src={{asset("images/resource/sender1.jpg")}} alt="" width="32" height="32" />
                    <div class="chat-message-content">
                        <span class="chat-time">11:54</span>
                        <h5>John Doe</h5>
                        <p>Lorem ipsum dolor. Error, explicabo quasi ratione odio dolorum harum.</p>
                    </div> <!-- end chat-message-content -->
                </div> <!-- end chat-message -->
                <div class="chat-message">
                    <img src={{asset("images/resource/sender2.jpg")}} alt="" width="32" height="32" />
                    <div class="chat-message-content">
                        <span class="chat-time">12:43</span>
                        <h5>Marco Biedermann</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div> <!-- end chat-message-content -->
                </div> <!-- end chat-message -->
                <div class="chat-message">
                    <img src={{asset("images/resource/sender1.jpg")}} alt="" width="32" height="32" />
                    <div class="chat-message-content">
                        <span class="chat-time">12:23</span>
                        <h5>John Doe</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div> <!-- end chat-message-content -->
                </div> <!-- end chat-message -->
            </div> <!-- end chat-history -->
            <p class="chat-feedback">Your partner is typing… <img src="images/typing-loading.gif" alt="" /></p>
            <form action="#" method="post">
                <fieldset>
                    <input type="text" placeholder="Type your message…" autofocus>
                    <input type="hidden">
                </fieldset>
            </form>
        </div> <!-- end chat -->
    </div> <!-- end live-chat -->

    <header class="header">
        <div class="logo">
            <a href="dashboard.html" title=""><img src="images/logo2.png" alt="" /></a>
            <a title="" class="toggle-menu"><i class="fa fa-bars"></i></a>
        </div>

        <div class="custom-dropdowns">
            <div class="message-list dropdown">
                <div class="message drop-list">

                </div>
            </div><!-- Message List -->
            <div class="notification-list dropdown">
                <div class="notification drop-list">
                    <span>You have 3 New Notifications</span>
                    <ul>
                        <li>
                            <a href="#" title=""><span><i class="fa fa-bug red"></i></span>Server 3 is Over Loader Please Check... <h6>2 min ago..</h6></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender2.jpg" alt="" /></span><i>MD Daisal</i>New User Registered<h6>4 min ago..</h6><p class="status red">Urgent</p></a>
                        </li>
                        <li>
                            <a href="#" title=""><span><i class="fa fa-bullhorn green"></i></span>Envato Has change the policies<h6>7 min ago..</h6></a>
                        </li>
                    </ul>
                    <a href="#" title="">See All Notifications</a>
                </div>
            </div><!-- Notification List -->
            <div class="activity-list dropdown">

                <div class="activity drop-list">

                    <ul>
                        <li>

                            <div class="progress">

                            </div>
                        </li>
                        <li>
                            <a href="#" title=""><span><img src="images/resource/sender1.jpg" alt="" /></span><i>Bela Nisaa</i>Downloading new Documents<h6>2 min ago..</h6></a>
                            <div class="progress">
                                <div style="width: 34%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="34" role="progressbar" class="progress-bar red">
                                    34%
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="#" title="">See All Activity</a>
                </div>
            </div><!-- Activity List -->
        </div>

        <div class="dropdown profile">
            <a title="">
                <img src="images/resource/me.jpg" alt="" />{{$user->name}}<i class="caret"></i>
            </a>
            <div class="profile drop-list">
                <ul>
                    <li><a href={{route('/')}} title=""><i class="fa fa-wrench"></i>A-level</a></li>
                    <li><a href={{ route('logout') }} title=""><i class="fa fa-info"></i>Logout</a></li>
                </ul>
            </div><!-- Profile DropDown -->

        </div>
    </header><!-- Header -->
    <div class="page-container menu-left">
        <aside class="sidebar">
            <div class="profile-stats">
                <div class="mini-profile">
                    <span><img src="images/resource/me.jpg" alt="" /></span>
                </div>

            </div>
            <div class="menu-sec">
                <div id="menu-toogle" class="menus">
                    <div class="single-menu">

                            <h2><a title=""><i class="fa fa-user"></i><span>Users</span></a></h2>
                            <div class="sub-menu">

                                <ul>
                                    <li><a href={{route('viewUsers')}} title="">View users</a></li>
                                    <li><a href={{route('create.user')}} title="">Create user</a></li>
                                </ul>
                            </div>
                    </div>

            </div><!-- Menu Sec -->
        </aside><!-- Aside Sidebar -->
        <div class="content-sec">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="dashboard.html" title=""><i class="fa fa-home"></i></a>/</li>
                    <li><a title="">Admin panel</a></li>
                </ul>
            </div><!-- breadcrumbs -->
            <!-- Stats Counter Sec-->
            <div class="row">
                <div class="masonary-grids">
                    <div class="col-md-8">

                        <ul class="panel-function">
                            <li class="dropdown">

                                <ul  class="dropdown-menu" role="menu" >
                                    <li role="presentation"><a title="" class="hide-btn"><i class="fa fa-minus"></i></a></li>
                                    <li role="presentation"><a title="" class="close-sec"><i class="fa fa-close"></i></a></li>
                                </ul>
                            </li>

                        </ul><!-- Panel Function -->
                        <div class="widget">
                            <!-- Widget -->
                        </div><!-- Widget Area -->




                        <h2 class="wellcome">Wellcome to admin panel!</h2>










                    </div>
                </div>
            </div>
            <!-- Content Sec -->
            <div class="slide-panel" id="panel-scroll">
                <ul role="tablist" class="nav nav-tabs panel-tab-btn">
                    <li class="active"><a data-toggle="tab" role="tab" href="#tab1"><i class="fa fa-inbox"></i><span>Your Emails</span></a></li>
                    <li><a data-toggle="tab" role="tab" href="#tab2"><i class="fa fa-wrench"></i><span>Your Setting</span></a></li>
                </ul>
                <div class="tab-content panel-tab">
                    <div id="tab1" class="tab-pane fade in active">
                        <div class="recent-mails-widget">
                            <form><div id="searchMail"></div></form>
                            <h3>Recent Emails</h3>
                            <ul id="mail-list" class="mail-list">
                                <li>
                                    <div class="title">
                                        <span><img src="images/resource/sender1.jpg" alt="" /><i class="online"></i></span>
                                        <h3><a href="#" title="">Kim Hostwood</a><span>5 min ago</span></h3>
                                        <a href="#"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <h4>Themeforest Admin Template</h4>
                                    <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                                </li>
                                <li>
                                    <div class="title">
                                        <span><img src="images/resource/sender2.jpg" alt="" /><i class="online"></i></span>
                                        <h3><a href="#" title="">John Doe</a><span>2 hours ago</span></h3>
                                        <a href="#"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <h4>Themeforest Admin Template</h4>
                                    <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                                </li>
                                <li>
                                    <div class="title">
                                        <span><img src="images/resource/sender3.jpg" alt="" /><i class="offline"></i></span>
                                        <h3><a href="#" title="">Jonathan Doe</a><span>8 min ago</span></h3>
                                        <a href="#"  data-toggle="tooltip" data-placement="left" title="Attachment"><i class="fa fa-paperclip"></i></a>
                                    </div>
                                    <h4>Themeforest Admin Template</h4>
                                    <p>This product is so good that i manage to buy it 1 for me and 3 for my families.</p>
                                </li>
                            </ul>
                            <a href="inbox.html" title="" class="red">View All Messages</a>
                        </div><!-- Recent Email Widget -->

                        <div class="file-transfer-widget">
                            <h3>FILE TRANSFER <i class="fa fa-angle-down"></i></h3>
                            <div class="toggle">
                                <ul>
                                    <li>
                                        <i class="fa fa-file-excel-o"></i><h4>my-excel.xls<i>20 min ago</i></h4>
                                        <div class="progress">
                                            <div style="width: 90%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar red">
                                                90%
                                            </div>
                                        </div>
                                        <div class="file-action-btn">
                                            <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                            <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-pdf-o"></i><h4>my-cv.pdf<i>8 min ago</i></h4>
                                        <div class="progress">
                                            <div style="width: 40%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar blue">
                                                40%
                                            </div>
                                        </div>
                                        <div class="file-action-btn">
                                            <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                            <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-video-o"></i><h4>portfolio-shoot.mp4<i>12 min ago</i></h4>
                                        <div class="progress">
                                            <div style="width: 70%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar green">
                                                70%
                                            </div>
                                        </div>
                                        <div class="file-action-btn">
                                            <a href="#" title="Approve" class="green" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-check"></i></a>
                                            <a href="#" title="Cancel" class="red" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-close"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- File Transfer -->
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="setting-widget">
                            <form>
                                <h3>Accounts</h3>
                                <div class="toggle-setting">
                                    <span>Office Account</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>Personal Account</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>Business Account</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                            </form>

                            <form>
                                <h3>General Setting</h3>
                                <div class="toggle-setting">
                                    <span>Notifications</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>Notification Sound</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>My Profile</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>Show Online</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                                <div class="toggle-setting">
                                    <span>Public Profile</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" checked>
                                        <span data-unchecked="Off" data-checked="On"></span>
                                    </label>
                                </div>
                            </form>
                        </div><!-- Setting Widget -->
                    </div>
                </div>
            </div><!-- Slide Panel -->
        </div><!-- Page Container -->
    </div><!-- main -->


    <!-- Script -->

    <script type="text/javascript" src={{asset("js/admin/jquery-1.11.1.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/script.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/bootstrap.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/enscroll.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/daterangepicker.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/moment.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/jquery.flot.min.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/jquery.sparkline.min.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/owl.carousel.min.js")}}></script>
    <script type="text/javascript" src={{asset("js/admin/html5lightbox.js")}}></script>

    <script type="text/javascript">
        function random_num( field, interval, range ){
            setInterval(function()
            {
                var chars = "0123456789";
                var string_length = range;
                var randomstring = '';
                for (var i=0; i<string_length; i++) {
                    var rnum = Math.floor(Math.random() * chars.length);
                    randomstring += chars.substring(rnum,rnum+1);
                }
                var a = jQuery("#"+field).html(randomstring);
                console.log(a);
            }, interval);
        };
    </script>
    <script>
        jQuery(document).ready(function(){
            random_num( 'random', 3000, 3 );
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".carousal-sec").owlCarousel({
                autoPlay :true,
                stopOnHover : true,
                goToFirstSpeed : 500,
                slideSpeed:500,
                singleItem : true,
                autoHeight : true,
                transitionStyle:"backSlide",
                navigation:true
            });
            $("#pie").sparkline([1,1,2], {
                type: 'pie',
                width: '40',
                height: '40',
                sliceColors: ['#2dcb73','#fd6a59','#17c3e5','#109618','#66aa00','#dd4477','#0099c6','#990099 ']});
            $(function() {
                $("#new-orders").sparkline([4,5,6,7,6,5,4,3,2,2,3,4], {
                    type: 'bar',
                    height: '40px',
                    barSpacing:3,
                    barWidth: 6,
                    barColor: '#2dcb73',
                    negBarColor: '#D6A838'});
            });
            $(function() {
                $("#new-sales").sparkline([2,3,4,5,2,5,6,2,8,5,1,5], {
                    type: 'bar',
                    height: '40px',
                    barSpacing:3,
                    barWidth: 6,
                    barColor: '#ff604f',
                    negBarColor: '#D6A838'});
            });
            $(function() {
                $("#new-visitors").sparkline([6,5,3,1,4,5,6,7,3,2,3,8], {
                    type: 'bar',
                    height: '40px',
                    barSpacing:3,
                    barWidth: 6,
                    barColor: '#17c3e5',
                    negBarColor: '#D6A838'});
            });
            $('#reportrange').daterangepicker(
                {
                    startDate: moment().subtract('days', 29),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2014',
                    dateLimit: { days: 60 },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        'Last 7 Days': [moment().subtract('days', 6), moment()],
                        'Last 30 Days': [moment().subtract('days', 29), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom Range',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                },
                function(start, end) {
                    console.log("Callback has been called!");
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
            );
            //Set the initial state of the picker label
            $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $(function(){
                $('#map').vectorMap({map: 'world_en'});
            })
        });
    </script>
</body>
</html>