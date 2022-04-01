<template>
  <o-modal v-model:active="confirmDeleteActive" class="p-0">
    <div class="p-4">
      <p class="my-5">¿Seguro que quieres eliminar el registro seleccionado?</p>
    </div>

    <div class="flex flex-row-reverse gap-2 bg-gray-100 p-3">
      <o-button @click="deletePost" variant="danger">Eliminar</o-button>
      <o-button @click="confirmDeleteActive = false">Cancelar</o-button>
    </div>
  </o-modal>

  <router-link :to="{ name: 'save' }">Crear</router-link>

  <o-button iconLeft="plus" @click="$router.push({ name: 'save' })">
    Crear
  </o-button>

  <br />

  <o-table
    :data="posts.current_page && posts.data.length == 0 ? [] : posts.data"
  >
    <o-table-column field="id" label="ID" width="40" numeric v-slot="p">
      {{ p.row.id }}
    </o-table-column>
    <o-table-column field="title" label="Título" v-slot="p">
      {{ p.row.title }}
    </o-table-column>
    <o-table-column field="category" label="Categoría" v-slot="p">
      {{ p.row.category.title }}
    </o-table-column>
    <o-table-column field="created_at" label="Fecha" v-slot="p">
      {{ p.row.created_at }}
    </o-table-column>
    <o-table-column field="slug" label="Acciones" v-slot="p">
      <router-link
        class="m-5"
        :to="{ name: 'save', params: { slug: p.row.slug } }"
        >Editar</router-link
      >
      <o-button
        class="m-5"
        iconLeft="delete"
        size="small"
        rounded
        variant="danger"
        @click="
          deletePostRow = p;
          confirmDeleteActive = true;
        "
        >Eliminar</o-button
      >
    </o-table-column>
  </o-table>

  <br />

  <o-pagination
    v-if="posts.current_page && posts.data.length > 0"
    @change="updatePage"
    :total="posts.total"
    v-model:current="currentPage"
    :range-before="2"
    :range-after="2"
    order="centered"
    size="small"
    :simple="false"
    :rounded="true"
    :per-page="posts.per_page"
  >
  </o-pagination>
</template>

<script>
export default {
  data() {
    return {
      loaging: true,
      posts: [],
      currentPage: 1,
      confirmDeleteActive: false,
      deletePostRow: "",
    };
  },
  methods: {
    updatePage() {
      setTimeout(this.getList, 200);
    },
    getList() {
      console.log("aa" + this.currentPage);
      const config = {
        headers: { Authorization: `Bearer ${this.$root.token}` },
      };
      this.loaging = true;
      this.$axios
        .get("/api/post?page=" + this.currentPage, config)
        .then((res) => {
          this.posts = res.data;
          console.log(this.posts[0]);
          this.loaging = false;
        });
    },
    deletePost() {
      console.log(this.deletePostRow);
      console.log(this.posts);

      this.posts.data.splice(this.deletePostRow.index, 1);
      this.$oruga.notification.open(
        /*`Something's not good, also I'm on <b>bottom</b>`,*/ {
          message: `Registro eliminado con éxito <b>bottom</b>`,
          position: "bottom-right",
          variant: "danger",
          duration: 5000,
          closable: true,
        }
      );
      this.confirmDeleteActive = false;

      this.$axios.delete("/api/post/" + this.deletePostRow.row.id);
    },
  },
  async mounted() {
    this.getList();
  },
};
</script>