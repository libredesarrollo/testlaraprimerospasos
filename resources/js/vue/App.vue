<template>
  <div>
    <h1>Primeros pasos</h1>
    <router-view />
  </div>
</template>

<script>
import List from "./components/List";
export default {
  components: {
    List,
  },
};
</script>