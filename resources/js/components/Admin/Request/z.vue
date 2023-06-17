<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Adicionar currículos</h3>
        </div>

        <Form @click="updateRequestUsers">
          <div class="card my-4 p-4" v-for="resume in resumes" :key="resume.id">
            <div v-if="showModalUser[resume.id]" class="modal-user" id="user-modal">
              <div class="modal-content-user">
                <span class="close" @click="showModalUser[resume.id] = false"
                  >&times;</span
                >
                <div class="card-header border-0">
                  <div v-if="resume.user.files">
                    <h3 class="mb-0 py-4">Arquivos</h3>
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col" class="sort" data-sort="name">Nome</th>
                              <th scope="col" class="sort" data-sort="name">Ações</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="file in resume.user.files" :key="file.id">
                              <td>{{ file.name }}</td>
                              <td class="d-flex">
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  @click="downloadFile(file.file_path)"
                                >
                                  Download
                                </button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import { Form, Field, ErrorMessage } from "vee-validate";
import "vue-toast-notification/dist/theme-sugar.css";
import Multiselect from "@vueform/multiselect";

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
    "resumes",
  ],
  components: {
    Form,
    Field,
    ErrorMessage,
    Multiselect,
    request: Object,
    courses: Array,
    progress: Object,
    resumes: Object,
  },

  data() {
    return {
      showModalUser: {},
    };
  },

  methods: {
    downloadFile(file_path) {
      event.stopPropagation();
      if (this.resume && this.resume.user) {
        const user_id = this.resume.user.id;
        const file_path_without_curriculums = file_path.replace(
          `curriculums/${user_id}/`,
          ""
        );
        window.location.href = `download/${user_id}/${file_path_without_curriculums}`;
      }
    },

    required(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      return true;
    },

    updateRequestUsers() {
      var data = {
        resumes: this.resumes,
        progress: this.progress,
      };

      axios
        .post(`/admin/solicitacoes/candidatos/update/${this.request.id}`, data)
        .then((response) => {})
        .catch((error) => {});
    },
  },
};
</script>
