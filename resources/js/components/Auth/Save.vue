<template>
  <div class="container">
    <div class="card">
      <Form
        class="w-100"
        @submit.prevent="register"
        enctype="multipart/form-data"
      >
        <!-- STEP1 -->
        <div v-show="this.currentStep == 1">
          <!-- <div> -->
          <div class="card-header">Registro 1/5</div>
          <div class="step-1 p-3">
            <div class="form-group text-center col-md-6 m-auto">
              <div class="row">
                <label for="email">Email</label>
                <Field
                  id="email"
                  name="email"
                  type="email"
                  class="form-control"
                  v-model="state.user.email"
                  :rules="validateEmail"
                />
                <ErrorMessage name="email" />
                <!-- <span v-if="v$.user.email.$error">
                  {{ v$.user.email.$errors[0].$message }}
                </span> -->
              </div>
              <div class="row">
                <label for="password">Senha</label>
                <Field
                  id="password"
                  class="form-control"
                  type="password"
                  name="password"
                  v-model="state.user.password"
                  autocomplete="new-password"
                  :rules="required"
                />
                <ErrorMessage name="password" />
                <!-- <span v-if="v$.user.password.$error">
                  {{ v$.user.password.$errors[0].$message }}
                </span> -->
              </div>

              <div class="row">
                <label
                  for="password_confirmation"
                  value="{{ __('Confirm Password') }}"
                  >Confirmar senha</label
                >
                <Field
                  id="password_confirmation"
                  class="form-control"
                  type="password"
                  name="password_confirmation"
                  v-model="state.user.password_confirmation"
                  autocomplete="new-password"
                />
                <span v-if="v$.user.password_confirmation.$error">
                  {{ v$.user.password_confirmation.$errors[0].$message }}
                </span>
              </div>

              <div class="justify-content-between pt-5 text-center">
                <button
                  class="submit w-100 py-3 ms-1 btn btn-primary"
                  type="submit"
                  @click.prevent="upgradeStep"
                  :disabled="
                    v$.user.email.$invalid ||
                    v$.user.password.$invalid ||
                    v$.user.password_confirmation.$invalid
                  "
                >
                  Próximo
                </button>

                <button
                  class="submit w-100 py-3 ms-1 btn btn-danger"
                  @click.prevent="upgradeStep"
                >
                  DEV NEXT
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP2 -->
        <div v-show="this.currentStep == 2">
          <div class="card-header">Registro 2/5</div>
          <div class="step-2 p-3">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">Nome</label>
                <input
                  id="name"
                  name="name"
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.name"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">Nome social</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.social_name"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">CPF</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.cpf"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">RG</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.rg"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1"
                  >Telefone Residêncial</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.home_phone"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">Telefone Celular</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.cell_phone"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">Nome do Pai</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.fathers_name"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">Nome da mãe</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.profile.mothers_name"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">Data de Nascimento</label>
                <input
                  type="date"
                  class="form-control"
                  v-model="state.user.profile.birth_date"
                />
              </div>

              <div class="col-md-6"></div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="">Deficiência</label>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="state.user.profile.deficiency"
                    value="physical"
                    id="physical"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    Física (inclui deficiência visual e auditiva)
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="state.user.profile.deficiency"
                    value="intellectual"
                    id="intellectual"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    Intelectual
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="state.user.profile.deficiency"
                    value="multiple"
                    id="multiple"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    Múltipla
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="state.user.profile.deficiency"
                    value="tea"
                    id="tea"
                  />
                  <label class="form-check-label" for="flexCheckDefault">
                    TEA (Transtorno do Espectro Autista e Psicose)
                  </label>
                </div>
              </div>

              <div class="col-md-6">
                <label for="">Raça</label>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="state.user.profile.race"
                        id="white"
                        value="white"
                      />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Branca
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="state.user.profile.race"
                        id="black"
                        value="black"
                      />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Negra
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="state.user.profile.race"
                        id="brown"
                        value="brown"
                      />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Parda
                      </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="state.user.profile.race"
                        id="yellow"
                        value="yellow"
                      />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Amarela
                      </label>
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        v-model="state.user.profile.race"
                        id="indigenous"
                        value="indigenous"
                      />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Indígena
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between pt-8">
              <button
                class="submit disable w-100 py-3 me-1 btn btn-primary"
                @click.prevent="downgradeStep"
              >
                Anterior
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-primary"
                @click.prevent="upgradeStep"
                :disabled="v$.user.profile.$invalid"
              >
                Próximo
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-danger"
                @click.prevent="upgradeStep"
              >
                DEV NEXT
              </button>
            </div>
          </div>
        </div>

        <!-- STEP3 -->
        <div v-show="this.currentStep == 3">
          <div class="card-header">Registro 3/5</div>
          <div class="step-3 p-3">
            <div class="row">
              <div class="col-md-6">
                <label for="city">Cidade</label>
                <select
                  v-model="state.user.address.city"
                  id="city"
                  class="form-select"
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
              </div>

              <div
                v-if="state.user.address.city !== 'São Leopoldo'"
                class="col-md-6"
              >
                <label for="exampleFormControlInput1">Bairro</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.address.district"
                />
              </div>

              <div
                v-if="state.user.address.city === 'São Leopoldo'"
                class="col-md-6"
              >
                <label for="district">Bairro</label>
                <select
                  v-model="state.user.address.district"
                  id="district"
                  class="form-select"
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
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="number">Número</label>
                <input
                  type="number"
                  class="form-control"
                  v-model="state.user.address.number"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">CEP</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.address.zip_code"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">Complemento</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.address.complement"
                />
              </div>

              <div class="col-md-6">
                <label for="exampleFormControlInput1">Rua/Avenida</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.address.street"
                />
              </div>
            </div>

            <div class="d-flex justify-content-between pt-8">
              <button
                class="submit disable w-100 py-3 me-1 btn btn-primary"
                @click.prevent="downgradeStep"
              >
                Anterior
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-primary"
                @click.prevent="upgradeStep"
                :disabled="v$.user.address.$invalid"
              >
                Próximo
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-danger"
                @click.prevent="upgradeStep"
              >
                DEV NEXT
              </button>
            </div>
          </div>
        </div>

        <!-- STEP4 -->
        <div v-show="this.currentStep == 4">
          <div class="card-header">Registro 4/5</div>
          <div class="step-4 p-3">
            <div class="row">
              <div class="col-md-6">
                <label for="education">Escolaridade</label>
                <select
                  v-model="state.user.formation.education"
                  id="education"
                  class="form-select"
                >
                  <option selected value="">Selecione uma opção</option>
                  <option
                    v-for="(education, index) in educations"
                    :key="index"
                    v-bind:value="education.education"
                  >
                    {{ education.education }}
                  </option>
                </select>
              </div>

              <div
                v-if="state.user.formation.education === 'Ensino Médio'"
                class="col-md-6"
              >
                <label for="course">Curso</label>
                <select
                  v-model="state.user.formation.course"
                  id="course"
                  class="form-select"
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
              </div>
              <div
                v-if="state.user.formation.education === 'Ensino Técnico'"
                class="col-md-6"
              >
                <label for="course">Curso</label>
                <select
                  v-model="state.user.formation.course"
                  id="course"
                  class="form-select"
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
              </div>
              <div
                v-if="state.user.formation.education === 'Ensino Superior'"
                class="col-md-6"
              >
                <label for="course">Curso</label>
                <select
                  v-model="state.user.formation.course"
                  id="course"
                  class="form-select"
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
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="semester">Semestre</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.formation.semester"
                />
              </div>

              <div class="col-md-6">
                <label for="shift">Turno</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.formation.shift"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleFormControlInput1">Instituição</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.formation.institution"
                />
              </div>

              <div class="col-md-6">
                <label for="situation">Situação</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="state.user.formation.situation"
                />
              </div>
            </div>

            <div class="d-flex justify-content-between pt-8">
              <button
                class="submit disable w-100 py-3 me-1 btn btn-primary"
                @click.prevent="downgradeStep"
              >
                Anterior
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-primary"
                @click.prevent="upgradeStep"
                :disabled="v$.user.formation.$invalid"
              >
                Próximo
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-danger"
                @click.prevent="upgradeStep"
              >
                DEV NEXT
              </button>
            </div>
          </div>
        </div>

        <!-- STEP5 -->
        <div v-show="this.currentStep == 5">
          <!-- <div> -->
          <div class="card-header">Registro 5/6</div>
          <div class="step-5 p-3">
            <div class="form-group m-auto">
              <div class="row">
                <label for="certifications">Cursos realizados</label>
                <textarea
                  name="certifications"
                  id="certifications"
                  cols="30"
                  rows="10"
                  v-model="state.user.experience.certifications"
                  class="form-control"
                >
                </textarea>
                <span v-if="v$.user.experience.certifications.$error">
                  {{ v$.user.experience.certifications.$errors[0].$message }}
                </span>
              </div>

              <div class="row">
                <label for="other_knowledges">Outros Conhecimentos</label>
                <textarea
                  name="other_knowledges"
                  id="other_knowledges"
                  cols="30"
                  rows="10"
                  v-model="state.user.experience.other_knowledges"
                  class="form-control"
                >
                </textarea>
                <span v-if="v$.user.experience.other_knowledges.$error">
                  {{ v$.user.experience.other_knowledges.$errors[0].$message }}
                </span>
              </div>

              <div class="row">
                <label for="professional_experiences"
                  >Experiências Profissionais</label
                >
                <textarea
                  name="professional_experiences"
                  id="professional_experiences"
                  cols="30"
                  rows="10"
                  v-model="state.user.experience.professional_experiences"
                  class="form-control"
                >
                </textarea>
                <span v-if="v$.user.experience.professional_experiences.$error">
                  {{
                    v$.user.experience.professional_experiences.$errors[0]
                      .$message
                  }}
                </span>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <label for="">
                    Já foi estagiário da Prefeitura Municipal de São
                    Leopoldo?</label
                  >
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          v-model="state.user.experience.cityhall_trainee"
                          id="yes"
                          value="yes"
                        />
                        <label class="form-check-label" for="yes">Sim</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          v-model="state.user.experience.cityhall_trainee"
                          id="no"
                          value="no"
                          :checked="checkedValue == 1"
                        />
                        <label class="form-check-label" for="no">Não</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="col-md-8"
                  v-show="state.user.experience.cityhall_trainee == 'yes'"
                >
                  <label for="start_date">Período</label>
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Data de início</label>
                      <input
                        type="date"
                        class="form-control"
                        v-model="state.user.experience.start_date"
                      />
                    </div>
                    <div class="col-md-6">
                      <label for="">Data de término</label>
                      <input
                        type="date"
                        class="form-control"
                        v-model="state.user.experience.end_date"
                      />
                    </div>
                  </div>
                </div>
              </div>

              <div
                class="row"
                v-show="state.user.experience.cityhall_trainee == 'yes'"
              >
                <div class="col-md-6">
                  <label for="secretary">Secretaria</label>
                  <input
                    id="secretary"
                    type="text"
                    class="form-control"
                    v-model="state.user.experience.secretary"
                  />
                </div>
              </div>

              <div class="justify-content-between pt-5 text-center">
                <button
                  class="submit w-100 py-3 ms-1 btn btn-primary"
                  @click.prevent="upgradeStep"
                >
                  Próximo
                </button>

                <button
                  class="submit w-100 py-3 ms-1 btn btn-danger"
                  @click.prevent="upgradeStep"
                >
                  DEV NEXT
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- STEP2 -->
        <div v-show="this.currentStep == 6">
          <div class="card-header">Registro 6/6</div>
          <div class="step-6 p-3">
            <div class="row">
              <div class="col-md-6">
                <label for="instagram">Instagram</label>
                <input
                  id="instagram"
                  type="text"
                  class="form-control"
                  v-model="state.user.social.instagram"
                />
              </div>

              <div class="col-md-6">
                <label for="facebook">Facebook</label>
                <input
                  id="facebook"
                  type="text"
                  class="form-control"
                  v-model="state.user.social.facebook"
                />
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="linkedin">Linkedin</label>
                <input
                  id="linkedin"
                  type="text"
                  class="form-control"
                  v-model="state.user.social.linkedin"
                />
              </div>

              <div class="col-md-6">
                <label for="others">Outros</label>
                <input
                  id="others"
                  type="text"
                  class="form-control"
                  v-model="state.user.social.others"
                />
              </div>
            </div>

            <div class="row">
              <label for="links">Links</label>
              <textarea
                name="links"
                id="links"
                cols="30"
                rows="10"
                v-model="state.user.social.links"
                class="form-control"
              >
              </textarea>
            </div>

            <div class="row">
              <p>
                Você pode também nos enviar no espaço abaixo como anexos ao
                formulário de inscrição. O limite é de 5 arquivos de no máximo
                3MB cada.
              </p>
            </div>

            <div class="row">
              <label for="file">Envie arquivos</label>
              <input
                id="upload-file"
                type="file"
                multiple
                class="form-control"
                @change="fieldChange"
              />
            </div>

            <div class="d-flex justify-content-between pt-8">
              <button
                class="submit disable w-100 py-3 me-1 btn btn-primary"
                @click.prevent="downgradeStep"
              >
                Anterior
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-primary"
                @click.prevent="upgradeStep"
                :disabled="v$.user.profile.$invalid"
              >
                Próximo
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-primary"
                type="submit"
                :disabled="v$.user.profile.$invalid"
              >
                Finalizar
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-danger"
                type="submit"
              >
                DEV SUBMIT
              </button>
              <button
                class="submit w-100 py-3 ms-1 btn btn-danger"
                @click.prevent="upgradeStep"
              >
                DEV NEXT
              </button>
            </div>
          </div>
        </div>

        <!-- FORM  -->
      </Form>
    </div>
  </div>
