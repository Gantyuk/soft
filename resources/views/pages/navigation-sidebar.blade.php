<?php
$url_id = $_SERVER['REQUEST_URI'];
$url_id = str_replace('/admin/pages/', '', $url_id);
$url_id = str_replace('/edit', '', $url_id);
?>	


@foreach($pages_nav_sidebar as $category)

    <li><a class="tree-toggler">{{ $category->name }}</a>
        <ul class="nav nav-list tree">

			@foreach($category->pages as $page)
				<li><a href="{{ url('/admin/pages/' . $page['id'] . '/edit') }}" 
				@if($page['id'] == $url_id)
					{{ 'class=nav-sidebar-active' }}
				@endif
				>{{ $page['name'] }}</a></li>
			@endforeach

            
           
        </ul>

        <li class="nav-divider"></li>
    </li>

@endforeach