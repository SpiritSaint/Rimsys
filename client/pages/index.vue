<template>
  <div class="container p-2 lg:p-8 flex flex-col">
    <div class="flex grid justify-items-end">
      <div>
        <button type="button" class="inline-flex items-center px-3 py-2 border-transparent border-gray-300 shadow-lg leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="create">
          <IconPlus class="w-6 h-6" />
        </button>
      </div>
    </div>
    <div class="m-8 flex items-center justify-center">
      <Logo />
    </div>
    <h1 v-if="contents.length &gt; 0" class="text-4xl px-8 text-white">
      <IconUserHeadset class="w-8 h-8 inline mr-3" />
      Presentation
    </h1>
    <h1 v-if="contents.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <div v-if="contents.length &gt; 0" class="bg-white rounded-lg shadow-lg p-8 m-8">
      <div>
        <h1 class="text-3xl">Hello 👋</h1>
        <p class="mt-4 text-gray-500">
          My name is Ian Torres. A Senior Software Engineer.
        </p>
        <p class="mt-4 text-gray-500">
          I'm currently trying to join to your company.
        </p>
        <p class="mt-4 text-gray-500">
          Give a look to this page to check if i'm interesting to you.
        </p>
      </div>
    </div>
    <div v-if="contents.length === 0" class="bg-white rounded-lg shadow-lg p-8 m-8">
      <div>
        <h1 class="text-3xl skeleton w-32">&nbsp;</h1>
        <p class="mt-4 text-gray-500 skeleton w-96">
          &nbsp;
        </p>
        <p class="mt-4 text-gray-500 skeleton w-80">
          &nbsp;
        </p>
        <p class="mt-4 text-gray-500 skeleton w-96">
          &nbsp;
        </p>
      </div>
    </div>
    <h1 v-if="skills.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="skills.length &gt; 0" class="text-4xl px-8 text-white">
      <IconCode class="w-8 h-8 inline mr-3" />
      Skills
    </h1>
    <ul v-if="skills.length === 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 6" :key="`content-${i}`" />
    </ul>
    <ul v-if="skills.length &gt; 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in skills" :key="index" :content="content" />
    </ul>
    <h1 v-if="experiences.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="experiences.length &gt; 0" class="text-4xl px-8 text-white">
      <IconBookOpen class="w-8 h-8 inline mr-3" />
      Experiences
    </h1>
    <ul v-if="experiences.length === 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 3" :key="`content-${i}`" />
    </ul>
    <ul v-if="experiences.length &gt; 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in experiences" :key="index" :content="content" />
    </ul>
    <h1 v-if="interests.length === 0" class="text-4xl px-8">&nbsp;</h1>
    <h1 v-if="interests.length &gt; 0" class="text-4xl px-8 text-white">
      <IconKey class="w-8 h-8 inline mr-3" />
      Interests
    </h1>
    <ul v-if="interests.length === 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card-skeleton v-for="i in 3" :key="`content-${i}`" />
    </ul>
    <ul v-if="interests.length &gt; 0" class="grid grid-cols-1 gap-6 rounded p-8 w-full sm:grid-cols-2 lg:grid-cols-3">
      <content-card v-for="(content, index) in interests" :key="index" :content="content" />
    </ul>
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
  },
})
</script>
