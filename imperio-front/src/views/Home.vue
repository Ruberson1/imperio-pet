<template>
  <div>
    <Banner />
    <div class="main-container">
      <h1>Ordem de serviço:</h1>
      <ServiceForm />
    </div>
  </div>
</template>

<script>
import Banner from '../components/Banner'
import ServiceForm from '../components/ServiceForm'
export default {
  name: 'Home',
  components: {
    Banner,
    ServiceForm
  }
}
</script>
