<?php
    $users=\Auth::user();
   $languages=\App\Models\Custom::languages();
   $userLang=\Auth::user()->lang;
   $profile=asset(Storage::url('upload/profile'));
?>
    <!-- Header Start-->
<header class="codex-header">
    <div class="header-contian d-flex justify-content-between align-items-center">
        <div class="header-left d-flex align-items-center">
            <div class="sidebar-action navicon-wrap"><i data-feather="menu"></i></div>
            
        </div>
        <div class="header-right d-flex align-items-center justify-content-end">
            <ul class="nav-iconlist">
                <li>
                    <div class="navicon-wrap action-dark"><i class="fa fa-moon-o icon-dark"></i><i
                            class="fa fa-sun-o icon-light" style="display:none;"></i></div>
                </li>

                <li>
                    <div class="navicon-wrap btn-windowfull"><i data-feather="maximize"></i></div>
                </li>
                <li class="nav-profile">
                    <div class="media">
                        <div class="user-icon"><img class="img-fluid rounded-50"
                                                    src="<?php echo e((!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')); ?>"
                                                    alt="logo"></div>
                        <div class="media-body">
                            <h6><?php echo e(\Auth::user()->name); ?></h6><span class="text-light"><?php echo e(\Auth::user()->type); ?></span>
                        </div>
                    </div>
                    <div class="hover-dropdown navprofile-drop">
                        <ul>
                            <li><a href="<?php echo e(route('setting.account')); ?>"><i class="ti-user"></i><?php echo e(__('Profile')); ?></a></li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fa fa-sign-out"></i><?php echo e(__('Logout')); ?></a>
                                <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- Header End-->
<?php /**PATH /Users/user/parkingsystem/resources/views/admin/header.blade.php ENDPATH**/ ?>