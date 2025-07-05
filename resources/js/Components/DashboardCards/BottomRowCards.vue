<script setup>
import { ref, onMounted } from 'vue';
import { Chart, registerables } from 'chart.js';
import { ThumbsUp, ThumbsDown, Hand } from 'lucide-vue-next';

Chart.register(...registerables);

// Data for the first card
const metricsData = ref([
  { label: 'Deliverable', score: 2.5, color: '#27B3AA' }, // Tailwind's green-400
  { label: 'Customer Experience', score: 3.7, color: '#94DCBC' }, // Tailwind's emerald-400
  { label: 'Delivery Culture', score: 4.0, color: '#27B3AA' }, // Tailwind's green-500
  { label: 'Value Adds', score: 2.0, color: '#147B4D' },
  { label: 'Infrastructure', score: 1.0, color: '#147B4D' }
]);

// Helper function to calculate bar width
const getBarWidth = (score, max) => {
  return (score / max) * 100 + '%';
};

// Function to create CSP Score Chart
const createCspChart = () => {
  const ctx = document.getElementById('cspChart');
  if (!ctx) return;
  
  const centerTextPlugin = {
    id: 'centerText',
    afterDraw: (chart) => {
      const { ctx, chartArea: { top, bottom, left, right, width, height } } = chart;
      ctx.save();
      const centerX = (left + right) / 2;
      const centerY = (top + bottom) / 2;
      
      ctx.fillStyle = '#1f2937'; // text-gray-800
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';

      ctx.font = 'bold 20px ui-sans-serif, system-ui';
      ctx.fillText('28', centerX, centerY - 10);
      
      ctx.font = '12px ui-sans-serif, system-ui';
      ctx.fillText('Oct', centerX, centerY + 10);
      ctx.restore();
    }
  };

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [70, 20, 10],
        backgroundColor: ['#27B3AA', '#94DCBC', '#E4E4E4'],
        borderColor: '#ffffff',
        borderWidth: 4,
        cutout: '75%',
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false },
      },
      rotation: -30,
    },
    plugins: [centerTextPlugin],
  });
};

// Function to create NPS Score Chart
const createNpsChart = () => {
  const ctx = document.getElementById('npsChart');
  if (!ctx) return;
  const npsScore = 78;

  const gaugeNeedlePlugin = {
    id: 'gaugeNeedle',
    afterDatasetDraw: (chart) => {
      const { ctx, chartArea } = chart;
      ctx.save();
      
      const score = npsScore;
      const total = 200;
      const angle = Math.PI + (1 / total) * (score + 100) * Math.PI;

      const cx = chartArea.left + (chartArea.right - chartArea.left) / 2;
      const cy = chartArea.bottom;

      ctx.translate(cx, cy);
      ctx.rotate(angle);
      ctx.beginPath();
      ctx.moveTo(0, -5);
      ctx.lineTo(chart.innerRadius - 10, 0);
      ctx.lineTo(0, 5);
      ctx.fillStyle = '#1f2937'; // text-gray-800
      ctx.fill();
      ctx.rotate(-angle);
      
      ctx.beginPath();
      ctx.arc(0, 0, 10, 0, 2 * Math.PI);
      ctx.fill();
      
      ctx.restore();
    }
  };
  
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Bad', 'Passive', 'Good'],
      datasets: [{
        data: [100, 80, 20],
        backgroundColor: ['#ef4444', '#f59e0b', '#22c55e'], // red-500, amber-500, green-500
        borderWidth: 0,
        circumference: 180,
        rotation: 270,
        cutout: '70%',
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: { enabled: false },
      },
      layout: { padding: { bottom: 20 } }
    },
    plugins: [gaugeNeedlePlugin],
  });
};


