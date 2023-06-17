<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Filtro de candidatos</h3>
          <!-- <div class="row">
              <div class="col-md-6">
                <label for="">Deficiência</label>
                <div
                  class="
                    custom-control custom-control-alternative custom-checkbox
                    mb-3
                  "
                >
                  <div
                    class="
                      custom-control custom-control-alternative custom-checkbox
                      mb-3
                    "
                  >
                    <input
                      class="custom-control-input"
                      type="checkbox"
                      v-model="searchDeficiency"
                    />
                    <label class="custom-control-label" for="physical"
                      >Física</label
                    >
                  </div>
                  <div
                    class="
                      custom-control custom-control-alternative custom-checkbox
                      mb-3
                    "
                  >
                    <input
                      class="custom-control-input"
                      type="checkbox"
                      v-model="searchDeficiency"
                    />
                    <label class="custom-control-label" for="intellectual"
                      >Intelectual</label
                    >
                  </div>
                  <div
                    class="
                      custom-control custom-control-alternative custom-checkbox
                      mb-3
                    "
                  >
                    <input
                      class="custom-control-input"
                      type="checkbox"
                      v-model="searchDeficiency"
                    />
                    <label class="custom-control-label" for="multiple"
                      >Múltipla</label
                    >
                  </div>
                  <div
                    class="
                      custom-control custom-control-alternative custom-checkbox
                      mb-3
                    "
                  >
                    <input
                      class="custom-control-input"
                      type="checkbox"
                      v-model="searchDeficiency"
                    />
                    <label class="custom-control-label" for="tea"
                      >TEA (Transtorno do Espectro Autista e Psicose)</label
                    >
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Raça<span class="required-field">*</span></label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="custom-control">
                      <div class="custom-control custom-radio mb-3">
                        <Form
                          class="custom-control-input"
                          type="radio"
                          v-model="searchRace"
                        />
                        <label class="custom-control-label" for="white"
                          >Branca</label
                        >
                      </div>
  
                      <div class="custom-control custom-radio mb-3">
                        <Form
                          class="custom-control-input"
                          type="radio"
                          v-model="searchRace"
                        />
                        <label class="custom-control-label" for="black"
                          >Preta</label
                        >
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <Form
                          class="custom-control-input"
                          type="radio"
                          v-model="searchRace"
                        />
                        <label class="custom-control-label" for="brown"
                          >Parda</label
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custom-control custom-radio mb-3">
                      <Form
                        class="custom-control-input"
                        type="radio"
                        v-model="searchRace"
                      />
                      <label class="custom-control-label" for="yellow"
                        >Amarela</label
                      >
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <Form
                        class="custom-control-input"
                        type="radio"
                        v-model="searchRace"
                      />
                      <label class="custom-control-label" for="indigenous"
                        >Indígena</label
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          <div class="row">
            <div class="col-md-6">
              <label class="form-control-label" for="email">Email</label>
              <input
                type="text"
                v-model="searchQuery"
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
                <option value="">Selecione um bairro</option>
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
                <!-- <th scope="col" class="sort" data-sort="id">ID</th> -->
                <th scope="col" class="sort" data-sort="id">Email</th>
                <th scope="col" class="sort" data-sort="id">Nome</th>
                <th scope="col" class="sort" data-sort="email">Raça</th>
                <th scope="col" class="sort" data-sort="id">Deficiência</th>
                <th scope="col" class="sort" data-sort="email">Cidade</th>
                <th scope="col" class="sort" data-sort="id">Bairro</th>
                <th scope="col" class="sort" data-sort="email">Curso</th>
                <th scope="col" class="sort" data-sort="id">Semestre</th>
                <th scope="col" class="sort" data-sort="id">Turno</th>
                <th scope="col">Visualizar</th>
              </tr>
            </thead>
            <tbody v-if="users.data.length > 0">
              <tr
                v-for="(user, index) in users.data"
                :key="user.id"
                :user="user"
                :index="index"
              >
                <!-- <td>{{ user.id }}</td> -->
                <td>{{ user.email }}</td>
                <td>{{ user.profile.name }}</td>
                <td>{{ user.profile.race }}</td>
                <td>{{ user.profile.deficiency }}</td>
                <td>{{ user.address.city }}</td>
                <td>{{ user.address.district }}</td>
                <td>{{ user.formation.course }}</td>
                <td>{{ user.formation.semester }}</td>
                <td>{{ user.formation.shift }}</td>
              </tr>
            </tbody>
          </table>
          <div class="pl-5 text-center">
            <Bootstrap4Pagination :data="users" @pagination-change-page="getUsers" />
          </div>
        </div>

        <!-- Card footer -->
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, watch, reactive, onMounted } from "vue";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import { debounce } from "lodash";
import { Form, Field, ErrorMessage } from "vee-validate";
import { createStore } from "vuex";

const users = ref({ data: [] });
const cities = ref([]);
const districts = ref([]);
const courses = ref([]);
const educations = ref([]);
const searchQuery = ref(null);
const searchName = ref(null);
// const searchRace = ref(null);
// const searchDeficiency = ref(null);
const searchCity = ref(null);
const searchDistrict = ref(null);
const searchCourse = ref(null);
const searchSemester = ref(null);
const searchShift = ref(null);

const filters = reactive({
  query: searchQuery.value,
  name: searchName.value,
  // race: searchRace.value,
  // deficiency: searchDeficiency.value,
  city: searchCity.value,
  district: searchDistrict.value,
  course: searchCourse.value,
  semester: searchSemester.value,
  shift: searchShift.value,
});

const store = createStore({
  state: {
    filters: {
      query: "",
      name: "",
      // race: "",
      // deficiency: "",
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
    .get(`admin/api/users?page=${page}`, {
      params: filters,
    })
    .then((response) => {
      users.value = response.data.users;
      cities.value = response.data.cities;
      districts.value = response.data.districts;
      courses.value = response.data.courses;
      educations.value = response.data.educations;
    });
};

onMounted(() => {
  searchCity.value = "";
  searchDistrict.value = "";
  searchCourse.value = "";
  searchSemester.value = "";
  searchShift.value = "";
});

const search = async () => {
  try {
    const { data } = await axios.get("admin/api/users/search", {
      params: filters,
    });
    users.value = data;
  } catch (error) {
    console.log(error);
  }
};

watch(
  [
    searchQuery,
    searchName,
    // searchRace,
    // searchDeficiency,
    searchCity,
    searchDistrict,
    searchCourse,
    searchSemester,
    searchShift,
  ],
  debounce(() => {
    filters.query = searchQuery.value;
    filters.name = searchName.value;
    // filters.race = searchRace.value;
    // filters.deficiency = searchDeficiency.value;
    filters.city = searchCity.value;
    filters.district = searchDistrict.value;
    filters.course = searchCourse.value;
    filters.semester = searchSemester.value;
    filters.shift = searchShift.value;

    store.commit("setFilters", filters);
    search();
  }, 300),
  {
    deep: true,
  }
);

getUsers();
</script>
