<?php 
    $user = session()->get('user');
?>
@if(isset($show_sidebar) && $show_sidebar == 1)
<script>
    const show_sidebar = true;
</script>
@endif
@if(isset($show_sidebar_edit) && $show_sidebar_edit == 1)
    <script>
        const show_sidebar_edit = true;
    </script>
@endif
<div id="click-off"></div>
<aside id="sidebar">
    <h3 style="margin: 6px 0;">Account</h3>
    <!--Edits Account Information-->
    <div style="display: flex; align-items: center; color: var(--light-text-color); font-size: 14px; cursor: pointer;"
    onclick="editInformation()">
        <iron-icon icon="icons:create" style="margin-right: 6px; max-height: 20px; max-width: 20px;"></iron-icon>
        <div style="height: 100%;">Edit Account Information</div>
    </div>
    <!--Deletes Account-->
    <div style="display: flex; align-items: center; color: var(--light-text-color); font-size: 14px; cursor: pointer;"
    onclick="openDeleteForm()">
        <iron-icon icon="icons:delete-forever" style="margin-right: 6px; max-height: 20px; max-width: 20px;"></iron-icon>
        <div style="height: 100%;">Delete Account</div>
    </div>
    <form id="delete-form" style="display: none;" action="delete_account", method="post">
        @csrf
        <input type="submit" name="delete" value="Confirm Account Deletion"
        style="padding: auto; background: #ff351f; color: white; border: none;">
        <div 
            class="light-text"
            style="max-width: 200px; text-align: center; font-style: italic; line-height: 100%; font-size: 12px; margin: 6px;">
            Click Delete Account again to remove this popup
        </div>
    </form>
    <form action="update_account" method="post">
        @csrf
        <div style="padding: 0 12px 4px 12px;">
            <div class="form-item">
                <div>First Name</div>
                <div class="light-text">{{ $user->first_name }}</div>
                <input class="form-input hidden" type="text" name="first_name" required value="{{ old('first_name') ?? $user->first_name }}">    
                @error('first_name', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--Last Name-->
            <div class="form-item">
                <div>Last Name</div>
                <div class="light-text">{{ $user->first_name }}</div>
                <input class="form-input hidden" type="text" name="last_name" value="{{ old('last_name') ?? $user->last_name }}">
                @error('last_name', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--Username-->
            <div class="form-item">
                <div>Username</div>
                <div class="light-text">{{ $user->username }}</div>
                <input class="form-input hidden" type="text" name="username" value="{{ old('username') ?? $user->username }}">
                @error('username', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
            </div>
            <!--Email-->
            <div class="form-item">
                <div>Email</div>
                <div class="light-text">{{ $user->email }}</div>
                <input class="form-input hidden" type="email" name="email" value="{{ old('email') ?? $user->email }}">
                @error('email', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--Old Password-->
            <div class="form-item hidden">
                <div>Old Password</div>
                <input class="form-input" type="password" name="password">
                @error('password', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-item hidden">
                <div>New Password</div>
                <input class="form-input" type="password" name="new_password">
                @error('new_password', 'update')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--New Password-->
            <div class="hidden" style="flex-direction: column;">
                <div>The password must contain:</div>
                <ul>
                    <li>At least 8 characters</li>
                    <li>At least 1 uppercase letter</li>
                    <li>At least 1 lowercase letter</li>
                    <li>At least 1 number</li>
                </ul>
            </div>
            <input style="background: var(--light-text-color); border: none; color: white; margin-bottom: 20px;" class="form-input hidden" type="submit" value="Update">
        </div>
    </form>
</aside>
<script src="/js/sidebar.js"></script>