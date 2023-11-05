<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ _('Portal Notíciais') }}</a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>

            <li >
                <a href="news">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>{{ _('Notícias') }}</p>
                </a>
            </li>
            <li>
                <a href="user/management">
                    <i class="tim-icons icon-bullet-list-67"></i>
                    <p>{{ _('User Manag0ement') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
