<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RightSidebar from "@/Components/RightSidebar/RightSidebar.vue";
import TopRowCards from "@/Components/DashboardCards/TopRowCards.vue";
import MiddleRowCards from "@/Components/DashboardCards/MiddleRowCards.vue";
import BottomRowCards from "@/Components/DashboardCards/BottomRowCards.vue";
import StatisticsCards from "@/Components/DashboardCards/StatisticsCards.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { computed } from 'vue';
import { CalendarDays, ChevronDown } from 'lucide-vue-next';

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
                    <div class="flex justify-between items-center py-6">
                        <!-- Greeting Area -->
                        <div class="px-2 text-gray-600 text-xl font-semibold">{{ greeting }}, {{ page.props.auth.user.name }}</div>
                        
                        <!-- Right Side Area -->
                        <div class="flex justify-end items-center space-x-4">
                          <div class="bg-white p-2 rounded-md shadow-md text-[#343A40] text-sm flex items-center">
                            <CalendarDays class="h-4 w-4 mr-1" />  19.12.2020 - 25.12.2020 <ChevronDown class="h-5 w-5 ml-5" />
                          </div>
                          <button class="bg-[#27B3AA] py-2 px-4 rounded-md shadow-md text-white text-sm cursor-pointer">Create New Survey</button>
                        </div>
                    </div> 

                    
                    <!-- Statistics Area -->
                    <StatisticsCards class="mb-5" />

                    <!-- Top 3 Cards Area -->
                    <TopRowCards class="mb-5" />
                     
                    <!-- Middle 3 Cards Area -->
                    <MiddleRowCards class="mb-5" />

                    <!-- Last 3 Cards Area -->
                    <BottomRowCards class="mb-5" />
                </div>

                <!-- Right Side : Questions Answer Area -->
                <div class="w-[27%]">
                    <RightSidebar :questions="questions" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
