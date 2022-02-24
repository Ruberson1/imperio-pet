<template>
  <div>
    <div class="main-container">
      <h1>Cadastrar Cliente:</h1>
      <ClienteForm />
    </div>
  </div>
</template>

<script>

import ClienteForm from '../components/ClienteForm'
export default {
  name: 'Cadastro',
  components: {
    ClienteForm
  }
}
</script>