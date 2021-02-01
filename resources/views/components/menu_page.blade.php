<div class="footer-block">
    <h5> {{$FooterMenu1['menuLabel']}}</h5>
    <ul>
        @foreach($FooterMenu1['menuItems'] as $menu)
            <li><a href="{{url($menu['menuItemUrl'])}}">{{$menu['menuItemTitle']}}</a></li>
        @endforeach    
    </ul>
</div>