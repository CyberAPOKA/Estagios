<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Light table -->
        <div class="card-header border-0">
          <h3 class="mb-0">Cursos {{ courses }}</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="id">ID</th>
                <th scope="col" class="sort" data-sort="departament_id">Departamento</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(course, courseId) in courses" :key="courseId">
                <td>{{ courseId }}</td>
                <td>{{ course }}</td>
              </tr>
            </tbody>
          </table>
          <div class="pl-5 text-center"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";

const props = defineProps({
  request: Object,
  courses: Array,
});
</script>
