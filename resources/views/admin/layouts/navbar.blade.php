<div class="page-navbar">
    <div class="page-address">
        <p>
        <h3>@yield('page address')</h3>
        </p>
    </div>

    <div class="notification">
        <div class="dropdown"  style="display: inline-block">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-language"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">انجليزي</a></li>
                <li><a class="dropdown-item active" href="#">عربي</a></li>
            </ul>
        </div>
{{--        contact us --}}
        <a href="#" style=" position: relative;">
            <i class="fa-solid fa-message"></i>
             {{-- <div class="numberOfNotify">0</div>--}}
        </a>
        {{-- notifications  --}}
        <div class="notification-menu">
        <a href="#" style=" position: relative;" class="notifications">
            <i class="fa-sharp fa-solid fa-bell"></i>
             <div class=""></div>
        </a>
          <div class="notification-dropdown">
              <div class="title-notification">
                  <a  href="#" class="title-name">الاشعارات</a>
                  <a href="#" class="title-markAll">قراءة الكل</a>
              </div>
              <ul class="notification-content">


              </ul>
          </div>


        </div>

        <span class="setting">
            <i class="fa-solid fa-bars "></i>
        </span>
    </div>
</div>
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<script>
    $('.title-markAll').on('click', function () {
        $.ajax({
            url: "{{route('admin.readAllNotification')}}",
            type: "GET",
            dataType: "json",
            success: function (data){},
        });
        window.location.reload();
    });
    //
    window.onload=()=>{
        getNotifications();
    };
    //
    setInterval(function (){
        getNotifications();
    },500000);

    $('.notifications').on('click', function () {
        getNotifications();
    });
    function getNotifications(){
        $('.notification-content').empty();
        $.ajax({
            url: "{{route('admin.getNotifications')}}",
            type: "GET",
            dataType: "json",
            success: function (data){
                for(let key in data){
                    $('.notification-content').append(`
         <li class="${data[key].read_at ===null?'unread':''}">
         <a href="notifications/show/${data[key]['id']}">
         <div class="img">
            <img src="{{asset('admin/admin_image/profile/profile.jpg')}}" alt="">
         </div>
          <div class="text">
            <strong> ${data[key].name} </strong>
            <p>
             قام بشراء منتج
             <mark>${data[key].product}</mark>
                ${data[key].message}
            </p>
        </div>
        <div class="date">
            <strong>${data[key].created_at}</strong>
        </div>
    </a>
</li>
`);}
                let count=0,circle,list;
                circle=document.querySelector('.notifications div');
                list= document.querySelectorAll('.notification-content li');
                Array.from(list).forEach((e)=>{
                    e.classList.contains('unread')?count++:count;
                });
                if(count>0){
                    circle.innerHTML=count;
                    circle.classList.add('numberOfNotify');
                }
                console.log(count)
            },
        });
    }
</script>

