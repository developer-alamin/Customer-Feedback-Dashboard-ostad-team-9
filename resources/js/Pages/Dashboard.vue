<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RightSidebar from "@/Components/RightSidebar/RightSidebar.vue";
import MiddleRowCards from "@/Components/DashboardCards/MiddleRowCards.vue";
import BottomRowCards from "@/Components/DashboardCards/BottomRowCards.vue";
import { Head } from "@inertiajs/vue3";

// Props from backend
const props = defineProps({
  questions: Array
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 my-5">
            <div class="flex justify-between gap-8">
                
                <!-- Left Side : Main Content Area -->
                <div class="w-[73%] overflow-hidden">
                    <!-- Page Heading Area -->
                    <div class="p-6 text-gray-900">You're logged in!</div>

                    <!-- Statistics Area -->
                    <!-- Top 3 Cards Area -->
                    <!-- Middle 3 Cards Area -->
                    <MiddleRowCards />

                    <!-- Last 3 Cards Area -->
                    <BottomRowCards />
                </div>

                <!-- Right Side : Questions Answer Area -->
                <div class="w-[27%]">
                    <RightSidebar :questions="questions" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
