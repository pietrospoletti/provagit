<template>
    <div>
        <div v-for="(shoe, index) in shoe" :key="index">
            <div  class="flex w-full h-20 mb-12 p-0 grid grid-cols-10">
                <!--<img :src="offer.icon" alt="offer" class="w-20 h-20 mb-2 grow col-start-4 col-end-5" />-->
                <div class="flex flex-col text-black h-full w-full ml-0 col-start-5">
                    <div class="flex mb-1">{{ shoe.nome}} </div>
                    <div class="flex mb-1">{{ shoe.brand}} </div>
                    <div class='flex flex-row top-0 right-0'>
                      <button @click="edit(shoe)" class='flex flex-row bg-yellow-500 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1'>Modifica scarpe</button>
                      <button @click="details(shoe)" class='flex flex-row bg-blue-100 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1'>Dettagli scarpe</button>
                      <button @click="elimina(shoe.id)" class="flex flex-row bg-red-500 pr-2 pl-2 pt-1 pb-1 rounded-lg m-1">Elimina scarpe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "ShoesList",
    data() {
    return {
      shoe: [],
    };
  },

  async mounted() {
    this.reload();
  },

methods: {
    edit(shoe){
        this.$router.push("edit/"+ shoe.id)
      },
    details(shoe) {
        this.$router.push('shoedetail/'+ shoe.id)
    },
    async elimina(id){
        await axios.delete("http://127.0.0.1:8000/api/delete/"+id);
        alert("Scarpa eliminata") 
        this.reload();
    },
    async reload(){
      let response = await axios.get("http://127.0.0.1:8000/api/shoes");
    this.shoe = response.data;
  },
}
}

</script>