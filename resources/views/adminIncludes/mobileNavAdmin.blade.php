<div id="responsiveNavAdmin" x-data="{showEmployer: false, showAdmin:false}" x-init="console.log('init')">
    <div id="responsiveNavMenuAdmin">
        <div class="responsiveNavItem"><a href="{{route('admin.en.home')}}">Home</a></div>
        <div class="responsiveNavItem"><a href="{{route('admin.en.profile')}}">Profile</a></div>
        {{--        <div class="responsiveNavItem"><a href="{{route("front.products")}}">Online Courses</a></div>--}}
        <div class="responsiveNavItem"><a href="{{route("basket.index")}}">Basket</a></div>
        <div class="responsiveNavItem"><a href="{{route("order.index")}}">Orders</a></div>
        <div class="responsiveNavItem"><a href="{{route("certificate.index")}}">Certificates</a></div>
        <div class="responsiveNavItem"><a href="{{route("package.index")}}">Packages</a></div>
        <div class="responsiveNavItem navLabel" @click="showEmployer = !showEmployer">For employers</div>
        <div x-show="showEmployer" x-transition>
            <div class="responsiveNavItem"><a href="{{route('dashboard.employer')}}">Your Dashboard</a></div>
            <div class="responsiveNavItem"><a href="{{route('register.employee')}}">Register Your Employee</a></div>
            <div class="responsiveNavItem"><a href="{{route('admin.consulting')}}">Instructions</a></div>
        </div>
        @if(auth()->user()->is_admin==1)
        <div class="responsiveNavItem navLabel" @click="showAdmin = !showAdmin">Admin</div>
        <div x-show="showAdmin" x-transition>
            <div class="responsiveNavItem"><a href="{{route('users.index')}}">Все пользователи</a></div>
            <div class="responsiveNavItem"><a href="{{route('orders.index')}}">Все заказы</a></div>
            <div class="responsiveNavItem"><a href="{{route('packages.admin.index')}}">Все пакеты</a></div>
            <div class="responsiveNavItem"><a href="{{route('certificates.admin.index')}}">Все сертификаты</a></div>
        </div>
        @endif
    </div>
</div>
