<template>
    <div class="wrapper">
        <NavigationBar/>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <Link :href="route('dashboard')" class="brand-link">
                <img src="/images/L2jServer.png" alt="AdminLTE Logo"
                     class="brand-image elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">L2J Dashboard</span>
            </Link>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://placeimg.com/160/160/people" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info text-white">
                        <div>
                            <span class="mr-4">{{ $page.props.auth.user.name }}</span>

                            <Link
                                method="post"
                                as="button"
                                class="btn btn-default"
                                :href="route('logout')"
                            >
                                <i class="fa fa-sign-out-alt"></i>
                            </Link>
                        </div>
                    </div>
                </div>

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <SidebarMenu/>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <slot/>
            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import {Link} from '@inertiajs/inertia-vue3';
import NavigationBar from '@/Shared/NavigationBar.vue';
import SidebarMenu from '@/Shared/SidebarMenu.vue';

export default {
    components: {
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        Link,
        NavigationBar,
        SidebarMenu,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
}
</script>

<style scoped>
    .content-wrapper {
        padding-top: 10px;
    }
</style>
