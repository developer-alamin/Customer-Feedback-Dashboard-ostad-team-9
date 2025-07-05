<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RightSidebar from "@/Components/RightSidebar/RightSidebar.vue";
import TopRowCards from "@/Components/DashboardCards/TopRowCards.vue";
import MiddleRowCards from "@/Components/DashboardCards/MiddleRowCards.vue";
import BottomRowCards from "@/Components/DashboardCards/BottomRowCards.vue";
import StatisticsCards from "@/Components/DashboardCards/StatisticsCards.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { computed } from 'vue';

// Props from backend
const props = defineProps({
  questions: Array
})

// Greetings based on time
const page = usePage();

const greeting = computed(() => {
  const hour = new Date().getHours();

  if (hour < 12) {
    return 'Good Morning';
  } else if (hour < 17) {
    return 'Good Afternoon';
  } else {
    return 'Good Evening';
  }
});



</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 my-5">
            <div class="flex justify-between gap-8">
                
                <!-- Left Side : Main Content Area -->
                <div class="w-[73%] overflow-hidden">
                    <!-- Page Heading Area -->
                    <div class="flex justify-between items-center">
                        <!-- Greeting Area -->
                        <div class="py-5 px-2 text-gray-600 text-xl font-semibold">{{ greeting }}, {{ page.props.auth.user.name }}</div>
                        
                        <!-- Right Side Area -->
                        <div class="flex justify-end items-center space-x-2"></div>
                    </div> 

                    
                    <!-- Statistics Area -->
                    <StatisticsCards class="mb-5" />

                    <!-- Top 3 Cards Area -->
                    <TopRowCards class="mb-5" />
                     
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
