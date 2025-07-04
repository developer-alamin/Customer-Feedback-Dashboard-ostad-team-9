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

                    <!-- Top 4 Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 px-4">
  <div class="bg-white h-full p-4 text-center rounded shadow">
    <p class="mb-2 text-sm text-gray-500">Survey Send</p>
    <h2 class="text-lg font-bold capitalize"><span id="product">60</span></h2>
  </div>
  <div class="bg-white h-full p-4 text-center rounded shadow">
    <p class="mb-2 text-sm text-gray-500">Response Received</p>
    <h2 class="text-lg font-bold capitalize"><span id="product">42</span></h2>
  </div>
  <div class="bg-white h-full p-4 text-center rounded shadow">
    <p class="mb-2 text-sm text-gray-500">Response Pending</p>
    <h2 class="text-lg font-bold capitalize"><span id="product">12</span></h2>
  </div>
  <div class="bg-white h-full p-4 text-center rounded shadow">
    <p class="mb-2 text-sm text-gray-500">Customer Excluded</p>
    <h2 class="text-lg font-bold capitalize"><span id="product">06</span></h2>
  </div>
</div>

<!-- Summary Section -->
<div class="mt-4 px-4 grid grid-cols-1 md:grid-cols-3 gap-4">

  <!-- Average Time & Completion Rate -->
  <div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between text-sm text-gray-700">
      <div>
        <p>Average Time</p>
        <h4 class="text-lg font-bold text-teal-700">5.32%</h4>
      </div>
      <div>
        <p>Completion Rate</p>
        <h4 class="text-lg font-bold text-teal-700">84.32%</h4>
      </div>
    </div>
    <div class="text-center mt-4">
      <h2 class="text-2xl font-bold text-teal-700">94%</h2>
      <p class="text-gray-500 text-sm">Total Responses</p>
    </div>
  </div>

  <!-- Highlights -->
  <div class="bg-white p-6 rounded shadow">
    <div class="flex space-x-2 mb-4">
      <span class="px-3 py-1 bg-teal-600 text-white text-xs rounded-full">NPS</span>
      <span class="px-3 py-1 bg-teal-100 text-teal-700 text-xs rounded-full">CSAT</span>
      <span class="px-3 py-1 bg-teal-100 text-teal-700 text-xs rounded-full">CES</span>
    </div>
    <div class="text-sm text-gray-700">
      <p class="mb-2 font-medium">Strongest Tag: <span class="font-normal">New Customer Follow-up</span> <span class="text-teal-600 font-bold float-right">82.16%</span></p>
      <p class="font-medium">Weakest Tag: <span class="font-normal">Annual Customer Satisfaction Survey</span> <span class="text-red-500 font-bold float-right">69.12%</span></p>
    </div>
  </div>

  <!-- Vertical Performance -->
  <div class="bg-white p-6 rounded shadow">
    <p class="font-semibold text-gray-700 mb-4">Vertical Performance</p>
    <div class="flex items-end justify-between h-32 space-x-4">
      <div class="flex flex-col items-center">
        <div class="w-4 bg-teal-600 rounded-t" style="height: 30%;"></div>
        <img src="avatar1.png" alt="User 1" class="w-6 h-6 rounded-full mt-2" />
      </div>
      <div class="flex flex-col items-center">
        <div class="w-4 bg-teal-600 rounded-t" style="height: 50%;"></div>
        <img src="avatar2.png" alt="User 2" class="w-6 h-6 rounded-full mt-2" />
      </div>
      <div class="flex flex-col items-center">
        <div class="w-4 bg-teal-600 rounded-t" style="height: 20%;"></div>
        <img src="avatar3.png" alt="User 3" class="w-6 h-6 rounded-full mt-2" />
      </div>
      <div class="flex flex-col items-center">
        <div class="w-4 bg-teal-600 rounded-t" style="height: 60%;"></div>
        <img src="avatar4.png" alt="User 4" class="w-6 h-6 rounded-full mt-2" />
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

.summary-container {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  margin: 20px 0;
}

.summary-card,
.highlight-card,
.vertical-performance-card {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  padding: 20px;
  flex: 1;
}

.summary-header {
  display: flex;
  justify-content: space-between;
  font-size: 14px;
}

.summary-header h4 {
  margin: 5px 0;
  color: #0e9488;
}

.total-responses {
  text-align: center;
  margin-top: 15px;
}

.total-responses h2 {
  font-size: 28px;
  color: #0e9488;
  margin: 0;
}

.total-responses p {
  color: #888;
  margin: 0;
}

.highlight-card .tabs {
  display: flex;
  gap: 10px;
  margin-bottom: 15px;
}

.tab {
  padding: 6px 12px;
  border-radius: 20px;
  background: #e6f7f4;
  color: #0e9488;
  cursor: pointer;
  font-weight: bold;
  font-size: 12px;
}

.tab.active {
  background: #0e9488;
  color: white;
}

.highlight-content p {
  font-size: 14px;
  margin: 8px 0;
}

.highlight-score {
  float: right;
  font-weight: bold;
}

.green {
  color: #0e9488;
}

.red {
  color: #d94c4c;
}

.vertical-performance-card .vp-title {
  font-weight: bold;
  margin-bottom: 15px;
}

.vp-chart {
  display: flex;
  align-items: flex-end;
  justify-content: space-around;
  height: 120px;
  position: relative;
}

.vp-bar {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-end;
}

.vp-bar .bar {
  width: 20px;
  background-color: #0e9488;
  border-radius: 5px 5px 0 0;
  transition: height 0.3s ease;
}

.vp-bar img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
  margin-top: 5px;
}

</style>
