<script setup>
const props = defineProps({
  question: Object
})

const yesCount = props.question.responses.Yes || 0
const noCount = props.question.responses.No || 0
const total = yesCount + noCount

const yesPercentage = total ? (yesCount / total) * 100 : 0
const noPercentage = total ? (noCount / total) * 100 : 0
</script>

<template>
  <div class="w-full flex gap-6">
    <!-- YES Block -->
    <div class="flex-1 space-y-1">
      <!-- Label row -->
      <div class="flex justify-between text-sm font-medium text-[#27B3AA] px-1">
        <span>Yes</span>
        <span>{{ yesPercentage.toFixed(0) }}%</span>
      </div>
      <!-- Green bar -->
      <div class="w-full bg-gray-200 rounded h-3">
        <div
          class="h-full bg-[#27B3AA] rounded"
          :style="{ width: yesPercentage + '%' }"
        ></div>
      </div>
    </div>

    <!-- NO Block -->
    <div class="flex-1 space-y-1">
      <!-- Label row -->
      <div class="flex justify-between text-sm font-medium text-[#E24747] px-1">
        <span>No</span>
        <span>{{ noPercentage.toFixed(0) }}%</span>
      </div>
      <!-- Red bar -->
      <div class="w-full bg-gray-200 rounded h-3">
        <div
          class="h-full bg-[#E24747] rounded"
          :style="{ width: noPercentage + '%' }"
        ></div>
      </div>
    </div>
  </div>
</template>
