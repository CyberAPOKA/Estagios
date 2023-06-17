<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edição de endereço</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateAddress">
            <h6 class="heading-small text-muted mb-4"></h6>

            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="city">Cidade</label>
                    <select
                      id="city"
                      name="city"
                      v-model="userReactive.address.city"
                      class="form-control form-control-alternative"
                      :rules="required"
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
                    <ErrorMessage name="city" />
                    <span v-if="allerros.city" :class="['label label-danger']">{{
                      allerros.city[0]
                    }}</span>
                  </div>
                </div>
                <div v-if="userReactive.address.city !== 'São Leopoldo'" class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="district">Bairro</label>
                    <Field
                      id="district"
                      name="district"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="userReactive.address.district"
                      :rules="required"
                    />
                    <ErrorMessage name="district" />
                    <span v-if="allerros.district" :class="['label label-danger']">{{
                      allerros.district[0]
                    }}</span>
                  </div>
                </div>
                <div v-if="userReactive.address.city === 'São Leopoldo'" class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="district">Bairro</label>
                    <select
                      v-model="userReactive.address.district"
                      id="district"
                      name="district"
                      class="form-control form-control-alternative"
                      :rules="required"
                    >
                      <option disabled value="">Selecione um bairro</option>
                      <option
                        v-for="(district, index) in districts"
                        :key="index"
                        v-bind:value="district.district"
                      >
                        {{ district.district }}
                      </option>
                    </select>
                    <ErrorMessage name="district" />
                    <span v-if="allerros.district" :class="['label label-danger']">{{
                      allerros.district[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="number">Número</label>
                    <Field
                      id="number"
                      name="number"
                      type="number"
                      class="form-control form-control-alternative"
                      v-model="user.address.number"
                      :rules="required"
                    />
                    <ErrorMessage name="number" />
                    <span v-if="allerros.number" :class="['label label-danger']">{{
                      allerros.number[0]
                    }}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-control-label" for="zip_code">CEP</label>
                  <div class="form-group">
                    <Field
                      id="zip_code"
                      name="zip_code"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.address.zip_code"
                      :rules="validateCEP"
                      v-mask="['#####-###']"
                    />
                    <ErrorMessage name="zip_code" />
                    <span v-if="allerros.zip_code" :class="['label label-danger']">{{
                      allerros.zip_code[0]
                    }}</span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="complement">Complemento</label>
                    <Field
                      id="complement"
                      name="complement"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.address.complement"
                    />
                    <ErrorMessage name="complement" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="street">Rua/Avenida</label>
                    <Field
                      id="street"
                      name="street"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.address.street"
                      :rules="required"
                    />
                    <ErrorMessage name="street" />
                    <span v-if="allerros.street" :class="['label label-danger']">{{
                      allerros.street[0]
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
  props: ["user", "address", "cities", "districts"],
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
        address: {
          city: "",
          number: "",
          district: "",
          zip_code: "",
          complement: "",
          street: "",
        },
      },
    });
    const userReactive = reactive(props.user);

    const rules = computed(() => {
      return {
        $v: useValidate(),
        user: {
          address: {
            city: { required },
            number: { required },
            district: { required },
            zip_code: { required },
            street: { required },
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
    async validateCEP(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      value = value.replace(/\D/g, "");

      const regex = /^[0-9]{8}$/;
      if (!regex.test(value)) {
        return "Este campo deve ser um CEP válido!";
      }
      // Faz uma requisição para a base de dados de CEPs para verificar se o CEP existe
      const response = await fetch(`https://viacep.com.br/ws/${value}/json/`);
      const data = await response.json();
      if (data.erro) {
        return "Este CEP não existe";
      }
      return true;
    },

    updateAddress() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();

        data.append("city", this.userReactive.address.city);
        data.append("district", this.userReactive.address.district);
        data.append("number", this.user.address.number);
        data.append("zip_code", this.user.address.zip_code);
        data.append("complement", this.user.address.complement);
        data.append("street", this.user.address.street);

        axios
          .post("update-address", data)
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
