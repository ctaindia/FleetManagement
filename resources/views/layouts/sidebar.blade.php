<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">{{config('app.name')}}</span> </a>
            <div class="nav_list"> 
                <a href="{{route('dashboard')}}" class="nav_link {{request()->routeIs('dashboard')? 'active' : ''}}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                @if (auth()->user()->user_type === 1)
                <a href="{{route('admin.vendor.list')}}" class="nav_link {{request()->routeIs('admin.vendor*')? 'active' : ''}}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Vendors</span> </a>
                @endif 
                <a href="{{route('admin.driver.list')}}" class="nav_link {{request()->routeIs('admin.driver*')? 'active' : ''}}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Drivers</span> </a> 
                <a href="{{route('admin.vehicle.type.list')}}" class="nav_link {{request()->routeIs('admin.vehicle.type*')? 'active' : ''}}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Vehicle Type</span> </a>
                <a href="{{route('admin.vehicles.list')}}" class="nav_link {{request()->routeIs('admin.vehicles*')? 'active' : ''}}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Vehicle</span> </a>
                <a href="{{route('admin.fuel.list')}}" class="nav_link {{request()->routeIs('admin.fuel*')? 'active' : ''}}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Fuel</span> </a> 
            </div>
        </div>
        <a href="#" class="nav_link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>