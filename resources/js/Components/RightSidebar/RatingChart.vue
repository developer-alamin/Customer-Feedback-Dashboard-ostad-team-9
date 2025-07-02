<script setup>
import { Bar } from 'vue-chartjs'
import {
  Chart as ChartJS, Title, Tooltip, Legend, BarElement,
  CategoryScale, LinearScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps({
  question: Object
})

const responses = props.question.responses
const labels = Object.keys(responses)
const values = Object.values(responses)

const maxValue = Math.max(...values)

const barColors = values.map(val =>
  val === maxValue ? '#27B3AA' : '#A0E7DC' 
)

const chartData = {
  labels,
  datasets: [
    {
      data: values,
      backgroundColor: barColors,
      barThickness: 16,
      borderRadius: 4
    }
  ]
}

const options = {
  responsive: true,
  plugins: {
    legend: { display: false },
  },
  scales: {
    y: {
      beginAtZero: true,
      ticks: { display: false }, 
      grid: { display: false }   
    },
    x: {
      grid: { display: false }   
    }
  }
}
</script>

<template>
  <Bar :data="chartData" :options="options" />
</template>
