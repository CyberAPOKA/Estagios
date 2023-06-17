<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edição de redes sociais</h3>
          </div>
        </div>
        <div class="card-body">
          <Form @submit="updateSocial">
            <h6 class="heading-small text-muted mb-4">User information</h6>

            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="name">Instagram</label>
                    <Field
                      id="instagram"
                      name="instagram"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.social.instagram"
                    />
                    <ErrorMessage name="instagram" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="facebook">Facebook</label>
                    <Field
                      id="facebook"
                      name="facebook"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.social.facebook"
                    />
                    <ErrorMessage name="facebook" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="linkedin">Linkedin</label>
                    <Field
                      id="linkedin"
                      name="linkedin"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.social.linkedin"
                    />
                    <ErrorMessage name="linkedin" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="others">Outros</label>
                    <Field
                      id="others"
                      name="others"
                      type="text"
                      class="form-control form-control-alternative"
                      v-model="user.social.others"
                    />
                    <ErrorMessage name="others" />
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="form-control-label" for="links">Links</label>
                <textarea
                  name="links"
                  id="links"
                  cols="30"
                  rows="10"
                  v-model="user.social.links"
                  class="form-control form-control form-control-alternative"
                >
                </textarea>
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
  props: ["user", "social"],
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
        social: {
          instagram: "",
          facebook: "",
          linkedin: "",
          others: "",
          links: "",
        },
      },
    });

    const rules = computed(() => {
      return {
        $v: useValidate(),
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
    return {};
  },

  mounted() {
    console.log("mounted");
  },

  methods: {
    updateSocial() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();

        data.append("instagram", this.user.social.instagram);
        data.append("facebook", this.user.social.facebook);
        data.append("linkedin", this.user.social.linkedin);
        data.append("others", this.user.social.others);
        data.append("links", this.user.social.links);

        axios
          .post("update-social", data)
          .then((response) => {
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
            console.log(error.response);
            console.log("erro");
            alert("Ocorreu um erro, tente novamente!");
          });
      }
    },
  },
};
</script>
