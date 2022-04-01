<template>
  <div class="bg-green-400 text-green-800 py-3 px-5 rounden">
    {{ $message }}
  </div>
</template>

<script>
export default {
  props: {
    message: {
      require: true,
      type: String,
    },
  },
};
</script>