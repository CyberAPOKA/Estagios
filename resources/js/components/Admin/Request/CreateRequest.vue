<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Criar Solicitação</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="createRequest">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="form-group row">
                <label class="col-md-2 form-control-label" for="level"
                  >Nível<span class="required-field">*</span></label
                >
                <div class="col-md-10">
                  <Multiselect
                    v-model="level"
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
                      v-model="hiring_type"
                      placeholder="Selecione uma Opção"
                      class="form-control form-control-alternative"
                      :rules="required"
                      :options="[
                        { value: 'new', label: 'Nova Contratação' },
                        { value: 'replace', label: 'Substituição' },
                      ]"
                    />
                    <ErrorMessage name="hiring_type" />
                    <span v-if="allerros.hiring_type" :class="['label label-danger']">{{
                      allerros.hiring_type[0]
                    }}</span>
                  </div>
                </div>
              </div>
              <div id="hiring_amount" v-show="hiring_type == 'new'">
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
                      v-model="hiring_amount"
                    />
                  </div>
                </div>
              </div>
              <div id="trainee_name" v-show="hiring_type == 'replace'">
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
                      v-model="trainee_name"
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
                      v-model="course"
                      mode="tags"
                      placeholder="Selecione o(s) Curso(s)"
                      class="form-control form-control-alternative"
                      :close-on-select="false"
                      :searchable="true"
                      :options="courseNames"
                      :rules="required"
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
                    >Telefone da Secretaria<span class="required-field">*</span></label
                  >
                  <div class="col-md-10">
                    <Field
                      id="secretary_phone"
                      name="secretary_phone"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="secretary_phone"
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
                      class="form-control form-control-alternative"
                      v-model="responsible"
                      :rules="required"
                    />
                    <ErrorMessage name="responsible" />
                    <span v-if="allerros.responsible" :class="['label label-danger']">{{
                      allerros.responsible[0]
                    }}</span>
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
                      v-model="information"
                      :rules="required"
                      class="form-control form-control form-control-alternative"
                    ></textarea>
                    <ErrorMessage name="information" />
                    <span v-if="allerros.information" :class="['label label-danger']">{{
                      allerros.information[0]
                    }}</span>
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
                      v-model="departament_id"
                      :searchable="true"
                      placeholder="Selecione uma Opção"
                      class="form-control form-control-alternative"
                      :options="departamentNames"
                      :rules="required"
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

              <div class="form-actions text-center">
                <button type="submit" class="btn btn-primary">
                  <span class="oi oi-check"></span> Enviar
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
import { reactive, computed } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useToast } from "vue-toast-notification";
import { mask } from "vue-the-mask";
import "vue-toast-notification/dist/theme-sugar.css";
import Multiselect from "@vueform/multiselect";

export default {
  props: ["courses", "departament"],
  components: {
    Form,
    Field,
    ErrorMessage,
    Multiselect,
  },
  directives: { mask },
  setup(props) {
    const toast = useToast();
    const courseNames = computed(() =>
      props.courses.map((courses) => {
        return {
          value: courses.id,
          label: courses.course,
        };
      })
    );

    const departamentNames = computed(() =>
      props.departament.map((departament) => {
        return {
          value: departament.id,
          label: departament.title,
        };
      })
    );

    return {
      toast,
      courseNames,
      departamentNames,
    };
  },

  data() {
    return {
      level: "",
      hiring_type: "",
      hiring_amount: "",
      trainee_name: "",
      departament_id: "",
      allerros: [],
    };
  },

  methods: {
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

    validateForm(
      level,
      hiring_type,
      information,
      departament_id,
      secretary_phone,
      responsible,
      course
    ) {
      const levelValid = this.required(level);
      const hiring_typeValid = this.required(hiring_type);
      const informationValid = this.required(information);
      const departament_idValid = this.required(departament_id);
      const secretary_phoneValid = this.required(secretary_phone);
      const responsibleValid = this.required(responsible);
      const courseValid = this.required(course);

      if (levelValid !== true) {
        return levelValid;
      } else if (hiring_typeValid !== true) {
        return hiring_typeValid;
      } else if (informationValid != true) {
        return informationValid;
      } else if (departament_idValid != true) {
        return departament_idValid;
      } else if (secretary_phoneValid != true) {
        return secretary_phoneValid;
      } else if (responsibleValid != true) {
        return responsibleValid;
      } else if (courseValid != true) {
        return courseValid;
      }

      return true;
    },

    createRequest() {
      var data = new FormData();

      var coursesJson = JSON.stringify(this.course);
      data.append("course", coursesJson);
      data.append("level", this.level);
      data.append("hiring_type", this.hiring_type);
      data.append("hiring_amount", this.hiring_amount);
      data.append("trainee_name", this.trainee_name);
      data.append("secretary_phone", this.secretary_phone);
      data.append("responsible", this.responsible);
      data.append("information", this.information);
      data.append("departament_id", this.departament_id);

      axios
        .post("solicitacao-store", data)
        .then((response) => {
          this.allerros = [];
          this.toast.success("Solicitação criada com sucesso!", {
            position: "top-right",
            duration: "5000",
          });
        })
        .catch((error) => {
          this.allerros = error.response.data.errors;
          this.toast.error("Ocorreu um erro ao criar a solicitação.", {
            position: "top-right",
            duration: "5000",
          });
        });
    },
  },
};
</script>
<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.label-danger {
  color: red;
}
.v-toast__text {
  color: #fff !important;
  font-weight: 700;
}
</style>
