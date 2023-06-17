<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Edit Profile</h3>
            <div>
              {{ user.profile }}
            </div>
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
                        v-bind:checked="
                          user.profile.deficiency &&
                          user.profile.deficiency.includes('physical')
                        "
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
                        v-bind:checked="
                          user.profile.deficiency &&
                          user.profile.deficiency.includes('intellectual')
                        "
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
                        v-bind:checked="
                          user.profile.deficiency &&
                          user.profile.deficiency.includes('multiple')
                        "
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
                        v-bind:checked="
                          user.profile.deficiency &&
                          user.profile.deficiency.includes('tea')
                        "
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
                <button type="submit" class="btn btn-success mt-4">Save</button>
              </div>
            </div>
          </Form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, computed } from "vue";
import { Form, Field, ErrorMessage } from "vee-validate";
import { mask } from "vue-the-mask";

export default {
  props: ["user", "profile"],
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  directives: { mask },
  setup() {
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
  },

  data() {
    return {};
  },
  mounted() {
    this.user.profile.deficiency = this.user.profile.deficiency.split(",");
    this.checkDeficiencies(this.user.profile.deficiency);
  },
};
</script>
