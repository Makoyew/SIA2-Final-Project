<template>
    <Head title="View Teacher" />

    <AppLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">View Teacher</h2>
                <div class="flex space-x-4">
                    <Link v-if="props.auth.user.roles.includes('admin')" :href="'/teachers/email/' + teacher.id" class="flex items-center space-x-2 px-2 py-1 bg-gray-100 hover:bg-gray-400 rounded-md">
                        <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 493.497 493.497" xml:space="preserve">
                        <path d="M444.556,85.218H48.942C21.954,85.218,0,107.171,0,134.16v225.177c0,26.988,21.954,48.942,48.942,48.942h395.613
                            c26.988,0,48.941-21.954,48.941-48.942V134.16C493.497,107.171,471.544,85.218,444.556,85.218z M460.87,134.16v225.177
                            c0,2.574-0.725,4.924-1.793,7.09L343.74,251.081l117.097-117.097C460.837,134.049,460.87,134.096,460.87,134.16z M32.628,359.336
                            V134.16c0-0.064,0.033-0.11,0.033-0.175l117.097,117.097L34.413,366.426C33.353,364.26,32.628,361.911,32.628,359.336z
                            M251.784,296.902c-2.692,2.691-7.378,2.691-10.07,0L62.667,117.846h368.172L251.784,296.902z M172.827,274.152l45.818,45.819
                            c7.512,7.511,17.493,11.645,28.104,11.645c10.61,0,20.592-4.134,28.104-11.645l45.82-45.819l101.49,101.499H71.327L172.827,274.152z
                            "/>
                        </svg>
                        <span>Send Email</span>
                    </Link>
                    <a v-if="props.auth.user.roles.includes('admin')"
          as="button"
          :href="'/teachers/pdf/' + teacher.id"
          target="_blank"
          class="flex items-center space-x-2 px-2 py-1 bg-gray-100 hover:bg-gray-400 rounded-md"
        >
          <svg fill="#333333" width="20px" height="16px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <g fill-rule="evenodd">
                <path
                  d="M1251.654 0c44.499 0 88.207 18.07 119.718 49.581l329.223 329.224c31.963 31.962 49.581 74.54 49.581 119.717V1920H169V0Zm-66.183 112.941H281.94V1807.06h1355.294V564.706H1185.47V112.94Zm112.94 23.379v315.445h315.445L1298.412 136.32Z"
                ></path>
                <path
                  d="M900.497 677.67c26.767 0 50.372 12.65 67.991 37.835 41.901 59.068 38.965 121.976 23.492 206.682-5.308 29.14.113 58.617 16.263 83.125 22.814 34.786 55.68 82.673 87.981 123.219 23.718 29.93 60.198 45.854 97.13 40.885 23.718-3.276 52.292-5.986 81.656-5.986 131.012 0 121.186 46.757 133.045 89.675 6.55 25.976 3.275 48.678-10.165 65.506-16.715 22.701-51.162 34.447-101.534 34.447-55.793 0-74.202-9.487-122.767-24.96-27.445-8.81-55.906-10.617-83.69-3.275-55.453 14.456-146.936 36.48-223.284 46.983-40.772 5.647-77.816 26.654-102.438 60.875-55.454 76.8-106.842 148.518-188.273 148.518-21.007 0-40.32-7.567-56.244-22.701-23.492-23.492-33.544-49.581-28.574-79.85 13.778-92.95 128.075-144.79 196.066-182.625 16.037-8.923 28.687-22.589 36.592-39.53l107.86-233.223c7.68-16.377 10.051-34.56 7.228-52.518-12.537-79.059-31.06-211.99 18.748-272.075 10.955-13.44 26.09-21.007 42.917-21.007Zm20.556 339.953c-43.257 126.607-119.718 264.282-129.996 280.32 92.273-43.37 275.916-65.28 275.916-65.28-92.386-88.998-145.92-215.04-145.92-215.04Z"
                ></path>
              </g>
            </g>
          </svg>
          <span>Export PDF</span>
        </a>
                <Link class="back-button" as="button" :href="'/teachers/'">Back</Link>
                </div>
            </div>
        </template>

      <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="w-full md:h-[400px] border flex justify-center items-center">
                  <img :src="props.teacher.pic_url" alt="Teacher Image" class="object-cover w-full h-full">
                </div>
                <div class="flex flex-col space-y-4">
                  <div class="text-2xl font-semibold">{{ teacher.last_name }}, {{ teacher.first_name }}</div>
                  <hr class="border-gray-400">
                  <div>
                    <div class="text-gray-600">Address:</div>
                    <div class="mt-2">{{ teacher.address }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Phone Number:</div>
                    <div class="mt-2">{{ teacher.phone }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Birth Date:</div>
                    <div class="mt-2">{{ teacher.formattedBDate }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Grade:</div>
                    <div class="mt-2">{{ teacher.grade }}</div>
                  </div>
                  <div>
                    <div class="text-gray-600">Rank:</div>
                    <div class="mt-2">{{ teacher.rank }}</div>
                  </div>

                  <div class="mt-auto flex justify-end">
                    <div v-if="props.auth.user.roles.includes('admin')" class="space-x-2">
                        <Link class="button13 mr-2" :href="'/teachers/' + teacher.id" method="delete" as="button">Delete</Link>
                        <Link class="button12 mb-2" :href="'/teachers/edit/' + teacher.id" as="button">Edit</Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>

  <script setup>
  import AppLayout from '@/Layouts/AppLayout.vue';
  import { Head, Link, usePage } from '@inertiajs/vue3';
  import { computed } from 'vue';

  const props = defineProps({
    teacher: Object,
    auth: Object,
  });

  const page = usePage()

  const user = computed(() => page.props.auth.user)

  </script>

  <style>
  .button12 {
    background-color: #187714;
    padding: 10px;
    color: white;
    transition: background-color 0.2s ease-in-out;
    border-radius: 4px;
    cursor: pointer;
  }

  .button13 {
    background-color: #8b1612;
    padding: 10px;
    color: white;
    transition: background-color 0.2s ease-in-out;
    border-radius: 4px;
    cursor: pointer;
  }

  .button12:hover {
    background-color: #043a0d;
  }

  .button13:hover {
    background-color: #3a0404;
  }

.back-button {
  background-color: gray;
  padding: 12px;
  color: white;
  transition: background-color 0.2s ease-in-out;
  border-radius: 4px;
  cursor: pointer;
  display: flex;
  align-items: center;
}

.back-button:hover {
  background-color: rgb(80, 77, 77);
}

.back-button {
  margin-right: 20px;
}

.pdf-button {
  background-color: rgba(163, 60, 60, 0.8);
  padding: 12px;
  color: white;
  transition: background-color 0.2s ease-in-out;
  border-radius: 4px;
  cursor: pointer;
  display: flex;
  align-items: center;
}

.pdf-button:hover {
  background-color: rgba(212, 99, 99, 0.8);
}

  </style>
