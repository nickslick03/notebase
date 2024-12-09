<header style="background: var(--main-color); color: white; padding: 6px;">
    <div>
        <div style="display: flex; align-items: center; margin: 0 6px;">
            <div id="logo" style="font-size: 28px;">
                <a href="{{ session()->has('user') ? '/dashboard' : '/' }}">Notebase</a>
            </div>
            <div style="width: 100%;"></div>
            <div>
                <div style="display: flex; gap: 6px; align-items: center; margin-right: 6px;">
                    @if(session()->has('user'))
                        <a href="/logout">Logout</a>
                        <iron-icon icon="icons:exit-to-app"></iron-icon>
                    @else
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    @endif
                </div>
            </div>
        </div>
        @if(session()->has('user'))
            <div style="background: white; border-radius: 25px; display: flex; align-items: center; margin-top: 4px;">
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px;">
                    <iron-icon icon="icons:account-circle" style="margin-right: 6px;"></iron-icon>
                    <div style="color: var(--light-text-color)">Account</div>
                </div>
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <iron-icon icon="icons:date-range" style="margin-right: 6px;"></iron-icon>
                    <div style="color: var(--light-text-color)">Dashboard</div>
                </div>
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <iron-icon icon="icons:chrome-reader-mode" style="margin-right: 6px;"></iron-icon>
                    <div style="color: var(--light-text-color)">Courses</div>
                </div>
            </div>
        @endif
    </div>
</header>