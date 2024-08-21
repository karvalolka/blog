<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('personal.home')}}" class="nav-link">
                    <i class="nav-icon fas fa-suitcase-rolling"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="nav-icon far fa-hand-spock"></i>
                    <p>
                        Понравившиеся посты
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('personal.comment.index')}}" class="nav-link">
                    <i class="nav-icon far fa-comments"></i>
                    <p>
                        Комментарии
                    </p>
                </a>
            </li>

        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
