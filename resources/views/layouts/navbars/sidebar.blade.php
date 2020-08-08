<div class="sidebar" data-color="purple" data-background-color="white">
   <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('SKYTECH POST') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'posting' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('posting.index') }}">
          <i class="material-icons">bubble_chart</i>
            <p>{{ __('Posting') }}</p>
        </a>
      </li>
    </ul>
  </div>
</div>