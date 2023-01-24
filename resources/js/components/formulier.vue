<template>
    <div> 
      <h1>buttons</h1>
      <v-color-picker>hi</v-color-picker>
      <!-- <form @submit.prevent="submitForm" v-if="!formSubmitted">
        <span>hoe schoon was de wc</span><br>
        <input 
          v-model="vraag1"
          type="text"
        />
         <div class="space">
          <div class="container" v-for="post in posts" :key="post.id">
            <img :src="post.path" v-on:click="submitForm(post.id)" />
          </div>
        </div>
  
        <br>
        <span>hoe schoon was de bril</span><br>
        <input 
          v-model="vraag2"
          type="text"
        /><br> -->
        <div class="space">
          <div class="container" v-for="post in posts" :key="post.id">
            <img :src="post.path" v-on:click="submitForm(post.id)" />
          </div>
        </div>
        <!-- <input 
          class="submit" 
          type="submit" 
          value="Submit"
        >
      </form>
  
      <div v-if="formSubmitted">
        <h3>Form Submitted</h3>
        <p>naam: {{ vraag1 }}</p>
        <p>vraag2: {{ vraag2 }}</p>
      </div> -->
    </div>
  </template> 
  
  <script>
  import axios from 'axios';

  export default {
      name: 'formulier',
      
      data() {
        return {
          posts: [
            {id: 1,  path:"icon.png"},
            {id: 2,  path:"icon2.png"},
            {id: 3,  path:"icon3.png"},
            {id: 4,  path:"icon4.png"},
            {id: 5,  path:"icon5.png"},
          ],
          vraag1: "",
          vraag2: "",
          formSubmitted: false,
        };
      },
      methods: {
        submitForm: function (id) {
          this.formSubmitted = true
        axios({
        method: 'post',
        url: '/send',
        data: {
          id: id,
          }
        }).then( async (response) => {
          alert(response.data)
        }).catch()
        },
  
        // review: function (id) {
        // axios({
        // method: 'get',
        // url: '/send',
        // data: {
        //   id: id,
        //   }
        // }).then( async (response) => {
        //   alert(response.data)
        // }).catch()
        // },
        } 
    };
  </script>
  