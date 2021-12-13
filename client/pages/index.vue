<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="flex grid justify-items-end">
      <div>
        <button type="button" class="inline-flex items-center px-3 py-2 border-transparent border-gray-300 shadow-lg leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="create">
          <IconChevronLeft class="w-6 h-6" />
        </button>
      </div>
    </div>
    <div class="m-8 flex items-center justify-center">
      <Logo />
    </div>
    <h1 v-if="skills.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="skills.length &gt; 0" class="text-4xl px-8 text-gray-700">
      <IconCode class="w-8 h-8 inline mr-3" />
      Skills
    </h1>
    <ul v-if="skills.length === 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 6" :key="`content-${i}`" />
    </ul>
    <ul v-if="skills.length &gt; 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in skills" :key="index" :content="content" />
    </ul>
    <h1 v-if="experiences.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="experiences.length &gt; 0" class="text-4xl px-8 text-gray-700">
      <IconBookOpen class="w-8 h-8 inline mr-3" />
      Experiences
    </h1>
    <ul v-if="experiences.length === 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 3" :key="`content-${i}`" />
    </ul>
    <ul v-if="experiences.length &gt; 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in experiences" :key="index" :content="content" />
    </ul>
    <h1 v-if="interests.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="interests.length &gt; 0" class="text-4xl px-8 text-gray-700">
      <IconKey class="w-8 h-8 inline mr-3" />
      Interests
    </h1>
    <ul v-if="interests.length === 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 3" :key="`content-${i}`" />
    </ul>
    <ul v-if="interests.length &gt; 0" class="grid grid-cols-1 gap-6 bg-gray-100 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in interests" :key="index" :content="content" />
    </ul>
    <div class="text-center mt-4">
      <span>provided by endpoint</span><span>&nbsp;</span>
      <a class="text-blue-400" :href="`${$config.apiUrl}/example?count=9`">/example</a>
      <span>&nbsp;</span>
      <span class="text-gray-400 text-sm">(2 second delay)</span>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import { Users, Contents, Content } from '@/types/api'
export default Vue.extend({
  data () {
    const users:Users = []
    const contents:Contents = []
    const count:number = 9

    return {
      contents,
      users,
      count,
    }
  },
  computed: {
    skills ():Contents {
      return this.contents.filter((item:Content) => item.type === 'skills')
    },
    interests ():Contents {
      return this.contents.filter((item:Content) => item.type === 'interests')
    },
    experiences ():Contents {
      return this.contents.filter((item:Content) => item.type === 'experiences')
    },
  },
  mounted () {
    this.getContents()
    this.get(this.count)
    console.log('test')
  },
  methods: {
    async create (): Promise<void> {
      await this.$router.push('/contents/create')
    },
    async getContents (): Promise<void> {
      await this.$sleep(2000)
      this.contents = (
        await this.$axios.get('contents')
      ).data.data as Contents
    },
    async get (count: number): Promise<void> {
      await this.$sleep(2000)
      this.users = (
        await this.$axios.get('example', { params: { count } })
      ).data.data as Users
    },
    total (count: number): void {
      this.users = []
      this.count = count
      this.get(this.count)
    },
  },
})
</script>
