<template>
  <h1>Primeros pasos2s</h1>

  <o-table :data="posts.length == 0 ? [] : posts">
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
  </o-table>
</template>

<script>
export default {
  data() {
    return {
      loaging: true,
      posts: [],
    };
  },
  async mounted() {
    const config = {
      headers: { Authorization: `Bearer ${this.$root.token}` },
    };

    this.$axios.get("/api/post", config).then((res) => {
      this.posts = res.data.data;
      console.log(this.posts[0]);
      this.loaging = false;
    });
  },
};
</script>