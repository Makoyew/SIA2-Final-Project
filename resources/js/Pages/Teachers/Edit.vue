<template>
    <div>
      <Head title="Edit Teacher" />

      <AppLayout>
        <template #header>
          <div class="flex items-center">
            <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Edit Teacher</h2>
            <Link class="button1 mb-2" as="button" :href="'/teachers/' + teacher.id">Back</Link>
          </div>
        </template>

        <div class="py-6">
          <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border">
            <form @submit.prevent="submit" class="grid grid-cols-2 gap-4">
              <div>
                <h4 class="text-xl mb-4">Personal Details</h4>
                <div class="form-field">
                  <label for="last_name">Last Name:</label>
                  <input type="text" id="last_name" v-model="form.last_name" class="input-field">
                </div>

                <div class="form-field">
                  <label for="first_name">First Name:</label>
                  <input type="text" id="first_name" v-model="form.first_name" class="input-field">
                </div>

                <div class="form-field">
                  <label for="address">Address:</label>
                  <input type="text" id="address" v-model="form.address" class="input-field">
                </div>

                <div class="form-field">
                    <label for="bdate">Birth Date:</label>
                    <input type="date" id="bdate" v-model="form.bdate" class="input-field">
                </div>

                <div class="form-field">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" v-model="form.phone" class="input-field">
                </div>
              </div>
              <div>
                <h4 class="text-xl mb-4">Additional Information</h4>
                    <div class="form-field">
                        <label for="grade">Grade :</label>
                        <input type="text" id="grade" v-model="form.grade" class="input-field">
                    </div>

                    <div class="form-field">
                        <label for="rank">Rank :</label>
                        <input type="text" id="rank" v-model="form.rank" class="input-field">
                    </div>


                <div class="flex-1 flex flex-col">
                  <button class="button1 mt-2" type="submit">Save Changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </AppLayout>
    </div>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';

  const props = defineProps({
    teacher: Object,
  });

  const form = useForm({
    last_name: props.teacher.last_name,
    first_name: props.teacher.first_name,
    address: props.teacher.address,
    phone: props.teacher.phone,
    bdate: props.teacher.bdate2,
    grade: props.teacher.grade,
    rank: props.teacher.rank,
  });

  function submit() {
    form.patch('/teachers/' + props.teacher.id);
  }
  </script>

  <style>
    .form-field {
      margin-bottom: 1.5rem;
    }

    .input-field {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid #d1d5db;
      border-radius: 0.25rem;
      font-size: 1rem;
    }

    .button1 {
      background-color: #707470;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.2s ease-in-out;
    }

    .button1:hover {
      background-color: #383b38;
    }

    .form-field:last-child {
      margin-bottom: 0;
    }

    .form-field:last-child .flex-1 {
      display: flex;
      justify-content: flex-end;
    }
  </style>
