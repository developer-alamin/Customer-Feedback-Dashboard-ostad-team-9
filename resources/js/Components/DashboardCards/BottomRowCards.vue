<script setup>
import { Doughnut, Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  BarElement,
  CategoryScale,
  LinearScale
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, ArcElement, BarElement, CategoryScale, LinearScale);

const cspScore = 7.96;

const cspChartData = {
  labels: ['Current', 'Remaining'],
  datasets: [
    {
      data: [cspScore, 10 - cspScore],
      backgroundColor: ['#0db5a6', '#f0fdfa'],
      borderWidth: 0,
      cutout: '75%'
    }
  ]
};

const cspChartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false },
    tooltip: { enabled: false }
  }
};

const cspCenterText = {
  id: 'cspCenterText',
  beforeDraw(chart) {
    const { width, height } = chart;
    const ctx = chart.ctx;
    ctx.restore();
    ctx.font = 'bold 20px Inter';
    ctx.fillStyle = '#0db5a6';
    ctx.textBaseline = 'middle';
    const text = cspScore.toFixed(2);
    const textX = (width - ctx.measureText(text).width) / 2;
    const textY = height / 2;
    ctx.fillText(text, textX, textY);
    ctx.save();
  }
};

const chartHeaderData = {
  labels: ['FY24-Q1', 'FY24-Q2', 'FY24-Q3', 'FY24-Q4'],
  datasets: [
    {
      label: 'CSAT',
      data: [7.5, 8.0, 7.2, 7.8],
      backgroundColor: '#0db5a6',
      borderRadius: 4,
      barThickness: 18
    }
  ]
};

const chartHeaderOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false },
    tooltip: { enabled: true }
  },
  scales: {
    y: {
      beginAtZero: true,
      ticks: {
        font: { size: 10 }
      }
    },
    x: {
      ticks: {
        font: { size: 10 }
      }
    }
  }
};

const npsScore = 26;
const npsChartData = {
  labels: ['Promoters', 'Passives', 'Detractors'],
  datasets: [
    {
      label: 'NPS',
      data: [45, 29, 18],
      backgroundColor: ['#10b981', '#fbbf24', '#ef4444'],
      borderRadius: 4,
      barThickness: 18
    }
  ]
};

const npsOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'bottom',
      labels: { boxWidth: 12, font: { size: 10 } }
    }
  },
  scales: {
    y: {
      beginAtZero: true,
      grid: { drawBorder: false },
      ticks: { stepSize: 10, font: { size: 10 } }
    },
    x: {
      grid: { display: false },
      ticks: { font: { size: 10 } }
    }
  }
};
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
    <!-- Chart Header -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <div class="flex justify-between items-center mb-2">
        <h2 class="text-sm font-semibold text-gray-600">Chart Header</h2>
        <span class="text-[10px] text-green-600 font-medium">▲ 12.00%</span>
      </div>
      <div class="h-40">
        <Bar :data="chartHeaderData" :options="chartHeaderOptions" />
      </div>
    </div>
    
    <!-- CSP Score -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <div class="flex justify-between items-center mb-2">
        <h2 class="text-sm font-semibold text-gray-600">CSP Score</h2>
        <span class="text-[10px] text-green-600 font-medium">▲ 26.00%</span>
      </div>
      <div class="h-40 w-40 mx-auto relative">
        <Doughnut :data="cspChartData" :options="cspChartOptions" :plugins="[cspCenterText]" />
      </div>
      <p class="text-[10px] text-center text-gray-500 mt-2">Current Year | Last Year</p>
    </div>

    <!-- NPS Score -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <div class="flex justify-between items-center mb-2">
        <h2 class="text-sm font-semibold text-gray-600">NPS Score</h2>
        <span class="text-[10px] text-green-600 font-medium">▲ 18.00%</span>
      </div>
      <div class="h-40">
        <Bar :data="npsChartData" :options="npsOptions" />
      </div>
      <p class="mt-2 text-center text-sm font-bold text-[#0db5a6]">{{ npsScore }}%</p>
    </div>
  </div>
</template>

<style scoped>
canvas {
  width: 100% !important;
  height: 100% !important;
}
</style>
