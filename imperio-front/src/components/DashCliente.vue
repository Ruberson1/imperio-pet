<template>
  <div id="cliente-table" v-if="clientes">
    <div>
      <div id="cliente-table-heading">
        <div class="order-name">Nome:</div>
        <div>Telefone:</div>
        <div>Endereço:</div>
        <div class="actions">Ações:</div>
      </div>
    </div>
    <div id="cliente-table-rows">
      <div class="cliente-table-row" v-for="cliente in clientes" :key="cliente.id">  
        <div>{{ cliente.nome }}</div>
        <div>{{ cliente.telefone }}</div>
        <div>{{ cliente.endereco }}</div>
        <div class="text-center ps-0">
        <button class="btn">Deletar</button>
        <button class="btn">Detalhes</button>
        <button class="btn">Editar</button>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <h2>Não há clientes no momento!</h2>
  </div>
</template>
<script>
import api from '@/services/api.js';

export default {
  name: 'DashClientes',
  data() {
    return {
      clientes: []
    }
  },
  mounted(){
    api.get('clientes').then(response => {
      this.clientes = response.data.data
    }) 
  }, 
  methods: {

  }
};
</script>

<style scoped>
  #cliente-table {
    max-width: 1200px;
    margin: 0 auto;
  }

  #cliente-table-heading,
  #cliente-table-rows,
  .cliente-table-row {
    display: flex;
    flex-wrap: wrap;
  }

  #cliente-table-heading {
    font-weight: bold;
    padding: 12px;
    border-bottom: 3px solid #333;
    
  }
  .actions {
    padding-left: 200px;
  }

  .cliente-table-row {
    width: 100%;
    padding: 12px;
    border-bottom: 1px solid #CCC;
  }

  #cliente-table-heading div,
  .cliente-table-row div {
    width: 19%;
  }

  #cliente-table-heading .order-id,
  .cliente-table-row .order-number {
    width: 5%;
  }

  .btn {
    background-color: #222;
    color:#fcba03;
    font-weight: bold;
    border: 2px solid #222;
    padding: 0px;
    font-size: 16px;
    margin: 3px;
    cursor: pointer;
    transition: .5s;
    border-radius: 5px;
  }
  .space-btn {
    
    display: flex;
    
  }
  .btn:hover {
    background-color: transparent;
    color: #222;
  }

  

  
</style>