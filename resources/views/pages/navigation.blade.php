

    <!--li class="active"><a href="/">Home</a></li>
    <li><a href="#">JS Development</a></li>
    <li><a href="#">Hire JS Developers</a></li>
    <li><a href="#">Dedicated JS Team</a></li>
    <li><a href="#">Prices</a></li>
    <li><a href="#">Projects</a></li>
    <li><a href="#">Company</a></li>
    <li><a href="#">Contacts</a></li>
    <li><a href="#">Sitemap</a></li-->


<ul class="nav navbar-nav">


<?php
$url_id = $_SERVER['REQUEST_URI'];
$url_id = str_replace('/admin/pages/', '', $url_id);
?>	


	@foreach($pages_nav as $page)

    	<li><a 
    	@if($page->id == $url_id)
			class="{{ 'nav-active' }}"
    	@endif
    	href="/admin/pages/{{ $page->id }}/edit">{{ $page->name }}</a></li>

	@endforeach


</ul>

<div class="fixed-menu-panel">
	<p>Open menu</p>	
</div>


<div class="fixed-menu">
	
	<i class="fa fa-times" aria-hidden="true"></i>
	
	<a href="{{ url('/admin/quote') }}">
		<button>Quotes</button>
	</a>
	<a href="{{ url('/admin/pages') }}">
		<button>Pages</button>
	</a>
	<a href="{{ url('/admin/categories') }}">
		<button>Categories</button>
	</a>	
	<a href="{{  url('/admin/gallery') }}">
		<button>Gallery</button>
	</a>
	<a href="{{ url('/admin/project') }}">
		<button>Projects</button>
	</a>
</div>