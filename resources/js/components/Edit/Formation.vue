<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edição de formação</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateFormation">
            <h6 class="heading-small text-muted mb-4"></h6>

            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="education">Escolaridade</label>
                    <select
                      v-model="userReactive.formation.education"
                      name="education"
                      id="education"
                      class="form-control form-control-alternative"
                      :rules="required"
                    >
                      <option disabled value="">Selecione uma opção</option>
                      <option
                        v-for="(education, index) in educations"
                        :key="index"
                        v-bind:value="education.education"
                      >
                        {{ education.education }}
                      </option>
                    </select>
                    <ErrorMessage name="education" />
                    <span v-if="allerros.education" :class="['label label-danger']">{{
                      allerros.education[0]
                    }}</span>
                  </div>
                </div>
                <div v-if="userReactive.formation.education === ''" class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="course">Curso</label>
                    <input
                      type="text"
                      class="form-control form-control-alternative"
                      placeholder="Selecione uma escolaridade antes"
                      readonly
                    />
                  </div>
                </div>

                <div
                  v-if="userReactive.formation.education === 'Ensino Médio'"
                  class="col-md-6"
                >
                  <div class="form-group">
                    <label class="form-control-label" for="course">Curso</label>
                    <select
                      v-model="userReactive.formation.course"
                      id="course"
                      name="course"
                      class="form-control form-control-alternative"
                      :rules="required"
                    >
                      <option disabled value="">Selecione uma opção</option>
                      <option
                        v-for="(course, index) in courses"
                        :key="index"
                        v-bind:value="course.course"
                        v-show="course.education_id === 1"
                      >
                        {{ course.course }}
                      </option>
                    </select>
                    <ErrorMessage name="course" />
                    <span v-if="allerros.course" :class="['label label-danger']">{{
                      allerros.course[0]
                    }}</span>
                  </div>
                </div>

                <div
                  v-if="userReactive.formation.education === 'Ensino Técnico'"
                  class="col-md-6"
                >
                  <div class="form-group">
                    <label class="form-control-label" for="course">Curso</label>
                    <select
                      v-model="userReactive.formation.course"
                      id="course"
                      class="form-control form-control-alternative"
                      :rules="required"
                    >
                      <option disabled value="">Selecione uma opção</option>
                      <option
                        v-for="(course, index) in courses"
                        :key="index"
                        v-bind:value="course.course"
                        v-show="course.education_id === 2"
                      >
                        {{ course.course }}
                      </option>
                    </select>
                    <ErrorMessage name="course" />
                    <span v-if="allerros.course" :class="['label label-danger']">{{
                      allerros.course[0]
                    }}</span>
                  </div>
                </div>

                <div
                  v-if="userReactive.formation.education === 'Ensino Superior'"
                  class="col-md-6"
                >
                  <div class="form-group">
                    <label class="form-control-label" for="course">Curso</label>
                    <select
                      v-model="userReactive.formation.course"
                      name="course"
                      id="course"
                      class="form-control form-control-alternative"
                      :rules="required"
                    >
                      <option disabled value="">Selecione uma opção</option>
                      <option
                        v-for="(course, index) in courses"
                        :key="index"
                        v-bind:value="course.course"
                        v-show="course.education_id === 3"
                      >
                        {{ course.course }}
                      </option>
                    </select>
                    <ErrorMessage name="course" />
                    <span v-if="allerros.course" :class="['label label-danger']">{{
                      allerros.course[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="semester">Semestre</label>
                    <select
                      id="semester"
                      name="semester"
                      class="form-control form-control-alternative"
                      v-model="user.formation.semester"
                      :rules="required"
                    >
                      <option disabled value="">Selecione o semestre</option>
                      <option v-for="n in 10" :value="n" v-bind:key="n">{{ n }}º</option>
                    </select>
                    <span v-if="allerros.semester" :class="['label label-danger']">{{
                      allerros.semester[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="shift">Turno</label>
                    <select
                      id="shift"
                      name="shift"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.formation.shift"
                      :rules="required"
                    >
                      <option disabled value="">Selecione o turno</option>
                      <option value="Manhã">Manhã</option>
                      <option value="Tarde">Tarde</option>
                      <option value="Noite">Noite</option>
                    </select>
                    <span v-if="allerros.shift" :class="['label label-danger']">{{
                      allerros.shift[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="institution"
                      >Instituição</label
                    >
                    <Field
                      id="institution"
                      name="institution"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.formation.institution"
                      :rules="required"
                    />
                    <ErrorMessage name="institution" />
                    <span v-if="allerros.institution" :class="['label label-danger']">{{
                      allerros.institution[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="situation">Situação</label>
                    <select
                      id="situation"
                      name="situation"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.formation.situation"
                      :rules="required"
                    >
                      <option disabled value="">Selecione a situação</option>
                      <option value="Em andamento">Em andamento</option>
                      <option value="Finalizado">Finalizado</option>
                      <option value="Trancado">Trancado</option>
                    </select>
                    <span v-if="allerros.situation" :class="['label label-danger']">{{
                      allerros.situation[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button
                  type="submit"
                  class="btn btn-success mt-4"
                  :disabled="validateForm(user.formation.institution) !== true"
                >
                  Salvar
                </button>
              </div>
            </div>
          </Form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import useValidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
import { reactive, computed } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { mask } from "vue-the-mask";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

export default {
  props: ["user", "formation", "courses", "educations"],
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  directives: { mask },
  setup(props) {
    const toast = useToast();
    const state = reactive({
      user: {
        email: "",
        password: "",
        password_confirmation: "",
        profile: {
          name: "",
          social_name: "",
          birth_date: "",
          cpf: "",
          rg: "",
          home_phone: "",
          cell_phone: "",
          fathers_name: "",
          mothers_name: "",
          deficiency: [],
          race: "",
        },
        address: {
          city: "",
          number: "",
          district: "",
          zip_code: "",
          complement: "",
          street: "",
        },
        formation: {
          education: "",
          course: "",
          semester: "",
          shift: "",
          institution: "",
          situation: "",
        },
        experience: {
          certifications: "",
          other_knowledges: "",
          professional_experiences: "",
          cityhall_trainee: "",
          start_date: "",
          end_date: "",
          secretary: "",
        },
        social: {
          instagram: "",
          facebook: "",
          linkedin: "",
          others: "",
          links: "",
        },
      },
      file: [],
    });

    const userReactive = reactive(props.user);

    const rules = computed(() => {
      return {
        $v: useValidate(),
        user: {
          formation: {
            education: { required },
            course: { required },
            semester: { required },
            shift: { required },
            institution: { required },
            situation: { required },
          },
        },
      };
    });

    const v$ = useValidate(rules, state, userReactive);

    return {
      state,
      v$,
      toast,
      userReactive,
    };
  },

  data() {
    return {
      allerros: [],
    };
  },
  mounted() {
    console.log("mounted");
  },

  methods: {
    validateForm(institution) {
      const institutionValid = this.required(institution);
      if (institutionValid !== true) {
        return institutionValid;
      }
      return true;
    },
    required(value) {
      if (!value || value === "") {
        return "Este campo é obrigatório!";
      }
      return true;
    },
    updateFormation() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();

        data.append("education", this.userReactive.formation.education);
        data.append("course", this.userReactive.formation.course);
        data.append("semester", this.user.formation.semester);
        data.append("shift", this.user.formation.shift);
        data.append("institution", this.state.user.formation.institution);
        data.append("situation", this.user.formation.situation);

        axios
          .post("update-formation", data)
          .then((response) => {
            this.allerros = [];
            console.log(response);
            console.log("sucesso");
            //window.location = response.data.redirect;
            //this.$router.push("/");
            this.toast.success("Dados atualizados com Sucesso!", {
              position: "top-right",
              duration: "5000",
            });
          })
          .catch((error) => {
            this.allerros = error.response.data.errors;
            console.log(error.response);
            console.log("erro");
            alert("Ocorreu um erro, tente novamente!");
          });
      }
    },
  },
};
</script>
