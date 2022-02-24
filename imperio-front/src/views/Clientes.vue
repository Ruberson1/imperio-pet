<template>
  <div>
    <div class="main-container">
      <h1>Gerenciar clientes:</h1>
      <div class="input-container">
        <a href="http://localhost:8080/cadastrar" target="_parent">
        <input class="submit-btn" type="submit"  value="Cadastrar Cliente">
        </a> 
      </div>
      <DashCliente />
    </div>
  </div>
</template>

<script >
import DashCliente from '../components/DashCliente'

export default {
  name: 'Clientes',
  components:{
    DashCliente
  },
};
</script>

<style scoped>
.input-container {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }
  label {
    font-weight: bold;
    margin-bottom: 15px;
    color: #222;;
    padding: 5px 10px;
    border-left: 4px solid #fcba03;
  }
  input, select {
    padding: 5px 10px;
    width: 300px;
  }

  .submit-btn {
    background-color: #222;
    color:#fcba03;
    font-weight: bold;
    border: 2px solid #222;
    padding: 10px;
    font-size: 16px;
    cursor: pointer;
    transition: .5s;
    border-radius: 50px;
  }
  .submit-btn:hover {
    background-color: transparent;
    color: #222;
  }
</style>