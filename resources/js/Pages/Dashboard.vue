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

                    <div class="container mt-2">
                        <div class="row">
                            
                            <div class="summary-container">
                                <!-- Average Time & Completion Rate -->
                                <div class="summary-card">
                                    <div class="summary-header">
                                    <div>
                                        <p>Average Time</p>
                                        <h4>5.32%</h4>
                                    </div>
                                    <div>
                                        <p>Completion Rate</p>
                                        <h4>84.32%</h4>
                                    </div>
                                    </div>
                                    <div class="total-responses">
                                    <h2>94%</h2>
                                    <p>Total Responses</p>
                                    </div>
                                </div>

                                <!-- Highlights -->
                                <div class="highlight-card">
                                    <div class="tabs">
                                    <span class="tab active">NPS</span>
                                    <span class="tab">CSAT</span>
                                    <span class="tab">CES</span>
                                    </div>
                                    <div class="highlight-content">
                                    <p><strong>Strongest Tag:</strong> New Customer Follow-up <span class="highlight-score green">82.16%</span></p>
                                    <p><strong>Weakest Tag:</strong> Annual Customer Satisfaction Survey <span class="highlight-score red">69.12%</span></p>
                                    </div>
                                </div>

                                <!-- Vertical Performance -->
                                <div class="vertical-performance-card">
                                    <p class="vp-title">Vertical Performance</p>
                                    <div class="vp-chart">
                                    <!-- Sample Bars -->
                                    <div class="vp-bar">
                                        <div class="bar" style="height: 30%;"></div>
                                        <img src="avatar1.png" alt="User 1" />
                                    </div>
                                    <div class="vp-bar">
                                        <div class="bar" style="height: 50%;"></div>
                                        <img src="avatar2.png" alt="User 2" />
                                    </div>
                                    <div class="vp-bar">
                                        <div class="bar" style="height: 20%;"></div>
                                        <img src="avatar3.png" alt="User 3" />
                                    </div>
                                    <div class="vp-bar">
                                        <div class="bar" style="height: 60%;"></div>
                                        <img src="avatar4.png" alt="User 4" />
                                    </div>
                                    </div>
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
