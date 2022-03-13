<template>
    <div>
             <h1>Primeros pasos2s</h1>

 <o-field label="Name">
      <o-input v-model="name"></o-input>
    </o-field>
<o-button @click="clickMe">Click Me</o-button>

<o-field label="Username" variant="success" message="This username is available">
      <o-input value="johnsilver" maxlength="30"></o-input>
    </o-field>

    <o-field label="Password">
      <o-input type="password" value="iwantmytreasure" password-reveal> </o-input>
    </o-field>

    <o-field label="Message">
      <o-input maxlength="200" type="textarea"></o-input>
    </o-field>

    <o-field>
      <o-input placeholder="No label"></o-input>
    </o-field>

    </div>
</template>

<script>
export default {
       methods: {
      clickMe() {
        alert('Clicked!')
      }
    }
}
</script>