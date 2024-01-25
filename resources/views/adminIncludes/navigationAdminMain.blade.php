<div class="adminNav">
        <div class="adminNavWrap">
            <a href="{{route('admin.en.home')}}"><div class="logo"><img src="{{asset('images/logo/logoBlack.png')}}" alt=""></div></a>
                <div class="rightAdminMainNav">
                    <div class="profilePicture">
                        @if(auth()->user()->profilePic)
                        <img src="{{asset("images/profilePic/" . auth()->user()->profilePic)}}" alt="">
                        @else
                        <img src="{{asset("images/avatars/profile.png")}}" alt="">
                        @endif
                    </div>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button class="adminButton" type="submit">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
</div>
