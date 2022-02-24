<template>
  <div>
    <div class="main-container">
      <h1>Cadastrar Pet:</h1>
      <PetForm />
    </div>
  </div>
</template>

<script>

import PetForm from '../components/PetForm'
export default {
  name: 'Pet',
  components: {
    PetForm
  }
}
</script>