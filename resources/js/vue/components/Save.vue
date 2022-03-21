<template>
  <form @submit.prevent="submit">
    <o-field
      label="title"
      :variant="this.errors.title ? 'danger' : 'primary'"
      :message="this.errors.title"
    >
      <o-input v-model="form.title" value=""></o-input>
    </o-field>

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
    <o-button variant="primary" native-type="submit">Enviar</o-button>
  </form>
</template>

<script>
export default {
  mounted() {
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
    };
  },
  methods: {
    cleanFormErrors() {
      this.errors.title = ""
    },
    submit() {
      this.cleanFormErrors()
      console.log(this.form);
      this.$axios
        .post("/api/post", this.form)
        .then((res) => {
          console.log(res.data);
        })
        .catch((error) => {
          console.log("*****");
          console.log(error.response.data);

          if (error.response.data.title) {
            this.errors.title = error.response.data.title[0];
          }
        });
    },
    getCategories() {
      this.$axios.get("/api/category/all").then((res) => {
        this.categories = res.data;
      });
    },
  },
};
</script>