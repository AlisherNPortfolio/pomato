<template>
    <router-view/>
    <notifications position="bottom right" />
  </template>

  <script lang="ts">
  import { defineComponent } from "@vue/runtime-core";

  export default defineComponent({
    name: "App"
  });
  </script>
