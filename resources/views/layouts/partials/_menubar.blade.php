<nav class="nav-wrapper">

    <div class="nav">
        <div id='cssmenu'>
            <div id="head-mobile"></div>
            <ul class="main-menu">
                <li class='active'><a href='{{route('home', [$country_code,app()->getLocale()])}}'> {{__('home')}}</a></li>
                <li><a> {{__('about_us')}}</a>
                    <ul class="inner-menu">
                        <li><a href='{{route('our-story', [$country_code,app()->getLocale()])}}'> {{__('our_story')}} </a> </li>
                        <li><a href='{{route('board-of-directors', [$country_code,app()->getLocale()])}}'> {{__('board_of_directors')}} </a> </li>
                        <li><a href='{{route('our-teams', [$country_code,app()->getLocale()])}}'> {{__('our_team')}}</a> </li>
                    </ul>
                </li>

                <li><a> {{__('services')}} </a>
                    <ul>
                        @if(isset($services_sub_count))
                        @php
                        $i = 0;
                        @endphp
                        @foreach($services as $service)
                        @php
                        $name = 'name_'.$current_language;
                        $slug = 'slug_'.$current_language;
                        @endphp

                        @if ($services_sub_count[$i] != 0)
                        <li><a href='{{route("service",[$country_code,app()->getLocale(),$service->$slug])}}'> {{$service->$name}} </a>
                            <ul class="inner-menu">

                                @foreach ($services_sub as $s_sub)
                                @if ($service->id == $s_sub->parent_id)
                                <li><a href="{{route('service', [$country_code,app()->getLocale(), $s_sub->$slug])}}"> {{$s_sub->$name}} </a></li>
                                @endif
                                @endforeach

                            </ul>

                        </li>
                        @else
                        <li><a href=' {{route("service",[$country_code,app()->getLocale(),$service->$slug])}}'> {{$service->$name}} </a> </li>
                        @endif
                        @php
                        $i++;
                        @endphp

                        @endforeach
                        @else
                        @foreach($services as $service)

                        @php
                        $name = 'name_'.$current_language;
                        $slug = 'slug_'.$current_language;
                        @endphp
                        <li><a href=' {{route("service",[$country_code,app()->getLocale(),$service->$slug])}}'> {{$service->$name}} </a> </li>

                        @endforeach
                        @endif

                    </ul>
                </li>
                <li><a href='{{route('location', [$country_code,app()->getLocale()])}}'> {{__('location')}} </a></li>
                <li><a href='{{route('careers', [$country_code,app()->getLocale()])}}'> {{__('careers')}} </a></li>
                <li><a href='{{route('customer-support', [$country_code,app()->getLocale()])}}'> {{__('customer_support')}} </a></li>
                <li><a href='{{route('blogs', [$country_code,app()->getLocale()])}}'> {{__('blogs')}} </a></li>
                <li><a href='{{route('contact', [$country_code,app()->getLocale()])}}'> {{__('contact')}} </a></li>
            </ul>
        </div>
    </div>
    <span class="nav-marker"></span>
</nav>