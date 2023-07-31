<template>
    <div class="max-w-md mx-auto mt-5">
      <div class="rounded-lg p-4 border-2 border-gray-400 bg-white shadow flex hover:bg-blue-100">
        <div class="cursor-pointer flex flex-1" @click="open(teacher)">
          <div class="w-20 h-20 border rounded-full overflow-hidden bg-gray-300">
            <img :src="props.teacher.pic_url" alt="Teacher Image" class="w-full h-full object-cover">
          </div>
          <div class="ml-4 flex-1">
            <h3 class="font-semibold text-lg mb-2">Teacher Details</h3>
            <hr class="mb-2">
            <div class="text-xl font-bold">{{ teacher.last_name }}, {{ teacher.first_name }}</div>
            <div class="italic">{{ teacher.address }}</div>
            <div class="italic">{{ teacher.phone }}</div>
            <div class="mt-2">{{ teacher.formattedBDate }}</div>
            <div class="italic">Grade {{ teacher.grade }}</div>
            <div class="italic">{{ teacher.rank }}</div>
            <div v-if="$page.props.auth.user.roles.includes('admin')" class="mt-auto flex justify-end">
                <label class="toggle-label cursor-pointer">
                <input
                    type="checkbox"
                    :checked="teacher.done"
                    @change="toggleActive(teacher)"
                    class="toggle-input"
                />
                <span class="slider"></span>
                </label>
                <span class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Done</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { router } from '@inertiajs/vue3';

  const props = defineProps({
    teacher: Object,
  });

  function open(teacher) {
    router.visit('/teachers/' + teacher.id);
  }

  const toggleActive = (teacher) => {
    router.visit('/teachers/toggle/' + teacher.id, {
      method: 'post',
      preserveScroll: true,
    });
  };
  </script>

  <style>
  .toggle-label {
    position: relative;
    display: inline-block;
    width: 45px;
    height: 24px;
    cursor: pointer;
  }

  .toggle-input {
    display: none;
  }

  .toggle-input:checked + .slider:before {
  transform: translateX(21px);
  }

  .slider {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 34px;
    background-color: #ccc;
    transition: 0.4s;
  }

  .toggle-input:checked + .slider {
    background-color: #2196f3;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 2px;
    bottom: 2px;
    border-radius: 50%;
    background-color: white;
    transition: 0.4s;
  }

  .toggle-input:checked + .slider:before {
    transform: translateX(21px);
  }
  </style>
