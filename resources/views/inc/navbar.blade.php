
<nav class="navbar">

<nav class="navbar" id="MainNav">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
           <!--  <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> -->
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
              <li><a href="/"> <i class="fas fa-home"></i> <b>HOME</b></a></li>
              <li><a href="/about"> <i class="fab fa-weixin"></i> <b>ABOUT</b></a></li>
              <li><a href="/projects"> <i class="fas fa-database"></i><b> PROJECTS IDEAS</b></a></li>

              @if(Auth::check())
                @if(Auth::user()->type == 's')
                <li><a href="/student/register_gp_SLeader"> <i class="fas fa-plus"></i><b> Rejester Your Team</b></a></li>
                @endif
                @if(Auth::user()->type == 'p')
                    <li><a href="/prof/open_registraion_date"> <i class="fas fa-plus"></i><b> Open Registraion Date</b></a></li>
                    <li><a href="/prof/student_requests"> <i class="glyphicon glyphicon-eye-open"></i><b> Student Requests</b></a></li>
                    @if(Auth::user()->type == 's')
                        <?php
                        $student =  App\Student::where('user_id' , Auth::user()->id)->first();

                        ?>
                @if($student->team)
                    @if($student->team->TeamRequestDoctor)
                        <li><a href="/team/{{$student->team->id}}"> <i class="fas fa-plus"></i><b>You Team Details</b></a></li>
                    @endif
                @else
                        <li><a href="/student/register_gp_SLeader"> <i class="fas fa-plus"></i><b> Rejester Your Team</b></a></li>
                @endif
                    @endif
                   

                @endif
                
                @if(session()->get('type') == 'a')

                     <li><a href="admin/all_users"> <i class="far fa-user"></i> Users</a></li>

                @endif
                @endif

@if(Auth::check())
@if(session()->get('type') == 's')

    <?php
        $projects[] = new App\Project ;
        $projects = App\Project::all()->where('user_id',auth()->user()->id) ;
    ?>

    @if($projects->count() > 0)
        <?php  $gp_exist = 0 ?>
      @foreach ($projects as $p)
        @if($p->is_gp == 1)
            <?php $gp_exist = 1 ?>
        @endif
      @endforeach
      @if($gp_exist == 0)
        <li><a href="{{ action('StudentController@register_gp_SLeader') }}">Register GP</a></li>
      @endif
    @else
        <li><a href="{{ action('StudentController@register_gp_SLeader') }}">Register GP</a></li>
    @endif



@endif
@endif

</ul>

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">
<!-- Authentication Links -->
@if (Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
    <li><a href="{{ route('register') }}">Register</a></li>
@else
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li><a href="/profile">Profile</a></li>
            <li><a href="/dashboard">Dashboard</a></li>
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif
</ul>
</div>
</div>
</nav>