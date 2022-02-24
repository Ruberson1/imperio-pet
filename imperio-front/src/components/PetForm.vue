<template>
  <div>
    <form id="pet-form" method="POST" @submit.prevent="createPet">
      <div class="input-container">
        <label for="cliente">Dono do Pet:</label>
        <select name="cliente" id="cliente" v-model="pet.clientes_nome">
          <option value="">Selecione o cliente</option>
          <option v-for="cliente in clientes" :key="cliente.nome" :value="cliente.nome">
              {{ cliente.nome }}
              </option>
        </select>
      </div>
       <div class="input-container">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" v-model="pet.nome" placeholder="Informe o nome">
      </div>
       <div class="input-container">
        <label for="obs">Raça:</label>
        <input type="text" id="nome" name="obs" v-model="pet.raca" placeholder="informe a raça">
      </div>
       <div class="input-container">
        <label for="porte">Porte:</label>
        <input type="text" id="porte" name="porte" v-model="pet.porte" placeholder="Informe o porte">
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
  name: "PetForm",
  data() {
    return {
      pet:{  
        clientes_nome: '',
        nome: '',
        raca: '',
        porte: ''
      },
      cliente: {
        nome: ''
      }, 
    clientes: [],
    pets:[]        
   }
  },
  mounted() {
    api.get('pets').then(response => {
      this.pets = response.data
    })
    api.get('clientes').then(response => {
      this.clientes = response.data.data
    })
  },
  methods: {
    async createPet() {
      try {
        const pet = await api.post("pets", {
          clientes_nome: this.pet.clientes_nome,
          nome: this.pet.nome,
          raca: this.pet.raca,
          porte: this.pet.porte
        });
        alert('Pet cadastrado com sucesso')
        location.reload()
        const res = await pet
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
  #pet-form {
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