<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-blog"></i>
                    <p>
                        Блог
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link">
                    <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-synagogue"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-torah"></i>
                    <p>
                        Посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-paw"></i>
                    <p>
                        Тэги
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
