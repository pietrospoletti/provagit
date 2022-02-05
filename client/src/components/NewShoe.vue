<template>
<div class="h-screen flex flex-col items-center w-auto">
    <div class="flex flex-col mb-3" v-for="field in fields" :key="field.code">
        <label class="mb-2 font-bold text-red-900" :for="field.code"> {{ field.label }} </label>
        <!--<select v-if="field.type == 'select'" class="border border-gray-200 p-2 rounded" :name="field.code" :id="field.code" v-model="newOffer[field.code]" >
        <option v-for="option in field.options" :key="option.code" :value="option.code" >{{ option.label }} </option></select>-->
        <!--<input v-if="field.type == 'text'" class="border border-gray-200 p-2 rounded" type="text" :id="field.code" v-model="newOffer[field.code]"/>-->
        <!--<input v-if="field.type == 'text'" class="border border-gray-200 p-2 rounded" type="text" :id="field.code" v-model="newOffer[field.code]"/>-->
        <input v-if="field.type == 'text'" class="border border-gray-200 p-2 rounded" type="text" :id="field.code" v-model="newShoe[field.code]"/>
        <select v-if="field.type == 'select'" class="border border-gray-200 p-2 rounded" :name="field.code" :id="field.code" v-model="newShoe[field.code]" >
        <option v-for="option in field.options" :key="option.code" :value="option.code" >{{ option.label }} </option></select>
        <input v-if="field.type == 'number'" class="border border-gray-200 p-2 rounded" type="text" :id="field.code" v-model="newShoe[field.code]"/>
        <input v-if="field.type == 'date'" class="border border-gray-200 p-2 rounded" type="date" :id="field.code" v-model="newShoe[field.code]"/>

    <!--
    <input type="text" class='w-96 p-1' v-model="newOffer.language" placeholder="linguaggio">
    <input type='text' class='w-96 p-1' v-model="newOffer.icon" placeholder="inserisci un link dell'immagine del linguaggio">
    <input type='text' class='w-96 p-1' v-model="newOffer.company" placeholder="azienda">
    <input type='integer' class='w-96 p-1' v-model="newOffer['RAL']" placeholder="stipendio annuale lordo">
    <input type='text' class='w-96 p-1' v-model="newOffer.level" placeholder="livello">
    <input type='text' class='w-96 p-1' v-model="newOffer.location" placeholder="luogo">
    <input type='text' class='w-96 p-1' v-model="newOffer.description" placeholder="descrizione">
    -->
    </div>
    <button class='flex flex-row bg-green-200 pr-5 pl-5 pt-2 pb-2 rounded-lg mt-2' @click="conferma()" :disabled="!formIsValid">Aggiungi la scarpa</button>
</div>
</template>


<script>
import axios from 'axios';
export default {
    name:"NewShoe",
    data(){
    return {
        fields: [
        {
          label: "nome",
          code: "nome",
          type: "text",
        },
        {
          label: "brand",
          code: "brand",
          type: "select",
          options: [
            {
              label: "Nike",
              code: "Nike",
            },
            {
              label: "Converse",
              code: "Converse",
            },
            {
              label: "Adidas",
              code: "Adidas",
            },
            {
              label: "Puma",
              code: "Puma",
            },
          ],
        },
        {
          label: "numero",
          code: "numero",
          type: "number",
        },
        {
          label: "prezzo",
          code: "prezzo",
          type: "number",
        },
        {
          label: "uscita",
          code: "uscita",
          type: "date",
        },
        ],
    newShoe:{
        nome : "",
        brand : "",
        numero : 0,
        prezzo : 0,
        uscita : ""
    },
    };
},
methods:{
    async conferma(){
        console.log(this.newOffer);
        let response = await axios.post("http://127.0.0.1:8000/api/addshoe", this.newShoe);
        console.log(response);
        alert("Scarpa inserita")
        this.reload();
    },
},
computed: {
    formIsValid() {
      return (
        this.newShoe.nome != "" &&
        this.newShoe.brand != "" &&
        this.newShoe.numero > 0 &&
        this.newShoe.prezzo != 0 &&
        this.newShoe.uscita != "" 
        // this.newShoe.location != "" &&
        // this.newShoe.description != ""
      );
    },
  },
}
</script>

<style>
input{
    border: 1px solid black;
    border-radius: 1rem;
    margin: 3px;
    padding-left: 5px;
}
</style>