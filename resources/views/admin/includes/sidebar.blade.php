<div class="layoutNav shadow" id="#navDesktop">
    <div class="nav-items">
        <div class="sidenav-menu-heading">Dashboard</div>
        <a class="nav-link @if(Route::currentRouteName()=="admin") active @endif" 
        href="{{ route('admin') }}">
            <i class="fas fa-tachometer-alt text-gray pr-1"></i> Dashboard
        </a>

        <div class="sidenav-menu-heading">Index</div>
        <a class="nav-link @if(Route::currentRouteName()=="home.index") active @endif" 
        href="{{ route('home.index') }}">
            <i class="fas fa-home text-gray pr-1"></i> Inicio
        </a>
        <a class="nav-link @if(Route::currentRouteName()=="footer.index") active @endif" 
        href="{{ route('footer.index') }}">
            <i class="fas fa-fw fa-wrench text-gray pr-1"></i> Footer
        </a>
        <a class="nav-link @if(Route::currentRouteName()=="records.index") active @endif" 
        href="{{ route('records.index') }}">
            <i class="fas fa-cloud-download-alt text-gray pr-1"></i> Registros
        </a>

        <div class="sidenav-menu-heading">Nosotros</div>
        <a class="nav-link @if(Route::currentRouteName()=="home.aboutus") active @endif" 
        href="{{ route('home.aboutus') }}">
            <i class="fas fa-info-circle text-gray pr-1"></i> Nosotros info
        </a>
        <a class="nav-link @if(Route::currentRouteName()=="aboutus.index" || Route::currentRouteName()=="aboutus.create" || Route::currentRouteName()=="aboutus.edit") active @endif" 
        href="{{ route('aboutus.index') }}">
            <i class="fas fa-info-circle text-gray pr-1"></i> Items
        </a>

        <div class="sidenav-menu-heading">Partners</div>
        <a class="nav-link @if(Route::currentRouteName()=="partners.index" || Route::currentRouteName()=="partners.edit" || Route::currentRouteName()=="partners.create") active @endif" 
        href="{{ route('partners.index') }}">
            <i class="fas fa-user-shield text-gray pr-1"></i> Partners
        </a>

        <div class="sidenav-menu-heading">Soluciones</div>
        <a class="nav-link @if(Route::currentRouteName()=="solutions.index" || Route::currentRouteName()=="solutions.edit" || Route::currentRouteName()=="solutions.create") active @endif" 
        href="{{ route('solutions.index') }}">
            <i class="fas fa-people-arrows text-gray pr-1"></i> Soluciones
        </a>

        <div class="sidenav-menu-heading">Blog</div>
        <a class="nav-link @if(Route::currentRouteName()=="categories.index" || Route::currentRouteName()=="categories.edit" || Route::currentRouteName()=="categories.create") active @endif" 
        href="{{ route('categories.index') }}">
            <i class="fas fa-folder-open text-gray pr-1"></i> Categoria
        </a>
        <a class="nav-link @if(Route::currentRouteName()=="tags.index" || Route::currentRouteName()=="tags.edit" || Route::currentRouteName()=="tags.create") active @endif" 
        href="{{ route('tags.index') }}">
            <i class="fas fa-tags text-gray pr-1"></i> Tag
        </a>
        <a class="nav-link @if(Route::currentRouteName()=="posts.index" || Route::currentRouteName()=="posts.edit" || Route::currentRouteName()=="posts.create") active @endif" 
        href="{{ route('posts.index') }}">
            <i class="far fa-folder-open text-gray pr-1"></i> Entradas
        </a>


    </div>
    <div class="nav-footer py-4">
        <p>Logueado como:</p>
        <p>{{ ucwords(Auth::user()->name) }} {{ ucwords(Auth::user()->lastname) }}</p>
        <p>{{ getRole(Auth::user()->role) }}</p>
    </div>
</div>