<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Alterar senha</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateAccount">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="old_password"
                    >Senha Antiga<span class="required-field">*</span></label
                  >
                  <div class="input-group">
                    <Field
                      id="old_password"
                      name="old_password"
                      class="form-control form-control-alternative field-password"
                      :type="oldPasswordType"
                      v-model="user.old_password"
                      :rules="validatePassword"
                    />
                    <div class="input-group-append">
                      <i
                        @click="toggleOldPasswordType"
                        :class="{
                          'fa fa-eye': !oldPasswordVisible,
                          'fa fa-eye-slash': oldPasswordVisible,
                        }"
                        class="input-group-text form-control form-control-alternative"
                      ></i>
                    </div>
                  </div>
                  <ErrorMessage name="old_password" />
                  <span v-if="allerros.old_password" :class="['label label-danger']">{{
                    allerros.old_password[0]
                  }}</span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="new_password"
                    >Nova Senha<span class="required-field">*</span></label
                  >
                  <div class="input-group">
                    <Field
                      id="new_password"
                      name="new_password"
                      class="form-control form-control-alternative field-password"
                      :type="passwordType"
                      v-model="user.new_password"
                      :rules="validatePassword"
                    />
                    <div class="input-group-append">
                      <i
                        @click="togglePasswordType"
                        :class="{
                          'fa fa-eye': !passwordVisible,
                          'fa fa-eye-slash': passwordVisible,
                        }"
                        class="input-group-text form-control form-control-alternative"
                      ></i>
                    </div>
                  </div>
                  <ErrorMessage name="password" />
                  <span v-if="allerros.new_password" :class="['label label-danger']">{{
                    allerros.new_password[0]
                  }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="password_confirmation"
                    >Confirmar senha<span class="required-field">*</span></label
                  >
                  <div class="input-group">
                    <Field
                      id="password_confirmation"
                      class="form-control form-control-alternative field-password"
                      :type="passwordConfirmationType"
                      name="password_confirmation"
                      v-model="user.password_confirmation"
                      :rules="confirmPassword"
                    />
                    <div class="input-group-append">
                      <i
                        @click="toggleConfirmPasswordType"
                        :class="{
                          'fa fa-eye': !passwordConfirmationVisible,
                          'fa fa-eye-slash': passwordConfirmationVisible,
                        }"
                        class="input-group-text form-control form-control-alternative"
                      ></i>
                    </div>
                  </div>
                  <ErrorMessage name="password_confirmation" />
                  <span
                    v-if="allerros.password_confirmation"
                    :class="['label label-danger']"
                    >{{ allerros.password[0] }}</span
                  >
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-success mt-4">Salvar</button>
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
import { required, email, minLength, sameAs } from "@vuelidate/validators";
import { reactive, computed } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { mask } from "vue-the-mask";
import { createApp } from "vue";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

export default {
  props: ["user"],
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
        old_password: "",
        new_password: "",
        password_confirmation: "",
      },
    });
    const rules = computed(() => {
      return {
        $v: useValidate(),
        user: {
          old_password: { required },
          new_password: { required },
          password_confirmation: { required },
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
      passwordType: "password",
      passwordConfirmationType: "password",
      oldPasswordType: "password",
      passwordVisible: false,
      passwordConfirmationVisible: false,
      allerros: [],
    };
  },

  methods: {
    warning() {
      this.toast.warning("warning.");
      return;
    },
    required(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      return true;
    },

    togglePasswordType() {
      this.passwordVisible = !this.passwordVisible;
      this.passwordType = this.passwordVisible ? "text" : "password";
    },
    toggleConfirmPasswordType() {
      this.passwordConfirmationVisible = !this.passwordConfirmationVisible;
      this.passwordConfirmationType = this.passwordConfirmationVisible
        ? "text"
        : "password";
    },

    toggleOldPasswordType() {
      this.oldPasswordVisible = !this.oldPasswordVisible;
      this.oldPasswordType = this.oldPasswordVisible ? "text" : "password";
    },

    toggleType(id) {
      let field = document.getElementById(id);
      if (field.type === "password") {
        field.type = "text";
      } else {
        field.type = "password";
      }
    },

    togglePasswordVisibility() {
      var passwordInput = document.getElementById("password");
      var passwordVisibilityToggle = document.getElementById(
        "password-visibility-toggle"
      );

      if (passwordVisibilityToggle.innerHTML === "Mostrar Senha") {
        passwordInput.setAttribute("type", "text");
        passwordVisibilityToggle.innerHTML = "Esconder Senha";
      } else {
        passwordInput.setAttribute("type", "password");
        passwordVisibilityToggle.innerHTML = "Mostrar Senha";
      }
    },

    validatePassword(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      // Define as regras de validação de senha
      const minLength = 8;
      const hasLowercase = /[a-z]/;
      const hasUppercase = /[A-Z]/;
      const hasNumber = /\d/;
      const hasSpecialChar = /[!@#\$%\^&\*\(\)\-+=_:;'",.<>?\/\\\[\]\{\}\|`~]/;

      // Inicializa a mensagem de erro como vazia
      let errorMessage = "";

      // Verifica se a senha atende a cada regra de validação
      if (value.length < minLength) {
        errorMessage = "A senha deve ter no mínimo 8 caracteres.";
      } else if (!hasLowercase.test(value)) {
        errorMessage = "A senha deve ter pelo menos uma letra minúscula.";
      } else if (!hasUppercase.test(value)) {
        errorMessage = "A senha deve ter pelo menos uma letra maiúscula.";
      } else if (!hasNumber.test(value)) {
        errorMessage = "A senha deve ter pelo menos um número.";
      } else if (!value.match(hasSpecialChar)) {
        errorMessage = "A senha deve ter pelo menos um caractere especial.";
      }

      // Se a mensagem de erro não estiver vazia, retorna a mensagem de erro
      if (errorMessage) {
        return errorMessage;
      }

      // Caso contrário, retorna true, indicando que a senha é válida
      return true;
    },

    confirmPassword() {
      if (this.user.new_password !== this.user.password_confirmation) {
        return "As senhas não conferem. Por favor, digite novamente.";
      }
      return true;
    },

    updateAccount() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();
        data.append("old_password", this.user.old_password);
        data.append("new_password", this.user.new_password);
        axios
          .post("update-account", data)
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
<style>
.input-group-text {
  cursor: pointer;
  transition: box-shadow 0.15s ease !important;
  border: 0 !important;
  box-shadow: 0 1px 3px rgb(50 50 93 / 15%), 0 1px 0 rgb(0 0 0 / 2%) !important;
}

.field-password {
  transition: box-shadow 0.15s ease !important;
  border: 0 !important;
  box-shadow: 0 1px 3px rgb(50 50 93 / 15%), 0 1px 0 rgb(0 0 0 / 2%) !important;
}

[role="alert"] {
  color: red;
}

.required-field {
  color: red;
}

.custom-control {
  padding-left: 1rem !important;
}
</style>
