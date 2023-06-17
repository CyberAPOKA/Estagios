<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Currículos</h3>
          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="name"
                >Nome<span class="required-field"></span
              ></label>
              <input
                type="text"
                v-model="searchName"
                class="form-control form-control-alternative"
                placeholder="Pesquisar"
              />
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <div class="pl-5 text-center">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Curso</th>
                  <th>Semestre</th>
                  <th v-if="admin.type == 'rh' || admin.type == 'recruiter'">Remover</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(resume, index) in resumes.data"
                  :key="resume.id"
                  :users="resume"
                  :index="index"
                >
                  <td>{{ resume.user.profile.name }}</td>
                  <td>{{ resume.user.profile.cpf }}</td>
                  <td>{{ resume.user.formation.course }}</td>
                  <td>{{ resume.user.formation.semester }}</td>
                  <td v-if="admin.type == 'rh' || admin.type == 'recruiter'">
                    <a href="#" @click="deleteResume(resume.id)"
                      ><i class="ni ni-fat-remove text-danger"></i
                    ></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <Bootstrap4Pagination
              :data="resumes"
              :filters="filters"
              @pagination-change-page="(page) => getResumes(page, filters)"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, watchEffect, reactive, onMounted } from "vue";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import { createStore } from "vuex";
import { defineProps } from "vue";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";
const props = defineProps({
  cities: Array,
  districts: Array,
  courses: Array,
  allCourses: Array,
  showCheckbox: Boolean,
  request: Object,
  progress: Object,
  admin: Object,
  id: Object,
});

const resumes = ref({ data: [] });

const searchName = ref(null);

const filters = reactive({
  name: "",
});

const store = createStore({
  state: {
    filters: {
      name: "",
    },
  },
  mutations: {
    setFilters(state, filters) {
      state.filters = filters;
    },
  },
});

const getResumes = (page = 1, filters = store.state.filters) => {
  axios
    .get(`/admin/api/resumes/${props.request.id}?page=${page}`, {
      params: filters,
    })
    .then((response) => {
      resumes.value = response.data.resumes;
    });
};

const toast = useToast();
const deleteResume = (id) => {
  axios
    .delete(`/admin/resumes/user/delete/${id}`)
    .then((response) => {
      window.location.reload();
      toast.success("Candidato removido com Sucesso!", {
        position: "top-right",
        duration: "5000",
      });
      console.log(response);
    })
    .catch((error) => {
      console.log(error);
    });
};

onMounted(() => {
  searchName.value = "";
});

watchEffect(() => {
  filters.name = searchName.value;
  store.commit("setFilters", filters);
  getResumes();
});
</script>
