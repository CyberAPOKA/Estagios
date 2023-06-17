<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Adicionar currículos</h3>
          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="email">Email</label>
              <input
                type="text"
                name="email"
                id="email"
                v-model="searchEmail"
                class="form-control form-control-alternative"
                placeholder="Pesquisar"
              />
            </div>
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

          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="city">Cidade</label>
              <select
                id="city"
                name="city"
                v-model="searchCity"
                class="form-control form-control-alternative"
              >
                <option selected value="">Selecione uma Cidade</option>
                <option
                  v-for="(city, index) in cities"
                  :key="index"
                  v-bind:value="city.city"
                >
                  {{ city.city }}
                </option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-control-label" for="city">Bairro</label>
              <select
                v-model="searchDistrict"
                id="district"
                name="district"
                class="form-control form-control-alternative"
              >
                <option value="">Selecione um bairro</option>
                <option
                  v-for="(district, index) in districts"
                  :key="index"
                  v-bind:value="district.district"
                >
                  {{ district.district }}
                </option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="course">Cursos</label>
              <select
                v-model="searchCourse"
                id="course"
                name="course"
                class="form-control form-control-alternative"
              >
                <option value="">Selecione um curso</option>
                <option
                  v-for="(course, index) in courses"
                  :key="index"
                  v-bind:value="course.course"
                >
                  {{ course.course }}
                </option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-control-label" for="shift">Turno</label>
              <select
                v-model="searchShift"
                id="shift"
                name="shift"
                class="form-control form-control-alternative"
              >
                <option value="">Selecione um turno</option>
                <option value="Manhã">Manhã</option>
                <option value="Tarde">Tarde</option>
                <option value="Noite">Noite</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="shift">Semestre</label>
              <select
                v-model="searchSemester"
                id="shift"
                name="shift"
                class="form-control form-control-alternative"
              >
                <option value="">Selecione um semestre</option>
                <option v-for="n in 10" :value="n" v-bind:key="n">{{ n }}º</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Selecionar</th>
                <!-- <th scope="col" class="sort" data-sort="email">Email</th> -->
                <th scope="col" class="sort" data-sort="id">ID</th>
                <th scope="col" class="sort" data-sort="name">Nome</th>
                <th scope="col" class="sort" data-sort="race">Raça</th>
                <th scope="col" class="sort" data-sort="deficiency">Deficiência</th>
                <th scope="col" class="sort" data-sort="cities">Cidade</th>
                <th scope="col" class="sort" data-sort="district">Bairro</th>
                <th scope="col" class="sort" data-sort="course">Curso</th>
                <th scope="col" class="sort" data-sort="semester">Semestre</th>
                <th scope="col" class="sort" data-sort="shift">Turno</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(users, index) in users.data"
                :key="users.id"
                :users="users"
                :index="index"
              >
                <td>
                  <input
                    type="checkbox"
                    :value="users.id"
                    @change="onCheckboxChange($event, users.id)"
                  />
                </td>
                <td>{{ users.id }}</td>
                <td>{{ users.profile.name }}</td>
                <td>{{ users.profile.race }}</td>
                <td>{{ users.profile.deficiency }}</td>
                <td>{{ users.address.city }}</td>
                <td>{{ users.address.district }}</td>
                <td>{{ users.formation.course }}</td>
                <td>{{ users.formation.semester }}</td>
                <td>{{ users.formation.shift }}</td>
              </tr>
            </tbody>
          </table>
          <div class="pl-5 text-center">
            <Bootstrap4Pagination
              :data="users"
              :filters="filters"
              @pagination-change-page="(page) => getUsers(page, filters)"
            />
          </div>
        </div>
      </div>

      <div v-for="p in progress" :key="p.id">
        <div v-if="p.admin.id == admin.id" class="pl-lg-4 py-4">
          <div class="form-group d-flex">
            <textarea
              rows="7"
              name="observation"
              id="observation"
              :rules="required"
              class="form-control form-control-alternative"
              :readonly="p.admin.id !== admin.id"
              placeholder="Observação"
              @input="onUpdateObservation($event)"
              >{{ p.observation }}</textarea
            >
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-between">
        <div></div>
        <div>
          <button class="btn btn-primary" @click="onSaveSelectedUsers">Salvar</button>
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

const users = ref({ data: [] });

const searchEmail = ref(null);
const searchName = ref(null);
const searchCity = ref(null);
const searchDistrict = ref(null);
const searchCourse = ref(null);
const searchSemester = ref(null);
const searchShift = ref(null);

const filters = reactive({
  email: "",
  name: "",
  city: "",
  district: "",
  course: "",
  semester: "",
  shift: "",
});

const store = createStore({
  state: {
    filters: {
      email: "",
      name: "",
      city: "",
      district: "",
      course: "",
      semester: "",
      shift: "",
    },
  },
  mutations: {
    setFilters(state, filters) {
      state.filters = filters;
    },
  },
});

const getUsers = (page = 1, filters = store.state.filters) => {
  axios
    .get(`/admin/api/resumes/users?page=${page}&id=${props.id}`, {
      params: filters,
    })
    .then((response) => {
      users.value = response.data.users;
    });
};

onMounted(() => {
  searchEmail.value = "";
  searchName.value = "";
  searchCity.value = "";
  searchDistrict.value = "";
  searchCourse.value = "";
  searchSemester.value = "";
  searchShift.value = "";
});

watchEffect(() => {
  filters.email = searchEmail.value;
  filters.name = searchName.value;
  filters.city = searchCity.value;
  filters.district = searchDistrict.value;
  filters.course = searchCourse.value;
  filters.semester = searchSemester.value;
  filters.shift = searchShift.value;
  store.commit("setFilters", filters);
  getUsers();
});
</script>
<script>
export default {
  data() {
    return {
      selectedUsers: [],
    };
  },
  methods: {
    onCheckboxChange(event, userId) {
      if (event.target.checked) {
        this.selectedUsers.push(userId);
      } else {
        const index = this.selectedUsers.indexOf(userId);
        if (index > -1) {
          this.selectedUsers.splice(index, 1);
        }
      }
    },
    onSaveSelectedUsers() {
      axios
        .post("/admin/api/resumes/users", {
          users: this.selectedUsers,
          requestId: this.request.id,
          observation: this.observation,
        })
        .then((response) => {
          window.location.reload();
        })
        .catch((error) => {
          window.location.reload();
        });
    },
    onUpdateObservation(event) {
      this.observation = event.target.value;
    },
  },
  computed: {
    adminHasProgress() {
      return this.progress.some((p) => p.admin_id === this.admin.id);
    },
  },
};
</script>
