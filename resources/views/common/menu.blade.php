<div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <!-- <a href="{{ route('index') }}" class="site_title">{{ HTML::image('img/logo-small.png', '', array('width'=>'70','height'=>'60')) }}<span>Admisión UNT</span></a> -->
            <div class="site_title">{{ HTML::image('img/logo_header.png', '', array('width'=>'55','height'=>'45')) }}<span>{{ HTML::image('img/texto_header.png', '', array('width'=>'70%','height'=>'90%')) }}</span></div>
          </div>
      
          <div class="clearfix"></div>
      
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <!-- <img src="images/img.jpg" alt="..." class="img-circle profile_img"> -->
              {{ HTML::image((file_exists( public_path() . '/img/perfil/'.Auth::user()->id.'.jpg')? 'img/perfil/'.Auth::user()->id.'.jpg':'img/perfil/user.png' ), '', array('class'=>'img-circle profile_img')) }}
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2><strong>{{ Auth::user()->name }}</strong></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
      
          <br />
      
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{ route('index') }}"><i class="fa fa-home"></i> Inicio</a>
                </li>
                {{-- @if(Auth::user()->roles()->count() > 0)
                  @foreach( Auth::user()->roles()->first()->accesos_activos->where('idPadre',0)->all() as $padre )
                    <li><a><i class="{{ $padre->iClass }}"></i> {{ $padre->nombre }} <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        @foreach( Auth::user()->roles()->first()->accesos_activos->where('idPadre',$padre->id)->all() as $hijo )
                          <li><a href="{{ URL::to('/').$hijo->href }}">{{ $hijo->nombre }}</a></li> 
                        @endforeach
                      </ul>
                    </li>
                  @endforeach
                @endif --}}
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
      
          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>
      