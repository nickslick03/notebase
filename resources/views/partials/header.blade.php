<header style="background: var(--main-color); color: white; padding: 6px;">
    <div>
        <div style="display: flex; align-items: center; margin: 0 6px;">
            <div id="logo" style="font-size: 28px;">
                <a href="{{ session()->has('user') ? '/dashboard' : '/' }}">Notebase</a>
            </div>
            <div style="width: 100%;"></div>
            <div class="account-links">
                <div style="display: flex; gap: 6px; align-items: center; margin-right: 6px;">
                    @if(session()->has('user'))
                        <a href="/logout">Logout</a>
                        <iron-icon icon="icons:exit-to-app"></iron-icon>
                    @else
                       
                        <a href="/login" style="display: flex; flex-direction: row; align-items: center;">Login
                            <iron-icon icon="icons:account-box" style="margin: 0 12px 0 6px; max-height: 20px; max-width: 20px;"></iron-icon>
                        </a>
                       
                        <a href="/register" style="display: flex; flex-direction: row; align-items: center;">Register
                            <iron-icon icon="icons:add-box" style="margin: 0 6px; max-height: 20px; max-width: 20px;"></iron-icon>
                        </a>
                       
                    @endif
                </div>
            </div>
        </div>
        <div class="navigation" style="background: white; border-radius: 25px; display: flex; align-items: center; margin-top: 4px;">
            @if(session()->has('user'))
                <!--Account-->
                <div style="display: flex; flex-box: row; align-items: center; color: var(--main-color); padding: 2px 6px;" onclick="expandSidebar()">
                    <iron-icon icon="icons:account-circle" style="margin-right: 6px;"></iron-icon>
                    <div id="accountbtn" style="color: var(--light-text-color)" role="button">Account</div>
                </div>
                <!--Dashboard-->
                <div style="color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <a href="/dashboard" style = "display: flex; flex-direction: row; align-items: center;"><iron-icon icon="icons:date-range" style="margin-right: 6px; color: var(--main-color);"></iron-icon>
                    <div style="color: var(--light-text-color)">Dashboard</div></a>
                </div>
                <!--Resource-->
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; ">
                    <a href="/upload_resource" style = "display: flex; flex-direction: row; align-items: center;"><iron-icon icon="icons:add" style="margin-right: 6px; color: var(--main-color);"></iron-icon>
                    <div style="color: var(--light-text-color);">Add Resource</div></a>
                </div>
            @endif
            <!--Course-->
            <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                <a href="/course" style = "display: flex; flex-direction: row; align-items: center;"><iron-icon icon="icons:chrome-reader-mode" style="margin-right: 6px; color: var(--main-color);"></iron-icon>
                <div style="color: var(--light-text-color)">Courses</div></a>
            </div>
        </div>
    </div>
</header>
<script src="/js/sidebar.js"></script>