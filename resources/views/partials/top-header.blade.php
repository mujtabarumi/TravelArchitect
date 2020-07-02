<div class="row header-top">
    <div class="container clear-padding">
        <div class="navbar-contact">
            <div class=" text-right clear-padding user-logged">
                <a  href="{{route('user.profile')}}" class="transition-effect">
{{--                    <img src="{{asset("/assets/images/user.jpg")}}" alt="cruise">--}}

                    @if(!empty(\Illuminate\Support\Facades\Auth::user()))
                        Hi, {{\Illuminate\Support\Facades\Auth::user()->name}}
                    @endif
                </a>
                @if(empty(\Illuminate\Support\Facades\Auth::user()))
                    <a href="{{route('login')}}" style="font-size: 16px"><b >Sign In</b></a>
                @else
                <a class="transition-effect" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> {{ __('Sign Out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
{{--                <a href="#" class="transition-effect">--}}
{{--                    <i class="fa fa-sign-out"></i>Sign Out--}}
{{--                </a>--}}
                @endif
            </div>
        </div>
    </div>
</div>
