<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-normal">{{ _('Portal Notíciais') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'profile') class="active " @endif>
                <a href="{{ route('profile.edit')  }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ _('User Profile') }}</p>
                </a>
            </li>

            <li @if ($pageSlug == 'news-post') class="active " @endif>
                <a href="/news">
                    <i class="tim-icons icon-single-copy-04"></i>
                    <p>{{ _('Notícias') }}</p>
                </a>
            </li>
            @if(auth()->user()->profiles()
            ->where('name', 'Administrador')
            ->exists())
                <li @if ($pageSlug == 'users') class="active " @endif>
                    <a href="/user/management">
                        <i class="tim-icons icon-bullet-list-67"></i>
                        <p>{{ _('User Manag0ement') }}</p>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
