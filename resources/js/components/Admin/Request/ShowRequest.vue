<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link active"
              id="request-tab"
              data-toggle="tab"
              href="#request"
              role="tab"
              aria-controls="request"
              aria-selected="true"
              >Solicitação</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              id="profile-tab"
              data-toggle="tab"
              href="#profile"
              role="tab"
              aria-controls="profile"
              aria-selected="false"
              >Andamento</a
            >
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div
            class="tab-pane fade show active"
            id="request"
            role="tabpanel"
            aria-labelledby="request-tab"
          >
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <h3 class="mb-0">Solicitação {{ request.id }}</h3>
              </div>
            </div>
            <div class="card-body">
              <Form @submit="updateRequest">
                <div class="pl-lg-4">
                  <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="level"
                      >Nível<span class="required-field">*</span></label
                    >
                    <div class="col-md-10">
                      <Multiselect
                        v-model="request.level"
                        placeholder="Selecione uma Opção"
                        class="form-control form-control-alternative"
                        :rules="required"
                        :options="[
                          { value: 'Técnico', label: 'Técnico' },
                          { value: 'Médio', label: 'Médio' },
                          { value: 'Superior', label: 'Superior' },
                        ]"
                      />
                      <ErrorMessage name="level" />
                      <span v-if="allerros.level" :class="['label label-danger']">{{
                        allerros.level[0]
                      }}</span>
                    </div>
                  </div>
                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="hiring_type"
                        >Tipo de contratação<span class="required-field">*</span></label
                      >
                      <div class="col-md-10">
                        <Multiselect
                          placeholder="Selecione uma Opção"
                          class="form-control form-control-alternative"
                          v-model="requestsReactive.hiring_type"
                          :options="[
                            { value: 'new', label: 'Nova Contratação' },
                            { value: 'replace', label: 'Substituição' },
                          ]"
                        />
                        <ErrorMessage name="hiring_type" />
                        <span
                          v-if="allerros.hiring_type"
                          :class="['label label-danger']"
                          >{{ allerros.hiring_type[0] }}</span
                        >
                      </div>
                    </div>
                  </div>
                  <div id="hiring_amount" v-show="requestsReactive.hiring_type == 'new'">
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="hiring_amount"
                        >Quantidade De Contratações</label
                      >
                      <div class="col-md-10">
                        <Field
                          id="hiring_amount"
                          name="hiring_amount"
                          type="number"
                          class="form-control form-control-alternative"
                          v-model="request.hiring_amount"
                        />
                      </div>
                    </div>
                  </div>
                  <div
                    id="trainee_name"
                    v-show="requestsReactive.hiring_type == 'replace'"
                  >
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="trainee_name"
                        >Nome do estagiário</label
                      >
                      <div class="col-md-10">
                        <Field
                          id="trainee_name"
                          name="trainee_name"
                          type="text"
                          class="form-control form-control-alternative"
                          v-model="request.trainee_name"
                        />
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="course"
                        >Curso(s) do(s) estagiário(s)<span class="required-field"
                          >*</span
                        ></label
                      >
                      <div class="col-md-10">
                        <Multiselect
                          mode="tags"
                          placeholder="Selecione o(s) Curso(s)"
                          class="form-control-lg form-control-alternative"
                          :close-on-select="false"
                          :searchable="true"
                          v-model="courseNames"
                          :object="true"
                          :rules="required"
                          :options="allCourseNames"
                        />
                        <ErrorMessage name="course" />
                        <span v-if="allerros.course" :class="['label label-danger']">{{
                          allerros.course[0]
                        }}</span>
                      </div>
                    </div>
                  </div>

                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="secretary_phone"
                        >Telefone da Secretaria<span class="required-field"
                          >*</span
                        ></label
                      >
                      <div class="col-md-10">
                        <Field
                          id="secretary_phone"
                          name="secretary_phone"
                          type="text"
                          class="form-control form-control-alternative"
                          v-model="request.secretary_phone"
                          v-mask="['(##) # ####-####']"
                          :rules="checkSecretaryPhone"
                        />
                        <ErrorMessage name="secretary_phone" />
                        <span
                          v-if="allerros.secretary_phone"
                          :class="['label label-danger']"
                          >{{ allerros.secretary_phone[0] }}</span
                        >
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="responsible"
                        >Responsável Pelas Entrevistas<span class="required-field"
                          >*</span
                        ></label
                      >
                      <div class="col-md-10">
                        <Field
                          id="responsible"
                          name="responsible"
                          type="text"
                          :rules="required"
                          class="form-control form-control-alternative"
                          v-model="request.responsible"
                        />
                        <ErrorMessage name="responsible" />
                        <span
                          v-if="allerros.responsible"
                          :class="['label label-danger']"
                          >{{ allerros.responsible[0] }}</span
                        >
                      </div>
                    </div>
                  </div>

                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="information"
                        >Outras Informações<span class="required-field">*</span></label
                      >
                      <div class="col-md-10">
                        <textarea
                          rows="7"
                          name="information"
                          id="information"
                          :rules="required"
                          class="form-control form-control form-control-alternative"
                          v-model="request.information"
                        ></textarea>
                        <ErrorMessage name="information" />
                        <span
                          v-if="allerros.information"
                          :class="['label label-danger']"
                          >{{ allerros.information[0] }}</span
                        >
                      </div>
                    </div>
                  </div>

                  <div>
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="departament_id"
                        >Departamento<span class="required-field">*</span></label
                      >
                      <div class="col-md-10">
                        <Multiselect
                          v-model="request.departament_id"
                          :searchable="true"
                          placeholder="Selecione uma Opção"
                          class="form-control form-control-alternative"
                          :rules="required"
                          :options="departamentNames"
                        />
                        <ErrorMessage name="departament_id" />
                        <span
                          v-if="allerros.departament_id"
                          :class="['label label-danger']"
                          >{{ allerros.departament_id[0] }}</span
                        >
                      </div>
                    </div>
                  </div>
                  <div
                    class="form-actions text-center"
                    v-show="admin.type === 'recruiter'"
                  >
                    <button
                      v-if="request.status != 'completed'"
                      type="submit"
                      class="btn btn-primary"
                    >
                      Concluir
                    </button>
                    <span v-else>Solicitação já Concluída!</span>
                  </div>
                </div>
              </Form>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="profile"
            role="tabpanel"
            aria-labelledby="profile-tab"
          >
            <div class="card-header bg-white border-0">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <h3>Código: {{ request.id }}</h3>
                </div>

                <!-- <div>
                  <h3 class="mb-0">Status: {{ request.status }}</h3>
                  <h3>Admin: {{ admin.type }}</h3>
                </div> -->
                <div
                  v-show="admin.type === 'administrative' || admin.type === 'secretary'"
                >
                  <div v-if="admin.type === 'administrative'">
                    <div
                      v-if="
                        request.status === 'authorizedbyadministrative' ||
                        request.status === 'authorizedbysecretary' ||
                        request.status === 'resumessentbyhr' ||
                        request.status === 'requestformoreresumes'
                      "
                    >
                      Você já aprovou esta solicitação.
                    </div>
                    <div v-else-if="request.status === 'registered'">
                      A solicitação está em andamento.
                    </div>
                    <div v-else-if="request.status === 'finished'">
                      Esta solicitação foi Finalizada!
                    </div>
                    <div v-else-if="request.status === 'canceled'">
                      Esta solicitação foi Cancelada!
                    </div>
                    <div v-else>
                      <Form @submit="authorizeRequest">
                        <button class="btn btn-primary">Autorizar</button>
                      </Form>
                    </div>
                  </div>
                  <div v-else-if="admin.type === 'secretary'">
                    <div
                      v-if="
                        request.status === 'authorizedbysecretary' ||
                        request.status === 'resumessentbyhr' ||
                        request.status === 'requestformoreresumes'
                      "
                    >
                      Você já aprovou esta solicitação!
                    </div>
                    <div
                      v-else-if="
                        request.status === 'registered' || request.status === 'completed'
                      "
                    >
                      A solicitação está em andamento.
                    </div>
                    <div v-else-if="request.status === 'finished'">
                      Esta solicitação foi Finalizada!
                    </div>
                    <div v-else-if="request.status === 'canceled'">
                      Esta solicitação foi Cancelada!
                    </div>
                    <div v-else>
                      <Form @submit="authorizeRequest">
                        <button class="btn btn-primary">Autorizar</button>
                      </Form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- <div
                class="modal-resumes"
                tabindex="-1"
                role="dialog"
                v-if="showModalResumes"
              >
                <div class="modal-dialog-resumes" role="document">
                  <div class="modal-content-resumes">
                    <div class="modal-header">
                      <h5 class="modal-title">Lista de candidatos selecionados</h5>
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        @click="showModalResumes = false"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                            <tr>
                              <th>Nome</th>
                              <th>CPF</th>
                              <th>Curso</th>
                              <th>Semestre</th>
                              <th v-if="admin.type == 'rh' || admin.type == 'recruiter'">
                                Excluir
                              </th>
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
                                <a href="#" @click="deleteResume(resume.id)">DEL</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <Bootstrap4Pagination
                          :data="resumes"
                          @pagination-change-page="(page) => getResumes(page)"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

              <div v-if="showModalResumes" class="modal-curriculum" id="curriculum-modal">
                <div class="modal-content-curriculum">
                  <span class="close" @click="showModalResumes = false">&times;</span>
                  <resumes-component
                    :cities="cities"
                    :districts="districts"
                    :allCourses="allCourses"
                    :educations="educations"
                    :request="request"
                    :progress="progress"
                    :admin="admin"
                    :id="request.id"
                  />
                </div>
              </div>

              <Form
                @submit="updateProgress(p.id, index)"
                v-for="(p, index) in progress"
                :key="p.id"
              >
                <!-- <div v-if="progress[index].observation != null">Tem</div> -->
                <!-- v-if="progress[index].observation != null" -->
                <div class="pl-lg-4">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <textarea
                        rows="7"
                        name="observation"
                        id="observation"
                        :rules="required"
                        class="form-control form-control-alternative"
                        v-model="progress[index].observation"
                        :readonly="p.admin.id !== admin.id"
                        placeholder="Observação"
                      ></textarea>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex flex-column">
                        <div class="p-2">Escrita por: {{ p.admin.name }}</div>
                        <div class="p-2">
                          Criado em:
                          {{ new Date(p.created_at).toLocaleDateString("pt-BR") }} às
                          {{
                            new Date(p.created_at).toLocaleTimeString("pt-BR", {
                              hour: "2-digit",
                              minute: "2-digit",
                            })
                          }}
                        </div>
                        <div class="p-2">
                          Atualizado em:
                          {{ new Date(p.updated_at).toLocaleDateString("pt-BR") }} às
                          {{
                            new Date(p.updated_at).toLocaleTimeString("pt-BR", {
                              hour: "2-digit",
                              minute: "2-digit",
                            })
                          }}
                        </div>
                        <div class="p-2" v-if="p.admin.type === 'administrative'">
                          Autorizada por administrativo
                        </div>
                        <div class="p-2" v-if="p.admin.type === 'secretary'">
                          Autorizada por secretário
                        </div>
                        <div class="d-flex p-2">
                          <div class="p-2" v-if="p.admin.id === admin.id">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                          </div>
                          <div class="p-2">
                            <button
                              v-if="p.admin.type === 'rh'"
                              class="btn btn-primary"
                              type="button"
                              @click="showModalResumes = true"
                            >
                              Candidatos
                            </button>
                          </div>
                          <div class="p-2">
                            <a
                              v-if="p.admin.type === 'rh' && admin.type == 'recruiter'"
                              :href="'/admin/solicitacoes/candidatos/' + request.id"
                              ><button class="btn btn-primary" type="button">
                                Responder
                              </button></a
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </Form>
              <div>
                <h3 class="mb-0">
                  <div class="pl-lg-4">
                    <h3 class="mb-0">
                      <button
                        v-if="!adminHasProgress && admin.type !== 'rh'"
                        @click="showModal = true"
                        class="btn btn-primary"
                      >
                        Adicionar observação
                      </button>
                      <!-- && request.status != 'resumessentbyhr' -->
                      <button
                        v-if="
                          (admin.type === 'rh' &&
                            request.status == 'authorizedbysecretary') ||
                          request.status == 'resumessentbyhr' ||
                          request.status == 'requestformoreresumes'
                        "
                        class="btn btn-primary"
                        @click="showModalCurriculum = true"
                      >
                        Adicionar currículos
                      </button>
                    </h3>
                    <!-- <Users /> -->
                    <div
                      v-if="showModalCurriculum"
                      class="modal-curriculum"
                      id="curriculum-modal"
                    >
                      <div class="modal-content-curriculum">
                        <span class="close" @click="showModalCurriculum = false"
                          >&times;</span
                        >
                        <users-resume-component
                          :cities="cities"
                          :districts="districts"
                          :allCourses="allCourses"
                          :educations="educations"
                          :request="request"
                          :progress="progress"
                          :admin="admin"
                          :id="request.id"
                        />
                      </div>
                    </div>

                    <div class="modal" v-if="showModal">
                      <div class="modal-content">
                        <Form @submit="createProgress">
                          <h1>Adicionar uma observação</h1>
                          <textarea
                            rows="7"
                            name="observation"
                            id="observation"
                            :rules="required"
                            class="form-control form-control-alternative"
                            v-model="observation"
                          ></textarea>
                          <div class="d-flex justify-content-between pt-2">
                            <button @click="showModal = false" class="btn btn-danger">
                              Fechar
                            </button>
                            <button type="submit" class="btn btn-success">
                              Adicionar
                            </button>
                          </div>
                        </Form>
                      </div>
                    </div>
                  </div>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import UsersResume from "../UsersResume.vue";
