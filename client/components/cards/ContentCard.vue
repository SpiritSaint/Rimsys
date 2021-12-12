<template>
  <li class="col-span-1 bg-white rounded-lg shadow">
    <div class="w-full flex items-center justify-between p-6 space-x-6">
      <div class="flex-1">
        <div class="flex items-center space-x-3">
          <h3 class="text-gray-900 text-sm leading-5 font-medium truncate">
            {{ content.title }}
          </h3>
        </div>
        <p class="mt-1 text-gray-500 text-sm leading-5 text-justify">
          {{ content.body }}
        </p>
      </div>
    </div>
  </li>
</template>

<script lang="ts">
import { PropType } from '@nuxtjs/composition-api'
import Vue from 'vue'
import { Content } from '@/client/types/api'
export default Vue.extend({
  props: {
    content: {
      type: Object as PropType<Content>,
      required: true
    }
  }
})
</script>
