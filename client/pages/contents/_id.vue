<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="m-8 flex items-center justify-center">
      <Logo />
    </div>
    <div class="px-8 mb-8">
      <button @click="back" type="button" class="inline-flex items-center px-3 py-2 border-transparent border-gray-300 shadow-lg leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <component is="icon-chevron-left" class="w-6 h-6" />
      </button>
    </div>
    <ul class="gap-6 bg-gray-100 rounded px-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-if="!loaded" v-for="i in 1" :key="`content-${i}`" />
      <content-card v-if="loaded" :key="content.id" :content="content" />
    </ul>
    <div v-if="loaded" class="bg-white rounded-lg shadow-lg p-8 m-8">
      <div>
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-2 mb-6">
            <label for="type" class="text-xl block text-sm font-medium text-gray-700 mb-3">
              Type
            </label>
            <div class="mt-1 rounded-md shadow-sm">
              <select v-model="content.type" name="type" id="type" class="w-full bg-white px-3 py-2 border rounded-md">
                <option value="skills">Skills</option>
                <option value="interests">Interests</option>
                <option value="experiences">Experiences</option>
              </select>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-2 mb-6">
            <label for="title" class="text-xl block text-sm font-medium text-gray-700 mb-3">
              Title
            </label>
            <div class="mt-1 rounded-md shadow-sm">
              <input v-model="content.title" type="text" name="title" id="title" class="block border px-3 py-2 w-full text-gray-700 rounded-md" placeholder="www.example.com">
            </div>
          </div>
        </div>

        <div>
          <label for="body" class="text-xl block text-sm font-medium text-gray-700 mb-3">
            Body
          </label>
          <div class="mt-1">
            <textarea v-model="content.body" id="body" name="body" rows="3" class="px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
          </div>
        </div>

        <div>
          <div class="mt-6 flex items-center gap-3">
            <button @click="update" type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Update
            </button>
            <button @click="destroy" type="button" class="bg-red-500 py-2 px-3 border border-red-700 rounded-md shadow-sm text-sm leading-4 font-medium text-white hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Delete
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="!loaded" class="bg-white rounded-lg shadow-lg p-8 m-8">
      <div>
        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-2 mb-6">
            <label class="text-xl block text-sm font-medium text-gray-700 mb-3 skeleton">
              &nbsp;
            </label>
            <div class="skeleton w-50 h-10"></div>
          </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
          <div class="col-span-2 mb-6">
            <label class="text-xl block text-sm font-medium text-gray-700 mb-3 skeleton">
              &nbsp;
            </label>
            <div class="skeleton w-50 h-10"></div>
          </div>
        </div>

        <div>
          <label class="text-xl block text-sm font-medium text-gray-700 mb-3 skeleton">
            &nbsp;
          </label>
          <div class="skeleton w-100 h-10"></div>
        </div>

        <div>
          <div class="mt-6 flex items-center gap-3">
            <button type="button" class="skeleton py-2 px-3 w-20">
              &nbsp;
            </button>
            <button type="button" class="skeleton py-2 px-3 w-20">
              &nbsp;
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { Users, Contents, Content } from '@/types/api'
export default Vue.extend({
  data () {
    const users:Users = []
    const loaded:boolean = false
    const content:Content = {
      id: 0,
      type: '',
      title: '',
      body: '',
    }
    const count:number = 9

    return {
      loaded,
      content,
      users,
      count,
    }
  },
  mounted () {
    if (this.$route.params.id === undefined) {
      this.$router.push('/')
    }
    this.getContent()
  },
  methods: {
    async back (): Promise<void> {
      this.$router.back()
    },
    async getContent (): Promise<void> {
      await this.$sleep(2000)
      this.content = (
        await this.$axios.get(`/contents/${this.$route.params.id}`)
      ).data.data as Content
      this.loaded = true
      this.$toast.show({
        type: 'success',
        title: 'Fetched',
        message: 'Content was retrieved successfully',
      })
    },
    async update (): Promise<void> {
      await this.$axios.put(`/contents/${this.$route.params.id}`, {
        type: this.content.type,
        title: this.content.title,
        body: this.content.body,
      })
      this.$toast.show({
        type: 'success',
        title: 'Updated',
        message: 'Content was changed successfully',
      })
    },
    async destroy (): Promise<void> {
      await this.$axios.delete(`/contents/${this.$route.params.id}`)
      this.$toast.show({
        type: 'success',
        title: 'Deleted',
        message: 'Content was removed successfully',
      })
      await this.$router.push('/');
    }
  },
})
</script>
