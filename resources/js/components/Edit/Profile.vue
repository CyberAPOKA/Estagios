<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edição de perfil {{ user }}</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateProfile">
            <h6 class="heading-small text-muted mb-4"></h6>

            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="name">Name</label>
                    <Field
                      id="name"
                      name="name"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.name"
                      :rules="validateName"
                    />
                    <ErrorMessage name="name" />
                    <span v-if="allerros.name" :class="['label label-danger']">{{
                      allerros.name[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="social_name"
                      >Nome Social</label
                    >
                    <Field
                      id="social_name"
                      name="social_name"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.social_name"
                      :rules="validateName"
                    />
                    <ErrorMessage name="social_name" />
                    <span v-if="allerros.social_name" :class="['label label-danger']">{{
                      allerros.social_name[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="cpf">CPF</label>
                    <Field
                      id="cpf"
                      name="cpf"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.cpf"
                      :rules="validateCPF"
                      v-mask="['###.###.###-##']"
                    />
                    <ErrorMessage name="cpf" />
                    <span v-if="allerros.cpf" :class="['label label-danger']">{{
                      allerros.cpf[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="rg">RG</label>
                    <Field
                      id="rg"
                      name="rg"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.rg"
                      :rules="validateRGRGS"
                      v-mask="['##.###.###-#']"
                    />
                    <ErrorMessage name="rg" />
                    <span v-if="allerros.rg" :class="['label label-danger']">{{
                      allerros.rg[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="home_phone"
                      >Telefone Residêncial</label
                    >
                    <Field
                      id="home_phone"
                      name="home_phone"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.home_phone"
                      :rules="checkHomePhoneNumber"
                      v-mask="['(##) ####-####']"
                    />
                    <ErrorMessage name="home_phone" />
                    <span v-if="allerros.home_phone" :class="['label label-danger']">{{
                      allerros.home_phone[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="cell_phone"
                      >Telefone Celular</label
                    >
                    <Field
                      id="cell_phone"
                      name="cell_phone"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.cell_phone"
                      :rules="checkCellPhoneNumber"
                      v-mask="['(##) # ####-####']"
                    />
                    <ErrorMessage name="cell_phone" />
                    <span v-if="allerros.cell_phone" :class="['label label-danger']">{{
                      allerros.cell_phone[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="fathers_name"
                      >Nome do Pai</label
                    >
                    <Field
                      id="fathers_name"
                      name="fathers_name"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.fathers_name"
                      :rules="validateName"
                    />
                    <ErrorMessage name="fathers_name" />
                    <span v-if="allerros.fathers_name" :class="['label label-danger']">{{
                      allerros.fathers_name[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="mothers_name"
                      >Nome da mãe</label
                    >
                    <Field
                      id="mothers_name"
                      name="mothers_name"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.profile.mothers_name"
                      :rules="validateName"
                    />
                    <ErrorMessage name="mothers_name" />
                    <span v-if="allerros.mothers_name" :class="['label label-danger']">{{
                      allerros.mothers_name[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="birth_date"
                      >Data de Nascimento</label
                    >
                    <Field
                      id="birth_date"
                      name="birth_date"
                      type="date"
                      class="form-control form-control-alternative"
                      v-model="user.profile.birth_date"
                      :rules="validateBirthday"
                    />
                    <ErrorMessage name="birth_date" />
                    <span v-if="allerros.birth_date" :class="['label label-danger']">{{
                      allerros.birth_date[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label for="">Deficiência</label>
                  <div
                    class="custom-control custom-control-alternative custom-checkbox mb-3"
                  >
                    <div
                      class="custom-control custom-control-alternative custom-checkbox mb-3"
                    >
                      <input
                        class="custom-control-input"
                        type="checkbox"
                        v-model="user.profile.deficiency"
                        value="physical"
                        id="physical"
                        name="deficiency"
                      />
                      <label class="custom-control-label" for="physical">Física</label>
                    </div>
                    <div
                      class="custom-control custom-control-alternative custom-checkbox mb-3"
                    >
                      <input
                        class="custom-control-input"
                        type="checkbox"
                        v-model="user.profile.deficiency"
                        value="intellectual"
                        id="intellectual"
                        name="deficiency"
                      />
                      <label class="custom-control-label" for="intellectual"
                        >Intelectual</label
                      >
                    </div>
                    <div
                      class="custom-control custom-control-alternative custom-checkbox mb-3"
                    >
                      <input
                        class="custom-control-input"
                        type="checkbox"
                        v-model="user.profile.deficiency"
                        name="deficiency"
                        value="multiple"
                        id="multiple"
                      />
                      <label class="custom-control-label" for="multiple">Múltipla</label>
                    </div>
                    <div
                      class="custom-control custom-control-alternative custom-checkbox mb-3"
                    >
                      <input
                        class="custom-control-input"
                        type="checkbox"
                        v-model="user.profile.deficiency"
                        name="deficiency"
                        value="tea"
                        id="tea"
                      />
                      <label class="custom-control-label" for="tea"
                        >TEA (Transtorno do Espectro Autista e Psicose)</label
                      >
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="">Raça</label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="user.profile.race"
                          id="white"
                          value="white"
                          name="race"
                        />
                        <label class="custom-control-label" for="white">Branca</label>
                      </div>

                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="user.profile.race"
                          id="black"
                          value="black"
                          name="race"
                        />
                        <label class="custom-control-label" for="black">Preta</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="user.profile.race"
                          id="brown"
                          value="brown"
                          name="race"
                        />
                        <label class="custom-control-label" for="brown">Parda</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="user.profile.race"
                          id="yellow"
                          value="yellow"
                          name="race"
                        />
                        <label class="custom-control-label" for="yellow">Amarela</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input
                          class="custom-control-input"
                          type="radio"
                          v-model="user.profile.race"
                          id="indigenous"
                          value="indigenous"
                          name="race"
                        />
                        <label class="custom-control-label" for="indigenous"
                          >Indígena</label
                        >
                      </div>
                    </div>
                    <span v-if="allerros.race" :class="['label label-danger']">{{
                      allerros.race[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-success mt-4">Salvar</button>
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
  props: ["user", "profile"],
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  directives: { mask },
  setup() {
    const toast = useToast();

    const state = reactive({
      user: {
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
      },
    });

    const rules = computed(() => {
      return {
        $v: useValidate(),
        user: {
          profile: {
            name: { required },
            social_name: { required },
            birth_date: { required },
            cpf: { required },
            rg: { required },
            cell_phone: { required },
            fathers_name: { required },
            mothers_name: { required },
            race: { required },
          },
        },
      };
    });

    const v$ = useValidate(rules, state);

    return {
      state,
      v$,
      toast,
    };
  },

  data() {
    return {
      allerros: [],
    };
  },

  mounted() {
    this.user.profile.deficiency = this.user.profile.deficiency.split(",");
    this.checkDeficiencies(this.user.profile.deficiency);
  },

  methods: {
    checkDeficiencies(deficiencies) {
      let checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach((checkbox) => {
        if (deficiencies.includes(checkbox.value)) {
          checkbox.setAttribute("checked", true);
        }
      });
    },
    validateName(name) {
      let errorMessage = "";

      if (!name) {
        errorMessage = "Este campo é obrigatório!";
      } else if (!/^[a-zA-Z\u00C0-\u017F\s]+$/.test(name)) {
        errorMessage = "O nome não deve conter números ou caracteres especiais.";
      } else if (name.split(" ").length < 2) {
        errorMessage = "O nome deve possuir no mínimo 2 palavras.";
      }

      if (errorMessage) {
        return errorMessage;
      }

      return true;
    },

    validateCPF(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      value = value.replace(/[^0-9]/g, "");

      if (value.length !== 11) {
        return "Este campo deve ter 11 dígitos!";
      }

      if (value === "00000000000") return "CPF inválido";

      let Soma;
      let Resto;
      Soma = 0;

      for (let i = 1; i <= 9; i++) Soma += parseInt(value.substring(i - 1, i)) * (11 - i);
      Resto = (Soma * 10) % 11;

      if (Resto === 10 || Resto === 11) Resto = 0;
      if (Resto !== parseInt(value.substring(9, 10))) return "CPF inválido";

      Soma = 0;

      for (let i = 1; i <= 10; i++)
        Soma += parseInt(value.substring(i - 1, i)) * (12 - i);
      Resto = (Soma * 10) % 11;

      if (Resto === 10 || Resto === 11) Resto = 0;
      if (Resto !== parseInt(value.substring(10, 11))) return "CPF inválido";

      return true;
    },

    validateRGRGS(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      value = value.replace(/([^0-9a-zA-Z])/g, "");

      if (value.length !== 9 && value.length !== 10) {
        return "Este campo deve ter 9 ou 10 caracteres!";
      }

      const numbers = value.substring(0, 8);
      const lastChar = value.substring(8);
      if (!/^[0-9a-zA-Z]{8}$/.test(numbers) || !/^[a-zA-Z0-9]$/.test(lastChar)) {
        return "RG inválido";
      }

      const checkDigit = value.substring(value.length - 1);
      if (!/^[a-zA-Z0-9]$/.test(checkDigit)) {
        return "Dígito verificador inválido";
      }

      return true;
    },

    checkHomePhoneNumber(phoneNumber) {
      if (phoneNumber === "") {
        return "";
      }
      let phoneNumberRegex = /^\(\d{2}\) \d{4}-\d{4}$/;
      if (!phoneNumberRegex.test(phoneNumber)) {
        return "Número de telefone residencial inválido!";
      }
      return true;
    },

    checkCellPhoneNumber(phoneNumber) {
      if (!phoneNumber) {
        return "Este campo é obrigatório!";
      }
      let phoneNumberRegex = /^\(\d{2}\) \d{1} \d{4}-\d{4}$/;
      if (!phoneNumberRegex.test(phoneNumber)) {
        return "Número de telefone inválido!";
      }
      return true;
    },

    validateBirthday(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      const date = new Date(value);
      if (isNaN(date.getTime())) {
        return "Este campo deve ser uma data válida!";
      }
      const age = new Date().getFullYear() - date.getFullYear();

      if (age < 16) {
        return "No mínimo 16 anos para se inscrever";
      } else if (age > 100) {
        return "Tem certeza que tem mais de 100 anos?";
      }
      return true;
    },

    updateProfile() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();

        data.append("name", this.user.profile.name);
        data.append("social_name", this.user.profile.social_name);
        data.append("cpf", this.user.profile.cpf);
        data.append("rg", this.user.profile.rg);
        data.append("birth_date", this.user.profile.birth_date);
        data.append("home_phone", this.user.profile.home_phone);
        data.append("cell_phone", this.user.profile.cell_phone);
        data.append("fathers_name", this.user.profile.fathers_name);
        data.append("mothers_name", this.user.profile.mothers_name);
        data.append("deficiency", this.user.profile.deficiency);
        data.append("race", this.user.profile.race);

        axios
          .post("update-profile", data)
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
            this.toast.error("Ocorreu um erro ao salvar seus dados.", {
              position: "top-right",
              duration: "5000",
            });
          });
      }
    },
  },
};
</script>
