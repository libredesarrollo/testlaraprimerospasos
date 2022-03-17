<template>
  <o-field label="title">
    <o-input value=""></o-input>
  </o-field>

  <o-field label="Descripción">
    <o-input type="textarea"></o-input>
  </o-field>

  <o-field label="Contenido">
    <o-input type="textarea"></o-input>
  </o-field>

  <o-field  label="Topic">
    <o-select placeholder="Select a topic">
      <option value="1">Cate 1</option>
    </o-select>
  </o-field>

  <o-field  label="Posted">
    <o-select placeholder="Estado">
      <option value="yes">Si</option>
      <option value="not">No</option>
    </o-select>
  </o-field>
</template>