<script setup>
import { ref, onMounted, nextTick } from 'vue';
import { Chart, registerables } from 'chart.js';
import { ChevronRight } from 'lucide-vue-next';

Chart.register(...registerables);

// Data for Highlights Card
const tabs = ['NPS', 'CSAT', 'CES'];
const activeTab = ref('CSAT');

// Data for Performance Chart
const performanceData = ref([
    { label: 'Wells Fargo', score: 7.8, avatar: 'https://i.pravatar.cc/40?img=1' },
    { label: 'State Employs', score: 4.8, avatar: 'https://i.pravatar.cc/40?img=2' },
    { label: 'PNC', score: 2.3, avatar: 'https://i.pravatar.cc/40?img=3' },
    { label: 'SunTrust', score: 4.8, avatar: 'https://i.pravatar.cc/40?img=4' },
    { label: 'Fidelity', score: 7.2, avatar: 'https://i.pravatar.cc/40?img=5' },
]);


// Function to create Completion Rate Chart
const createCompletionRateChart = () => {
    const ctx = document.getElementById('completionRateChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [84.32, 100 - 84.32],
                backgroundColor: ['#FFFFFF', 'rgba(255, 255, 255, 0.3)'],
                borderWidth: 0,
                cutout: '80%',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
            },
            rotation: -45,
        }
    });
};

// Function to create Vertical Performance Chart
const createPerformanceChart = async () => {
    const ctx = document.getElementById('performanceChart');
    if (!ctx) return;

    // Preload avatar images to ensure they are drawn correctly
    const avatarImages = await Promise.all(
        performanceData.value.map(item => {
            return new Promise((resolve) => {
                const img = new Image();
                img.src = item.avatar;
                img.onload = () => resolve(img);
                img.onerror = () => resolve(null); // Handle image loading errors
            });
        })
    );

    const customXAxisPlugin = {
        id: 'customXAxis',
        afterDraw: (chart) => {
            const { ctx, chartArea: { bottom }, scales: { x } } = chart;
            ctx.save();
            ctx.font = '10px ui-sans-serif, system-ui';
            ctx.fillStyle = '#6b7280'; // text-gray-500
            ctx.textAlign = 'center';

            performanceData.value.forEach((point, index) => {
                const xPos = x.getPixelForValue(index);
                const label = point.label;
                const image = avatarImages[index];

                // Draw avatar image
                if (image) {
                const imageSize = 20; 
                const radius = imageSize / 2; 
                const yPos = bottom + 8 + radius; 

                ctx.save(); 
                
                ctx.beginPath();
                ctx.arc(xPos, yPos, radius, 0, Math.PI * 2, true);
                ctx.clip();

                ctx.drawImage(
                    image,
                    xPos - radius,
                    yPos - radius,
                    imageSize,
                    imageSize
                );

                ctx.restore(); 
            }
                
                // Draw text label
                ctx.fillText(label, xPos, bottom + 38);
            });

            ctx.restore();
        }
    };

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: performanceData.value.map(d => d.label),
            datasets: [{
                label: 'Score',
                data: performanceData.value.map(d => d.score),
                backgroundColor: '#E5E7EB', // gray-200
                borderRadius: 2,
                barPercentage: 0.5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: false },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 8,
                    ticks: {
                        stepSize: 2,
                        color: '#6b7280', // text-gray-500
                    },
                    grid: {
                        drawTicks: false,
                        color: (context) => (context.tick.value === 0 ? '#9CA3AF' : 'transparent'),
                    },
                    border: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Score',
                        color: '#374151', // text-gray-700
                        font: { size: 12 },
                    }
                },
                x: {
                    grid: { display: false },
                    border: { display: false },
                    ticks: { display: false } // Hide default labels, we'll draw our own
                }
            },
            layout: {
                padding: {
                    bottom: 45 // Space for custom labels (avatars + text)
                }
            }
        },
        plugins: [customXAxisPlugin]
    });
};

onMounted(() => {
    nextTick(() => {
        createCompletionRateChart();
        createPerformanceChart();
    });
});
</script>
<template>
  <div class="font-sans">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

      <!-- Card 1: Total Responses -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden flex flex-col">
        <div class="bg-[#418A69] p-4 text-white flex justify-between items-center">
          <div class="flex gap-4">
            <div>
              <div class="text-xs opacity-80">Average Time</div>
              <div class="font-semibold">5.32%</div>
            </div>
            <div class="border-l border-white/50 pl-4">
              <div class="text-xs opacity-80">Completion Rate</div>
              <div class="font-semibold">84.32%</div>
            </div>
          </div>
          <div class="relative w-10 h-10 border-l border-white/50 pl-4">
            <canvas id="completionRateChart"></canvas>
          </div>
        </div>
        <div class="p-6 flex-grow flex items-center">
            <div class="w-full">
                <div class="flex items-baseline gap-3">
                    <span class="text-4xl font-bold text-[#27B3AA]">94%</span>
                    <span class="text-lg text-gray-700 font-medium">Total Responses</span>
                </div>
                <div class="mt-4 border-t border-gray-200"></div>
            </div>
        </div>
      </div>

      <!-- Card 2: Highlights -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 flex flex-col">
        <h2 class="text-md font-semibold text-gray-800">Highlights</h2>
        <div class="border-b border-gray-200 mt-3">
            <nav class="flex -mb-px gap-6">
                <button
                    v-for="tab in tabs" :key="tab"
                    @click="activeTab = tab"
                    :class="[
                        'py-2 text-xs font-medium',
                        activeTab === tab
                            ? 'border-b-2 border-gray-800 text-gray-800'
                            : 'text-gray-500 hover:text-gray-700'
                    ]"
                >
                    {{ tab }}
                </button>
            </nav>
        </div>
        <div class="mt-6 flex flex-col gap-6">
            <!-- Strongest Tag -->
            <div class="flex justify-between items-start">
                <div>
                    <div class="flex items-center gap-1 text-sm font-semibold text-gray-700">
                        <span>Strongest Tag</span>
                        <ChevronRight class="w-3 h-3" />
                    </div>
                    <p class="text-[10px] text-gray-500 mt-1">New Customer Follow-up</p>
                </div>
                <span class="text-sm font-semibold text-green-600">82.16%</span>
            </div>
            <!-- Weakest Tag -->
            <div class="flex justify-between items-start">
                <div>
                    <div class="flex items-center gap-1 text-sm font-semibold text-gray-700">
                        <span>Weakest Tag</span>
                        <ChevronRight class="w-3 h-3" />
                    </div>
                    <p class="text-[10px] text-gray-500 mt-1">Annual Customer Satisfaction Survey</p>
                </div>
                <span class="text-sm font-semibold text-red-600">69.12%</span>
            </div>
        </div>
      </div>

      <!-- Card 3: Vertical Performance -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 flex flex-col">
        <h2 class="text-md font-semibold text-gray-800 mb-4">Vertical Performance</h2>
        <div class="relative w-full h-[170px]">
            <canvas id="performanceChart"></canvas>
        </div>
      </div>

    </div>
  </div>
</template>

