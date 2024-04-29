<?php
    $admin_logo=getSettingsValByName('company_logo');
    $ids     = parentId();
    $authUser=\App\Models\User::find($ids);
 $subscription = \App\Models\Subscription::find($authUser->subscription);
 $routeName=\Request::route()->getName();
?>
<aside class="codex-sidebar sidebar-<?php echo e($settings['sidebar_mode']); ?>">
    <div class="logo-gridwrap">
        <a class="codexbrand-logo" href="<?php echo e(route('home')); ?>">
            <img class="img-fluid"
                 src="<?php echo e(asset(Storage::url('upload/logo/')).'/'.(isset($admin_logo) && !empty($admin_logo)?$admin_logo:'logo.png')); ?>"
                 alt="theeme-logo">
        </a>
        <a class="codex-darklogo" href="<?php echo e(route('home')); ?>">
            <img class="img-fluid"
                 src="<?php echo e(asset(Storage::url('upload/logo/')).'/'.(isset($admin_logo) && !empty($admin_logo)?$admin_logo:'logo.png')); ?>"
                 alt="theeme-logo"></a>
        <div class="sidebar-action"><i data-feather="menu"></i></div>
    </div>
    <div class="icon-logo">
        <a href="<?php echo e(route('home')); ?>">
            <img class="img-fluid"
                 src="<?php echo e(asset(Storage::url('upload/logo/')).'/'.(isset($admin_logo) && !empty($admin_logo)?$admin_logo:'logo.png')); ?>"
                 alt="theeme-logo">
        </a>
    </div>
    <div class="codex-menuwrapper">
        <ul class="codex-menu custom-scroll" data-simplebar>
            <li class="cdxmenu-title">
                <h5><?php echo e(__('Home')); ?></h5>
            </li>
            <li class="menu-item <?php echo e(in_array($routeName,['dashboard',''])?'active':''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <div class="icon-item"><i data-feather="home"></i></div>
                    <span><?php echo e(__('Dashboard')); ?></span>
                </a>
            </li>
            
                    <li class="menu-item <?php echo e(in_array($routeName,['users.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('users.index')); ?>">
                            <div class="icon-item"><i data-feather="users"></i></div>
                            <span><?php echo e(__('Users')); ?></span>
                        </a>
                    </li>
                
                
                    <li class="menu-item <?php echo e(in_array($routeName,['users.index','logged.history','role.index','role.create','role.edit'])?'active':''); ?>">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="users"></i></div>
                            <span><?php echo e(__('Staff Management')); ?></span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="submenu-list"
                            style="display: <?php echo e(in_array($routeName,['users.index','logged.history','role.index','role.create','role.edit'])?'block':'none'); ?>">
                            
                                <li class="menu-item <?php echo e(in_array($routeName,['role.index','role.create','role.edit'])?'active':''); ?>">
                                    <a href="<?php echo e(route('role.index')); ?>"><?php echo e(__('Roles')); ?>  </a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['users.index'])?'active':''); ?>">
                                    <a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['logged.history'])?'active':''); ?>">
                                    <a href="<?php echo e(route('logged.history')); ?>"><?php echo e(__('Logged History')); ?></a>
                                </li>
                            
                        </ul>
                    </li>
                

            
                <li class="cdxmenu-title">
                    <h5><?php echo e(__('Business Management')); ?></h5>
                </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['parking-rate.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('parking-rate.index')); ?>">
                            <div class="icon-item"><i data-feather="file-text"></i></div>
                            <span><?php echo e(__('Parking Rate')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['parking-slot.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('parking-slot.index')); ?>">
                            <div class="icon-item"><i data-feather="map"></i></div>
                            <span><?php echo e(__('Parking Slot')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['rfid-vehicle.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('rfid-vehicle.index')); ?>">
                            <div class="icon-item"><i data-feather="truck"></i></div>
                            <span><?php echo e(__('RFID Vehicle')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['parking.index','parking.show'])?'active':''); ?>">
                        <a href="<?php echo e(route('parking.index')); ?>">
                            <div class="icon-item"><i data-feather="trello"></i></div>
                            <span><?php echo e(__('Parking')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['parked.vehicle'])?'active':''); ?>">
                        <a href="<?php echo e(route('parked.vehicle')); ?>">
                            <div class="icon-item"><i data-feather="slash"></i></div>
                            <span><?php echo e(__('Parked Vehicle')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['contact.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('contact.index')); ?>">
                            <div class="icon-item"><i data-feather="phone-call"></i></div>
                            <span><?php echo e(__('Contacts')); ?></span>
                        </a>
                    </li>
                

                
                    <li class="menu-item <?php echo e(in_array($routeName,['note.index'])?'active':''); ?> ">
                        <a href="<?php echo e(route('note.index')); ?>">
                            <div class="icon-item"><i data-feather="file-text"></i></div>
                            <span><?php echo e(__('Notes')); ?></span>
                        </a>
                    </li>
                

            
            
                <li class="cdxmenu-title">
                    <h5><?php echo e(__('System Setup')); ?></h5>
                </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['parking-zone.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('parking-zone.index')); ?>">
                            <div class="icon-item"><i data-feather="hard-drive"></i></div>
                            <span><?php echo e(__('Parking Zone')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['vehicle-type.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('vehicle-type.index')); ?>">
                            <div class="icon-item"><i data-feather="sliders"></i></div>
                            <span><?php echo e(__('Vehicle Type')); ?></span>
                        </a>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['floor.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('floor.index')); ?>">
                            <div class="icon-item"><i data-feather="layers"></i></div>
                            <span><?php echo e(__('Parking Floor')); ?></span>
                        </a>
                    </li>

                    <li class="menu-item <?php echo e(in_array($routeName,['gate.index'])?'active':''); ?>">
                        <a href="<?php echo e(route('gate.index')); ?>">
                            <div class="icon-item"><i data-feather="hard-drive"></i></div>
                            <span><?php echo e(__('Gate')); ?></span>
                        </a>
                    </li>
                
                <li class="cdxmenu-title">
                    <h5><?php echo e(__('System Settings')); ?></h5>
                </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['subscriptions.index','subscriptions.show','subscription.transaction'])?'active':''); ?>">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="database"></i></div>
                            <span><?php echo e(__('Pricing')); ?></span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="submenu-list"
                            style="display: <?php echo e(in_array($routeName,['subscriptions.index','subscriptions.show','subscription.transaction'])?'block':'none'); ?>">
                            
                                <li class="<?php echo e(in_array($routeName,['subscriptions.index','subscriptions.show'])?'active':''); ?>">
                                    <a href="<?php echo e(route('subscriptions.index')); ?>"><?php echo e(__('Packages')); ?></a>
                                </li>
                            
                            
                                <li class="<?php echo e(in_array($routeName,['subscription.transaction'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('subscription.transaction')); ?>"><?php echo e(__('Transactions')); ?></a>
                                </li>
                            
                        </ul>
                    </li>
                
                    <li class="menu-item <?php echo e(in_array($routeName,['coupons.index','coupons.history'])?'active':''); ?>">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="gift"></i></div>
                            <span><?php echo e(__('Coupons')); ?></span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="submenu-list"
                            style="display: <?php echo e(in_array($routeName,['coupons.index','coupons.history'])?'block':'none'); ?>">
                            
                                <li class="<?php echo e(in_array($routeName,['coupons.index'])?'active':''); ?>">
                                    <a href="<?php echo e(route('coupons.index')); ?>"><?php echo e(__('All Coupon')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['coupons.history'])?'active':''); ?>">
                                    <a href="<?php echo e(route('coupons.history')); ?>"><?php echo e(__('Coupon History')); ?></a>
                                </li>
                            
                        </ul>
                    </li>
                
                
                    <li class="menu-item <?php echo e(in_array($routeName,['setting.account','setting.password','setting.general','setting.company','setting.smtp','setting.payment','setting.site.seo','setting.google.recaptcha'])?'active':''); ?>">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="settings"></i></div>
                            <span><?php echo e(__('Settings')); ?></span><i class="fa fa-angle-down"></i></a>
                        <ul class="submenu-list "
                            style="display: <?php echo e(in_array($routeName,['setting.account','setting.password','setting.general','setting.company','setting.smtp','setting.payment','setting.site.seo','setting.google.recaptcha'])?'block':'none'); ?>">
                            
                                <li class="<?php echo e(in_array($routeName,['setting.account'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.account')); ?>"><?php echo e(__('Account Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.password'])?'active':''); ?>">
                                    <a href="<?php echo e(route('setting.password')); ?>"><?php echo e(__('Password Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.general'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.general')); ?>"><?php echo e(__('General Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.company'])?'active':''); ?>">
                                    <a href="<?php echo e(route('setting.company')); ?>"><?php echo e(__('Company Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.smtp'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.smtp')); ?>"><?php echo e(__('SMTP Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.payment'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.payment')); ?>"><?php echo e(__('Payment Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.site.seo'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.site.seo')); ?>"><?php echo e(__('Site SEO Setting')); ?></a>
                                </li>
                            
                                <li class="<?php echo e(in_array($routeName,['setting.google.recaptcha'])?'active':''); ?> ">
                                    <a href="<?php echo e(route('setting.google.recaptcha')); ?>"><?php echo e(__('ReCaptcha Setting')); ?></a>
                                </li>
                            
                        </ul>
                    </li>
                

            


        </ul>
    </div>
</aside>
<!-- sidebar end-->
<?php /**PATH /Users/oktavianusmatthew/easypark/main_file/resources/views/admin/menu.blade.php ENDPATH**/ ?>