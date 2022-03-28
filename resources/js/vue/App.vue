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

<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>