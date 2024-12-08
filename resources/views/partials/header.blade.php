<header style="background: var(--main-color); color: white; padding: 6px;">
    <div>
        <div style="display: flex; align-items: center; margin: 0 6px;">
            <div style="font-size: 28px;">Notebase</div>
            <div style="width: 100%;"></div>
            <div>
                <div style="display: flex; align-items: center;">
                    <div style="margin-right: 6px;">
                        @if(session()->has('user'))
                            <a href="/logout">Logout</a>
                        @else
                            <a href="/login">Login</a>
                        @endif
                    </div>
                    <iron-icon icon="icons:exit-to-app"></iron-icon>
                </div>
            </div>
        </div>
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
                <div style="color: var(--light-text-color)">Departments</div>
            </div>
        </div>
    </div>
</header>