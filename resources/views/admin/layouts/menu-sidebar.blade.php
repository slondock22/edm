<ul class="nav nav-primary">
   
    @foreach(config('menu.sidebar') as $menu)
    <li class="nav-item {{set_active($menu['active'],'active')}}">
        @if(strpos($menu['link'],'#') !== false)
        <a data-toggle="collapse" href="{{$menu['link']}}" class="collapsed" aria-expanded="false">
        @else
        <a href="{{url($menu['link'])}}">
        @endif
            <i class="{{$menu['icon']}}"></i>
            <p>{{$menu['title']}}</p>
            @if(isset($menu['children']))
            <span class="caret"></span>
            @endif
        </a>
        @if(isset($menu['children']))
        <div class="collapse" id="{{str_replace('#','',$menu['link'])}}">
            <ul class="nav nav-collapse">
                @foreach($menu['children'] as $child)
                <li class="{{set_active($child['active'],'active')}}">
                    @if(strpos($child['link'],'#') !== false)
                    <a data-toggle="collapse" href="{{$child['link']}}" class="collapsed" aria-expanded="false">
                    @else
                    <a href="{{url($child['link'])}}" >
                    @endif
                        <span class="sub-item">
                            {{$child['title']}}
                            @if(isset($child['children']))
                            <span class="caret"></span>
                             @endif
                        </span>
                    </a>
                    @if(isset($child['children']))
                    <div class="collapse" id="{{str_replace('#','',$child['link'])}}">
                    <ul class="nav nav-collapse" style="margin-bottom: 0px !important; padding-bottom: 0px !important;">
                        @foreach($child['children'] as $subchild)
                        <li class="{{set_active($subchild['active'])}}">
                            <a href="{{url($subchild['link'])}}">
                                <span class="sub-item" style="margin-left:35px !important;">
                                {{$subchild['title']}}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </li>
    @endforeach
</ul>