</template>


<script>
import { useStore } from "../store/store.js";

const { store } = useStore();
import axios from "axios";
import useValidate from "@vuelidate/core";
import {
  required,
  email,
  minLength,
  sameAs,
  helpers,
} from "@vuelidate/validators";
import { reactive, computed } from "vue";

import { Form, Field, ErrorMessage } from "vee-validate";

export default {
  props: ["cities", "districts", "courses", "educations"],
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  setup() {
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

    const mustBeLearnVue = (value) => value.includes("learnvue");

    const rules = computed(() => {
      return {
        $v: useValidate(),
        user: {
          email: {
            required,
            email,
          },
          password: { required, minLength: minLength(8) },
          password_confirmation: {
            required,
            sameAs: sameAs(state.user.password),
          },
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
          address: {
            city: { required },
            number: { required },
            district: { required },
            zip_code: { required },
            street: { required },
          },
          formation: {
            education: { required },
            course: { required },
            semester: { required },
            shift: { required },
            institution: { required },
            situation: { required },
          },

          experience: {
            certifications: { required },
            other_knowledges: { required },
            professional_experiences: { required },
          },
        },
      };
    });

    const v$ = useValidate(rules, state);

    return {
      state,
      v$,
    };
  },

  data() {
    return {
      attachments: [],
      selectedFiles: undefined,
      currentStep: 1,
      checkedValue: "",
    };
  },

  mounted() {
    console.log("mounted");
  },

  methods: {
    required(value) {
      if (value && value.trim()) {
        return true;
      }
      return "Este campo é obrigatório!";
    },

    validateEmail(value) {
      // if the field is empty
      // if (!value) {
      //   return "Este campo é obrigatório!";
      // }
      // if the field is not a valid email
      const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (!regex.test(value)) {
        return "Este campo deve ser um e-mail válido!";
      }
      // All is good
      return true;
    },

    upgradeStep() {
      this.currentStep++;
    },

    downgradeStep() {
      this.currentStep--;
    },

    fieldChange(e) {
      let selectedFiles = e.target.files;

      if (!selectedFiles.length) {
        return false;
      }

      for (let i = 0; i < selectedFiles.length; i++) {
        this.attachments.push(selectedFiles[i]);
      }

      console.log(this.attachments);
    },

    switchSelect(event) {
      this.state.user.address.city = event.target.value;
    },

    register() {
      console.log(this.v$);
      this.v$.$validate();
      if (!this.v$.error) {
        var data = new FormData();
        //User
        data.append("email", this.state.user.email);
        data.append("password", this.state.user.password);

        //UserProfile
        data.append("name", this.state.user.profile.name);
        data.append("social_name", this.state.user.profile.social_name);
        data.append("cpf", this.state.user.profile.cpf);
        data.append("rg", this.state.user.profile.rg);
        data.append("birth_date", this.state.user.profile.birth_date);
        data.append("home_phone", this.state.user.profile.home_phone);
        data.append("cell_phone", this.state.user.profile.cell_phone);
        data.append("fathers_name", this.state.user.profile.fathers_name);
        data.append("mothers_name", this.state.user.profile.mothers_name);
        data.append("deficiency", this.state.user.profile.deficiency);
        data.append("race", this.state.user.profile.race);

        //UserAddress
        data.append("city", this.state.user.address.city);
        data.append("number", this.state.user.address.number);
        data.append("district", this.state.user.address.district);
        data.append("zip_code", this.state.user.address.zip_code);
        data.append("complement", this.state.user.address.complement);
        data.append("street", this.state.user.address.street);

        //UserFormation
        data.append("education", this.state.user.formation.education);
        data.append("course", this.state.user.formation.course);
        data.append("semester", this.state.user.formation.semester);
        data.append("shift", this.state.user.formation.shift);
        data.append("institution", this.state.user.formation.institution);
        data.append("situation", this.state.user.formation.situation);

        //UserExperience
        data.append(
          "certifications",
          this.state.user.experience.certifications
        );
        data.append(
          "other_knowledges",
          this.state.user.experience.other_knowledges
        );
        data.append(
          "professional_experiences",
          this.state.user.experience.professional_experiences
        );
        data.append(
          "cityhall_trainee",
          this.state.user.experience.cityhall_trainee
        );
        data.append("start_date", this.state.user.experience.start_date);
        data.append("end_date", this.state.user.experience.end_date);
        data.append("secretary", this.state.user.experience.secretary);

        //UserSocial
        data.append("instagram", this.state.user.social.instagram);
        data.append("facebook", this.state.user.social.facebook);
        data.append("linkedin", this.state.user.social.linkedin);
        data.append("others", this.state.user.social.others);
        data.append("links", this.state.user.social.links);

        //UserFile

        for (let i = 0; i < this.attachments.length; i++) {
          data.append("file[]", this.attachments[i]);
        }

        const config = { headers: { "Content-Type": "multipart/form-data" } };
        document.getElementById("upload-file").value = [];

        axios
          .post("cadastro", data, config)
          .then((response) => {
            console.log(response);
            console.log("sucesso");
            //window.location = response.data.redirect;
            //this.$router.push("/");
            alert("Sucesso!");
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

