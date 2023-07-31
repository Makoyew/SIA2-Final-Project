<template>
    <div>
      <Head title="Teachers" />

      <AppLayout>
        <template #header>
          <div class="flex justify-between items-center mb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Teachers</h2>
            <div class="flex items-center">
              <input type="text" name="search" id="search"
                placeholder="Search..." class="px-7 py-3 rounded-full text-sm border border-gray-300 focus:ring-2 focus:ring-blue-500 text-center" @keydown.enter="search($event)"/>
            </div>
            <div>
                <Link v-if="$page.props.auth.user.roles.includes('admin')" href="/teachers/create" class="ml-4 button1">Create</Link>
            </div>
          </div>
        </template>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
          <TeacherCard v-for="teacher in teachers" :key="teacher.id" :teacher="teacher"/>
        </div>
      </AppLayout>
    </div>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import TeacherCard from '@/Components/TeacherCard.vue';
  import { Head, Link, router } from '@inertiajs/vue3';

  const props = defineProps({
      teachers: Array
  })

  const search = (ev) => {
      router.visit('/teachers/search/' + ev.target.value)
  }
  </script>


<style>
.button1 {
  background-color: gray;
  padding: 12px;
  color: white;
  transition: background-color 0.2s ease-in-out;
  border-radius: 4px;
  cursor: pointer;
  display: flex;
  align-items: center;
}

.button1:hover {
  background-color: rgb(80, 77, 77);
}
</style>
