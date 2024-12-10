<aside style="width: 200px; background: #f2f2f2; height: 600px; padding: 12px; box-shadow: 2px 0 5px #d1d1d1; color: var(--text-color); min-width: fit-content;">
    <h3 style="margin: 6px 0;">Account</h3>
    <div style="display: flex; align-items: center; color: var(--light-text-color); font-size: 14px;">
        <iron-icon icon="icons:create" style="margin-right: 6px; max-height: 20px; max-width: 20px;"></iron-icon>
        <div style="height: 100%;">Edit Account Information</div>
    </div>
    <form>
        <div style="padding: 4px 12px;">
            <div class="form-item">
                <div>First</div>
                <div class="light-text">Annika</div>
                <input class="form-input" type="text">
            </div>
            <div class="form-item">
                <div>Last</div>
                <div class="light-text">Pomeroy</div>
                <input class="form-input" type="text">
            </div>
            <div class="form-item">
                <div>Username</div>
                <div class="light-text">ColoringBunnies</div>
                <input class="form-input" type="text">
            </div>
            <div class="form-item">
                <div>Email</div>
                <div class="light-text">ap1397@messiah.edu</div>
                <input class="form-input" type="email">
            </div>
            <div class="form-item">
                <div>Password</div>
                <div style="display: flex; align-items: center;">
                    <!-- <iron-icon class="light-text" icon="icons:visibility" style="margin-right: 4px; max-height: 20px; max-width: 20px;"></iron-icon> -->
                    <iron-icon class="light-text" icon="icons:visibility-off" style="margin-right: 4px; max-height: 20px; max-width: 20px;"></iron-icon>
                    <div class="light-text">**********</div>
                </div>
                <input class="form-input" type="password">
            </div>
            <input style="background: white; border: 1px solid darkgray; color: var(--text-color);" type="submit" value="Update">
        </div>
    </form>
</aside>