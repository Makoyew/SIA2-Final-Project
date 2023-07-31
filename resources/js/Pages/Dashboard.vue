<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6 text-center">
        Welcome to Your School System Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="dashboard-card">
          <p class="dashboard-heading">Explore, Learn, and Excel Together!</p>
          <div class="grid grid-cols-3 gap-4">
            <div class="dashboard-item">
              <h3 class="dashboard-item-heading">Courses</h3>
              <p class="dashboard-item-text">
                View and manage all the courses offered in the school.
              </p>
            </div>
            <div class="dashboard-item">
              <h3 class="dashboard-item-heading">Teachers</h3>
              <p class="dashboard-item-text">
                Meet the dedicated teachers who shape young minds.
              </p>
            </div>
            <div class="dashboard-item">
              <h3 class="dashboard-item-heading">Students</h3>
              <p class="dashboard-item-text">
                Get insights into the student body and their progress.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style>
/* Custom styles for the dashboard card and items */
/* Custom styles for the dashboard card and items */
.dashboard-card {
  background: linear-gradient(to right, #2196f3, #9c27b0);
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.dashboard-heading {
  color: #fff;
  font-size: 2rem;
  font-weight: bold;
  text-align: center;
  margin-bottom: 1.5rem;
}

.dashboard-item {
  background-color: #fff;
  padding: 1.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.dashboard-item-heading {
  font-size: 1.25rem;
  font-weight: bold;
  margin-bottom: 1rem;
}

.dashboard-item-text {
  color: #444;
  font-size: 1rem;
}
</style>
