<!-- DashboardTopRow.vue -->
<script setup>
import { Doughnut, Line, Bar } from 'vue-chartjs';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  LineElement,
  BarElement,
  CategoryScale,
  LinearScale,
  PointElement
} from 'chart.js';

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  ArcElement,
  LineElement,
  BarElement,
  CategoryScale,
  LinearScale,
  PointElement
);

const csatScore = 8.44;
const csatProgress = [
  { value: 46, label: 'Technical Capability' },
  { value: 74, label: 'Timely Deliverie' },
  { value: 14, label: 'Quality of Deliverable' },
  { value: 46, label: 'Program Governance' },
  { value: 54, label: 'New Ideas & Creative' },
  { value: 0, label: 'Solution' }
];

const csatDoughnutData = {
  labels: ['Current Year', 'Last Year'],
  datasets: [
    {
      data: [25, 75],
      backgroundColor: ['#0db5a6', '#f0fdfa'],
      borderWidth: 0,
      cutout: '75%'
    }
  ]
};

const csatDoughnutOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false },
    tooltip: { enabled: false }
  }
};

const csatCenterText = {
  id: 'csatCenterText',
  beforeDraw(chart) {
    const { width, height } = chart;
    const ctx = chart.ctx;
    ctx.restore();
    ctx.font = 'bold 20px Inter';
    ctx.fillStyle = '#0db5a6';
    ctx.textBaseline = 'middle';
    const text = csatScore.toFixed(2);
    const textX = (width - ctx.measureText(text).width) / 2;
    const textY = height / 2;
    ctx.fillText(text, textX, textY);
    ctx.save();
  }
};

function getHalfDoughnut(value) {
  return {
    labels: ['Value', 'Remainder'],
    datasets: [
      {
        data: [value, 100 - value],
        backgroundColor: ['#0db5a6', '#e5f8f6'],
        borderWidth: 0,
        cutout: '70%',
        circumference: 180,
        rotation: -90
      }
    ]
  };
}

const csatTrendData = {
  labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
  datasets: [
    {
      label: 'Verticales',
      data: [6.0, 6.2, 6.8, 7.1, 7.5, 8.0],
      borderColor: '#0db5a6',
      backgroundColor: '#0db5a6',
      tension: 0.4,
      fill: false,
      pointRadius: 5,
      pointBorderWidth: 2
    }
  ]
};

const csatTrendOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: { display: false }
  },
  scales: {
    y: {
      beginAtZero: false
    }
  }
};

const topAccountsData = {
  labels: ['Tata', 'AS', 'Tiger', 'Orange', 'API-WRIGHT'],
  datasets: [
    {
      label: 'Last year',
      data: [4, 5, 3, 6, 5],
      backgroundColor: '#c5f4ee',
      barThickness: 10
    },
    {
      label: 'Current year',
      data: [6, 8, 5, 8, 7],
      backgroundColor: '#0db5a6',
      barThickness: 10
    }
  ]
};

const topAccountsOptions = {
  responsive: true,
  maintainAspectRatio: false,
  plugins: {
    legend: {
      position: 'top',
      labels: {
        boxWidth: 12,
        font: { size: 10 }
      }
    }
  },
  scales: {
    x: {
      grid: { display: false }
    },
    y: {
      beginAtZero: true,
      grid: { drawBorder: false }
    }
  }
};
</script>

<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- CSAT Score -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <h2 class="text-sm font-semibold text-gray-500 mb-3">CSAT Score</h2>
      <div class="h-40 w-40 mx-auto relative">
        <Doughnut :data="csatDoughnutData" :options="csatDoughnutOptions" :plugins="[csatCenterText]" />
        <div class="absolute inset-0 flex items-end justify-center text-[10px] text-gray-400 pb-2">
          ▲ 25.00% Current Year | Last Year
        </div>
      </div>
      <div class="grid grid-cols-3 gap-3 mt-6 text-[11px] text-gray-600">
        <div v-for="(item, index) in csatProgress" :key="index" class="text-center flex flex-col items-center">
          <div class="w-16 h-8 relative">
            <Doughnut :data="getHalfDoughnut(item.value)" :options="{ responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false }, tooltip: { enabled: false } } }" />
            <div class="absolute inset-0 flex items-center justify-center text-xs font-bold text-[#0db5a6]">
              {{ item.value }}%
            </div>
          </div>
          <p class="mt-1 text-[10px] leading-tight">{{ item.label }}</p>
        </div>
      </div>
    </div>

    <!-- CSAT Trend -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <h2 class="text-sm font-semibold text-gray-500 mb-3">CSAT Trend</h2>
      <div class="h-48">
        <Line :data="csatTrendData" :options="csatTrendOptions" />
      </div>
    </div>

    <!-- Top Accounts -->
    <div class="bg-white p-4 rounded-2xl shadow-md">
      <h2 class="text-sm font-semibold text-gray-500 mb-3">Top Accounts</h2>
      <div class="h-48">
        <Bar :data="topAccountsData" :options="topAccountsOptions" />
      </div>
    </div>
  </div>
</template>

<style scoped>
canvas {
  width: 100% !important;
  height: 100% !important;
}
</style>