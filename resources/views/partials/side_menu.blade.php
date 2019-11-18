<ul id="slide-out" class="sidenav sidenav-fixed deep-orange lighten-2">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="{{ url('storage/settings/October2019/high-angle-view-of-cityscape-against-cloudy-sky-313782.jpg') }}">
            </div>
            <img class="circle" src="{{ url('storage/' . Auth::user()->avatar) }}">
            <span class="white-text member_id">ID: <b>{{ Auth::user()->members->member_id }}</b></span>
            <span class="white-text name">{{ Auth::user()->name }}</span>
            <span class="white-text email">{{ Auth::user()->email }}</span>
        </div>
    </li>
    @foreach($items as $menu_item)
        @if (!$menu_item->children->isEmpty())
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"> <span class="left">{{ $menu_item->title }}</span><i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                @foreach($menu_item->children as $child_item)
                                    <li><a class="dropdown-item" href="{{ $child_item->link() }}">{{ $child_item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        @else 
            <li>
                <a class="waves-effect" href="{{ $menu_item->link() }}" target="{{ $menu_item->target }}">{{ $menu_item->title }}</a>
            </li>
        @endif
    @endforeach
</ul>
