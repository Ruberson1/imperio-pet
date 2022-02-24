<template>
  <div id="servico-table" v-if="servicos">
    <div>
      <div id="servico-table-heading">
        <div class="order-name">cliente:</div>
        <div>tipo de serviço:</div>
        <div>quantidade:</div>
        <div>observação:</div>
        <div>data:</div>
        <div>hora:</div>
        <div>ações:</div>
      </div>
    </div>
    <div id="servico-table-rows">
      <div class="servico-table-row" v-for="servico in servicos" :key="servico.id">
        <div>{{ servico.cliente.nome }}</div>
        <div>{{ servico.servicos_tipo.tipo }}</div>
        <div>{{ servico.quantidade }}</div>
        <div>{{ servico.obs }}</div>
        <div>{{ servico.data }}</div>
        <div>{{ servico.hora }}</div>
        <div class="select-btn">
          <select name="status" class="status" @change="updateService($event, servico.id)">
            <option :value="s.tipo" v-for="s in status" :key="s.id" :selected="servico.status_tipo == status.tipo">
              {{ s.tipo }}
            </option>
          </select>
          <button class="delete-btn" @click="deleteService(servico.id)">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <h2>Não há agendamentos no momento!</h2>
  </div>
</template>
<script>
import api from '@/services/api.js';

export default {
  name: 'Dashboard',
  data() {
    return {
      servico:{  
        clientes_nome: '',
        servicostipo_nome: '',
        quantidade: '',
        obs: '',
        data: '',
        hora: '',
        status_tipo:''
      },
      s: {
        tipo: ''
      },
      servicos:[],
      status:[]
    }
  },
  mounted(){
    api.get('agendamentos').then(response => {
      /*this.status =*/ console.log(response.data.data)
    })
    api.get('status').then(response => {
      this.status = response.data
    })
  
  },
  methods: {
   
  } 
}
</script>

<style scoped>
  #servico-table {
    max-width: 1200px;
    margin: 0 auto;
  }

  #servico-table-heading,
  #servico-table-rows,
  .servico-table-row {
    display: flex;
    flex-wrap: wrap;
  }

  #servico-table-heading {
    font-weight: bold;
    padding: 4px;
    border-bottom: 3px solid #333;
  }

  .servico-table-row {
    width: 100%;
    padding: 4px;
    border-bottom: 1px solid #CCC;
    
  }

  #servico-table-heading div,
  .servico-table-row div {
    width: 14%;
  }

  #servico-table-heading .order-id,
  .servico-table-row .order-number {
    width: 5%;
  }

  select {
    padding: 12px 6px;
    margin-right: 12px;
  }

  .delete-btn {
    background-color: #222;
    color:#fcba03;
    font-weight: bold;
    border: 2px solid #222;
    padding: 5px;
    font-size: 16px;
    margin: 0 auto;
    cursor: pointer;
    transition: .5s;
    border-radius: 30px;
  }
 
  .delete-btn:hover {
    background-color: transparent;
    color: #222;
  }
  .select-btn {
    display: flex;
    gap: 10%;
  }
  
</style>