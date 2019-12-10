<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <div class="row">
                <div class="col s8 m8 offset-m2 offset-s2">
                    <img class="responsive-img portrait" src="{{ Voyager::image(Voyager::setting('site.logo', '')) }}">
                </div>
            </div>
        </div>
        <div class="divider"></div>
    </li>
    @foreach($items as $menu_item)
        @if (!$menu_item->children->isEmpty())
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header waves-effect"><i class="fa {{ $menu_item->icon_class }}"></i> <span class="left">{{ $menu_item->title }}</span><i class="material-icons">arrow_drop_down</i></a>
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
                <a class="waves-effect" href="{{ $menu_item->link() }}" target="{{ $menu_item->target }}"><i class="fa {{ $menu_item->icon_class }}"></i>{{ $menu_item->title }}</a>
            </li>
        @endif
    @endforeach
</ul>
