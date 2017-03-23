<template>
    <div >
        <p class="text-center" v-if="loading">
            Таби пизда!
        </p>

        <button class="btn btn-success" v-if="status==0" @click="addFriend()">Add friend</button>
        <button class="btn btn-success" v-if="status=='pending'" @click="acceptFriend()">Accept friendship</button>
        <span class="text-success" v-if="status=='waiting'">Waiting for response</span>
        <span class="text-success" v-if="status=='friends'">Friends</span>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.get(`/check_relationship_status/${this.profile_user_id}`)
                    .then((response) => {
                        console.log(response);
                        this.status=response.data.status;
                        this.loading=false;
                    })
        },
        props:['profile_user_id'],
        data() {
          return {
              status : "",
              loading:true
          }
        },
        methods:{
            addFriend(){
                this.loading=true;
                axios.get(`/add_friend/${this.profile_user_id}`)
                        .then( (response) => {
                            console.log(response);
                            if (response.data===1)
                                this.status='waiting';
                            noty({
                                type: 'success',
                                layout:'bottomLeft',
                                text: 'Friend request sent.'
                            });
                            this.loading=false;
                        })
            },
            acceptFriend(){
                this.loading=true;
                axios.get(`/accept_friend/${this.profile_user_id}`)
                        .then( (response) => {
                    console.log(response);
                    if (response.data===1)
                        this.status='friends';
                    noty({
                            type: 'success',
                            layout:'bottomLeft',
                            text: 'You\'re friends now!.'
                         });
                    this.loading=false;
                })
            }
        }
    }
</script>