import axios from "axios";
import { reactive, computed, ref } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useToast } from "vue-toast-notification";
import { mask } from "vue-the-mask";
import "vue-toast-notification/dist/theme-sugar.css";
import Multiselect from "@vueform/multiselect";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
export default {
  props: [
    "request",
    "courses",
    "allcourses",
    "departaments",
    "admin",
    "progress",
    "cities",
    "districts",
  ],
  components: {
    Form,
    Field,
    ErrorMessage,
    Multiselect,
    request: Object,
    courses: Array,
    progress: Object,
  },

  data() {
    return {
      showModal: false,
      showModalCurriculum: false,
      showModalResumes: false,
    };
  },

  directives: { mask },
  setup(props) {
    const state = reactive({
      request: {
        hiring_type: "",
        hiring_amount: "",
        trainee_name: "",
      },
    });
    const requestsReactive = reactive(props.request);
    const toast = useToast();

    const courseNames = ref(
      Object.entries(props.courses).map(([course, id]) => {
        return {
          value: id,
          label: course,
        };
      })
    );

    const allCourseNames = computed(() =>
      props.allcourses.map((allcourses) => {
        return {
          value: allcourses.id,
          label: allcourses.course,
        };
      })
    );

    const departamentNames = computed(() =>
      props.departaments.map((departaments) => {
        return {
          value: departaments.id,
          label: departaments.title,
        };
      })
    );

    return {
      toast,
      courseNames,
      allCourseNames,
      departamentNames,
      state,
      requestsReactive,
    };
  },
  data: () => ({
    value: [
      { value: "BackboneJS", label: "BackboneJS" },
      { value: "EmberJS", label: "EmberJS" },
    ],
    allerros: [],
  }),
  // created() {
  //   this.getResumes(this.request.id);
  // },
  methods: {
    // async getResumes(page = 1) {
    //   try {
    //     const response = await axios.get(
    //       `/admin/api/resumes/${this.request.id}?page=${page}`
    //     );
    //     this.resumes = response.data.resumes;
    //   } catch (error) {
    //     console.error(error);
    //   }
    // },

    checkSecretaryPhone(secretary_phone) {
      if (!secretary_phone) {
        return "Este campo é obrigatório!";
      }
      let secretary_phoneRegex = /^\(\d{2}\) \d{1} \d{4}-\d{4}$/;
      if (!secretary_phoneRegex.test(secretary_phone)) {
        return "Número de telefone inválido!";
      }
      return true;
    },

    required(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      return true;
    },

    updateRequest() {
      var data = new FormData();

      data.append("courseNames", JSON.stringify(this.courseNames));
      data.append("level", this.request.level);
      data.append("hiring_type", this.request.hiring_type);
      data.append("hiring_amount", this.request.hiring_amount);
      data.append("trainee_name", this.request.trainee_name);
      data.append("secretary_phone", this.request.secretary_phone);
      data.append("responsible", this.request.responsible);
      data.append("information", this.request.information);
      data.append("departament_id", this.request.departament_id);

      axios
        .post("update/" + this.request.id, data)
        .then((response) => {
          this.allerros = [];
          this.toast.success("Solicitação concluída com sucesso!", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        })
        .catch((error) => {
          this.allerros = error.response.data.errors;
          this.toast.error("Ocorreu um erro ao concluir a solicitação.", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        });
    },
    updateProgress(id, index) {
      var data = new FormData();
      data.append("observation", this.progress[index].observation);

      axios
        .post("update-progress/" + id, data)
        .then((response) => {
          this.allerros = [];
          this.toast.success("Observação atualizada com sucesso!", {
            position: "top-right",
            duration: "5000",
          });
        })
        .catch((error) => {
          this.allerros = error.response.data.errors;
          this.toast.error("Ocorreu um erro ao atualizar a observação.", {
            position: "top-right",
            duration: "5000",
          });
        });
    },
    createProgress() {
      var data = new FormData();
      data.append("observation", this.observation);

      axios
        .post("create-progress/" + this.request.id, data)
        .then((response) => {
          this.allerros = [];
          this.toast.success("Observação adicionada com sucesso!", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
          this.showModal = false;
        })
        .catch((error) => {
          this.allerros = error.response.data.errors;
          this.toast.error("Ocorreu um erro ao adicionar a observação.", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
          this.showModal = false;
        });
    },
    authorizeRequest() {
      axios
        .post("authorize-request/" + this.request.id)
        .then((response) => {
          this.toast.success("Solicitação autorizada com Sucesso!", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        })
        .catch((error) => {
          this.toast.error("Ocorreu um erro ao autorizar a solicitação.", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        });
    },
    saveResume() {
      axios
        .post("authorize-request/" + this.request.id)
        .then((response) => {})
        .catch((error) => {});
    },
    deleteResume(id) {
      axios
        .delete(`/admin/resumes/user/delete/${id}`)
        .then((response) => {
          window.location.reload();
          this.toast.success("Candidato removido com Sucesso!", {
            position: "top-right",
            duration: "5000",
          });
        })
        .catch((error) => {
          console.log("Erro ao excluir currículo:", error);
        });
    },
  },
  computed: {
    adminHasProgress() {
      return this.progress.some((p) => p.admin_id === this.admin.id);
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.label-danger {
  color: red;
}
.modal {
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  width: 80%;
  max-width: 800px;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
}

@media (max-width: 768px) {
  .modal-content {
    width: 90%;
  }
}

.modal-curriculum {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}
.modal-content-curriculum {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.modal-resumes {
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content-resumes {
  width: 100%;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
}
</style>