onMounted(() => {
  // Use nextTick to ensure canvas elements are available
  import('vue').then(({ nextTick }) => {
    nextTick(() => {
      createCspChart();
      createNpsChart();
    });
  });
});
</script>
<template>
  <div class="font-sans">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

      <!-- Card 1: Chart Header -->
      <div class="bg-white rounded-lg shadow-md p-5 flex flex-col">
        <h2 class="text-md font-semibold text-gray-800 mb-4">Chart Header</h2>
        <div class="flex flex-col gap-5">
          <div v-for="metric in metricsData" :key="metric.label" class="flex flex-col gap-2">
            <div class="flex items-center justify-between gap-2">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full" :style="{ backgroundColor: metric.color }"></span>
                <span class="text-xs text-gray-600">{{ metric.label }}</span>
              </div>
              <span class="text-xs text-gray-500 min-w-[40px] text-right">{{ metric.score }} / 5</span>
            </div>
            <div class="flex items-center gap-3">
              <div class="flex-grow h-2 bg-gray-200 rounded-full overflow-hidden">
                <div class="h-full rounded-full" :style="{ width: getBarWidth(metric.score, 5), backgroundColor: metric.color }"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2: CSP Score -->
      <div class="bg-white rounded-lg shadow-md p-5 flex flex-col">
        <div class="flex justify-between items-center mb-2">
          <h2 class="text-md font-semibold text-gray-800">CSP Score</h2>
          <a href="#" class="text-xs text-gray-500 hover:underline">View Details</a>
        </div>
        <div class="flex justify-between items-center mb-4">
          <span class="text-gray-500 text-md cursor-pointer"><</span>
          <span class="text-xs font-medium text-[#229f97]">Product Engineering Infrastructure</span>
          <span class="text-gray-500 text-md cursor-pointer">></span>
        </div>
        <div class="relative h-[150px] w-full mx-auto">
          <canvas id="cspChart"></canvas>
        </div>
        <div class="flex justify-around mt-5">
          <div class="flex flex-col items-center text-sm text-gray-700">
            <span>Good</span>
            <div class="flex items-center gap-1 text-xs">
              <span class="w-2.5 h-2.5 rounded-full bg-[#27B3AA]"></span>
              <span class="font-semibold text-gray-700">70%</span>
            </div>
          </div>
          <div class="flex flex-col items-center gap-1 text-sm text-gray-700">
            <span>Average</span>
            <div class="flex items-center gap-1 text-xs">
              <span class="w-2.5 h-2.5 rounded-full bg-[#94DCBC]"></span>
              <span class="font-semibold text-gray-700">20%</span>
            </div>
          </div>
          <div class="flex flex-col items-center gap-1 text-sm text-gray-700">
            <span>Bad</span>
            <div class="flex items-center gap-1 text-xs">
              <span class="w-2.5 h-2.5 rounded-full bg-[#E4E4E4]"></span>
              <span class="font-semibold text-gray-700">10%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3: NPS Score -->
      <div class="bg-white rounded-lg shadow-md p-5 flex flex-col justify-between">
        <div>
          <h2 class="text-md font-semibold text-gray-800 mb-1">NPS Score</h2>
          <p class="text-[13px] text-gray-500 -mt-1">NPS Score is +78</p>
        </div>
        
        <div class="relative h-[120px] w-full mt-5">
          <canvas id="npsChart"></canvas>
        </div>
        <div class="flex justify-between items-start mt-4 px-2.5">
          <div class="flex flex-col items-center text-center gap-1">
            <!-- Promoter Icon (Thumbs Up) -->
             <div class="flex items-center">
                <ThumbsUp class="h-4 w-4 text-[#B00E0E] mr-2" />
                <span class="text-xs font-semibold text-gray-800">60%</span>
             </div>
            <span class="text-xs text-gray-500">Promoter</span>
          </div>
          <div class="flex flex-col items-center text-center gap-1">
            <!-- Passive Icon (Hand) -->
            <div class="flex items-center">
                <Hand class="h-4 w-4 text-[#FCC419] mr-2" />
                <span class="text-xs font-semibold text-gray-800">28%</span>
             </div>
            <span class="text-xs text-gray-500">Passive</span>
          </div>
          <div class="flex flex-col items-center text-center gap-1">
            <!-- Detractor Icon (Thumbs Down) -->
            <div class="flex items-center">
                <ThumbsDown class="h-4 w-4 text-[#27B3AA] mr-2" />
                <span class="text-xs font-semibold text-gray-800">12%</span>
             </div>
            <span class="text-xs text-gray-500">Detractor</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

