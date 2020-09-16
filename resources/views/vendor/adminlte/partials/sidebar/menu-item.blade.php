@inject('menuItemHelper', \JeroenNoten\LaravelAdminLte\Helpers\MenuItemHelper)


@if ($menuItemHelper->isSubmenu($item))
@if (Auth::check())
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info text-white">
            <p>Bem-vindo <span class="text-uppercase">{{ Auth::user()->name }}</span> !</p>
            
        </div>
      </div>
          
@endif
<div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <p>
              Posts
              <i class="fas fa-angle-left float right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('posts.index') }}" class="nav-link">
                <p>Biblioteca de Posts</p>
              </a>
              <li class="nav-item">
              <a href="{{ route('posts.create') }}" class="nav-link">
                <p>Adicionar um novo Post</p>
              </a>
            </li>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link">
            <p>
              Usuários
              <i class="fas fa-angle-left float right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('posts.index') }}" class="nav-link">
                <p>Biblioteca de Posts</p>
              </a>
              <li class="nav-item">
              <a href="{{ route('posts.create') }}" class="nav-link">
                <p>Adicionar um novo Post</p>
              </a>
            </li>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  
@endif
