<template>
  <div>
    <form id="service-form" method="POST" @submit.prevent="createService">
      <div class="input-container">
        <label for="cliente">Cliente:</label>
        <select name="cliente" id="cliente" v-model="servico.clientes_nome">
          <option value="">Selecione o cliente</option>
          <option v-for="cliente in clientes" :key="cliente.nome" :value="cliente.nome">
              {{ cliente.nome }}
              </option>
        </select>
      </div>
      <div class="input-container">
        <label for="servicos-tipo">Tipo do serviço:</label>
        <select name="servicos-tipo" v-model="servico.servicostipo_nome">
          <option value="">Selecione o tipo do serviço</option>
          <option v-for="servtipo in servicostipo" :key="servtipo.nome" :value="servtipo.nome">
              {{ servtipo.nome }}
              </option>
        </select>
      </div>
      <div class="input-container">
        <label for="status-tipo">Status:</label>
        <select name="status-tipo" v-model="servico.status_tipo">
          <option value="">Selecione o Status</option>
          <option v-for="s in status" :key="s.tipo" :value="s.tipo">
              {{ s.tipo }}
              </option>
        </select>
      </div> 
       <div class="input-container">
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="nome" name="quantidade" v-model="servico.quantidade" placeholder="Informe a quantidade">
      </div>
       <div class="input-container">
        <label for="obs">Observações:</label>
        <input type="text" id="nome" name="obs" v-model="servico.obs" placeholder="informe as observações">
      </div>
       <div class="input-container">
        <label for="data">Data:</label>
        <input type="date" id="nome" name="data" v-model="servico.data" placeholder="Selecione a data">
      </div>
       <div class="input-container">
        <label for="hora">Horário:</label>
        <input type="time" id="nome" name="hora" v-model="servico.hora" placeholder="Selecione o horário">
      </div>
       <div class="input-container">
        <input class="submit-btn" type="submit" value="Confirmar">
      </div>
    </form>
  </div>
</template>

<script>
import api from '@/services/api.js'; 

export default {
  name: "ServiceForm",
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
      servicostipo: {
        nome:''
      },
      cliente: {
        nome: ''
      },
      s: {
        tipo: ''
      },
      status:[], 
    clientes: [],
    servicostipos: [], 
    servicos:[]        
   }
  },
  mounted() {
    api.get('servicos').then(response => {
      this.servicos = response.data.data
    })
    api.get('servtipos').then(response => {
      this.servicostipo =response.data
    })
    api.get('clientes').then(response => {
      this.clientes = response.data.data
    })
    api.get('status').then(response => {
      this.status = response.data
    })

  },
  methods: {
    async createService() {
      try {
        const servico = await api.post("servicos", {
          clientes_nome: this.servico.clientes_nome,
          servicostipo_nome: this.servico.servicostipo_nome,
          quantidade: this.servico.quantidade,
          obs: this.servico.obs,
          data: this.servico.data,
          hora: this.servico.hora,
          status_tipo: this.servico.status_tipo
        });
        alert('Ordem de serviço cadastrada!')
        location.reload()
        const res = await servico
        console.log(res)
        
      }catch(e) {
        e = 'Verifique os dados preenchidos'
        alert(e);
      } 
    }
  }
}  
</script>

<style scoped>
  #service-form {
    max-width: 400px;
    margin: 0 auto;
  }
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