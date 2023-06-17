<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Currículo do candidato</h3>
          </div>
        </div>
        <div class="card-body">
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
                    readonly
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="social_name">Nome Social</label>
                  <Field
                    id="social_name"
                    name="social_name"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.profile.social_name"
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="fathers_name">Nome do Pai</label>
                  <Field
                    id="fathers_name"
                    name="fathers_name"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.profile.fathers_name"
                    readonly
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="mothers_name">Nome da mãe</label>
                  <Field
                    id="mothers_name"
                    name="mothers_name"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.profile.mothers_name"
                    readonly
                  />
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
                    readonly
                  />
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
                      disabled
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
                      disabled
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
                      disabled
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
                      disabled
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
                        disabled
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
                        disabled
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
                        disabled
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
                        disabled
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
                        disabled
                      />
                      <label class="custom-control-label" for="indigenous"
                        >Indígena</label
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label class="control-label">Endereço:</label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="city">Cidade</label>
                  <Field
                    id="city"
                    name="city"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.address.city"
                    readonly
                  />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="district">Bairro</label>
                  <Field
                    id="district"
                    name="district"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.address.district"
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
                </div>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label class="control-label">Formação:</label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="education">Escolaridade</label>
                  <Field
                    id="education"
                    name="education"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.education"
                    readonly
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="course">Curso</label>
                  <Field
                    id="course"
                    name="course"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.course"
                    readonly
                  />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="semester">Semestre</label>
                  <Field
                    id="semester"
                    name="semester"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.semester"
                    readonly
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="shift">Turno</label>
                  <Field
                    id="shift"
                    name="shift"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.shift"
                    readonly
                  />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="institution">Instituição</label>
                  <Field
                    id="institution"
                    name="institution"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.institution"
                    readonly
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label" for="situation">Situação</label>
                  <Field
                    id="situation"
                    name="situation"
                    type="text"
                    class="form-control form-control-alternative"
                    v-model="user.formation.situation"
                    readonly
                  />
                </div>
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label class="control-label">Experiência:</label>
            </div>

            <div class="row">
              <label class="form-control-label" for="certifications"
                >Cursos realizados</label
              >
              <textarea
                name="certifications"
                id="certifications"
                cols="10"
                rows="5"
                v-model="user.experience.certifications"
                class="form-control form-control-alternative"
                readonly
              >
              </textarea>
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
                rows="5"
                v-model="user.experience.other_knowledges"
                class="form-control form-control form-control-alternative"
                readonly
              >
              </textarea>
            </div>

            <div class="row pt-5">
              <label class="form-control-label" for="professional_experiences"
                >Experiências Profissionais</label
              >
              <textarea
                name="professional_experiences"
                id="professional_experiences"
                cols="30"
                rows="5"
                v-model="user.experience.professional_experiences"
                class="form-control form-control form-control-alternative"
                readonly
              >
              </textarea>
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
                        v-model="user.experience.cityhall_trainee"
                        id="yes"
                        value="yes"
                        name="cityhall_trainee"
                        disabled
                      />
                      <label class="custom-control-label" for="yes">Sim</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="custom-control custom-radio mb-3">
                      <input
                        class="custom-control-input"
                        type="radio"
                        v-model="user.experience.cityhall_trainee"
                        id="no"
                        value="no"
                        disabled
                      />
                      <label class="custom-control-label" for="no">Não</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8" v-show="user.experience.cityhall_trainee == 'yes'">
                <label class="form-control-label" for="start_date">Período</label>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-control-label" for="">Data de início</label>
                    <input
                      id="start_date"
                      name="start_date"
                      type="date"
                      readonly
                      class="form-control form-control form-control-alternative"
                      v-model="user.experience.start_date"
                    />
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label" for="">Data de término</label>
                    <input
                      id="end_date"
                      name="end_date"
                      readonly
                      type="date"
                      class="form-control form-control form-control-alternative"
                      v-model="user.experience.end_date"
                    />
                  </div>
                </div>
              </div>
            </div>

            <div class="row" v-show="user.experience.cityhall_trainee == 'yes'">
              <div class="col-md-6">
                <label for="secretary">Secretaria</label>
                <Field
                  id="secretary"
                  name="secretary"
                  type="text"
                  class="form-control form-control form-control-alternative"
                  v-model="user.experience.secretary"
                  readonly
                />
              </div>
            </div>
            <hr />
            <div class="form-group">
              <label class="control-label">Redes Sociais:</label>
            </div>
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
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
                    readonly
                  />
                </div>
              </div>
            </div>

            <div class="row">
              <label class="form-control-label" for="links">Links</label>
              <textarea
                name="links"
                id="links"
                cols="10"
                rows="5"
                v-model="user.social.links"
                class="form-control form-control form-control-alternative"
                readonly
              >
              </textarea>
            </div>
          </div>
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
  props: ["user", "profile", "social", "formation", "address", "experience"],
  components: {
    Form,
    Field,
  },

  setup(props) {
    const user = reactive(props.user);
    const profile = reactive(props.profile);

    return {
      user,
      profile,
    };
  },

  created() {
    this.user.profile.deficiency = this.user.profile.deficiency.split(",");
  },
};
</script>

<style>
.form-control,
.custom-control-label {
  color: #706f6f;
  font-weight: 600;
}
</style>
