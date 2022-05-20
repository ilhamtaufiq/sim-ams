<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('/')}}"><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">General </h6>
                     		<p class="lan-2">Dashboard</p>
						</div>
					</li>
					@role('admin')
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/kegiatan' ? 'active' : '' }}" href="#"><i data-feather="airplay"></i><span class="lan-6">Daftar Kegiatan</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/pekerjaan' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/pekerjaan' ? 'block;' : 'none;' }}">
							<li><a href="{{route('pekerjaan')}}" class="{{ Route::currentRouteName()=='pekerjaan' ? 'active' : '' }}">Semua Kegiatan</a></li>
							<li><a href="/kegiatan/1" class="{{ request()->route()->getPrefix()=='kegiatan' ? 'active' : '' }}">Sanitasi DAK</a></li>
							<li><a href="/kegiatan/2" class="{{ request()->route()->getPrefix()=='kegiatan' ? 'active' : '' }}">Pembangunan MCK</a></li>
							<li><a href="/kegiatan/3" class="{{ request()->route()->getPrefix()=='kegiatan' ? 'active' : '' }}">Pembangunan SPAM</a></li>
							<li><a href="/kegiatan/4" class="{{ request()->route()->getPrefix()=='kegiatan' ? 'active' : '' }}">Rehab SPAM</a></li>
							<li><a href="/kegiatan/5" class="{{ request()->route()->getPrefix()=='kegiatan' ? 'active' : '' }}">Air Minum DAK</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/pekerjaan' ? 'active' : '' }}" href="#"><i data-feather="archive"></i><span class="lan-3">Kontrak</span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/pekerjaan' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/dashboard' ? 'block;' : 'none;' }}">
							<li><a class="lan-4 {{ Route::currentRouteName()=='/' ? 'active' : '' }}" href="/kontrak">Daftar Kontrak</a></li>
						</ul>
					</li>
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{Route::currentRouteName()=='paket' ? 'active' : ''  }}" href="{{route('paket')}}"><i data-feather="layers"></i><span class="lan-3">Paket Pekerjaan</span></a>
					</li>
					@endrole
					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title {{Route::currentRouteName()=='tfl' ? 'active' : ''  }}" href="/tfl"><i data-feather="layers"></i><span class="lan-3">Sanitasi DAK</span></a>
					</li>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1">User </h6>
						</div>
					</li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out"> </i><span>Log Out</span></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form> 
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>