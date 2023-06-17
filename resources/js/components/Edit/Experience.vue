<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edit experience {{ userReactive.experience }}</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateExperience">
            <h6 class="heading-small text-muted mb-4">User Experience</h6>

            <div class="pl-lg-4">
              <div class="row">
                <label class="form-control-label" for="certifications"
                  >Cursos realizados</label
                >
                <textarea
                  name="certifications"
                  id="certifications"
                  cols="30"
                  rows="10"
                  v-model="userReactive.experience.certifications"
                  class="form-control form-control form-control-alternative"
                >
                </textarea>
                <ErrorMessage name="certifications" />
                <span v-if="allerros.certifications" :class="['label label-danger']">{{
                  allerros.certifications[0]
                }}</span>
              </div>

              <div class="row"></div>

              <div class="row pt-5">
                <label class="form-control-label" for="other_knowledges"
                  >Outros Conhecimentos</label
                >
                <textarea
                  name="other_knowledges"
                  id="other_knowledges"
                  cols="30"
                  rows="10"
                  v-model="userReactive.experience.other_knowledges"
                  class="form-control form-control form-control-alternative"
                >
                </textarea>
                <ErrorMessage name="other_knowledges" />
                <span v-if="allerros.other_knowledges" :class="['label label-danger']">{{
                  allerros.other_knowledges[0]
                }}</span>
              </div>

              <div class="row pt-5">
                <label class="form-control-label" for="professional_experiences"
                  >Experiências Profissionais</label
                >
                <textarea
                  name="professional_experiences"
                  id="professional_experiences"
                  cols="30"
                  rows="10"
                  v-model="userReactive.experience.professional_experiences"
                  class="form-control form-control form-control-alternative"
                >
                </textarea>
                <ErrorMessage name="professional_experiences" />
                <span
                  v-if="allerros.professional_experiences"
                  :class="['label label-danger']"
                  >{{ allerros.professional_experiences[0] }}</span
                >
              </div>

              <div class="row pt-5">
                <div class="col-md-4">
                  <label class="form-control-label" for="">
                    Já foi estagiário da Prefeitura Municipal de São Leopoldo?</label
                  >
                  <div class="row">
                    <div class="col-md-6">
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="userReactive.experience.cityhall_trainee"
                          id="yes"
                          value="yes"
                          name="cityhall_trainee"
                          @change="clearFields"
                        />
                        <label class="custom-control-label" for="yes">Sim</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="userReactive.experience.cityhall_trainee"
                          id="no"
                          value="no"
                        />
                        <label class="custom-control-label" for="no">Não</label>
                      </div>
                    </div>
                    <span
                      v-if="allerros.cityhall_trainee"
                      :class="['label label-danger']"
                      >{{ allerros.cityhall_trainee[0] }}</span
                    >
                  </div>
                </div>
                <div
                  class="col-md-8"
                  v-show="userReactive.experience.cityhall_trainee == 'yes'"
                >
                  <label class="form-control-label" for="start_date">Período</label>
                  <div class="row">
                    <div class="col-md-6">
                      <label class="form-control-label" for="">Data de início</label>
                      <input
                        id="start_date"
                        name="start_date"
                        type="date"
                        class="form-control form-control form-control-alternative"
                        v-model="userReactive.experience.start_date"
                      />
                    </div>
                    <div class="col-md-6">
                      <label class="form-control-label" for="">Data de término</label>
                      <input
                        id="end_date"
                        name="end_date"
                        type="date"
                        class="form-control form-control form-control-alternative"
                        v-model="userReactive.experience.end_date"
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" v-show="userReactive.experience.cityhall_trainee == 'yes'">
                <div class="col-md-6">
                  <label for="secretary">Secretaria</label>
                  <Field
                    id="secretary"
                    name="secretary"
                    type="text"
                    class="form-control form-control form-control-alternative"
                    v-model="userReactive.experience.secretary"
                  />
                  <ErrorMessage name="secretary" />
                </div>
              </div>

              <div class="text-center">
                <button
                  type="submit"
                  class="btn btn-success mt-4"
                  :disabled="validateCityHallTrainee() !== true"
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
  props: ["user", "experience"],
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
        experience: {
          certifications: "",
          other_knowledges: "",
          professional_experiences: "",
          cityhall_trainee: "",
          start_date: "",
          end_date: "",
          secretary: "",
        },
      },
    });
    const userReactive = reactive(props.user);

    const rules = computed(() => {
      return {
        $v: useValidate(),
        userReactive: {
          experience: {
            certifications: { required },
            other_knowledges: { required },
            professional_experiences: { required },
            cityhall_trainee: { required },
          },
        },
      };
    });

    const v$ = useValidate(rules, state);

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
    required(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      return true;
    },
    validateCityHallTrainee() {
      if (this.userReactive.experience.cityhall_trainee === "yes") {
        if (!this.userReactive.experience.start_date) {
          return "A data de início é obrigatória.";
        }
        if (!this.userReactive.experience.end_date) {
          return "A data de término é obrigatória.";
        }
        if (!this.userReactive.experience.secretary) {
          return "O campo secretaria é obrigatório.";
        }
      }
      return true;
    },
    clearFields() {
      this.userReactive.experience.start_date = "";
      this.userReactive.experience.end_date = "";
      this.userReactive.experience.secretary = "";
    },
    updateExperience() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();

        data.append("certifications", this.userReactive.experience.certifications);
        data.append("other_knowledges", this.userReactive.experience.other_knowledges);
        data.append(
          "professional_experiences",
          this.userReactive.experience.professional_experiences
        );
        data.append("cityhall_trainee", this.userReactive.experience.cityhall_trainee);
        data.append("start_date", this.userReactive.experience.start_date);
        data.append("end_date", this.userReactive.experience.end_date);
        data.append("secretary", this.userReactive.experience.secretary);

        axios
          .post("update-experience", data)
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
