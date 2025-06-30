<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { LogIn, UserCog, UserPlus } from 'lucide-vue-next';

const { component } = usePage();
</script>

<template>
    <header class="flex items-center justify-between py-4 px-3 w-full sm:max-w-6xl mt-8">
        <!-- Header Logo -->
        <div class="flex items-center justify-center">
            <Link href="/">
                <ApplicationLogo class="w-52 fill-current text-gray-500 border-r-2 border-[#52e2d9] pr-3" />
            </Link>
            <p class="text-xl text-[#24aca3] font-semibold pl-3">Pluse 360 Survey</p>
        </div>

        <!-- Header Navigation -->
        <nav class="mx-1 flex flex-1 justify-end">
            <Link
                v-if="component === 'Auth/Login'"
                :href="route('register')"
                class="flex items-center rounded-md border border-gray-300 px-3 py-2 text-md font-medium text-gray-700 transition hover:bg-blue-600 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:text-white dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white"
            >
               <UserPlus class="mr-2 h-5 w-5" /> Sign up
            </Link>

            <Link
                v-if="component === 'Auth/Register'"
                :href="route('login')"
                class="flex items-center rounded-md border border-gray-300 px-3 py-2 text-md font-medium text-gray-700 transition hover:bg-blue-600 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:text-white dark:border-gray-600 dark:hover:bg-blue-600 dark:hover:text-white"
            >
               <LogIn class="mr-2 h-5 w-5" /> Sign in
            </Link>
        </nav>
    </header>
</template>
