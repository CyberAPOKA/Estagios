<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Light table -->
        <div class="card-header border-0">
          <h3 class="mb-0">Filtro de solicitações</h3>
          <div class="row py-4">
            <div class="col-md-3">
              <label class="form-control-label" for="level">Turno</label>
              <select
                v-model="searchLevel"
                id="level"
                name="level"
                class="form-control form-control-alternative"
                placeholder="Selecione um nível"
              >
                <option value="Técnico">Técnico</option>
                <option value="Médio">Médio</option>
                <option value="Superior">Superior</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="hiring_type">Contratação</label>
              <select
                v-model="searchHiringType"
                id="hiring_type"
                name="hiring_type"
                class="form-control form-control-alternative"
                placeholder="Selecione um nível"
              >
                <option value="new">Nova Contratação</option>
                <option value="replace">Substituição</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="secretary_phone">Telefone</label>
              <input
                type="text"
                v-model="searchSecretaryPhone"
                id="secretary_phone"
                name="secretary_phone"
                class="form-control form-control-alternative"
                placeholder="Telefone"
              />
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="responsible">Responsável</label>
              <input
                type="text"
                v-model="searchResponsible"
                id="responsible"
                name="responsible"
                class="form-control form-control-alternative"
                placeholder="Responsável"
              />
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-3">
              <label class="form-control-label" for="status">Status</label>
              <select
                v-model="searchStatus"
                id="status"
                name="status"
                class="form-control form-control-alternative"
                placeholder="Status"
              >
                <option value="registered">Registrada</option>
                <option value="completed">Concluída</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="trainee_name">Estagiário</label>
              <input
                type="text"
                v-model="searchTraineeName"
                id="trainee_name"
                name="trainee_name"
                class="form-control form-control-alternative"
                placeholder="Estagiário"
              />
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="hiring_amount">Quantidade</label>
              <input
                type="text"
                v-model="searchHiringAmount"
                id="hiring_amount"
                name="hiring_amount"
                class="form-control form-control-alternative"
                placeholder="Quantidade"
              />
            </div>
            <div class="col-md-3">
              <label class="form-control-label" for="departament">Departamento</label>
              <input
                type="text"
                v-model="searchDepartament"
                id="departament"
                name="departament"
                class="form-control form-control-alternative"
                placeholder="Departamento"
              />
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="id">ID</th>
                <th scope="col" class="sort" data-sort="id">Status</th>
                <th scope="col" class="sort" data-sort="departament_id">Departamento</th>
                <th scope="col" class="sort" data-sort="level">Nível</th>
                <th scope="col" class="sort" data-sort="hiring_type">
                  Tipo de Contratação
                </th>
                <th scope="col" class="sort" data-sort="hiring_amount">Quantidade</th>
                <th scope="col" class="sort" data-sort="trainee_name">Estagiário</th>
                <th scope="col" class="sort" data-sort="secretary_phone">
                  Telefone da Secretaria
                </th>
                <th scope="col" class="sort" data-sort="responsible">Responsável</th>
                <th scope="col" class="sort" data-sort="information">Informações</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody v-if="requests.data.length > 0">
              <tr
                v-for="(requests, index) in requests.data"
                :key="requests.id"
                :requests="requests"
                :index="index"
              >
                <td>
                  <a v-bind:href="'/admin/solicitacoes/detalhes/' + requests.id">{{
                    requests.id
                  }}</a>
                </td>
                <td v-if="requests.status == 'registered'">Registrada</td>
                <td v-if="requests.status == 'completed'">Concluída</td>
                <td v-if="requests.status == 'authorizedbyadministrative'">
                  Autorizada por administrativo
                </td>
                <td v-if="requests.status == 'authorizedbysecretary'">
                  Autorizada por secretário
                </td>
                <td v-if="requests.status == 'resumessentbyhr'">
                  Currículos enviados pelo RH
                </td>
                <td v-if="requests.status == 'requestformoreresumes'">
                  Solicitação de mais currículos
                </td>
                <td v-if="requests.status == 'finished'">Finalizada</td>
                <td v-if="requests.status == 'canceled'">Cancelada</td>
                <td>{{ requests.departament.title }}</td>
                <td>{{ requests.level }}</td>
                <td v-if="requests.hiring_type == 'new'">Nova Contratação</td>
                <td v-if="requests.hiring_type == 'replace'">Substituição</td>
                <td>{{ requests.hiring_amount }}</td>
                <td>{{ requests.trainee_name }}</td>
                <td>{{ requests.secretary_phone }}</td>
                <td>{{ requests.responsible }}</td>
                <td>{{ requests.information.slice(0, 30) + "..." }}</td>
                <td>
                  <a :href="'/admin/solicitacoes/cursos/' + requests.id">
                    <button class="btn btn-primary">Cursos</button>
                  </a>
                  <a :href="'/admin/solicitacoes/detalhes/' + requests.id">
                    <button class="btn btn-primary">Ver</button>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="pl-5 text-center">
            <Bootstrap4Pagination
              :data="requests"
              :filters="filters"
              @pagination-change-page="(page) => getRequests(page, filters)"
            />
          </div>
        </div>

        <!-- Card footer -->
      </div>
    </div>
  </div>
</template>
<script setup>
import axios from "axios";
import { ref, watchEffect, reactive, onMounted } from "vue";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import { debounce } from "lodash";
import { createStore } from "vuex";

const requests = ref({ data: [] });
const searchLevel = ref(null);
const searchHiringType = ref(null);
const searchSecretaryPhone = ref(null);
const searchResponsible = ref(null);
const searchStatus = ref(null);
const searchTraineeName = ref(null);
const searchHiringAmount = ref(null);
const searchDepartament = ref(null);

const filters = reactive({
  level: "",
  hiring_type: "",
  secretary_phone: "",
  responsible: "",
  status: "",
  trainee_name: "",
  hiring_amount: "",
  departament: "",
});

const store = createStore({
  state: {
    filters: {
      level: "",
      hiring_type: "",
      secretary_phone: "",
      responsible: "",
      status: "",
      trainee_name: "",
      hiring_amount: "",
      departament: "",
    },
  },
  mutations: {
    setFilters(state, filters) {
      state.filters = filters;
    },
  },
});

const getRequests = (page = 1, filters = store.state.filters) => {
  axios
    .get(`api/requests?page=${page}`, {
      params: filters,
    })
    .then((response) => {
      requests.value = response.data.requests;
    });
};

onMounted(() => {
  searchLevel.value = "";
  searchHiringType.value = "";
  searchSecretaryPhone.value = "";
  searchResponsible.value = "";
  searchStatus.value = "";
  searchTraineeName.value = "";
  searchHiringAmount.value = "";
  searchDepartament.value = "";
});

watchEffect(() => {
  filters.level = searchLevel.value;
  filters.hiring_type = searchHiringType.value;
  filters.secretary_phone = searchSecretaryPhone.value;
  filters.responsible = searchResponsible.value;
  filters.status = searchStatus.value;
  filters.trainee_name = searchTraineeName.value;
  filters.hiring_amount = searchHiringAmount.value;
  filters.departament = searchDepartament.value;
  store.commit("setFilters", filters);
  getRequests();
});
</script>
