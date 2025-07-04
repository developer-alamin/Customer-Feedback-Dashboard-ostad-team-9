<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import RightSidebar from "@/Components/RightSidebar/RightSidebar.vue";
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
                <div class="w-[73%] overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900">You're logged in!</div>

                    <!-- Statistics Area -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" >
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-4 text-lg font-semibold text-gray-400">Survey Send</p>
                                    <p class="text-5xl font-bold text-[#252733]">60</p>          
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-4 text-lg font-semibold text-gray-400">Response Received</p>
                                    <p class="text-5xl font-bold text-[#138F58]">42</p>          
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-4 text-lg font-semibold text-gray-400">Response Pending</p>
                                    <p class="text-5xl font-bold text-[#CE9F0F]">12</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-4 text-lg font-semibold text-gray-400">Customer Excluded</p>
                                    <p class="text-5xl font-bold text-[#C63E13]">06</p>               
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Right Side : Questions Answer Area -->
                <div class="w-[27%]">
                    <RightSidebar :questions="questions" />
                </div>
            </div>
        </div>
        
    </AuthenticatedLayout>
</template>

<style scoped>
.text-green{
    color:#41b883 !important;
}

.card{
    border: none !important;
}

.btn-success{
    background: #41b883 !important;
    border-color:  #41b883 !important;
}
.center-screen{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 85vh;
}
</style>
