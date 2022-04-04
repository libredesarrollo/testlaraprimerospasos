<template>
  <form @submit.prevent="submit">
    <div class="grid grid-cols-2 gap-3">
      <div class="col-span-2">
        <o-field
          label="title"
          :variant="this.errors.title ? 'danger' : 'primary'"
          :message="this.errors.title"
        >
          <o-input v-model="form.title" value=""></o-input>
        </o-field>
      </div>

      <o-field label="Descripción">
        <o-input v-model="form.description" type="textarea"></o-input>
      </o-field>

      <o-field label="Contenido">
        <o-input v-model="form.content" type="textarea"></o-input>
      </o-field>

      <o-field
        label="Categoría"
        variant="danger"
        message="Something went wrong with this field"
      >
        <o-select
          v-model="form.category_id"
          placeholder="Select a topic"
          icon="user"
        >
          <option v-for="c in categories" :value="c.id" v-bind:key="c.id">
            {{ c.title }}
          </option>
        </o-select>
      </o-field>

      <o-field label="Posted">
        <o-select v-model="form.posted" placeholder="Estado">
          <option value="yes">Si</option>
          <option value="not">No</option>
        </o-select>
      </o-field>

      <div class="flex gap-2">
        <o-upload v-model="file" v-if="post">
          <o-button tag="a" variant="primary">
            <o-icon icon="upload"></o-icon>
            <span>Click para cargar</span>
          </o-button>
        </o-upload>
        <o-button @click="upload" outlined icon-left="upload">Subir</o-button>
      </div>
    </div>
    <br />
    <o-button variant="primary" native-type="submit">Enviar</o-button>
  </form>
</template>

<script>
export default {
  async mounted() {
    if (this.$route.params.slug) {
      await this.getPost();
      this.initModel();
    }

    this.getCategories();
  },
  data() {
    return {
      form: {
        category_id: "",
        posted: "",
        title: "",
        content: "",
        description: "",
      },
      errors: {
        category_id: "",
        posted: "",
        title: "",
        content: "",
        description: "",
      },
      categories: [],
      post: "",
      file: null,
    };
  },
  methods: {
    initModel() {
      this.form.category_id = this.post.category_id;
      this.form.posted = this.post.posted;
      this.form.title = this.post.title;
      this.form.content = this.post.content;
      this.form.description = this.post.description;
    },
    cleanFormErrors() {
      this.errors.title = "";
    },
    submit() {
      this.cleanFormErrors();

      if (this.post == "")
        return this.$axios
          .post("/api/post", this.form)
          .then((res) => {
            console.log(res.data);

            this.$oruga.notification.open(
              /*`Something's not good, also I'm on <b>bottom</b>`,*/ {
                message: `Cambios registrados con éxito <b>bottom</b>`,
                position: "bottom-right",
                duration: 5000,
                closable: true,
              }
            );
          })
          .catch((error) => {
            if (error.response.data.title) {
              this.errors.title = error.response.data.title[0];
            }
          });
      this.$axios
        .patch("/api/post/" + this.post.id, this.form)
        .then((res) => {
          this.$oruga.notification.open(
            /*`Something's not good, also I'm on <b>bottom</b>`,*/ {
              message: `Cambios registrados con éxito <b>bottom</b>`,
              position: "bottom-right",
              duration: 5000,
              closable: true,
            }
          );
          console.log(res.data);
        })
        .catch((error) => {
          if (error.response.data.title) {
            this.errors.title = error.response.data.title[0];
          }
        });
    },
    upload() {
      //return console.log(this.file);

      const formData = new FormData();
      formData.append("image", this.file);

      axios
        .post("/api/post/upload/" + this.post.id, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then(function (data) {
          console.log(data.data);
        })
        .catch(function () {
          console.log("FAILURE!!");
        });
    },
    getCategories() {
      this.$axios.get("/api/category/all").then((res) => {
        this.categories = res.data;
      });
    },
    async getPost() {
      this.post = await this.$axios.get(
        "/api/post/slug/" + this.$route.params.slug
      );
      this.post = this.post.data;
      console.log(this.post);
    },
  },
};
</script>