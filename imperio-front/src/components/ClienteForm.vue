<template>
  <div>
    <form id="cliente-form" method="POST" @submit.prevent="createCliente">
       <div class="input-container">
        <label for="nome">Nome do Cliente:</label>
        <input type="text" id="nome" name="nome" v-model="cliente.nome" placeholder="Digite o nome completo">
      </div>
       <div class="input-container">
        <label for="telefone">Telefone de contato:</label>
        <input type="text" id="telefone" name="telefone" v-model="cliente.telefone" placeholder="Digite o numero de telefone">
      </div>
       <div class="input-container">
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" v-model="cliente.endereco" placeholder="Digite endereço completo">
      </div>
      <div class="input-container">
        <input class="submit-btn" type="submit" value="Salvar">
      </div>
    </form>
  </div>
</template>

<script>
import api from '@/services/api.js';

export default {
  name: 'ClienteForm',
  components: {
    //Message
  },
  data() {
    return {
      cliente: {
        nome: '',
        telefone: '',
        endereco: '',
      },
       
      clientes: []
    }
  },
  mounted(){
    api.get('clientes').then(response => {
      this.clientes = response.data.data
    })
  }, 
  methods: {
    async createCliente() {
      try {
        const cliente = await api.post("clientes", {
          nome: this.cliente.nome,
          telefone: this.cliente.telefone,
          endereco: this.cliente.endereco, 
        });
        const res = await cliente
        console.log(res)
        alert('Cliente cadastrado com sucesso!')
        location.reload()
        
      }catch(e) {
        e = 'Existe número de telefone já existe'
        alert(e);
      } 
    }      
  }
};    
</script>

<style scoped>
  #cliente-form {
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
