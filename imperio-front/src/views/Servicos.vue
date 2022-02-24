<template>
  <div>
    <div class="main-container">
      <h1>Gerenciar Serviços:</h1>
      <DashServicos />
    </div>
  </div>
</template>

<script>
import DashServicos from '../components/DashServicos'
export default {
  name: 'Servicos',
  components: {
    DashServicos
  }
}
</script>