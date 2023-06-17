<template>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header border-0">
          <h3 class="mb-0">Adicionar currículos</h3>
        </div>

        <!-- <Form @click="updateRequestUsers"> -->
        <div class="container">
          <div class="card my-4 p-4" v-for="resume in resumes" :key="resume.id">
            <div v-if="showModalUser[resume.id]" class="modal-user" id="user-modal">
              <div class="modal-content-user">
                <span class="close" @click="showModalUser[resume.id] = false"
                  >&times;</span
                >
                <div class="row">
                  <div class="col">
                    <div class="card">
                      <div class="card-header border-0">
                        <div v-if="resume.user.profile">
                          <h3 class="mb-0">Dados pessoais</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Código</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.id"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Email</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.email"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Nome</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.name"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Nome</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.social_name"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">CPF</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.cpf"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">RG</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.rg"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Nascimento</label>
                              <input
                                type="date"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.birth_date"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label"
                                >Telefone Residêncial</label
                              >
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.home_phone"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Telefone celular</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.cell_phone"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Nome do pai</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.fathers_name"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Nome da mãe</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.mothers_name"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Deficiência</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.deficiency"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Raça</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.profile.race"
                              />
                            </div>
                          </div>
                        </div>
                        <div v-if="resume.user.address">
                          <h3 class="mb-0 py-4">Endereço</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Cidade</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.city"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Bairro</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.district"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Número</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.number"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">CEP</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.zip_code"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Complemento</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.complement"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Rua</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.address.street"
                              />
                            </div>
                          </div>
                        </div>
                        <div v-if="resume.user.formation">
                          <h3 class="mb-0 py-4">Escolaridade</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Escolaridade</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.education"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Curso</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.course"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Semestre</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.semester"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Turno</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.shift"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Instituição</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.institution"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Situação</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.formation.situation"
                              />
                            </div>
                          </div>
                        </div>
                        <div v-if="resume.user.experience">
                          <h3 class="mb-0 py-4">Experiências</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Cursos realizados</label>
                              <textarea
                                rows="7"
                                class="form-control form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.certifications"
                              ></textarea>
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label"
                                >Outros conhecimentos</label
                              >
                              <textarea
                                rows="7"
                                class="form-control form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.other_knowledges"
                              ></textarea>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Semestre</label>
                              <textarea
                                rows="7"
                                class="form-control form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.professional_experiences"
                              ></textarea>
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label"
                                >Já foi estagiário da Prefeitura Municipal de São
                                Leopoldo?</label
                              >
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.cityhall_trainee"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Início</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.start_date"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Fim</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.end_date"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Secretaria</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.experience.secretary"
                              />
                            </div>
                          </div>
                        </div>
                        <div v-if="resume.user.social">
                          <h3 class="mb-0 py-4">Redes sociais</h3>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Instagram</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.social.instagram"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Facebook</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.social.facebook"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Linkedin</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.social.linkedin"
                              />
                            </div>
                            <div class="col-md-6">
                              <label class="form-control-label">Outros</label>
                              <input
                                type="text"
                                class="form-control form-control-alternative"
                                readonly
                                v-model="resume.user.social.others"
                              />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="form-control-label">Links</label>
                              <textarea
                                rows="7"
                                class="form-control form-control form-control-alternative"
                                readonly
                                v-model="resume.user.social.links"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                        <div v-if="resume.user.files">
                          <h3 class="mb-0 py-4">Arquivos</h3>
                          <div class="row">
                            <div class="table-responsive">
                              <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col" class="sort" data-sort="name">
                                      Nome
                                    </th>
                                    <th scope="col" class="sort" data-sort="name">
                                      Ações
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="file in resume.user.files" :key="file.id">
                                    <td>{{ file.name }}</td>
                                    <td class="d-flex">
                                      <button
                                        type="button"
                                        class="btn btn-primary"
                                        @click="
                                          downloadFile(
                                            resume.user.id,
                                            file.name,
                                            file.file_path
                                          )
                                        "
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
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>
                <span
                  >Nome:
                  <button
                    class="btn btn-primary"
                    type="button"
                    @click="showModalUser[resume.id] = true"
                  >
                    {{ resume.user.profile.name }}
                  </button>
                </span>
              </div>
              <div class="d-flex" style="gap: 1rem">
                <label class="form-control-label" for="selected">Selecionado?</label>
                <select
                  name=""
                  id="selected"
                  class="form-control form-control-alternative mb-2"
                  v-model="resume.selected"
                >
                  <option value="yes">Sim</option>
                  <option value="no">Não</option>
                </select>
              </div>
            </div>
            <div>
              <textarea
                name=""
                id=""
                cols="60"
                rows="5"
                v-model="resume.observation"
                placeholder="Observação do candidato"
                class="form-control form-control-alternative"
                >{{ resume.observation }}</textarea
              >
            </div>
          </div>
          <div class="d-flex py-4" v-for="(p, index) in progress" :key="p.id">
            <div class="col-md-8">
              <textarea
                rows="7"
                name="observation"
                id="observation"
                class="form-control form-control-alternative"
                v-model="progress[index].observation"
                :readonly="(p.admin.type !== admin.type) == 'recruiter'"
                v-if="p.admin.type == 'rh'"
                placeholder="Observação"
              ></textarea>
            </div>
            <div class="col-md-4">
              <button
                class="btn btn-primary"
                v-if="p.admin.type == 'rh'"
                type="submit"
                @click="updateRequestUsers()"
              >
                Salvar
              </button>
            </div>
          </div>
        </div>
        <!-- </Form> -->
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import { Form, Field, ErrorMessage } from "vee-validate";
import Multiselect from "@vueform/multiselect";

import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

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

  setup() {
    const toast = useToast();
    return {
      toast,
    };
  },

  data() {
    return {
      showModalUser: {},
    };
  },

  methods: {
    downloadFile(resumeId, name, file_path) {
      const user_id = resumeId;
      const file_path_without_curriculums = file_path.replace(
        `curriculums/${user_id}/`,
        ""
      );
      const file_original_name = name;
      window.location.href = `/admin/download/${user_id}/${file_path_without_curriculums}/${file_original_name}`;
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
        .then((response) => {
          this.toast.success("Dados salvos!", {
            position: "top-right",
            duration: "5000",
          });
        })
        .catch((error) => {});
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.modal-user {
  display: block;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
}
.modal-content-user {
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
</style>
