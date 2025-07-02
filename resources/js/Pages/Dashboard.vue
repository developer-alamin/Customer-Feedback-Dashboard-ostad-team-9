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

                    <div class="container">
                        <div class="row">
                            <div class="col-md-3" >
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-2 text-sm text-gray-500">Survey Send</p>
                                    <h2 class="mb-0 text-capitalize font-weight-bold">
                                        <span id="product">60</span>
                                    </h2>
                                                
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-2 text-sm text-gray-500">Response Received</p>
                                    <h2 class=" mb-0 text-capitalize font-weight-bold">
                                        <span id="product">42</span>
                                    </h2>
                                                
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-2 text-sm text-gray-500">Response Pending</p>
                                    <h2 class="mb-0 text-capitalize font-weight-bold">
                                        <span id="product">12</span>
                                    </h2>
                                                
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-plain h-100 bg-white p-3 text-center">
                                    <p class="mb-2 text-sm text-gray-500">Customer Excluded</p>
                                    <h2 class="mb-0 text-capitalize font-weight-bold">
                                        <span id="product">06</span>
                                    </h2>
                                                
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
