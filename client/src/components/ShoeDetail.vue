<template>
    <div class='flex flex-col items-center'>
        <!--<div v-for="(offer, index) in offer" :key="index">-->
                <div  class="flex flex-row m-5 mr-2 items-center justify-center">
                    <!--<img :src="offer.icon" alt="offer" class="flex w-72 h-72 mr-10" />-->
                    <div class="flex flex-col text-black text-center h-full w-full">
                        <div class="flex mb-1">Modello: {{ shoe.nome}} </div>
                        <div class="flex mb-1">Brand: {{ shoe.brand}} </div>
                        <div class="flex mb-1">Numero: {{ shoe.numero}} </div>
                        <div class="flex mb-1">Prezzo: €{{ shoe.prezzo}} </div>
                        <div class="flex mb-1">Data uscita: {{ shoe.uscita}} </div>
                    </div>
                </div>
            <!--</div>-->
    </div>
</template>


<script>
import axios from "axios";
export default {
    name: "ShoeDetail",
    data() {
    return {
      shoe: null,
    };
  },

  async mounted() {
      this.id = this.$route.params.id;
      let response = await axios.get("http://127.0.0.1:8000/api/shoe/"+this.id);
      this.shoe = response.data;
  },
}

</script>