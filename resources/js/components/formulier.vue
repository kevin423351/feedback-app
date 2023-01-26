<template>
    <div> 
      <h1>buttons</h1>
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
        
            <v-snackbar
              v-model="snackbar"
              :timeout="timeout"
              :color= "color"
            >

              {{ text }}

              <template v-slot:action="{ attrs }">
                <v-btn
                  color="green"
                  text
                  v-bind="attrs"
                  @click="snackbar = false"
                >
                  Close
                </v-btn>
              </template>
            </v-snackbar>

        <v-table>
          <thead>
            <tr>
              <th class="text-left">
                button
              </th>
              <th class="text-left">
                ingedrukt
              </th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="item in countedFeedback"
              :key="item.name"
            >
              <td>{{ item.buttonID }}</td>
              <td>{{ item.Presses }}</td>
            </tr>
          </tbody>
        </v-table>
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
          countedFeedback: [],
          snackbar: false,
          text: "",
          timeout: 5000,
          color: "",
          error: "",
        };
      },
      mounted() {
          this.getFeedback();
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
          this.color = "green"
          this.text = response.data
          this.snackbar = true 
          this.getFeedback()
        }).catch(error)
          this.text = "het is fout gegaan"
          this.color = "red"
          this.snackbar = true 
        },
  
        getFeedback: function () {
        axios({
        method: 'get',
        url: '/get',
        }).then( async (response) => {
          this.countedFeedback = response.data;
        }).catch()
        },
        }  
    };
  </script>
  