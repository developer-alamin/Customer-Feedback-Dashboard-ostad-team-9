<script setup>
import { Dot } from 'lucide-vue-next';
const props = defineProps({
  question: Object
})

const total = Object.values(props.question.responses).reduce((sum, v) => sum + v, 0)
</script>

<template>
  <div class="space-y-6">
    <div
      v-for="(count, label) in question.responses"
      :key="label"
    >
      <div class="flex justify-between mb-1">
        
        <span class="text-sm font-medium text-gray-700 flex items-center justify-center">
            <span class="w-2 h-2 rounded-full bg-[#31dace] mr-2"></span> 
            {{ label }}
        </span>
        <span class="text-sm text-gray-500">{{ ((count / total) * 100).toFixed(1) }}%</span>
      </div>
      <div class="w-full bg-gray-200 rounded-full h-2">
        <div
          class="bg-[#27B3AA] h-2 rounded-full"
          :style="{ width: ((count / total) * 100) + '%' }"
        ></div>
      </div>
    </div>
  </div>
</template>
