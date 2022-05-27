<nav id="navbar" class="navbar navbar-default navbar-fixed-top navbar-black ">
	<a class="navbar-brand chesignerLogo" id="header" href="/"><i>Chesigner</i></a>
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a class="navfont-white" href="/">كيف نعمل</a></li>
        <li><a class="navfont-white" href="/service">المنافسات</a></li>
        <li><a class="navfont-white" href="/customer">المصممين</a></li>
        <li><a class="navfont-white" href="/ourBlog">الأعمال الجاهزة</a></li>
        <li><a class="navfont-white" href="/contactus">تواصل معنا </a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @guest
            
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           {{ Auth::user()->name }} <span class="caret"></span>
          </a>
  
          <ul class="dropdown-menu">
            <li class="text-right">
              <a class="dropdown-item" href="/test"><i class="fa fa-user"></i> تجربه</a>
            </li>
            <li class="text-right">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                 {{ __('logout') }} 
              </a>
  
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
        @endguest
        <li><a href="#" class="active1 navfont-white " data-toggle="collapse" data-target="#myNavbar">تسجيل الدخول</a></li>
        <li><a href="/en" class="active1 navfont-white " data-toggle="collapse" data-target="#myNavbar">EN</a></li>
      </ul>
    </div>
  </div>
</nav>