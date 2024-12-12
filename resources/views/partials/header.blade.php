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
                            <iron-icon icon="icons:add-circle-outline" fill = "blue" style="margin: 0 6px; max-height: 20px; max-width: 20px;"></iron-icon>
                        </a>
                        
                        
                    @endif
                </div>
            </div>
        </div>
        @if(session()->has('user'))
            <div class="navigation" style="background: white; border-radius: 25px; display: flex; align-items: center; margin-top: 4px;">
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px;">
                    <iron-icon icon="icons:account-circle" style="margin-right: 6px;"></iron-icon>
                    <div id="accountbtn" style="color: var(--light-text-color)" role="button">Account</div>
                </div>
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <iron-icon icon="icons:date-range" style="margin-right: 6px;"></iron-icon>
                    <a href="/dashboard" style="color: var(--light-text-color)">Dashboard</a>
                </div>
                <div style="display: flex; align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <iron-icon icon="icons:chrome-reader-mode" style="margin-right: 6px;"></iron-icon>
                    <a href="/course" style="color: var(--light-text-color)">Courses</a>
                </div>
                <!--test-->
                <div style="display: flex; float: right align-items: center; color: var(--main-color); padding: 2px 6px; margin-left: 6px;">
                    <iron-icon icon="icons:add" style="margin-right: 6px;"></iron-icon>
                    <a href="/upload_resource" style="color: var(--light-text-color)">Add Resource</a>
                </div>
            </div>
        @endif
    </div>
</header>