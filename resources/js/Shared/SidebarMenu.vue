<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <Link :href="route('dashboard')" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </Link>
            </li>

            <li class="nav-item">
                <Link :href="route('accounts.index')" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Accounts
                        <span class="badge badge-info right">6</span>
                    </p>
                </Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
};
</script>
