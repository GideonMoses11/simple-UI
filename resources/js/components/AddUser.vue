<template>

    <div id="app" class="container-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light back-green">
          <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <i class="bi bi-person fsr main-white"></i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="main-gold ml-1" style="text-decoration: none;" aria-current="page" href="#">Home</a>
                </li>
                <!-- Add more nav links as needed -->
              </ul>
              <i class="bi bi-key-fill ml-auto rotate-left flip-horizontal main-gold"></i>
            </div>
          </div>
        </nav>

        <div class="row">
          <!-- Sidebar -->
          <div class="col-md-2 mt-5">
            <div class="">
                <div class="bg-light p-3 d-flex flex-column align-items-center border-side ml-2">
                <!-- Photo Upload Form -->
                <i class="bi bi-camera-fill main-gold"></i>
                <h5 class="mt-2 main-gold">Add Photo</h5>
                <!-- Add photo upload form here -->
                </div>
            </div>
        </div>


          <!-- Main Content -->
          <div class="col-md-8 mt-5">
            <div class="bg-light p-3">
              <!-- Bio Data Form -->
              <!-- <h5>Bio Data Form</h5> -->
                <div class="mb-3">
                    <textarea rows="5" cols="30" type="text" class="form-control round-bar w-65 text-right float-end" id="exampleFormControlInput1" placeholder="Sample Real Estate"></textarea>
                </div>
              <!-- Add bio data form here -->
              <form>
                <div class="row main-form">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Address English" class="form-label">Address English</label>
                            <input type="text" v-model="address_english" class="form-control main-input" id="exampleFormControlInput1" placeholder="Address">
                          </div>
                          <div class="mb-3">
                            <label for="Address Arabic" class="form-label">Address Arabic</label>
                            <input type="text" v-model="address_arabic" class="form-control main-input" id="exampleFormControlInput2" placeholder="عنوان">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="About English" class="form-label">About English</label>
                            <input type="text" v-model="about_english" class="form-control main-input" id="exampleFormControlInput1" placeholder="About">
                          </div>
                          <div class="mb-3">
                            <label for="About Arabic" class="form-label">About Arabic</label>
                            <input type="text" v-model="about_arabic" class="form-control main-input" id="exampleFormControlInput2" placeholder="عن">
                          </div>
                    </div>
                </div>
                <!-- Add more form fields as needed -->
                <button type="submit" class="btn btn-primary btn-gold float-end" @click.prevent="createUser">Submit</button>
              </form>
            </div>
          </div>

          <!-- Photo Upload -->
          <div class="col-md-2 back-green">
            <div class="p-3 mt-2">
              <!-- Sidebar Content -->
              <h5>Sidebar</h5>
              <div class="d-flex align-items-center justify-content-between">
                <span class="fsr-span main-gold">Account Info</span>
                <i class="bi bi-person-vcard-fill main-white fsr"></i>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <span class="fsr-span text-white">Subscriptions</span>
                <i class="bi bi-calendar-check-fill main-white fsr"></i>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <span class="fsr-span text-white">Payments</span>
                <i class="bi bi-c-circle-fill main-white fsr"></i>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <span class="fsr-span text-white">Users</span>
                <i class="bi bi-people-fill main-white fsr"></i>
            </div>
              <!-- <i class="bi bi-people"></i> -->
              <!-- Add sidebar content here -->
            </div>
          </div>
        </div>
      </div>
</template>

<script>

import axios from 'axios';
// import { useToast } from "primevue/usetoast";

    export default {
        data(){
            return{
                address_english: '',
                address_arabic: '',
                about_english: '',
                about_arabic: '',
            }
        },
        methods: {
            async createUser(){

                try {
                    const userData = {
                        address_english: this.address_english,
                        address_arabic: this.address_arabic,
                        about_english: this.about_english,
                        about_arabic: this.about_arabic
                    };

                const response = await axios.post('/api/users/create', userData);

                console.error(response);

                Vue.$toast.open({
                    message: response.data.message,
                    type: 'success',
                    position: 'top-right'
                });

                } catch (error) {

                    console.error(error);

                    Vue.$toast.open({
                        message: error.response.data.message,
                        type: 'error',
                        position: 'top-right'
                    });
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


<style>

.bi-camera-fill{
    font-size: 5rem !important;
}

.round-bar{
    border: 1px solid;
    border-radius: 1.5rem;
    border-color: rgb(212, 212, 212);
}

.fsr{
    font-size: 1.7rem;
}

.fsr-span{
    font-size: 18px;
}

.rotate-left {
    transform: rotateY(180deg);
    font-size: 4rem;
}

.main-form{
    margin-top: 11rem;
}

.w-65{
    width: 65%;
}

.main-input{
    height: 50px;
}

.main-gold{
    color: goldenrod;
}

.back-gold{
    background-color: gold;
}

.back-green{
    background-color: #1e2925;
}

.main-white{
    color: white;
}

.border-side{
    border: 2px solid;
    color: goldenrod;
    border-radius: 1rem;
}

.btn-gold{
    background-color: goldenrod;
    border-color: goldenrod;
}

.btn-gold:hover{
    background-color: #1e2925;
    border-color: #1e2925;
}

.btn-gold:active{
    background-color: #1e2925;
    border-color: #1e2925;
}


</style>
