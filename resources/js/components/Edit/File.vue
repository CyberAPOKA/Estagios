<template>
  <div class="row">
    <div class="col-xl-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="mb-0">Arquivos atuais {{ user.file }}</h3>
          </div>
        </div>
        <div class="card-body">
          <h6 class="heading-small text-muted mb-4">
            Você pode manter um total de 5 arquivos
            <div v-if="errors.error" class="alert alert-danger">
              {{ errors.error }}
            </div>
          </h6>
          <div class="row">
            <div class="col-md-4">
              <Form @submit="updateFileSubmit">
                <label class="form-control-label" for="file">Envie arquivos</label>
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
                <div>
                  <span>Arquivo(s) selecionado(s):</span>
                  <ul>
                    <li v-for="file in selectedFiles" :key="file.name">
                      {{ file.name }}
                    </li>
                  </ul>
                  <p v-if="!(selectedFiles && selectedFiles.length)">
                    Nenhum arquivo selecionado.
                  </p>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-success mt-4">Salvar</button>
                </div>
              </Form>
            </div>

            <div class="col-md-8">
              <div>
                <h1>Seus arquivos</h1>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="sort" data-sort="name">Nome</th>
                        <th scope="col" class="sort" data-sort="name">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="file in user.files" :key="file.id">
                        <td>{{ file.name }}</td>
                        <td class="d-flex">
                          <button
                            class="btn btn-primary"
                            @click="downloadFile(file.name, file.file_path)"
                          >
                            Download
                          </button>
                          <button
                            class="btn btn-danger"
                            @click="deleteFile(file.file_path)"
                          >
                            DEL
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { Form } from "vee-validate";
import { useToast } from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

export default {
  props: ["user", "files"],

  setup() {
    const toast = useToast();
    return {
      toast,
    };
  },

  data() {
    return {
      errors: {},
      files: [],
      allerros: [],
      attachments: [],
      selectedFiles: undefined,
    };
  },

  methods: {
    // validateFiles(event) {
    //   const files = event.target.files;
    //   const maxFiles = 5;
    //   const maxSize = 3 * 1024 * 1024;
    //   const allowedFormats = [".pdf"];
    //   if (files.length > maxFiles) {
    //     event.target.value = null;
    //     alert("Você pode selecionar no máximo 5 arquivos.");
    //     return;
    //   }

    //   for (let i = 0; i < files.length; i++) {
    //     const file = files[i];

    //     if (file.size > maxSize) {
    //       URL.revokeObjectURL(event.target.files[i]);
    //       event.target.value = null;
    //       alert(`O arquivo ${file.name} excede o tamanho máximo de 3MB.`);
    //       return;
    //     }

    //     if (!allowedFormats.includes(file.name.substr(file.name.lastIndexOf(".")))) {
    //       URL.revokeObjectURL(event.target.files[i]);
    //       event.target.value = null;
    //       alert(`O arquivo ${file.name} não está no formato PDF.`);
    //       return;
    //     }
    //   }
    // },

    downloadFile(name, file_path) {
      const user_id = this.user.id;
      const file_path_without_curriculums = file_path.replace(
        `curriculums/${user_id}/`,
        ""
      );
      const file_original_name = name;
      window.location.href = `download/${user_id}/${file_path_without_curriculums}/${file_original_name}`;
    },
    deleteFile(file_path) {
      const user_id = this.user.id;
      const file_path_without_curriculums = file_path.replace(
        `curriculums/${user_id}/`,
        ""
      );
      axios
        .delete(`/delete/${user_id}/${file_path_without_curriculums}`)
        .then((response) => {
          this.toast.success("Arquivo removido com sucesso!", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        })
        .catch((error) => {
          this.toast.error("Ocorreu um erro ao remover seu arquivo.", {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        });
    },
    uploadFiles(event) {
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
          URL.revokeObjectURL(event.target.files[i]);
          event.target.value = null;
          alert(`O arquivo ${file.name} excede o tamanho máximo de 3MB.`);
          return;
        }

        if (!allowedFormats.includes(file.name.substr(file.name.lastIndexOf(".")))) {
          URL.revokeObjectURL(event.target.files[i]);
          event.target.value = null;
          alert(`O arquivo ${file.name} não está no formato PDF.`);
          return;
        }
      }
      let selectedFiles = event.target.files;

      if (!selectedFiles.length) {
        return false;
      }

      for (let i = 0; i < selectedFiles.length; i++) {
        this.attachments.push(selectedFiles[i]);
      }
      this.selectedFiles = Array.from(event.target.files);
      console.log(this.attachments);
    },

    updateFileSubmit() {
      var data = new FormData();

      for (let i = 0; i < this.attachments.length; i++) {
        data.append("file[]", this.attachments[i]);
      }
      const config = { headers: { "Content-Type": "multipart/form-data" } };
      document.getElementById("file").value = [];

      axios
        .post("update-file", data, config)
        .then((response) => {
          this.toast.success(response.data.message, {
            position: "top-right",
            duration: "5000",
          });
          window.location.reload();
        })
        .catch((error) => {
          if (error.response.status === 422) {
            this.toast.error(error.response.data.error, {
              position: "top-right",
              duration: "5000",
            });
          } else {
            this.toast.error("Ocorreu um erro ao salvar seu(s) Arquivo(s).", {
              position: "top-right",
              duration: "5000",
            });
          }
          window.location.reload();
        });
    },
  },
};
</script>
