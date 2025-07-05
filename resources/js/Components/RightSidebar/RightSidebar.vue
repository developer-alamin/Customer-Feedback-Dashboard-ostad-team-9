<script setup>
import MultipleChoiceChart from '@/Components/RightSidebar/MultipleChoiceChart.vue'
import YesNoChart from '@/Components/RightSidebar/YesNoChart.vue'
import RatingChart from '@/Components/RightSidebar/RatingChart.vue'
import { Move, Star } from 'lucide-vue-next'

const props = defineProps({
  questions: Array
})

function getChartComponent(type) {
  switch (type) {
    case 'multiple_choice': return MultipleChoiceChart
    case 'yes_no': return YesNoChart
    case 'rating': return RatingChart
    default: return MultipleChoiceChart
  }
}
</script>

<template>
  <div class="w-full flex items-center justify-center">
    <Move class="h-6 w-6 text-gray-400" />
    <h1 class="p-4 text-gray-800 text-[28px] font-bold">
      Questions <span class="text-gray-500">Answer</span>
    </h1>
  </div>

  <div class="space-y-6">
    <div
      v-for="question in questions"
      :key="question.id"
      class="bg-white p-4 shadow rounded-lg"
    >
      <h2 class="text-md font-semibold text-gray-700 leading-tight mb-2">{{ question.question }}</h2>
      <p class="text-sm text-gray-400 border-b border-gray-100 mb-6 pb-2 flex justify-between items-center">
        42 Answers 
        <span class="flex items-center text-md font-semibold text-gray-700">
          <Star class="h-4 w-4 mr-2 text-[#FCC419] fill-[#FCC419]" /> 
          5/5
        </span>
      </p>
      <component :is="getChartComponent(question.type)" :question="question" />
    </div>
  </div>
</template>