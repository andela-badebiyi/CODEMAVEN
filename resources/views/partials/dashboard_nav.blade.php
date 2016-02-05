<div class="col-md-3 visible-md-block visible-lg-block">
    <div class="sidebar" role="navigation">
        <div class="sidebar-image align-center">
            <img src='{!! $user->avatar !!}' class="img-circle" width=100 />
        </div>
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="/videos"><i class="fa fa-youtube-play fa-fw"></i></i> Videos </a>
                </li>
                <li>
                    <a href="/messages"><i class="fa fa-envelope fa-fw"></i>
                      Messages
                      <span class='badge' style="background-color:#e89980;">
                        {{ count(Auth::user()->messages()->where('status', 0)->get()) }}
                      </span>
                    </a>
                </li>
                <li>
                    <a href="/profile"><i class="fa fa-user fa-fw"></i> My Profile </a>
                </li>
                <li>
                    <a href="/settings"><i class="fa fa-cog fa-fw"></i> Account Setings</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="visible-xs-block visible-sm col-xs-12 col-sm-12">
    <p>Menu</p>
</div>
<style type="text/css">
    .nav a{
        color:#111;
    }
</style>
