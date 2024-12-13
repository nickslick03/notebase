<div id="click-off"></div>
<aside id="sidebar">
    <h3 style="margin: 6px 0;">Account</h3>
    <div style="display: flex; align-items: center; color: var(--light-text-color); font-size: 14px; cursor: pointer;" onclick="editInformation()">
        <iron-icon icon="icons:create" style="margin-right: 6px; max-height: 20px; max-width: 20px;"></iron-icon>
        <div style="height: 100%;">Edit Account Information</div>
    </div>
    <form>
        <div style="padding: 4px 12px;">
            <div class="form-item">
                <div>First</div>
                <div class="light-text">Annika</div>
                <input class="form-input hidden" type="text">
            </div>
            <div class="form-item">
                <div>Last</div>
                <div class="light-text">Pomeroy</div>
                <input class="form-input hidden" type="text">
            </div>
            <div class="form-item">
                <div>Username</div>
                <div class="light-text">ColoringBunnies</div>
                <input class="form-input hidden" type="text">
            </div>
            <div class="form-item">
                <div>Email</div>
                <div class="light-text">ap1397@messiah.edu</div>
                <input class="form-input hidden" type="email">
            </div>
            <div class="form-item hidden">
                <div>Old Password</div>
                <input class="form-input" type="password">
            </div>
            <div class="hidden" style="flex-direction: column;">
                <div>The password must contain:</div>
                <ul>
                    <li>At least 8 characters</li>
                    <li>At least 1 uppercase letter</li>
                    <li>At least 1 lowercase letter</li>
                    <li>At least 1 number</li>
                </ul>
            </div>
            <div class="form-item hidden">
                <div>New Password</div>
                <input class="form-input" type="password">
            </div>
            <input style="background: white; border: none; color: var(--text-color); margin-bottom: 20px;" class="form-input hidden" type="submit" value="Update">
        </div>
    </form>
</aside>