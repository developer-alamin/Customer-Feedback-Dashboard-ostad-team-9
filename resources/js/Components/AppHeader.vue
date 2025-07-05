<script setup>
import AppHeader from "@/Components/AppHeader.vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { BellDot, Search } from "lucide-vue-next";
import { Link, usePage } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

const showingNavigationDropdown = ref(false);
const isScrolled = ref(false);

// Track scroll position
onMounted(() => {
    window.addEventListener("scroll", () => {
        isScrolled.value = window.scrollY > 10;
    });
});
</script>

<template>
    <nav
        :class="[
            'sticky top-0 z-50 border-b border-gray-100 bg-white shadow-md transition-all duration-300',
            isScrolled ? 'py-1 h-16' : 'py-2 h-20'
        ]"
    >
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl h-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-full">
                <!--App Logo -->
                <div class="flex shrink-0 items-center">
                    <Link :href="route('dashboard')">
                        <ApplicationLogo
                            :class="[
                                isScrolled ? 'h-10' : 'h-14',
                                'w-auto block fill-current text-gray-800 transition-all duration-300'
                            ]"
                        />
                    </Link>
                </div>

                <!-- Search Area -->
                <div class="hidden md:flex md:items-center">
                    <div class="relative group">
                        <Search class="absolute top-1/2 left-3 h-5 w-5 -translate-y-1/2 text-gray-400 pointer-events-none" />
                        <input
                            type="search"
                            name="search"
                            id="search"
                            placeholder="Search Data"
                            class="h-10 w-60 pl-10 pr-4 rounded-md bg-transparent text-gray-700 placeholder-gray-400 outline-none border border-transparent focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all duration-200"
                        />
                    </div>
                </div>

                <!-- User Menu -->
                <div class="hidden sm:ms-6 sm:flex sm:items-center sm:justify-center h-full">
                    <!-- Notifications Icon -->
                    <div class="relative ms-3 mr-5 h-full flex items-center">
                        <button class="flex items-center">
                            <span class="sr-only">Notifications</span>
                            <BellDot class="w-6 h-6 text-gray-400 hover:text-[#2a8d86]" />
                        </button>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative ms-3 h-full flex items-center">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        class="inline-flex items-center rounded-md border border-transparent bg-white text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none cursor-pointer"
                                    >
                                        <img
                                            :class="[
                                                isScrolled ? 'w-10 h-10' : 'w-14 h-14', 
                                                'rounded-full ring ring-gray-200 border-2 border-white transition-all duration-300']"
                                            :src="
                                                $page.props.auth.user?.profile?.image
                                                    ? '/storage/' + $page.props.auth.user.profile.image
                                                    : '/male-profile-avatar.png'
                                            "
                                            :alt="$page.props.auth.user.name"
                                        />
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="w-48 break-words px-4 py-2 bg-gray-50 border-b border-gray-200 rounded-t-md">
                                    <p class="text-md font-semibold text-[#208b84]">
                                        {{ $page.props.auth.user.name }}
                                    </p>
                                    <p class="text-xs text-gray-500 break-all">
                                        {{ $page.props.auth.user.email }}
                                    </p>
                                </div>
                                <DropdownLink :href="route('profile.edit')">
                                    Profile
                                </DropdownLink>
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                >
                                    Log Out
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                </div>

                <!-- Hamburger : Icon for mobile menu -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button
                        @click="showingNavigationDropdown = !showingNavigationDropdown"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                    >
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path
                                :class="{
                                    hidden: showingNavigationDropdown,
                                    'inline-flex': !showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                :class="{
                                    hidden: !showingNavigationDropdown,
                                    'inline-flex': showingNavigationDropdown,
                                }"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
            :class="{
                block: showingNavigationDropdown,
                hidden: !showingNavigationDropdown,
            }"
            class="sm:hidden"
        >
            <div class="space-y-1 pb-3 pt-2">
                <ResponsiveNavLink
                    :href="route('dashboard')"
                    :active="route().current('dashboard')"
                >
                    Dashboard
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="border-t border-gray-200 pb-1 pt-4">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">
                        {{ $page.props.auth.user.name }}
                    </div>
                    <div class="text-sm font-medium text-gray-500">
                        {{ $page.props.auth.user.email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">
                        Profile
                    </ResponsiveNavLink>
                    <ResponsiveNavLink
                        :href="route('logout')"
                        method="post"
                        as="button"
                    >
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>
