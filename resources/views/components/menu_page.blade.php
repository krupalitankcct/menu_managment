@extends('menu::app')
@section('content')
<div>
	@if($mainmenu)
    <h5> {{$mainmenu['menuLabel']}}</h5>
    <ul class={{$align}}>
    	@if(!empty($mainmenu['menuItems']))
        @foreach($mainmenu['menuItems'] as $menu)
            <a class="nav-link" href="{{url($menu['menuItemUrl'])}}">{{$menu['menuItemTitle']}}</a>
        @endforeach 
        @endif 
    </ul>
    @endif
</div>

<div>
	@if($footermenu1)
    <h5> {{$footermenu1['menuLabel']}}</h5>
    <ul class={{$align}}>
    	@if(!empty($footermenu1['menuItems']))
        @foreach($footermenu1['menuItems'] as $menu)
            <a class="nav-link" href="{{url($menu['menuItemUrl'])}}">{{$menu['menuItemTitle']}}</a>
        @endforeach  
        @endif  
    </ul>
    @endif
</div>

<div>
	@if($footermenu2)
    <h5> {{$footermenu2['menuLabel']}}</h5>
    <ul class={{$align}}>
    	@if(!empty($footermenu2['menuItems']))
        @foreach($footermenu2['menuItems'] as $menu)
            <a class="nav-link" href="{{url($menu['menuItemUrl'])}}">{{$menu['menuItemTitle']}}</a>
        @endforeach 
        @endif   
    </ul>
    @endif
</div>

@endsection