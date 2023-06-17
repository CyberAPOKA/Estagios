<template>
  <div class="row pt-6">
    <div class="container">
      <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="stepper">
                <div class="stepper-progress">
                  <div
                    class="stepper-progress-bar"
                    :style="'width:' + stepperProgress"
                  ></div>
                </div>

                <div
                  class="stepper-item"
                  :class="{ current: step == item, success: step > item }"
                  v-for="item in 6"
                  :key="item"
                >
                  <div class="stepper-item-counter">
                    <img
                      class="icon-success"
                      src="https://www.seekpng.com/png/full/1-10353_check-mark-green-png-green-check-mark-svg.png"
                      alt=""
                    />
                    <span class="number">
                      {{ item }}
                    </span>
                  </div>
                  <span class="stepper-item-title"> {{ stepNames[item - 1] }}</span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <Form class="w-100" @submit="register" enctype="multipart/form-data">
              <div class="stepper-content" v-for="item in 6" :key="item">
                <div v-if="step == item">
                  <div v-show="this.step == 1">
                    <!-- <div> -->
                    <div class="step-1 p-3">
                      <div class="form-group text-center col-md-6 m-auto">
                        <div class="row">
                          <label class="form-control-label" for="email"
                            >Email<span class="required-field">*</span></label
                          >
                          <Field
                            id="email"
                            name="email"
                            type="email"
                            class="form-control form-control-alternative"
                            v-model="state.user.email"
                            :rules="validateEmail"
                          />
                          <ErrorMessage name="email" />
                          <span v-if="allerros.email" :class="['label label-danger']">{{
                            allerros.email[0]
                          }}</span>
                        </div>
                        <div class="row">
                          <label class="form-control-label" for="password"
                            >Senha<span class="required-field">*</span></label
                          >
                          <div class="input-group">
                            <Field
                              id="password"
                              name="password"
                              class="form-control form-control-alternative field-password"
                              :type="passwordType"
                              v-model="state.user.password"
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
                          <span
                            v-if="allerros.password"
                            :class="['label label-danger']"
                            >{{ allerros.password[0] }}</span
                          >
                        </div>

                        <div class="row">
                          <label class="form-control-label" for="password_confirmation"
                            >Confirmar senha<span class="required-field">*</span></label
                          >
                          <div class="input-group">
                            <Field
                              id="password_confirmation"
                              class="form-control form-control-alternative field-password"
                              :type="passwordConfirmationType"
                              name="password_confirmation"
                              v-model="state.user.password_confirmation"
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
                            >{{ allerros.password_confirmation[0] }}</span
                          >
                        </div>
                        <div class="d-flex justify-content-between pt-5 text-center">
                          <button
                            class="w-100 py-3 ms-1 btn btn-primary"
                            @click="step++"
                            :disabled="
                              validateForm(
                                state.user.email,
                                state.user.password,
                                state.user.password_confirmation
                              ) !== true
                            "
                          >
                            Próximo
                          </button>
                          <button class="w-100 py-3 ms-1 btn btn-primary" @click="step++">
                            DEV NEXT
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div v-show="this.step == 2">
                    <div class="step-2 p-3">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="name"
                            >Nome<span class="required-field">*</span></label
                          >
                          <Field
                            id="name"
                            name="name"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.name"
                            :rules="validateName"
                          />
                          <ErrorMessage name="name" />
                          <span v-if="allerros.name" :class="['label label-danger']">{{
                            allerros.name[0]
                          }}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="social_name"
                            >Nome social<span class="required-field">*</span></label
                          >
                          <Field
                            id="social_name"
                            name="social_name"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.social_name"
                            :rules="validateName"
                          />
                          <ErrorMessage name="social_name" />
                          <span
                            v-if="allerros.social_name"
                            :class="['label label-danger']"
                            >{{ allerros.social_name[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="cpf"
                            >CPF<span class="required-field">*</span></label
                          >
                          <Field
                            id="cpf"
                            name="cpf"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.cpf"
                            :rules="validateCPF"
                            v-mask="['###.###.###-##']"
                          />
                          <ErrorMessage name="cpf" />
                          <span v-if="allerros.cpf" :class="['label label-danger']">{{
                            allerros.cpf[0]
                          }}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="rg"
                            >RG<span class="required-field">*</span></label
                          >
                          <Field
                            id="rg"
                            name="rg"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.rg"
                            :rules="validateRGRGS"
                            v-mask="['##.###.###-#']"
                          />
                          <ErrorMessage name="rg" />
                          <span v-if="allerros.rg" :class="['label label-danger']">{{
                            allerros.rg[0]
                          }}</span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="home_phone"
                            >Telefone Residêncial</label
                          >
                          <Field
                            id="home_phone"
                            name="home_phone"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.home_phone"
                            :rules="checkHomePhoneNumber"
                            v-mask="['(##) ####-####']"
                          />
                          <ErrorMessage name="home_phone" />
                          <span
                            v-if="allerros.home_phone"
                            :class="['label label-danger']"
                            >{{ allerros.home_phone[0] }}</span
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="cell_phone"
                            >Telefone Celular<span class="required-field">*</span></label
                          >
                          <Field
                            id="cell_phone"
                            name="cell_phone"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.cell_phone"
                            :rules="checkCellPhoneNumber"
                            v-mask="['(##) # ####-####']"
                          />
                          <ErrorMessage name="cell_phone" />
                          <span
                            v-if="allerros.cell_phone"
                            :class="['label label-danger']"
                            >{{ allerros.cell_phone[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="fathers_name"
                            >Nome do Pai<span class="required-field">*</span></label
                          >
                          <Field
                            id="fathers_name"
                            name="fathers_name"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.fathers_name"
                            :rules="validateName"
                          />
                          <ErrorMessage name="fathers_name" />
                          <span
                            v-if="allerros.fathers_name"
                            :class="['label label-danger']"
                            >{{ allerros.fathers_name[0] }}</span
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="mothers_name"
                            >Nome da mãe<span class="required-field">*</span></label
                          >
                          <Field
                            id="mothers_name"
                            name="mothers_name"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.mothers_name"
                            :rules="validateName"
                          />
                          <ErrorMessage name="mothers_name" />
                          <span
                            v-if="allerros.mothers_name"
                            :class="['label label-danger']"
                            >{{ allerros.mothers_name[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="birth_date"
                            >Data de Nascimento<span class="required-field"
                              >*</span
                            ></label
                          >
                          <Field
                            id="birth_date"
                            name="birth_date"
                            type="date"
                            class="form-control form-control-alternative"
                            v-model="state.user.profile.birth_date"
                            :rules="validateBirthday"
                          />
                          <ErrorMessage name="birth_date" />
                          <span
                            v-if="allerros.birth_date"
                            :class="['label label-danger']"
                            >{{ allerros.birth_date[0] }}</span
                          >
                        </div>

                        <div class="col-md-6"></div>
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
                                v-model="state.user.profile.deficiency"
                                value="physical"
                                id="physical"
                                name="deficiency"
                              />
                              <label class="custom-control-label" for="physical"
                                >Física</label
                              >
                            </div>
                            <div
                              class="custom-control custom-control-alternative custom-checkbox mb-3"
                            >
                              <input
                                class="custom-control-input"
                                type="checkbox"
                                v-model="state.user.profile.deficiency"
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
                                v-model="state.user.profile.deficiency"
                                name="deficiency"
                                value="multiple"
                                id="multiple"
                              />
                              <label class="custom-control-label" for="multiple"
                                >Múltipla</label
                              >
                            </div>
                            <div
                              class="custom-control custom-control-alternative custom-checkbox mb-3"
                            >
                              <input
                                class="custom-control-input"
                                type="checkbox"
                                v-model="state.user.profile.deficiency"
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
                          <label for="">Raça<span class="required-field">*</span></label>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="custom-control">
                                <div class="custom-control custom-radio mb-3">
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    v-model="state.user.profile.race"
                                    id="white"
                                    value="white"
                                    name="race"
                                  />
                                  <label class="custom-control-label" for="white"
                                    >Branca</label
                                  >
                                </div>

                                <div class="custom-control custom-radio mb-3">
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    v-model="state.user.profile.race"
                                    id="black"
                                    value="black"
                                    name="race"
                                  />
                                  <label class="custom-control-label" for="black"
                                    >Preta</label
                                  >
                                </div>
                                <div class="custom-control custom-radio mb-3">
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    v-model="state.user.profile.race"
                                    id="brown"
                                    value="brown"
                                    name="race"
                                  />
                                  <label class="custom-control-label" for="brown"
                                    >Parda</label
                                  >
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="custom-control custom-radio mb-3">
                                <input
                                  class="custom-control-input"
                                  type="radio"
                                  v-model="state.user.profile.race"
                                  id="yellow"
                                  value="yellow"
                                  name="race"
                                />
                                <label class="custom-control-label" for="yellow"
                                  >Amarela</label
                                >
                              </div>
                              <div class="custom-control custom-radio mb-3">
                                <input
                                  class="custom-control-input"
                                  type="radio"
                                  v-model="state.user.profile.race"
                                  id="indigenous"
                                  value="indigenous"
                                  name="race"
                                />
                                <label class="custom-control-label" for="indigenous"
                                  >Indígena</label
                                >
                              </div>
                              <span
                                v-if="allerros.race"
                                :class="['label label-danger']"
                                >{{ allerros.race[0] }}</span
                              >
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex justify-content-between pt-8">
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step--"
                        >
                          Anterior
                        </button>
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step++"
                          :disabled="
                            validateProfileForm(
                              state.user.profile.name,
                              state.user.profile.social_name,
                              state.user.profile.cpf,
                              state.user.profile.rg,
                              state.user.profile.birth_date,
                              state.user.profile.home_phone,
                              state.user.profile.cell_phone,
                              state.user.profile.fathers_name,
                              state.user.profile.mothers_name
                            ) !== true || v$.user.profile.race.$invalid
                          "
                        >
                          Próximo
                        </button>
                        <button class="w-100 py-3 ms-1 btn btn-primary" @click="step++">
                          DEV NEXT
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- STEP3 -->
                  <div v-show="this.step == 3">
                    <div class="step-3 p-3">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="city"
                            >Cidade<span class="required-field">*</span></label
                          >
                          <select
                            id="city"
                            name="city"
                            v-model="state.user.address.city"
                            class="form-control form-control-alternative"
                            :rules="required"
                          >
                            <option disabled value="">Selecione uma Cidade</option>
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

                        <div
                          v-if="state.user.address.city !== 'São Leopoldo'"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="district"
                            >Bairro<span class="required-field">*</span></label
                          >
                          <Field
                            id="district"
                            name="district"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.address.district"
                            :rules="required"
                          />
                          <ErrorMessage name="district" />
                          <span
                            v-if="allerros.district"
                            :class="['label label-danger']"
                            >{{ allerros.district[0] }}</span
                          >
                        </div>

                        <div
                          v-if="state.user.address.city === 'São Leopoldo'"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="district">Bairro</label>
                          <select
                            v-model="state.user.address.district"
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
                          <span
                            v-if="allerros.district"
                            :class="['label label-danger']"
                            >{{ allerros.district[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="number"
                            >Número<span class="required-field">*</span></label
                          >
                          <Field
                            id="number"
                            name="number"
                            type="number"
                            class="form-control form-control-alternative"
                            v-model="state.user.address.number"
                            :rules="required"
                          />
                          <ErrorMessage name="number" />
                          <span v-if="allerros.number" :class="['label label-danger']">{{
                            allerros.number[0]
                          }}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="zip_code"
                            >CEP<span class="required-field">*</span></label
                          >
                          <Field
                            id="zip_code"
                            name="zip_code"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.address.zip_code"
                            :rules="validateCEP"
                            v-mask="['#####-###']"
                          />
                          <ErrorMessage name="zip_code" />
                          <span
                            v-if="allerros.zip_code"
                            :class="['label label-danger']"
                            >{{ allerros.zip_code[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="complement"
                            >Complemento</label
                          >
                          <Field
                            id="complement"
                            name="complement"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.address.complement"
                          />
                          <ErrorMessage name="complement" />
                          <span
                            v-if="allerros.complement"
                            :class="['label label-danger']"
                            >{{ allerros.complement[0] }}</span
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="street"
                            >Rua/Avenida<span class="required-field">*</span></label
                          >
                          <Field
                            id="street"
                            name="street"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.address.street"
                            :rules="required"
                          />
                          <ErrorMessage name="street" />
                          <span v-if="allerros.street" :class="['label label-danger']">{{
                            allerros.street[0]
                          }}</span>
                        </div>
                      </div>

                      <div class="d-flex justify-content-between pt-8">
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step--"
                        >
                          Anterior
                        </button>
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step++"
                          :disabled="v$.user.address.$invalid"
                        >
                          Próximo
                        </button>
                        <button class="w-100 py-3 ms-1 btn btn-primary" @click="step++">
                          DEV NEXT
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- STEP4 -->
                  <div v-show="this.step == 4">
                    <div class="step-4 p-3">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="education"
                            >Escolaridade<span class="required-field">*</span></label
                          >
                          <select
                            v-model="state.user.formation.education"
                            name="education"
                            id="education"
                            class="form-control form-control-alternative"
                            :rules="required"
                            @change="resetCourse"
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
                          <span
                            v-if="allerros.education"
                            :class="['label label-danger']"
                            >{{ allerros.education[0] }}</span
                          >
                        </div>

                        <div
                          v-if="state.user.formation.education === ''"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="course"
                            >Curso<span class="required-field">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control form-control-alternative"
                            placeholder="Selecione uma escolaridade antes"
                            readonly
                          />
                        </div>

                        <div
                          v-if="state.user.formation.education === 'Ensino Médio'"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="course"
                            >Curso<span class="required-field">*</span></label
                          >
                          <select
                            v-model="state.user.formation.course"
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
                        <div
                          v-if="state.user.formation.education === 'Ensino Técnico'"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="course"
                            >Curso<span class="required-field">*</span></label
                          >
                          <select
                            v-model="state.user.formation.course"
                            id="course"
                            class="form-control form-control-alternative"
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
                        <div
                          v-if="state.user.formation.education === 'Ensino Superior'"
                          class="col-md-6"
                        >
                          <label class="form-control-label" for="course"
                            >Curso<span class="required-field">*</span></label
                          >
                          <select
                            v-model="state.user.formation.course"
                            id="course"
                            class="form-control form-control-alternative"
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

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="semester"
                            >Semestre<span class="required-field">*</span></label
                          >
                          <select
                            id="semester"
                            name="semester"
                            class="form-control form-control-alternative"
                            v-model="state.user.formation.semester"
                          >
                            <option disabled value="">Selecione o semestre</option>
                            <option v-for="n in 10" :value="n" v-bind:key="n">
                              {{ n }}º
                            </option>
                          </select>
                          <span
                            v-if="allerros.semester"
                            :class="['label label-danger']"
                            >{{ allerros.semester[0] }}</span
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="shift"
                            >Turno<span class="required-field">*</span></label
                          >
                          <select
                            id="shift"
                            name="shift"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.formation.shift"
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

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="institution"
                            >Instituição<span class="required-field">*</span></label
                          >
                          <Field
                            id="institution"
                            name="institution"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.formation.institution"
                            :rules="required"
                          />
                          <ErrorMessage name="institution" />
                          <span
                            v-if="allerros.institution"
                            :class="['label label-danger']"
                            >{{ allerros.institution[0] }}</span
                          >
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="situation"
                            >Situação<span class="required-field">*</span></label
                          >
                          <select
                            id="situation"
                            name="situation"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.formation.situation"
                          >
                            <option disabled value="">Selecione a situação</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Finalizado">Finalizado</option>
                            <option value="Trancado">Trancado</option>
                          </select>
                          <span
                            v-if="allerros.situation"
                            :class="['label label-danger']"
                            >{{ allerros.situation[0] }}</span
                          >
                        </div>
                      </div>

                      <div class="d-flex justify-content-between pt-8">
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step--"
                        >
                          Anterior
                        </button>
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step++"
                          :disabled="v$.user.formation.$invalid"
                        >
                          Próximo
                        </button>
                        <button class="w-100 py-3 ms-1 btn btn-primary" @click="step++">
                          DEV NEXT
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- STEP5 -->
                  <div v-show="this.step == 5">
                    <!-- <div> -->
                    <div class="step-5 p-3">
                      <div class="form-group m-auto">
                        <div class="row">
                          <label class="form-control-label" for="certifications"
                            >Cursos realizados<span class="required-field">*</span></label
                          >
                          <textarea
                            name="certifications"
                            id="certifications"
                            cols="30"
                            rows="10"
                            v-model="state.user.experience.certifications"
                            class="form-control form-control-alternative"
                            :rules="required"
                          >
                          </textarea>
                          <ErrorMessage name="certifications" />
                          <span v-if="v$.user.experience.certifications.$error">
                            {{ v$.user.experience.certifications.$errors[0].$message }}
                          </span>
                          <span
                            v-if="allerros.certifications"
                            :class="['label label-danger']"
                            >{{ allerros.certifications[0] }}</span
                          >
                        </div>

                        <div class="row">
                          <label class="form-control-label" for="other_knowledges"
                            >Outros Conhecimentos<span class="required-field"
                              >*</span
                            ></label
                          >
                          <textarea
                            name="other_knowledges"
                            id="other_knowledges"
                            cols="30"
                            rows="10"
                            v-model="state.user.experience.other_knowledges"
                            class="form-control form-control-alternative"
                          >
                          </textarea>
                          <span v-if="v$.user.experience.other_knowledges.$error">
                            {{ v$.user.experience.other_knowledges.$errors[0].$message }}
                          </span>
                          <span
                            v-if="allerros.other_knowledges"
                            :class="['label label-danger']"
                            >{{ allerros.other_knowledges[0] }}</span
                          >
                        </div>

                        <div class="row">
                          <label class="form-control-label" for="professional_experiences"
                            >Experiências Profissionais<span class="required-field"
                              >*</span
                            ></label
                          >
                          <textarea
                            name="professional_experiences"
                            id="professional_experiences"
                            cols="30"
                            rows="10"
                            v-model="state.user.experience.professional_experiences"
                            class="form-control form-control-alternative"
                          >
                          </textarea>
                          <span v-if="v$.user.experience.professional_experiences.$error">
                            {{
                              v$.user.experience.professional_experiences.$errors[0]
                                .$message
                            }}
                          </span>
                          <span
                            v-if="allerros.professional_experiences"
                            :class="['label label-danger']"
                            >{{ allerros.professional_experiences[0] }}</span
                          >
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <label class="form-control-label" for="">
                              Já foi estagiário da Prefeitura Municipal de São
                              Leopoldo?<span class="required-field">*</span></label
                            >
                            <div class="row">
                              <div class="col-md-6">
                                <div class="custom-control custom-radio mb-3">
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    v-model="state.user.experience.cityhall_trainee"
                                    id="yes"
                                    value="yes"
                                    @change="clearFields"
                                  />
                                  <label class="custom-control-label" for="yes"
                                    >Sim</label
                                  >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="custom-control custom-radio mb-3">
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    v-model="state.user.experience.cityhall_trainee"
                                    id="no"
                                    value="no"
                                    :checked="checkedValue == 1"
                                  />
                                  <label class="custom-control-label" for="no">Não</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div
                            class="col-md-8"
                            v-show="state.user.experience.cityhall_trainee == 'yes'"
                          >
                            <label class="form-control-label" for="start_date"
                              >Período</label
                            >
                            <div class="row">
                              <div class="col-md-6">
                                <label class="form-control-label" for=""
                                  >Data de início<span class="required-field"
                                    >*</span
                                  ></label
                                >
                                <input
                                  id="start_date"
                                  name="start_date"
                                  type="date"
                                  class="form-control form-control-alternative"
                                  v-model="state.user.experience.start_date"
                                />
                              </div>
                              <div class="col-md-6">
                                <label class="form-control-label" for=""
                                  >Data de término<span class="required-field"
                                    >*</span
                                  ></label
                                >
                                <input
                                  id="end_date"
                                  name="end_date"
                                  type="date"
                                  class="form-control form-control-alternative"
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
                            <label class="form-control-label" for="secretary"
                              >Secretaria<span class="required-field">*</span></label
                            >
                            <input
                              id="secretary"
                              name="secretary"
                              type="text"
                              class="form-control form-control-alternative"
                              v-model="state.user.experience.secretary"
                            />
                          </div>
                        </div>

                        <div class="d-flex justify-content-between pt-8">
                          <button
                            class="submit w-100 py-3 ms-1 btn btn-primary"
                            @click="step--"
                          >
                            Anterior
                          </button>
                          <button
                            class="submit w-100 py-3 ms-1 btn btn-primary"
                            @click="step++"
                            :disabled="
                              v$.user.experience.$invalid ||
                              validateCityHallTrainee() !== true
                            "
                          >
                            Próximo
                          </button>
                          <button class="w-100 py-3 ms-1 btn btn-primary" @click="step++">
                            DEV NEXT
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- STEP2 -->
                  <div v-show="this.step == 6">
                    <div class="step-6 p-3">
                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="instagram"
                            >Instagram</label
                          >
                          <input
                            id="instagram"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.social.instagram"
                          />
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="facebook"
                            >Facebook</label
                          >
                          <input
                            id="facebook"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.social.facebook"
                          />
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label class="form-control-label" for="linkedin"
                            >Linkedin</label
                          >
                          <input
                            id="linkedin"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.social.linkedin"
                          />
                        </div>

                        <div class="col-md-6">
                          <label class="form-control-label" for="others">Outros</label>
                          <input
                            id="others"
                            type="text"
                            class="form-control form-control-alternative"
                            v-model="state.user.social.others"
                          />
                        </div>
                      </div>

                      <div class="row">
                        <label class="form-control-label" for="links">Links</label>
                        <textarea
                          name="links"
                          id="links"
                          cols="30"
                          rows="10"
                          v-model="state.user.social.links"
                          class="form-control form-control-alternative"
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
                        <label class="form-control-label" for="file"
                          >Envie arquivos</label
                        >
                        <input
                          id="file"
                          type="file"
                          name="file"
                          multiple
                          class="form-control form-control-alternative"
                          v-on:change="uploadFiles"
                          ref="fileInput"
                          @change="validateFiles"
                          accept=".pdf"
                        />
                      </div>
                      <div class="d-flex justify-content-between pt-8">
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="step--"
                        >
                          Anterior
                        </button>
                        <button
                          class="submit w-100 py-3 ms-1 btn btn-primary"
                          @click="register"
                          :disabled="v$.user.$invalid"
                        >
                          Finalizar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </Form>
          </div>
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

// const toast = useToast();
// return { toast };

export default {
  props: ["cities", "districts", "courses", "educations"],
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
    };
  },

  data() {
    return {
      allerros: [],
      attachments: [],
      selectedFiles: undefined,
      step: 1,
      checkedValue: "",
      passwordType: "password",
      passwordConfirmationType: "password",
      passwordVisible: false,
      passwordConfirmationVisible: false,
      currentStepTitle: "Step 1",
      stepNames: [
        "Cadastro",
        "Dados pessoais",
        "Endereço",
        "Escolaridade",
        "Experiência",
        "Arquivos",
      ],
    };
  },
  watch: {
    currentStep(newVal) {
      this.currentStepTitle = "Step " + newVal;
    },
  },

  computed: {
    stepperProgress() {
      return (100 / 5) * (this.step - 1) + "%";
    },
  },

  mounted() {
    console.log("mounted");
  },

  methods: {
    resetCourse() {
      this.state.user.formation.course = "";
    },
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

    toggleType(id) {
      let field = document.getElementById(id);
      if (field.type === "password") {
        field.type = "text";
      } else {
        field.type = "password";
      }
    },

    clearFields() {
      this.state.user.experience.start_date = "";
      this.state.user.experience.end_date = "";
      this.state.user.experience.secretary = "";
    },

    validateEmail(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }
      const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
      if (!regex.test(value)) {
        return "Este campo deve ser um e-mail válido!";
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

    async validateCEP(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      value = value.replace(/\D/g, "");

      const regex = /^[0-9]{8}$/;
      if (!regex.test(value)) {
        return "Este campo deve ser um CEP válido!";
      }
      const response = await fetch(`https://viacep.com.br/ws/${value}/json/`);
      const data = await response.json();
      if (data.erro) {
        return "Este CEP não existe";
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

    validatePassword(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      const minLength = 8;
      const hasLowercase = /[a-z]/;
      const hasUppercase = /[A-Z]/;
      const hasNumber = /\d/;
      const hasSpecialChar = /[!@#\$%\^&\*\(\)\-+=_:;'",.<>?\/\\\[\]\{\}\|`~]/;

      let errorMessage = "";

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

      if (errorMessage) {
        return errorMessage;
      }

      return true;
    },

    confirmPassword() {
      if (this.state.user.password !== this.state.user.password_confirmation) {
        return "As senhas não conferem. Por favor, digite novamente.";
      }
      return true;
    },

    validateForm(email, password, password_confirmation) {
      const emailValid = this.validateEmail(email);
      const passwordValid = this.validatePassword(password);
      const confirmPasswordValid = this.confirmPassword(password, password_confirmation);
      if (emailValid !== true) {
        return emailValid;
      } else if (passwordValid !== true) {
        return passwordValid;
      } else if (confirmPasswordValid != true) {
        return confirmPasswordValid;
      }
      return true;
    },

    validateProfileForm(
      name,
      social_name,
      cpf,
      rg,
      birth_date,
      home_phone,
      cell_phone,
      fathers_name,
      mothers_name
    ) {
      const nameValid = this.validateName(name);
      const social_nameValid = this.validateName(social_name);
      const cpfValid = this.validateCPF(cpf);
      const rgValid = this.validateRGRGS(rg);
      const birth_dateValid = this.validateBirthday(birth_date);
      const home_phoneValid = this.checkHomePhoneNumber(home_phone);
      const cell_phoneValid = this.checkCellPhoneNumber(cell_phone);
      const fathers_nameValid = this.validateName(fathers_name);
      const mothers_nameValid = this.validateName(mothers_name);
      if (nameValid !== true) {
        return nameValid;
      } else if (social_nameValid !== true) {
        return social_nameValid;
      } else if (cpfValid != true) {
        return cpfValid;
      } else if (rgValid != true) {
        return rgValid;
      } else if (birth_dateValid != true) {
        return birth_dateValid;
      } else if (home_phoneValid != true) {
        return home_phoneValid;
      } else if (cell_phoneValid != true) {
        return cell_phoneValid;
      } else if (fathers_nameValid != true) {
        return fathers_nameValid;
      } else if (mothers_nameValid != true) {
        return mothers_nameValid;
      }
      return true;
    },

    validateAddressForm(zip_code) {
      const zip_codeValid = this.validateCEP(zip_code);
      if (zip_codeValid !== true) {
        return zip_codeValid;
      }
      return true;
    },

    // :disabled="
    // validateAddressForm(state.user.address.zip_code) !== true ||
    // v$.user.address.$invalid
    // "

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

    validateCPF(value) {
      if (!value) {
        return "Este campo é obrigatório!";
      }

      // Removing special characters from value
      value = value.replace(/[^0-9]/g, "");

      // Check if the input has 11 digits
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

    validateCityHallTrainee() {
      if (this.state.user.experience.cityhall_trainee === "yes") {
        if (!this.state.user.experience.start_date) {
          return "A data de início é obrigatória.";
        }
        if (!this.state.user.experience.end_date) {
          return "A data de término é obrigatória.";
        }
        if (!this.state.user.experience.secretary) {
          return "O campo secretaria é obrigatório.";
        }
      }
      return true;
    },
    validateFiles(event) {
      const files = event.target.files;
      const maxFiles = 5;
      const maxSize = 3 * 1024 * 1024;
      const allowedFormats = [".pdf"];

      if (files.length > maxFiles) {
        event.target.value = null;
        alert("Você pode selecionar no máximo 5 arquivos.");
        return;
      }

      for (let i = 0; i < files.length; i++) {
        const file = files[i];

        if (file.size > maxSize) {
          event.target.value = null;
          alert(`O arquivo ${file.name} excede o tamanho máximo de 3MB.`);
          return;
        }

        if (!allowedFormats.includes(file.name.substr(file.name.lastIndexOf(".")))) {
          event.target.value = null;
          alert(`O arquivo ${file.name} não está no formato PDF.`);
          return;
        }
      }
    },

    uploadFiles(e) {
      let selectedFiles = e.target.files;

      if (!selectedFiles.length) {
        return false;
      }

      for (let i = 0; i < selectedFiles.length; i++) {
        this.attachments.push(selectedFiles[i]);
      }

      console.log(this.attachments);
    },

    upgradeStep() {
      this.currentStep++;
    },

    downgradeStep() {
      this.currentStep--;
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
        data.append("certifications", this.state.user.experience.certifications);
        data.append("other_knowledges", this.state.user.experience.other_knowledges);
        data.append(
          "professional_experiences",
          this.state.user.experience.professional_experiences
        );
        data.append("cityhall_trainee", this.state.user.experience.cityhall_trainee);
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
        document.getElementById("file").value = [];

        axios
          .post("register", data, config)
          .then((response) => {
            this.allerros = [];
            console.log(response);
            console.log("sucesso");
            alert("Sucesso!");
          })
          .catch((error) => {
            this.allerros = error.response.data.errors;
            console.log(error);
            console.log("erro");
            alert("Ocorreu um erro, tente novamente!");
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
