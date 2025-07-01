<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
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
