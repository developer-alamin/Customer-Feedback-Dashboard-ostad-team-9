<template>
    <div class=" grid grid-cols-1 md:grid-cols-3 gap-4">
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
                <span
                    class="px-3 py-1 bg-teal-600 text-white text-xs rounded-full"
                    >NPS</span
                >
                <span
                    class="px-3 py-1 bg-teal-100 text-teal-700 text-xs rounded-full"
                    >CSAT</span
                >
                <span
                    class="px-3 py-1 bg-teal-100 text-teal-700 text-xs rounded-full"
                    >CES</span
                >
            </div>
            <div class="text-sm text-gray-700">
                <p class="mb-2 font-medium">
                    Strongest Tag:
                    <span class="font-normal">New Customer Follow-up</span>
                    <span class="text-teal-600 font-bold float-right"
                        >82.16%</span
                    >
                </p>
                <p class="font-medium">
                    Weakest Tag:
                    <span class="font-normal"
                        >Annual Customer Satisfaction Survey</span
                    >
                    <span class="text-red-500 font-bold float-right"
                        >69.12%</span
                    >
                </p>
            </div>
        </div>

        <!-- Vertical Performance -->
        <div class="bg-white p-6 rounded shadow">
            <p class="font-semibold text-gray-700 mb-4">Vertical Performance</p>
            <div class="flex items-end justify-between h-32 space-x-4">
                <div class="flex flex-col items-center">
                    <div
                        class="w-4 bg-teal-600 rounded-t"
                        style="height: 30%"
                    ></div>
                    <img
                        src="avatar1.png"
                        alt="User 1"
                        class="w-6 h-6 rounded-full mt-2"
                    />
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-4 bg-teal-600 rounded-t"
                        style="height: 50%"
                    ></div>
                    <img
                        src="avatar2.png"
                        alt="User 2"
                        class="w-6 h-6 rounded-full mt-2"
                    />
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-4 bg-teal-600 rounded-t"
                        style="height: 20%"
                    ></div>
                    <img
                        src="avatar3.png"
                        alt="User 3"
                        class="w-6 h-6 rounded-full mt-2"
                    />
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-4 bg-teal-600 rounded-t"
                        style="height: 60%"
                    ></div>
                    <img
                        src="avatar4.png"
                        alt="User 4"
                        class="w-6 h-6 rounded-full mt-2"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
