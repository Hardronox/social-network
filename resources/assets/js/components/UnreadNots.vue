<template>
    <li>
        <a href="/notifications">Unread nots  <span class="badge">{{allNotsCount}}</span></a>
    </li>
</template>

<script>
    export default {

        mounted(){
            this.getUnread();
        },
        methods:{
            getUnread(){
                axios.get('/get_unread')
                        .then( (nots) => {
                            nots.body.forEach( (not) => {
                                this.$store.commit('addNot',not)

                    })
                })
            }
        },
        computed:{
            allNotsCount() {
                return this.$store.getters.allNotsCount;
            }

    }
    }
</script>