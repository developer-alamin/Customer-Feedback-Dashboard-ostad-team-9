<template>
  <div class="font-sans">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

      <!-- Card 1: CSAT Score (আপনার কোড অনুযায়ী) -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5">
        <h2 class="text-md font-semibold text-gray-800">CSAT Score</h2>
        <div class="relative w-full h-20 mt-4">
          <canvas id="csatGaugeChart"></canvas>
          <div class="absolute top-16 inset-0 flex flex-col items-center justify-center -translate-y-2">
            <span class="text-2xl font-bold text-gray-800">8.44</span>
            <div class="flex items-center gap-1 text-sm text-green-600">
              <Triangle class="w-3 h-3 fill-current" />
              <span>25.00%</span>
            </div>
            <p class="text-xs text-gray-400 mt-1">Current Year | Last Year</p>
          </div>
        </div>
        <div class="grid grid-cols-3 gap-x-4 gap-y-4 mt-10 text-center">
          <div v-for="(metric, index) in subMetrics" :key="metric.label" class="flex flex-col items-center">
            <div class="relative w-14 h-14">
              <canvas :id="'subMetricChart-' + index"></canvas>
              <div class="absolute inset-0 flex items-center justify-center font-semibold text-sm text-gray-800">
                {{ metric.value }}%
              </div>
            </div>
            <p class="text-[10px] text-gray-600 mt-2 leading-tight w-20">{{ metric.label }}</p>
          </div>
        </div>
      </div>

      <!-- Card 2: CSAT Trend -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 flex flex-col">
        <div class="flex justify-between items-center">
          <h2 class="text-md font-semibold text-gray-800">CSAT Trend</h2>
          <div class="flex items-center gap-2">
            <span class="text-xs text-gray-600">Verticales</span>
            <div class="w-10 h-6 flex items-center bg-teal-400 rounded-full p-1 cursor-pointer">
              <div class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-4"></div>
            </div>
          </div>
        </div>
        <!-- FIXED: h-[150px] পরিবর্তন করে min-h-[250px] করা হয়েছে -->
        <div class="relative flex-grow mt-4 min-h-[250px]">
          <canvas id="csatTrendChart"></canvas>
        </div>
      </div>
      
      <!-- Card 3: Top Accounts -->
      <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-5 flex flex-col">
        <h2 class="text-lg font-semibold text-gray-800">Top Accounts</h2>
        <div class="flex items-center gap-4 mt-3">
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#94DCBC]"></span>
                <span class="text-sm text-gray-600">Last year</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#2DD4BF]"></span>
                <span class="text-sm text-gray-600">Current year</span>
            </div>
        </div>
        <!-- FIXED: h-[150px] পরিবর্তন করে min-h-[250px] করা হয়েছে -->
        <div class="relative flex-grow mt-4 min-h-[250px]">
          <canvas id="topAccountsChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from 'vue';
import { Chart, registerables } from 'chart.js';
import { Triangle } from 'lucide-vue-next';

Chart.register(...registerables);

// --- DATA ---
const subMetrics = ref([
  { label: 'Technical Capabilities', value: 46 },
  { label: 'Timely Deliveries', value: 74 },
  { label: 'Quality of Deliverable', value: 14 },
  { label: 'Program Governance', value: 46 },
  { label: 'New Ideas & Creative Solution', value: 54 },
]);

const topAccountsData = ref([
    { logo: 'https://i.imgur.com/gK24A3F.png' },
    { logo: 'https://i.imgur.com/V2ACj8z.png' },
    { logo: 'https://i.imgur.com/JzWfTtk.png' },
    { logo: 'https://i.imgur.com/k6FkIqH.png' },
    { logo: 'https://i.imgur.com/Dfqz3TE.png' },
]);


// --- CHART CREATION FUNCTIONS ---

const createCsatGaugeChart = () => {
    const ctx = document.getElementById('csatGaugeChart');
    if (!ctx) return;
    const score = 8.44;
    const maxScore = 10;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [score, maxScore - score],
                backgroundColor: ['#2DD4BF', '#F3F4F6'],
                borderWidth: 0,
                circumference: 180,
                rotation: 270,
                cutout: '80%',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false }, tooltip: { enabled: false } },
        }
    });
};

const createSubMetricCharts = () => {
    subMetrics.value.forEach((metric, index) => {
        const ctx = document.getElementById(`subMetricChart-${index}`);
        if (!ctx) return;

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [metric.value, 100 - metric.value],
                    backgroundColor: ['#2DD4BF', '#F3F4F6'],
                    borderWidth: 0,
                    cutout: '75%',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { enabled: false } },
            }
        });
    });
};

const createCsatTrendChart = () => {
    const ctx = document.getElementById('csatTrendChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
            datasets: [{
                data: [5.8, 6.6, 6.3, 7.1, 6.8, 7.6],
                borderColor: '#2DD4BF',
                tension: 0.1,
                pointBackgroundColor: '#2DD4BF',
                pointBorderColor: '#fff',
                pointRadius: 6,
                pointBorderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    min: 0,
                    max: 8.5,
                    ticks: {
                        color: '#6b7280',
                        stepSize: 1.5,
                        callback: function(value) {
                           if (value === 0) return '0';
                           if (Number.isInteger(value)) return value;
                           return value.toFixed(1);
                        }
                    },
                    grid: { color: '#F3F4F6' },
                    border: { display: false },
                },
                x: {
                    ticks: { color: '#6b7280' },
                    grid: { display: false },
                }
            }
        }
    });
};

const createTopAccountsChart = async () => {
    const ctx = document.getElementById('topAccountsChart');
    if (!ctx) return;
    
    const logoImages = await Promise.all(
        topAccountsData.value.map(item => new Promise(resolve => {
            const img = new Image();
            img.crossOrigin = "Anonymous";
            img.src = item.logo;
            img.onload = () => resolve(img);
            img.onerror = () => resolve(null);
        }))
    );

    const logoPlugin = {
        id: 'logoPlugin',
        afterDraw: (chart) => {
            const { ctx, scales: { x } } = chart;
            ctx.save();
            logoImages.forEach((img, index) => {
                if (img) {
                    const xPos = x.getPixelForValue(index);
                    const imgHeight = 20;
                    const imgWidth = (img.width / img.height) * imgHeight;
                    ctx.drawImage(img, xPos - imgWidth / 2, chart.chartArea.bottom + 10, imgWidth, imgHeight);
                }
            });
            ctx.restore();
        }
    };
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['', '', '', '', ''],
            datasets: [
                {
                    label: 'Last year',
                    data: [4.2, 4.8, 2.8, 4.2, 5.8],
                    backgroundColor: '#94DCBC',
                    borderRadius: 4,
                },
                {
                    label: 'Current year',
                    data: [7, 8.1, 6.5, 7.8, 8.4],
                    backgroundColor: '#2DD4BF',
                    borderRadius: 4,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 8.5,
                    ticks: { stepSize: 2, color: '#6b7280' },
                    grid: { color: '#F3F4F6' },
                    border: { display: false },
                },
                x: {
                    grid: { display: false },
                    ticks: { display: false },
                }
            },
            layout: { padding: { bottom: 40 } }
        },
        plugins: [logoPlugin]
    });
};

onMounted(() => {
    nextTick(() => {
        createCsatGaugeChart();
        createSubMetricCharts();
        createCsatTrendChart();
        createTopAccountsChart();
    });
});
</script>