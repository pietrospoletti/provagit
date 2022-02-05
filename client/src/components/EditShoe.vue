<template>
<div class="h-screen flex flex-col items-center w-auto">
<input type="text" class='w-96 p-1' v-model="shoe.nome" placeholder="name">
<input type='text' class='w-96 p-1' v-model="shoe.brand" placeholder="brand">
<input type='text' class='w-96 p-1' v-model="shoe.numero" placeholder="numero">
<input type='integer' class='w-96 p-1' v-model="shoe.prezzo" placeholder="prezzo annuale lordo">
<input type='date' class='w-96 p-1' v-model="shoe.uscita" placeholder="uscita">
<button class='flex flex-row bg-green-200 pr-5 pl-5 pt-2 pb-2 rounded-lg' @click="edit()">Salva</button>
</div>
</template>


<script>
import axios from 'axios';
export default {
    name:"EditShoe",
    data(){
    return {
        shoe:{
            name : "",
            brand : "",
            numero : 0,
            prezzo : 0,
            uscita : "",
        },
    }
},

async mounted() {
      let id = this.$route.params.id;
      let response = await axios.get("http://127.0.0.1:8000/api/shoe/"+id);
      this.shoe = response.data;
  },
methods:{
    async edit(){
          await axios.put("http://127.0.0.1:8000/api/edit/"+ this.shoe.id, this.shoe);
          alert("Scarpa modificata")
          this.$router.push("/")
          this.reload();
      },
    async reload(){
    let response = await axios.get("http://127.0.0.1:8000/api/shoes");
    this.shoe = response.data;
    }
},
}
</script>